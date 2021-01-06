<?php
/**
 * Created by PhpStorm.
 * User: Ahmed-pc
 * Date: 11/9/2020
 * Time: 9:43 AM
 */

namespace App\Http\Controllers\Billing;


use App\Billing\paymentGatewayInfo;
use App\Http\Controllers\Controller;
use App\Subscription;
use App\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use PayPal\Api\BillingInfo;
use PayPal\Api\ChargeModel;
use PayPal\Api\Currency;
use PayPal\Api\InvoiceItem;
use PayPal\Api\MerchantInfo;
use PayPal\Api\MerchantPreferences;
use PayPal\Api\Patch;
use PayPal\Api\PatchRequest;
use PayPal\Api\Payer;
use PayPal\Api\Invoice;
use PayPal\Api\Agreement as Agreement;
use PayPal\Api\PaymentDefinition;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Plan;
use PayPal\Api\ShippingAddress;
use PayPal\Api\Webhook;
use PayPal\Api\WebhookEventType;
use PayPal\Common\PayPalModel;
use PayPal\Exception\PayPalConnectionException;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;

class PayPalForClientsController extends Controller
{
    private $apiContext;
    private $client_id;
    private $secret;
    private $monthly_plan_id;
    private $yearly_plan_id;

    public function __construct()
    {
        // Detect if we are running in live mode or sandbox
        if (config('paypal.settings.mode') == 'live') {
            $this->client_id = config('paypal.live_client_id');
            $this->secret = config('paypal.live_secret');
            $this->monthly_plan_id = env('PAYPAL_LIVE_MONTHLY_PLAN_ID', '');
            $this->yearly_plan_id = env('PAYPAL_LIVE_YEARLY_PLAN_ID', '');
        } else {
            $this->client_id = config('paypal.sandbox_client_id');
            $this->secret = config('paypal.sandbox_secret');
            $this->monthly_plan_id = env('PAYPAL_SANDBOX_MONTHLY_PLAN_ID', '');
            $this->yearly_plan_id = env('PAYPAL_SANDBOX_YEARLY_PLAN_ID', '');
        }

        // Set the Paypal API Context/Credentials
        $this->apiContext = new ApiContext(new OAuthTokenCredential($this->client_id, $this->secret));
        $this->apiContext->setConfig(config('paypal.settings'));
    }


    public function customPayPalPayments(Request $request)
    {
        if (!$request->payment_info['isRecurring']) {
            $url = $this->makeOneTimePayment($request);
        } else {
            $url = $this->makeSubscriptionPayment($request);
        }
        return [
            'url' => $url
        ];
    }


    // make one time payment:
    protected function makeOneTimePayment($request)
    {
        // Create new payer and method
        $payer = new Payer();
        $payer->setPaymentMethod("paypal");

        // Set redirect URLs
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl(URL::to('/') . '/paypal/hire-freelancer/success')
            ->setCancelUrl(URL::to('/') . '/paypal/hire-freelancer/cancel');

        // Set payment amount
        $amount = new Amount();
        $amount->setCurrency("USD")
            ->setTotal($request->payment_info['toPayNowAmount']);

        // Set transaction object
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setDescription('Hire ' . $request->freelancer['default_resume_link']['title'] . ' For ' . $request->payment_info['numberOfHours'] . ' Hours.');

        // Create the full payment object
        $payment = new Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));

        // Create payment with valid API context
        try {
            $payment->create($this->apiContext);
            $approvalUrl = $payment->getApprovalLink();
            return $approvalUrl;

        } catch (PayPalConnectionException $ex) {
            echo $ex->getCode();
            echo $ex->getData();
            dd($ex);
        } catch (Exception $ex) {
            dd($ex);
        }


    }


    // create recurring payment
    protected function makeSubscriptionPayment($request)
    {
        return $this->createPayPalPlan($request);
    }

    protected function createPayPalPlan($request)
    {
        // Create a new billing plan
        $plan = new Plan();
        $plan->setName('Hire Freelancer with civ.ie')
            ->setDescription('Hire Freelancer with civ.ie.')
            ->setType('fixed');

        // Set billing plan definitions
        $paymentDefinition = new PaymentDefinition();
        $paymentDefinition->setName('Regular Payments')
            ->setType('REGULAR')
            ->setFrequency($request->payment_info['interval'])
            ->setFrequencyInterval('1')
            ->setCycles($request->payment_info['iterations'] === 'ongoing' ? '12' : $request->payment_info['iterations'])
            ->setAmount(new Currency(array('value' => $request->payment_info['toPayNowAmount'], 'currency' => 'USD')));


        // Set merchant preferences
        $merchantPreferences = new MerchantPreferences();
        $merchantPreferences->setReturnUrl(URL::to('/') . '/paypal/hire-freelancer-regular/success')
            ->setCancelUrl(URL::to('/') . '/paypal/hire-freelancer/cancel')
            ->setAutoBillAmount('yes')
            ->setInitialFailAmountAction('CONTINUE')
            ->setMaxFailAttempts('0');

        $plan->setPaymentDefinitions(array($paymentDefinition));
        $plan->setMerchantPreferences($merchantPreferences);

        $planID = $this->createAndActivatePlan($plan);
        return $this->createSubscription($planID);
    }

    protected function createAndActivatePlan($plan)
    {
        try {
            $createdPlan = $plan->create($this->apiContext);

            try {
                $patch = new Patch();
                $value = new PayPalModel('{"state":"ACTIVE"}');
                $patch->setOp('replace')
                    ->setPath('/')
                    ->setValue($value);
                $patchRequest = new PatchRequest();
                $patchRequest->addPatch($patch);
                $createdPlan->update($patchRequest, $this->apiContext);
                $plan = Plan::get($createdPlan->getId(), $this->apiContext);

                // Output plan id
                return $plan->getId();

            } catch (PayPalConnectionException $ex) {
                echo $ex->getCode();
                echo $ex->getData();
                die($ex);
            } catch (Exception $ex) {
                die($ex);
            }
        } catch (PayPalConnectionException $ex) {
            echo $ex->getCode();
            echo $ex->getData();
            die($ex);
        } catch (Exception $ex) {
            die($ex);
        }
    }

    protected function createSubscription($planID)
    {
        // Create new agreement
        $agreement = new Agreement();
        $agreement->setName('Hire freelancer with civ.ie')
            ->setDescription('Hire freelancer with civ.ie | subscription')
            ->setStartDate(Carbon::now()->addMinutes(5)->toIso8601String());

        // Set plan id
        $plan = new Plan();
        $plan->setId($planID);
        $agreement->setPlan($plan);

        // Add payer type
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        $agreement->setPayer($payer);

        try {
            // Create agreement
            $agreement = $agreement->create($this->apiContext);
            return $agreement->getApprovalLink();
        } catch (PayPalConnectionException $ex) {
            echo $ex->getCode();
            echo $ex->getData();
            die($ex);
        } catch (Exception $ex) {
            die($ex);
        }
    }

    // return urls:
    public function success(Request $request)
    {
        // Get payment object by passing paymentId
        $paymentId = $_GET['paymentId'];
        $payment = Payment::get($paymentId, $this->apiContext);
        $payerId = $_GET['PayerID'];

        // Execute payment with payer ID
        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);

        try {
            // Execute payment
            $result = $payment->execute($execution, $this->apiContext);
            $client = $this->createClient($result->payer->payer_info);
            $this->createPaymentHistory($client, $paymentId, $result);

            return view('billing.success');
        } catch (PayPalConnectionException $ex) {
            return view('billing.error');
        } catch (Exception $ex) {
            return view('billing.error');
        }
    }

    public function successRegular(Request $request)
    {
        $token = $_GET['token'];
        $agreement = new Agreement();
        try {
            // Execute agreement
            $result = $agreement->execute($token, $this->apiContext);
            $client = $this->createClient($result->payer->payer_info);
            $this->createSubscriptionHistory($client, $result);
            $this->createPaymentHistory($client, $result->id, $result);

            return view('billing.success');
        } catch (PayPalConnectionException $ex) {
            return view('billing.error');
        } catch (Exception $ex) {
            return view('billing.error');
        }

    }

    public function cancel()
    {
        return view('billing.error');
    }


    // general
    protected function createClient($payerData)
    {

        $client = User::where('email', $payerData->email)->first();
        if ($client) {
            return $client;
        }

        $newClient = User::create([
            'name' => $payerData->first_name . ' ' . $payerData->last_name,
            'email' => $payerData->email,
            'username' => strstr($payerData->email, '@', true),
            'password' => Hash::make($payerData->email . '_civie_client'),
        ])->assignRole('client');

        paymentGatewayInfo::create([
            'user_id' => $newClient->id,
            'paypal_payer_id' => $payerData->payer_id
        ]);

        return $newClient;
    }

    protected function createPaymentHistory($client, $paymentId, $result)
    {

        $payment = \App\Billing\Payment::where('away_payment_id', $paymentId)->first();
        if ($payment) {
            return false;
        }

        $amount = 0;
        $notes = '';

        if (isset($result->transactions)) {
            $amount = $result->transactions[0]->amount->total;
        }
        if (isset($result->plan->payment_definitions)) {
            $amount = $result->plan->payment_definitions[0]->amount->value;
            $notes = 'Subscription payment.';
        }

        \App\Billing\Payment::create([
            'away_payment_id' => $paymentId,
            'user_id' => $client->id,
            'amount' => $amount,
            'payment_method' => 'paypal',
            'status' => 'paid',
            'notes' => 'Successfully paid.' . $notes,
        ]);
    }

    protected function createSubscriptionHistory($client, $result){
        $sub = Subscription::where('paypal_agreement_id', $result->id)->first();
        if ($sub) {
            return false;
        }

        $dt = Carbon::now();
        if($result->plan->payment_definitions[0]->frequency == 'MONTH'){
            $expires_at = $dt->addMonths($result->agreement_details->cycles_remaining);
        }else{
            $expires_at = $dt->addWeeks($result->agreement_details->cycles_remaining);
        }

        return Subscription::create([
            'payment_method' => 'paypal',
            'sub_frequency' => $result->plan->payment_definitions[0]->frequency,
            'amount' => $result->plan->payment_definitions[0]->amount->value,
            'sub_status' => 'active',
            'paypal_agreement_id' => $result->id,
            'user_id' => $client->id,
            'expires_at' => $expires_at
        ]);
    }

    protected function createInvoice($request)
    {
        $invoice = new Invoice();

        $merchant = new MerchantInfo();
        $merchant->setEmail('AhmedMarzouk266-buyer@gmail.com')
            ->setFirstName('mechant')
            ->setLastName('example');

        $invoice->setMerchantInfo($merchant);

        $billing_info = new BillingInfo();
        $billing_info->setEmail('AhmedMarzouk266-buyer@gmail.com')
            ->setFirstName('buyer')
            ->setLastName('test');

        $invoice->setBillingInfo(array($billing_info));

        $invoice_item = new InvoiceItem();

        $unit_price = new Currency();
        $unit_price->setCurrency('USD');
        $unit_price->setValue($request->payment_info['toPayLaterAmount']);


        $invoice_item->setName('Hire Freelancer with civ.ie | later payment')
            ->setQuantity(1)
            ->setUnitPrice($unit_price);


        $invoice->setItems(array($invoice_item));
        $invoice_item->setDescription('Hire Freelancer with civ.ie | later payment');

        try {
            $invoice->create($this->apiContext);
        } catch (PayPalConnectionException $ex) {
            return $ex->getData();
        }
    }


    // webhooks creator:
    public function createWebhooks()
    {
        $webhook = new Webhook();

        // Set webhook notification URL
        $webhook->setUrl("https://civ.ie/paypal/webhooks");

        // Set webhooks to subscribe to
        $webhookEventTypes = array();

        $webhookEventTypes[] = new WebhookEventType(
            '{
                "name":"BILLING_AGREEMENTS.AGREEMENT.CREATED"
            }'
        );

        $webhookEventTypes[] = new WebhookEventType(
            '{
                "name":"BILLING_AGREEMENTS.AGREEMENT.CANCELLED"
            }'
        );

        $webhookEventTypes[] = new WebhookEventType(
            '{
                "name":"BILLING.SUBSCRIPTION.CANCELLED"
            }'
        );

        $webhook->setEventTypes($webhookEventTypes);

        try {
            $output = $webhook->create($this->apiContext);
            dd($output);
        } catch (PayPalConnectionException $ex) {
            echo $ex->getCode();
            echo $ex->getData();
            die($ex);
        } catch (Exception $ex) {
            die($ex);
        }
    }
}