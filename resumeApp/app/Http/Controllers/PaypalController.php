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
use PayPal\auth\OAuthTokenCredential;
use PayPal\Exception\PayPalConnectionException;
use PayPal\Rest\ApiContext;

class PaypalController extends Controller
{
    private $_api_context ;
    public function __construct()
    {
        $this->middleware('admin');
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
        $item_1->setName('Item 1') /** item name **/
        ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice($request->amount); /** unit price **/

        $itemList = new ItemList();
        $itemList->setItems(array($item_1));


        $amount = new Amount();
        $amount->setCurrency("USD")
            ->setTotal($request->amount);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription("Payment description")
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
            return redirect('/')->with('successMessage','Payment success');
        }
        return redirect('/')->with('errorMessage','Payment failed');

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
                'value'=>intval($request->amount),
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
        $aff_PayHistory->amount_paid  = $request->amount;
        $aff_PayHistory->affiliate_id = $affiliate->id;
        $aff_PayHistory->save();
    }

}