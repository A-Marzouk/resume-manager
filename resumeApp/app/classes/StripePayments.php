<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 9/21/2018
 * Time: 10:57 AM
 */

namespace App\classes;


use App\Booking;
use App\Http\Controllers\NotificationsController;
use App\Invoice;
use App\StripeInvoice;
use App\User;
use App\UserData;
use Dompdf\Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Stripe\Charge;
use Stripe\Customer;
use Stripe\Plan;
use Stripe\Product;
use Stripe\Stripe;
use Stripe\Subscription;
use Stripe\UsageRecord;

class StripePayments
{
    private $apiKey ;
    public function __construct()
    {
        $this->apiKey = env('STRIPE_SECRET');
    }

    public function stripePayment(Request $request){
        if(isset($request->weeks)){
            if($request->weeks == 'pay_as_you_go'){
                $this->createMeteredPlan($request);
            }
        }
        Stripe::setApiKey($this->apiKey);

        // 3 payments : custom , hire freelancer , invoice.
        if(!isset($request->paymentInfo)){
            return redirect('/')->with('errorMessage','Payment info is not enough!');
        }

        $this->makeStripeCustomPayment($request);

        return redirect('/')->with('successMessage','Thank you for your order, we will get in touch with you soon!');

    }


    protected function makeStripeCustomPayment(Request $request){
        $amountToPay = intval($request->amountToPay) * 100;
        if($request->paymentInfo == 'hireFreelancer'){
            $amountToPay = intval($request->amountToPay);
        }
        $customerID = $this->getCustomerID($request);
        $subscription_id = '';
        if(isset($request->weeks) && $request->weeks > 1 && $request->weeks !== 'pay_as_you_go'){
            $subscription_id = $this->makeStripeRecurringCustomPayment($request);
            $this->createBooking($request , null,$subscription_id);
        }else{
            $this->chargeCustomerOnce($amountToPay,$request->description,$customerID);
        }

        $invoice = '';
        if($request->paymentInfo == 'invoice'){
            if(isset($request->invoice_id)){
                $invoice = Invoice::where('id',$request->invoice_id)->first();
                $invoice->status = 'Paid';
                $invoice->save();
                if($invoice->status === 'Paid' && isset($invoice->booking_id)){
                    // change booking to status to be paid.
                    $booking = Booking::where('id',$invoice->booking_id)->first();
                    $booking->is_paid = true;
                    $booking->save();
                }
            }
        }
        if($request->paymentInfo == 'hireFreelancer'){
            $clientData = $this->getClientData();
            $this->createBooking($request , $clientData['client_id'],$subscription_id);
            $this->updateHours($request);
        }

        $this->sendNotificationsOfPayment($request,$invoice);
    }

    protected function sendNotificationsOfPayment(Request $request,$invoice){
        if($request->paymentInfo == 'custom_payment'){
            $data['email'] = $request->stripeEmail;
            $data['freelancerName'] = $request->freelancerName;
            $clientData = $this->getClientData();
            $data['clientName'] = $clientData['clientName'];
            $this->sendMailSuccess($data);

            $telegram = new Telegram('-228260999');
            $msg      = "Stripe custom payment has been made.\n" ;
            $msg     .= "With amount of ".$request->amountToPay ." USD";
            $msg     .= "\nFrom : " . $request->stripeEmail;
            $msg     .= "\nDescription : " . $request->description;
            if(isset($request->weeks) && $request->weeks > 1){
                $msg     .= "\nRecurring payment of : " . $request->weeks . ' weeks';
            }
            $telegram->sendMessage($msg);
        }elseif($request->paymentInfo == 'invoice' && !empty($invoice)){
            $notification = new NotificationsController;
            $notification->agentHasBeenConfirmed($invoice) ;
            // telegram:
            $telegram = new Telegram('-228260999');
            $msg      = "Stripe Invoice payment has been made.\n" ;
            $msg     .= "With amount of ".$request->amountToPay ." USD";
            $msg     .= "\nFrom : " . $request->stripeEmail;
            $msg     .= "\nDescription : " . $request->description;
            $msg     .= "\nInvoice number : " . $invoice->unique_number;
            if(isset($request->weeks) && $request->weeks > 1){
                $msg     .= "\nRecurring payment of : " . $request->weeks . ' weeks';
            }
            $telegram->sendMessage($msg);
        }elseif($request->paymentInfo == 'hireFreelancer'){
            $telegram = new Telegram('-228260999');
            $msg      = "Stripe Hire Freelancer payment has been made.\n" ;
            $msg     .= "With amount of ".$request->amountToPay/100 ." USD";
            $msg     .= "\nFrom : " . $request->stripeEmail;
            $msg     .= "\nDescription : " . $request->description;
            $msg     .= "\nFreelancer : " . $request->freelancerName;
            if(isset($request->weeks) && $request->weeks > 1){
                $msg     .= "\nRecurring payment of : " . $request->weeks . ' weeks';
            }
            $telegram->sendMessage($msg);
        }
    }
    protected function makeStripeRecurringCustomPayment(Request $request){
        $amountToPay = intval($request->amountToPay) * 100;
        if($request->paymentInfo == 'hireFreelancer'){
            $amountToPay = intval($request->amountToPay);
        }
        $customerID  = $this->getCustomerID($request);

        // create product
        $product = \Stripe\Product::create([
            'name' =>'123 Workforce service',
            'type' => 'service',
        ]);

        // create plan
        $plan = Plan::create([
            'product' => $product->id,
            'nickname' => $request->description,
            'interval' => 'week',
            'currency' => 'usd',
            'amount' => $amountToPay,
        ]);

        $subscription = Subscription::create([
            'customer' => $customerID,
            'items' => [['plan' => $plan->id]],
        ]);

        return $subscription->id;
    }

    public function showHirePage(){
        if(!isset(request()->freelancerID)){
            return redirect(route('welcome'));
        }
        $freelancer  = User::where('id',request()->freelancerID)->first();
        $hours       = request()->hours;
        $weeks      = request()->weeks;
        $amountToPay = ( $freelancer->userData->salary + 5 ) * 100 * intval($hours);

        return view('payment',compact('freelancer','hours','amountToPay','weeks'));
    }

    public function customPayment(){
        return view('custom_payment');
    }

    protected function getClientData(){
        $data['clientName'] = '123 Workforce visitor';
        $data['client_id']  = null;
        if(!auth()->guard('client')->guest()){
            $client = auth()->guard('client')->user();
            $data['clientName'] = $client->firstName;
            $data['client_id']  = $client->id;
        }

        return $data;
    }

    protected function getCustomerID($request){
        $data = $this->getClientData();
        $customers = Customer::all(array("limit" => 1000));
        foreach ($customers['data'] as $key => $customer){
            if($customer->email ==  $request->stripeEmail){
                $customerID = $customer->id ;
            }
        }
        if(!isset($customerID)){
            $customer = Customer::create(
                [
                    "source" => $request->stripeToken,
                    "description" =>  $data['clientName'],
                    "email" => $request->stripeEmail
                ]
            );

            $customerID = $customer->id;
        }

        return $customerID;
    }

    protected function chargeCustomerOnce($amountToPay,$description,$currCustomerID){
        $charge = Charge::create([
            'amount' => $amountToPay,
            'currency' => 'usd',
            'description' => $description,
            "customer" => $currCustomerID,
            'receipt_email' => 'AhmedMarzouk266@gmail.com',
        ]);
    }

    protected function sendMailSuccess($data){
        $notification = new NotificationsController;
        $notification->clientPaidEmail($data);
    }

    protected function createBooking($request,$client_id,$subscription_id){
        $booking = new Booking;
        $booking->amount_paid     = $request->amountToPay * 100;
        $booking->hours           = $request->hours;
        $booking->weeks           = $request->weeks;
        $booking->weeks_original  = $request->weeks;
        $booking->user_id         = $request->freelancerID;
        $booking->client_id       = $client_id;
        $booking->booking_email   = $request->stripeEmail;
        $booking->subscription_id = $subscription_id ;
        $booking->payment_method  = 'Stripe' ;
        $booking->is_paid         = true ;
        $booking->save();
    }

    protected function updateHours($request){
        $freelancer     = User::where('id',$request->freelancerID)->first();
        $currentHours   = $freelancer->userData->availableHours;
        $freelancerData = UserData::where('user_id',$freelancer->id)->first();
        $freelancerData->availableHours = intval($currentHours) - intval( $request->hours) ;
        if($freelancerData->availableHours < 0){
            $freelancerData->availableHours  = 0 ;
        }
        $freelancerData->save();

        return $freelancer;
    }

    public function webhocks(Request $request){
        Stripe::setApiKey($this->apiKey);
        if($request->type === 'charge.succeeded'){
            // a charge has been made
            $data   = $request->data;
            $object = $data['object'];
            $amount = $object['amount'];
            $customerID = $object['source']['customer'];
            $customerEmail = Customer::retrieve($customerID)->email;
            $bookings = Booking::where('booking_email',$customerEmail)->get();
            foreach ($bookings as $booking){
                if($booking->canceled || intval($booking->amount_paid) != $amount){
                    continue;
                }
                $currWeeks = $booking->weeks;
                $booking->weeks = $currWeeks - 1 ;
                if($currWeeks -1 == 0){
                    // stop subscription
                    $subscription = Subscription::retrieve($booking->subscription_id);
                    $subscription->cancel();

                    $booking = Booking::where('subscription_id',$booking->subscription_id)->first();
                    $booking->canceled = 'canceled';
                    $booking->save();

                    // web hook telegram message
                    $telegram = new Telegram('-228260999');
                    $msg  = "A subscription with ID of : " ;
                    $msg .= $subscription->id;
                    $msg .= "\nhas been ended.";
                    $msg .= "\nCustomer: ".$subscription->customer;
                    $msg .= "\nEmail: ".$customerEmail;
                    $telegram->sendMessage($msg);
                }

                $booking->save();
                break;
            }

            // web hook telegram message if subscription is not canceled.
            $telegram = new Telegram('-228260999');
            $msg2   = "A client :(".$customerEmail;
            $msg2  .= ") has paid.\n Amount: ";
            $msg2  .= $amount/100;
            if(isset($booking->weeks) && $booking->weeks > 0){
                $msg2  .= "$,\n weeks left :";
                $msg2  .= $booking->weeks -1 ;
            }

            $telegram->sendMessage($msg2);

        }
        return new Response('webhock handled', 200);
    }

    public function cancelSubscription(Request $request){
        Stripe::setApiKey($this->apiKey);
        $subscription = Subscription::retrieve($request->subscription_id);
        $subscription->cancel();
        // make the booking cancel status as canceled :
        $booking = Booking::where('subscription_id',$request->subscription_id)->first();
        $booking->canceled = 'canceled';
        $booking->save();

        return ['status' => 'canceled'] ;

    }


    public function createMeteredPlan(Request $request){

        Stripe::setApiKey($this->apiKey);

        $amountToPay = $request->amountToPay ;
        $customerID  = $this->getCustomerID($request);
        $client_id   = $request->client_id;
        $hours       = $request->hours;

        $product = Product::create([
            'name' =>'123 Workforce service (usage based) ',
            'type' => 'service',
        ]);

        $plan = Plan::create([
            'currency' => 'usd',
            'interval' => 'month',
            'product' => $product->id,
            'nickname' => 'Pay as you go plan',
            'amount' => ($amountToPay*100)/ $hours, // price for one product
            'usage_type' => 'metered',
        ]);

        $subscription = Subscription::create([
            'customer' => $customerID,
            'items' => [['plan' => $plan->id]],
            'billing_thresholds' => [
                'amount_gte' => ($amountToPay*100),
                'reset_billing_cycle_anchor' => true,
            ],
        ]);


        // save invoice stripe

        $stripeInvoice = new StripeInvoice;
        $stripeInvoice->client_id = $client_id;
        $stripeInvoice->title = 'Pay as you go plan';
        $stripeInvoice->price = $amountToPay;
        $stripeInvoice->payment_status = 'paid';
        $stripeInvoice->payer_email = $request->stripeEmail;
        $stripeInvoice->count =1;
        $stripeInvoice->subscription_id = $subscription->id;
        $stripeInvoice->subscription_type = 'metered (usage based)';
        $stripeInvoice->save();

        return $stripeInvoice;

    }

    public function makeUsageReport(Request $request){
        Stripe::setApiKey($this->apiKey);
        $quantity        = $request->quantity;
        $subscription_id = $request->subscription_id ;
        $id = Subscription::retrieve($subscription_id)->items->data[0]->id;
        try{
            UsageRecord::create([
                "quantity" => $quantity,
                "timestamp" =>  now()->timestamp,
                "subscription_item" => $id,
                "action" => "increment",
            ]);
        }catch (\Exception $exception){
            return $exception;
        }

    }

    public function makeThresholdValue(){
        Stripe::setApiKey($this->apiKey);
        $subscription_id = 'sub_EdzPBZJooxIy9h' ;
        return Subscription::update($subscription_id, [
            'billing_thresholds' => [
                'amount_gte' => 200000, // 2000 usd
                'reset_billing_cycle_anchor' => true,
            ],
        ]);


    }

    public function retrieveComingInvoice($customerID){
       return \Stripe\Invoice::upcoming(["customer" => $customerID]);
    }


}

