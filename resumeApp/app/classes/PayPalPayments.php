<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 2/21/2019
 * Time: 1:28 PM
 */

namespace App\classes;


use App\Booking;
use App\Client;
use App\Http\Controllers\NotificationsController;
use App\Invoice;
use Illuminate\Support\Facades\Session;
use App\PayPalInvoice;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;

class PayPalPayments
{

    protected $provider;
    public function __construct() {
        $this->provider = new ExpressCheckout();
    }

    public function viewPaypalForm(){
        return view('welcomePaypal');
    }

    public function expressCheckout(Request $request) {
        // check if payment is recurring
        $recurring = false;
        if(isset($request->weeks) && $request->weeks > 1){
            $recurring = true;
        }
        // get new invoice id
        $lastInvoiceRecord = PayPalInvoice::orderBy('created_at', 'desc')->first();
        if($lastInvoiceRecord){
            $invoice_id = $lastInvoiceRecord->id + 1;
        }else{
            $invoice_id = 1;
        }

        // Get the cart data
        $cart = $this->getCart($recurring, $invoice_id,$request);

        // create new invoice
        $invoice = $this->createPayPalInvoice($request);
        if(isset($request->paymentType) && $request->paymentType == 'hireFreelancer') {
            $booking = $this->createBooking($request);
        }

        if(isset($request->invoice_id)){
            session::put('invoice_id',$request->invoice_id);
        }

        // send a request to paypal
        // paypal should respond with an array of data
        // the array should contain a link to paypal's payment system
        $response = $this->provider->setExpressCheckout($cart, $recurring);

        // if there is no link redirect back with error message
        if (!$response['paypal_link']) {
            return redirect('/')->with(['code' => 'danger', 'errorMessage' => 'Something went wrong with PayPal']);
            // For the actual error message dump out $response and see what's in there
        }

        // redirect to paypal
        // after payment is done paypal
        // will redirect us back to $this->expressCheckoutSuccess
        return redirect($response['paypal_link']);
    }

    private function getCart($recurring, $invoice_id,$request)
    {
        $description = '';
        $amount = 0;
        if(isset($request->description)){
            $description = $request->description;
        }else{
            $description = $request['L_NAME0'];
        }
        if (isset($request->amountToPay)){
            $amount = $request->amountToPay;
        }else{
            $amount = $request['AMT'];
        }
        if ($recurring) {
            return [
                // if payment is recurring cart needs only one item
                // with name, price and quantity
                'items' => [
                    [
                        'name' => 'Weekly Subscription - ' . $description . $invoice_id,
                        'price' => $amount,
                        'qty' => 1,
                    ],
                ],

                // return url is the url where PayPal returns after user confirmed the payment
                'return_url' => url('/paypal/express-checkout-success?recurring=1'),
                'subscription_desc' => 'Weekly Subscription ' . config('paypal.invoice_prefix') . ' #' . $invoice_id,
                // every invoice id must be unique, else you'll get an error from paypal
                'invoice_id' => config('paypal.invoice_prefix') . '_' . $invoice_id,
                'invoice_description' => "Order #". $invoice_id ." Invoice",
                'cancel_url' => url('/'),
                'total' => $amount, // Total price of the cart
            ];
        }

        return [
            // if payment is not recurring cart can have many items
            // with name, price and quantity
            'items' => [
                [
                    'name' => 'One time payment - '.$description. $invoice_id,
                    'price' => $amount,
                    'qty' => 1,
                ],
            ],

            // return url is the url where PayPal returns after user confirmed the payment
            'return_url' => url('/paypal/express-checkout-success'),
            // every invoice id must be unique, else you'll get an error from paypal
            'invoice_id' => config('paypal.invoice_prefix') . '_' . $invoice_id,
            'invoice_description' => "Order #" . $invoice_id . " Invoice",
            'cancel_url' => url('/'),
            // total is calculated by multiplying price with quantity of all cart items and then adding them up
            // in this case total is 20 because Product 1 costs 10 (price 10 * quantity 1) and Product 2 costs 10 (price 5 * quantity 2)
            'total' => $amount,
        ];
    }

    public function expressCheckoutSuccess(Request $request) {

        // check if payment is recurring
        $recurring = $request->input('recurring', false) ? true : false;
        $token = $request->get('token');
        $PayerID = $request->get('PayerID');
        // initaly we paypal redirects us back with a token
        // but doesn't provice us any additional data
        // so we use getExpressCheckoutDetails($token)
        // to get the payment details
        $response = $this->provider->getExpressCheckoutDetails($token);
        $payer_email = $response['EMAIL'];
        // if response ACK value is not SUCCESS or SUCCESSWITHWARNING
        // we return back with error
        if (!in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
            return redirect('/')->with(['code' => 'danger', 'errorMessage' => 'Error processing PayPal payment']);
        }

        // invoice id is stored in INVNUM
        // because we set our invoice to be xxxx_id
        // we need to explode the string and get the second element of array
        // witch will be the id of the invoice
        $invoice_id = explode('_', $response['INVNUM'])[1];

        // get cart data
        $cart = $this->getCart($recurring, $invoice_id,$response);

        // check if our payment is recurring
        if ($recurring === true) {

            // if recurring then we need to create the subscription
            // you can create monthly or yearly subscriptions
            $data = [
                'PROFILESTARTDATE' => Carbon::now()->toAtomString(),
                'DESC'             => $cart['subscription_desc'],
                'BILLINGPERIOD'    => 'Week',
                'BILLINGFREQUENCY' => 1,
                'AMT'              => $response['AMT'],
                'CURRENCYCODE'     => 'USD',
            ];

            $response = $this->provider->createRecurringPaymentsProfile($data, $response['TOKEN']);

            $status = 'Invalid';
            // if after creating the subscription paypal responds with activeprofile or pendingprofile
            // we are good to go and we can set the status to Processed, else status stays Invalid
            if (!empty($response['PROFILESTATUS']) && in_array($response['PROFILESTATUS'], ['ActiveProfile', 'PendingProfile'])) {
                $status = 'Processed';
            }

        } else {

            // if payment is not recurring just perform transaction on PayPal
            // and get the payment status
            $payment_status = $this->provider->doExpressCheckoutPayment($cart, $token, $PayerID);
            $status = $payment_status['PAYMENTINFO_0_PAYMENTSTATUS'];

        }

        // find invoice by id
        $invoice = PayPalInvoice::find($invoice_id);
        // set invoice status
        $invoice->payment_status = $status;
        $invoice->payer_email    = $payer_email;

        // if payment is recurring lets set a recurring id for latter use
        if ($recurring === true) {
            $invoice->recurring_id = $response['PROFILEID'];
        }

        // save the invoice
        $invoice->save();

        $booking_id =  Booking::orderBy('created_at', 'desc')->first()->id; // last booking id.
        $booking = Booking::find($booking_id);
        $booking->is_paid = true;
        $booking->save();
        // App\Invoice has a paid attribute that returns true or false based on payment status
        // so if paid is false return with error, else return with success message
        if ($invoice->paid) {
            $this->sendTelegramNotificationOfPayment($invoice);
            $this->sendMailNotification($booking);
            if(session::has('invoice_id')){
                $this->updateInvoiceStatus();
            }
            return redirect('/')->with(['code' => 'success', 'successMessage' => 'Payment (' . $invoice->title . ') has been paid successfully!']);
        }

        return redirect('/')->with(['code' => 'danger', 'errorMessage' => 'Error processing PayPal payment for Order ' . $invoice->title . '!']);
    }


    public function notify(Request $request)
    {

        // add _notify-validate cmd to request,
        // we need that to validate with PayPal that it was realy
        // PayPal who sent the request
        $request->merge(['cmd' => '_notify-validate']);
        $post = $request->all();

        // send the data to PayPal for validation
        $response = (string) $this->provider->verifyIPN($post);

        //if PayPal responds with VERIFIED we are good to go
        if ($response === 'VERIFIED') {

            /**
            This is the part of the code where you can process recurring payments as you like
            in this case we will be checking for recurring_payment that was completed
            if we find that data we create new invoice
            */
            if ($post['txn_type'] == 'recurring_payment' && $post['payment_status'] == 'Completed') {
                $invoice = PayPalInvoice::where('recurring_id',$post['recurring_payment_id'])->first();
                $invoice->count = $invoice->count + 1 ;
                $invoice->save();

                if($invoice->count == $invoice->weeks){
                    // cancel subscription:
                    $this->provider->cancelRecurringPaymentsProfile($invoice->recurring_id);
                }
            }

        }

    }

    public function sendTelegramNotificationOfPayment($invoice){
        $telegram = new Telegram('-228260999');
        $msg      = "PayPal custom payment has been made.\n" ;
        $msg     .= "With amount of ". $invoice->price . " USD";
        $msg     .= "\nFrom : ".$invoice->payer_email ;
        $msg     .= "\nDescription : ".  $invoice->title;
        if(isset($invoice->recurring_id)){
            $msg     .= "\n(Recurring payment)";
        }
        $telegram->sendMessage($msg);
    }

    protected function sendMailNotification($booking){
        // send email successfull
        $data['email'] = $booking->booking_email;
        $data['clientName'] = '123 Workforce visitor';
        if(isset($booking->client_id)){
            $data['clientName'] = Client::where('id',$booking->client_id)->first()->name;
        }
        $data['freelancerName'] = User::where('id',$booking->user_id)->first()->firstName;
        $notification = new NotificationsController;
        $notification->clientPaidEmail($data);
    }

    public function createPayPalInvoice(Request $request){
        $invoice = new PayPalInvoice();
        $invoice->title = $request->description;
        $invoice->price = $request->amountToPay;
        $invoice->weeks = $request->weeks;
        $invoice->count = 1;
        $invoice->save();

        return $invoice;
    }

    public function createBooking(Request $request){
        $booking = new Booking;
        $booking->amount_paid     = $request->amountToPay;
        $booking->hours           = $request->hours;
        $booking->weeks           = $request->weeks;
        $booking->weeks_original  = $request->weeks;
        $booking->user_id         = $request->freelancerID;
        $client_id = null ;
        if(isset($request->client_id)){
            $client_id = $request->client_id;
            $booking->booking_email   = Client::where('id',$request->client_id)->first()->email;
        }
        $booking->client_id       = $client_id;

        $booking->subscription_id = null ;
        $booking->payment_method  = 'PayPal' ;
        $booking->is_paid         = false ;
        $booking->save();

        return $booking;
    }

    public function updateInvoiceStatus(){
        $invoice = Invoice::where('id',session::get('invoice_id'))->first();
        $invoice->status = 'Paid';
        $invoice->save();
        Session::forget('invoice_id');
        // change invoice booking status
        if($invoice->status === 'Paid' && isset($invoice->booking_id)){
            // change booking to status to be paid.
            $booking = Booking::where('id',$invoice->booking_id)->first();
            $booking->is_paid = true;
            $booking->save();
        }
    }
}