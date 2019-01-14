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
use App\User;
use App\UserData;
use Dompdf\Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Stripe\Charge;
use Stripe\Customer;
use Stripe\Stripe;
use Stripe\Subscription;

class StripePayments
{
    private $apiKey ;
    // test mode key : sk_test_WlqUYgob2e2ALpZfJw5AfIaG
    // live mode key : sk_live_vRNRg2Lmexmse8Bxm6VS89DK
    public function __construct()
    {
        $this->apiKey = env('STRIPE_SECRET_API_KEY');
    }

    public function stripePayment(Request $request){

        $data = $this->getClientData();

        Stripe::setApiKey($this->apiKey);


        $description = "Hire freelancer";
        if(isset($request->description)){
            $description = $request->description ;
        }

        $weeks       = intval($request->weeks);
        $amountToPay = intval($request->amountToPay);
        $token = $request->stripeToken;
        if($request->freelancerName == 'custom_payment'){
            $amountToPay = $amountToPay *100;
        }

        // creare product
        $product = \Stripe\Product::create([
            'name' =>'Freelancer : '.$request->freelancerName,
            'type' => 'service',
        ]);


        // create plan
        $plan = \Stripe\Plan::create([
            'product' => $product->id,
            'nickname' => $description,
            'interval' => 'week',
            'currency' => 'usd',
            'amount' => $amountToPay,
        ]);


        // create customer
        $currCustomerID = $this->getCurrCustomer($request->stripeEmail);

        if(!($currCustomerID)){
            $customer = Customer::create(
                [
                    "source" => $token,
                    "description" =>  $data['clientName'],
                    "email" => $request->stripeEmail
                ]
            );

            $currCustomerID = $customer->id;
        }

        // subscripe the customer to the plan :

        $subscription = \Stripe\Subscription::create([
            'customer' => $currCustomerID,
            'items' => [['plan' => $plan->id]],
        ]);

        // Charge the Customer instead of the card
//        $this->chargeCustomer($amountToPay,$description,$currCustomerID);

        // send emeail success of payment :
        $data['email'] = $request->stripeEmail;
        $data['freelancerName'] = $request->freelancerName;
        $this->sendMailSuccess($data);


        if($request->freelancerName == 'custom_payment'){
            return redirect('/payment')->with('successMessage','Thank you for your payment, we will get in touch with you soon!');
        }

        // create the booking : (user_id,client_id,amount_paid,hours)
        $this->createBooking($request , $data['client_id'],$subscription->id);
        // update user available hours
        $freelancer = $this->updateHours($request);
        return redirect('/'.$freelancer->username)->with('successMessage','Thank you for your order, we will get in touch with you soon!');




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

    protected function getCurrCustomer($stripeEmail){
        $customers = Customer::all(array("limit" => 1000));
        foreach ($customers['data'] as $key => $customer){
            if($customer->email == $stripeEmail){
                return $customer->id ;
            }
        }

        return false;
    }

    protected function chargeCustomer($amountToPay,$description,$currCustomerID){
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
        $booking->amount_paid     = $request->amountToPay;
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
            /*
             * 1- get the customer email
             * 2- get all not canceled bookings of this email
             * 3- compare the amount paid and the amount in this booking.
             * 4- if everything is fine
             * 5- reduce number of weeks.
             * 6- if number of weeks == 0 so stop subscription
             * */
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

                    // web hook telegram message
                    $telegram = new Telegram('-228260999');
                    $msg  = "A subscription with ID of : " ;
                    $msg .= $subscription->id;
                    $msg .= "has been ended";
                    $telegram->sendMessage($msg);
                }
                $booking->save();
                break;
            }

            // web hook telegram message
            $telegram = new Telegram('-228260999');
            $msg2   = 'A client :('.$customerEmail;
            $msg2  .= ') has paid for this week, Amount: ';
            $msg2  .= $amount/100;
            $msg2  .= '$, weeks left :';
            if(isset($booking->weeks)){
                $msg2  .= $currWeeks -1 ;
            }else{
                $msg2  .= 'First Payment';
            }
            $telegram->sendMessage($msg2);

        }
        return new Response('webhock handled', 200);
    }
}

