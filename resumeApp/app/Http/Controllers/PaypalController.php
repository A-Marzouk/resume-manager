<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 11/24/2018
 * Time: 8:48 PM
 */

namespace App\Http\Controllers;

use App\Affiliate;
use App\AffiliatePaymentHistory;
use App\Booking;
use App\classes\Telegram;
use App\Client;
use App\Invoice;
use App\User;
use App\UserData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use PayPal\Api\Amount;
use PayPal\Api\Currency;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Payout;
use PayPal\Api\PayoutItem;
use PayPal\Api\PayoutSenderBatchHeader;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Exception\PayPalConnectionException;
use PayPal\Rest\ApiContext;

class PaypalController extends Controller
{
    private $_api_context ;
    public function __construct()
    {
        $paypal_config      = Config::get('paypal');
        $this->_api_context = new ApiContext( new OAuthTokenCredential(
            $paypal_config['client_id'],
            $paypal_config['secret_id']
        ));
        $this->_api_context->setConfig($paypal_config['settings']);
    }

    public function showForm(){
        return view('paypalForm');
    }

    public function showSendForm(){
        return view('paypal_send_form');
    }

    public function payWithPaypal(Request $request){
        // this function is to receive payments from clients through paypal.
        // this can be easily used with Stripe payments.
        // the user needs to use to pay with paypal - then login and confirm.
        $payer = new Payer();
        $payer->setPaymentMethod("paypal");

        $item_1 = new Item();
        $item_1->setName('Hire freelancer') /** item name **/
        ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice($request->amountToPay); /** unit price **/

        $itemList = new ItemList();
        $itemList->setItems(array($item_1));


        $amount = new Amount();
        $amount->setCurrency("USD")
            ->setTotal($request->amountToPay);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription("Hire a freelancer.")
            ->setInvoiceNumber(uniqid());

        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl(env('APP_URL').'/paypal/status')
            ->setCancelUrl(env('APP_URL').'/paypal/status');

        $payment = new Payment();
        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));

        try {
            $payment->create($this->_api_context);
        }catch (PayPalConnectionException $ex) {
            if (Config::get('app.debug')) {
                return redirect('/')->with('errorMessage','Connection timeout');
            } else {
                return redirect('/')->with('errorMessage','Some error occur, sorry for inconvenient');
            }
        }

        Session::put('paypal_payment_id',$payment->getId());

        $approvalUrl = $payment->getApprovalLink();

        if (isset($approvalUrl)) {
            // if it is custom payment :
            if(isset($request->custom_payment)){
                session::put('custom_payment',true);
                session::put('description',$request->description);
                session::put('custom_payment_amount',$request->amountToPay);
                if(isset($request->invoice_id)){
                    session::put('invoice_id',$request->invoice_id);
                }
                return redirect($approvalUrl);
            }
            // make an unpaid booking
            $booking = new Booking;
            $booking->amount_paid     = $request->amountToPay;
            $booking->hours           = $request->hours;
            $booking->weeks           = $request->weeks;
            $booking->weeks_original  = $request->weeks;
            $booking->user_id         = $request->freelancerID;
            $client_id = null ;
            if(isset($request->client_id)){
                $client_id = $request->client_id;
            }
            $booking->client_id       = $client_id;
            if(isset($request->client_email)){
                $booking->booking_email   = $request->client_email;
            }
            $booking->subscription_id = null ;
            $booking->payment_method  = 'PayPal' ;
            $booking->is_paid         = false ;
            $booking->save();

            //
            session::put('last_booking_id',$booking->id);
            return redirect($approvalUrl);
        }

        return redirect('/')->with('errorMessage', 'Unknown error occurred');
//        return $payment;
    }

    public function getPayPalPaymentStatus(){
        $paymentId = Session::get('paypal_payment_id');
        Session::forget('paypal_payment_id');

        if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
            return redirect('/')->with('errorMessage', 'Unknown error occurred');
        }

        $payment = Payment::get($paymentId, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));
        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);
        if ($result->getState() == 'approved') {
            if(session::get('custom_payment') == true){
                // send a notification of custom payment.
                $telegram = new Telegram('-228260999');
                $msg      = "PayPal custom payment has been made.\n" ;
                $msg     .= "With amount of ". session::get('custom_payment_amount') . " USD";
                $msg     .= "\nFrom : ".  $payment->getPayer()->payer_info->email;
                $msg     .= "\nDescription : ".  session::get('description');
                $telegram->sendMessage($msg);

                // check if it is an invoice to set it as paid:
                if(session::get('invoice_id')){
                    $invoice = Invoice::where('id',session::get('invoice_id'))->first();
                    $invoice->status = 'Paid';
                    $invoice->save();
                    // change invoice booking status
                    if($invoice->status === 'Paid' && isset($invoice->booking_id)){
                        // change booking to status to be paid.
                        $booking = Booking::where('id',$invoice->booking_id)->first();
                        $booking->is_paid = true;
                        $booking->save();
                    }
                }

                session::forget(['custom_payment','custom_payment_amount','description','invoice_id']);
                return redirect('/')->with('successMessage','Payment success, we will get in touch with you soon.');
            }
            /////////// if approved make the booking paid & update the booking email & hours
            $booking = Booking::where('id',session::get('last_booking_id'))->first();
            $booking->is_paid = true;
            $booking->booking_email = $payment->getPayer()->payer_info->email ;
            $this->updateHours($booking);
            $booking->save();
            // send email successfull
            $data['email'] = $booking->booking_email;
            $data['clientName'] = '123 Workforce visitor';
            if(isset($booking->client_id)){
                $data['clientName'] = Client::where('id',$booking->client_id)->first()->name;
            }
            $data['freelancerName'] = User::where('id',$booking->user_id)->first()->firstName;
            $this->sendMailSuccess($data);

            session::forget('last_booking_id');

            return redirect('/')->with('successMessage','Payment success, we will get in touch with you soon.');
        }
        return redirect('/')->with('errorMessage','Payment failed');

    }

    protected function sendMailSuccess($data){
        $notification = new NotificationsController;
        $notification->clientPaidEmail($data);
    }

    protected function updateHours($booking){
        $freelancer     = User::where('id',$booking->user_id)->first();
        $currentHours   = $freelancer->userData->availableHours;
        $freelancerData = UserData::where('user_id',$freelancer->id)->first();
        $freelancerData->availableHours = intval($currentHours) - intval( $booking->hours) ;
        if($freelancerData->availableHours < 0){
            $freelancerData->availableHours  = 0 ;
        }
        $freelancerData->save();

        return 'Updated';
    }



    // now we need functions to send payout payments

    public function sendPaymentByPayPal(Request $request){
        $payouts = new Payout();
        $senderBatchHeader = new PayoutSenderBatchHeader();
        $senderBatchHeader->setSenderBatchId(uniqid())
            ->setEmailSubject("You have a Payout!");
        $senderItem = new PayoutItem();
        $senderItem->setRecipientType('Email')
            ->setNote('Thanks for your patronage!')
            ->setReceiver($request->paypal_email)
            ->setSenderItemId(uniqid())
            ->setAmount(new Currency([
                'value'=>intval($request->amountToPay),
                'currency'=>'USD'
            ]));

        $payouts->setSenderBatchHeader($senderBatchHeader)
            ->addItem($senderItem);

        try {
            $output = $payouts->createSynchronous($this->_api_context);
        } catch (PayPalConnectionException $ex) {
            return redirect('/affiliate/dashboard')->with('errorMessage','Could not complete the payment');
        }

        // if payment is successful : update the affiliate info :
        $this->updateAffiliatePaymentHistory($request);
        return redirect('/affiliate/dashboard')->with('successMessage','Payment success!');
    }

    protected function updateAffiliatePaymentHistory($request){
        $affiliate = Affiliate::where('paypal_email',$request->paypal_email)->first();

        $aff_PayHistory = new AffiliatePaymentHistory();
        $aff_PayHistory->amount_paid  = $request->amountToPay;
        $aff_PayHistory->affiliate_id = $affiliate->id;
        $aff_PayHistory->save();

        // send notification to Telegram with the payment :
        $telegram = new Telegram('-228260999');
        $msg  = "Hi Ahmed,\n a new PayPal payment to affiliate has been sent." ;
        $msg .= "\nAffiliate name : ".$affiliate->name;
        $msg .= "\nAffiliate email: " .$affiliate->email;
        $msg .= "\nAffiliate PayPal email: " .$affiliate->paypal_email;
        $msg .= "\nAmount sent: " .$affiliate->amount_paid;
        $telegram->sendMessage($msg);
    }

}