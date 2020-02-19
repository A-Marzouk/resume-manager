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

    public function showForm(){
        return view('paypalForm');
    }

    public function expressCheckout(Request $request) {
        // check if payment is recurring
        $recurring = false;
        if(isset($request->weeks) && $request->weeks > 1){
            $recurring = true;
        }

        // invoice id
        $invoice_id = $this->getInvoiceNewID();
        // cart data
        $cart = $this->getCart($recurring, $invoice_id,$request);

        // create new invoice
        $this->createPayPalInvoice($request);

        // to change status later - save invoice id in session
        if(isset($request->invoice_id)){
            session::put('invoice_id',$request->invoice_id);
        }

        // send a request to paypal -  respond with an array of data - the array should contain a link to paypal's payment system
        $response = $this->provider->setExpressCheckout($cart, $recurring);

        // if there is no link redirect back with error message
        if (!$response['paypal_link']) {
            return redirect('/')->with(['code' => 'danger', 'errorMessage' => 'Something went wrong with PayPal, please try again later.']);
        }

        // redirect to paypal
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


        // App\Invoice has a paid attribute that returns true or false based on payment status
        // so if paid is false return with error, else return with success message

        if ($invoice->paid) {
            $this->sendTelegramNotificationOfPayment($invoice);

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
                    $response = $this->provider->cancelRecurringPaymentsProfile($invoice->recurring_id);
                    if($response['ACK'] == 'Success'){
                        $invoice->payment_status = 'canceled';
                        $invoice->save();
                    }
                }
            }

        }

    }

    public function cancelSubscription(Request $request){
        $subscription_id = $request->subscription_id;
        $response        = $this->provider->cancelRecurringPaymentsProfile($subscription_id);
        if($response['ACK'] == 'Success'){
            $invoice = PayPalInvoice::where('recurring_id',$subscription_id)->first();
            $invoice->payment_status = 'canceled';
            $invoice->save();
        }
        return $response;
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

    public function createPayPalInvoice(Request $request){
        $invoice = new PayPalInvoice();
        $invoice->title = $request->description;
        $invoice->price = $request->amountToPay;
        $invoice->weeks = $request->weeks;
        $invoice->count = 1;
        $invoice->save();

        return $invoice;
    }

    public function updateInvoiceStatus(){
        $invoice = Invoice::where('id',session::get('invoice_id'))->first();
        $invoice->status = 1 ;
        $invoice->save();
        Session::forget('invoice_id');

    }

    public function getInvoiceNewID(){
        $lastInvoiceRecord = PayPalInvoice::orderBy('created_at', 'desc')->first();
        if($lastInvoiceRecord){
            return $invoice_id = $lastInvoiceRecord->id + 1;
        }
        return $invoice_id = 1;
    }

}