<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 2/21/2019
 * Time: 1:28 PM
 */

namespace App\classes;


use App\PayPalInvoice;
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
        $invoice_id = PayPalInvoice::count() + 1;

        // Get the cart data
        $cart = $this->getCart($recurring, $invoice_id,$request);

        // create new invoice
        $invoice = new PayPalInvoice();
        $invoice->title = $request->description;
        $invoice->price = $request->amountToPay;
        $invoice->weeks = $request->weeks;
        $invoice->count = 1;
        $invoice->save();

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

    private function getCart($recurring, $invoice_id, $request)
    {

        if ($recurring) {
            return [
                // if payment is recurring cart needs only one item
                // with name, price and quantity
                'items' => [
                    [
                        'name' => 'Weekly Subscription - ' . $request->description . $invoice_id,
                        'price' => $request->amountToPay,
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
                'total' => $request->amountToPay, // Total price of the cart
            ];
        }

        return [
            // if payment is not recurring cart can have many items
            // with name, price and quantity
            'items' => [
                [
                    'name' => 'Product 1',
                    'price' => 10,
                    'qty' => 1,
                ],
                [
                    'name' => 'Product 2',
                    'price' => 5,
                    'qty' => 2,
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
            'total' => 20,
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
        $cart = $this->getCart($recurring, $invoice_id,$request);

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

        // if payment is recurring lets set a recurring id for latter use
        if ($recurring === true) {
            $invoice->recurring_id = $response['PROFILEID'];
        }

        // save the invoice
        $invoice->save();

        // App\Invoice has a paid attribute that returns true or false based on payment status
        // so if paid is false return with error, else return with success message
        if ($invoice->paid) {
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
}