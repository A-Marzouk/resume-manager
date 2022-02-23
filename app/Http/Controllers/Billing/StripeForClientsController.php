<?php
/**
 * Created by PhpStorm.
 * User: Ahmed-pc
 * Date: 10/28/2020
 * Time: 10:08 AM
 */

namespace App\Http\Controllers\Billing;


use App\Billing\paymentGatewayInfo;
use App\Client;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Stripe\Product as StripeProduct;
use Stripe\Price as StripePrice;
use Stripe\Customer as StripeCustomer;
use Illuminate\Support\Facades\Session;
use Stripe\Checkout\Session as StripeSession;
use Stripe\InvoiceItem as StripeInvoiceItem;
use Stripe\Invoice as StripeInvoice;
use Stripe\SubscriptionSchedule as StripeSubscriptionSchedule;

class StripeForClientsController extends Controller
{

    public function customStripePayments(Request $request)
    {

        $customer = $this->createOrFetchCustomer($request);

        if ( ! $request->payment_info['isRecurring']) {
            $session_id =  $this->makeOneTimePayment($request, $customer);

        }else{
            $session_id = $this->makeSubscriptionPayment($request, $customer);
        }

        return [
            'url' => config('url') . '/client-subscription?session_id=' . $session_id
        ];
    }



    // one time payments
    protected function makeOneTimePayment($request, $customer)
    {
        $product = $this->createNewProduct('Hire ' . $request->freelancer['name'] . ' For ' . $request->payment_info['numberOfHours'] . ' Hours.');

        if($request->payment_info['payNow'] == 'true'){
            // pay now
            $price = $this->createOneTimePriceForNowPayment($product->id, $request);
            $session = StripeSession::create([
                'customer' => $customer->id,
                'mode' => 'payment',
                'payment_method_types' => ['card'],
                'line_items' => [
                    [
                        'price' => $price->id,
                        'quantity' => 1,
                    ]
                ],
                'success_url' => url('/') . '/hire-freelancer/success',
                'cancel_url' =>  url('/') . '/hire-freelancer/cancel',
            ]);
        }else{
            // pay later with an invoice.
            $price = $this->createOneTimePriceForLaterPayment($product->id, $request);

            StripeInvoiceItem::create([
                'customer' => $customer->id,
                'price' => $price->id,
            ]);
            StripeInvoice::create([
                'customer' => $customer->id,
                'auto_advance' => true,
                'collection_method' => 'send_invoice',
                'description' => 'Second part of payment | Hiring freelancer with civ.ie',
                'days_until_due' => 7
            ]);

            $session = StripeSession::create([
                'customer' => $customer->id,
                'mode' => 'setup',
                'payment_method_types' => ['card'],
                'success_url' => url('/') . '/hire-freelancer/success',
                'cancel_url' =>  url('/') . '/hire-freelancer/cancel',
            ]);
        }

        Session::put('hire_session_id',  $session->id);

        return $session->id ;
    }

    protected function createOneTimePriceForNowPayment($product_id, $request)
    {
        return StripePrice::create([
            'product' => $product_id,
            'unit_amount' => $request->payment_info['toPayNowAmount'] * 100, // USD in cents
            'currency' => 'gbp',
        ]);
    }

    protected function createOneTimePriceForLaterPayment($product_id, $request)
    {
        return StripePrice::create([
            'product' => $product_id,
            'unit_amount' => $request->payment_info['toPayLaterAmount'] * 100, // USD in cents
            'currency' => 'gbp',
        ]);
    }



    // subscriptions :
    protected function makeSubscriptionPayment($request, $customer){
        $product = $this->createNewProduct('123workforce | Hire ' .
            $request->freelancer['name'] .
            ' For ' . $request->payment_info['numberOfHours'] . ' Hours | ' .
            $request->payment_info['iterations'] . ' '
            . $request->payment_info['interval'] . 's');
        if($request->payment_info['payNow'] == 'true'){
            $subscriptionPrice = $this->createPriceForSubscription($product->id, $request);
            $startDate = 'now';
        }else{
            $subscriptionPrice = $this->createPriceForSubscriptionLaterPayment($product->id, $request);
            $date = new Carbon($request->payment_info['toPayLaterDate']);
            $startDate = $date->timestamp;
        }

        $session = StripeSession::create([
            'customer' => $customer->id,
            'mode' => 'setup',
            'payment_method_types' => ['card'],
            'success_url' => url('/') . '/hire-freelancer/success',
            'cancel_url' =>  url('/') . '/hire-freelancer/cancel',
        ]);
        Session::put('hire_sub_session_id',  $session->id);
        StripeSubscriptionSchedule::create([
            'customer' =>  $customer->id,
            'start_date' => $startDate,
            'end_behavior' =>  $request->payment_info['iterations'] === 'ongoing' ? 'release' : 'cancel',
            'phases' => [
                [
                    'items' => [
                        [
                            'price' => $subscriptionPrice->id,
                            'quantity' => 1,
                        ],
                    ],
                    'iterations' => $request->payment_info['iterations'] === 'ongoing' ? null : $request->payment_info['iterations'],
                ],
            ],
        ]);

        return $session->id ;
    }

    protected function createPriceForSubscription($product_id, $request)
    {
        return StripePrice::create([
            'product' => $product_id,
            'unit_amount' => $request->payment_info['toPayNowAmount'] * 100, // USD in cents
            'currency' => 'gbp',
            // pass interval only if recurring payment.
            'recurring' => [
                'interval' => $request->payment_info['interval'],
            ],
        ]);
    }

    protected function createPriceForSubscriptionLaterPayment($product_id, $request)
    {
        return StripePrice::create([
            'product' => $product_id,
            'unit_amount' => $request->payment_info['toPayLaterAmount'] * 100, // USD in cents
            'currency' => 'gbp',
            // pass interval only if recurring payment.
            'recurring' => [
                'interval' => $request->payment_info['interval'],
            ],
        ]);
    }


    // general:
    protected function createOrFetchCustomer($request)
    {
        $client   = Client::where('email', $request->client['email'])->first();
        $stripeID = $client->paymentGatewayInfo->stripe_customer_id ?? '' ;

        if($stripeID){
            return StripeCustomer::retrieve($stripeID);
        }

        $newStripeCustomer = StripeCustomer::create([
            'email' => $request->client['email'],
            'payment_method' => null,
            'invoice_settings' => [
                'default_payment_method' => null,
            ],
        ]);

        $this->createClient($request, $newStripeCustomer->id);

        return $newStripeCustomer ;
    }

    protected function createNewProduct($productName)
    {
        return StripeProduct::create([
            'name' => $productName
        ]);
    }

    protected function createClient($request, $stripe_customer_id)
    {
        $client = Client::where('email', 'guest_' . $request->client['email'])->first();

        if( ! $client){
            $client =  Client::create([
                'name' => $request->client['name'],
                'email' => 'guest_' . $request->client['email'],
                'username' => strtolower(strstr($request->client['email'], '@', true)),
                'password' => Hash::make(strtolower($request->client['email'] . '_123workforce_client')),
            ]);
        }

        $paymentGatewayInfo = paymentGatewayInfo::where('client_id', $client->id)->first();

        if( ! $paymentGatewayInfo){
            paymentGatewayInfo::create([
                'client_id' => $client->id,
                'stripe_customer_id' => $stripe_customer_id
            ]);
        }

        return $client;

    }

    public function clientSubscription(){
        return view('billing.subscription');
    }

    // notifications:
    public function firstPaymentSuccess(){
       return view('billing.success');
    }

    public function firstPaymentFail(){
        return view('billing.error');
    }


}