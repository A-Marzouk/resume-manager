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
use Illuminate\Http\Request;
use Stripe\Charge;
use Stripe\Customer;
use Stripe\Stripe;

class StripePayments
{
    private $apiKey = 'sk_test_WlqUYgob2e2ALpZfJw5AfIaG' ;

    public function stripePayment(Request $request){

        $data = $this->getClientData();

        Stripe::setApiKey($this->apiKey);

        $description = "Hire freelancer";
        if(isset($request->description)){
            $description = $request->description ;
        }
        $amountToPay = intval($request->amountToPay);
        $token = $request->stripeToken;

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

        // Charge the Customer instead of the card
        $this->chargeCustomer($amountToPay,$description,$currCustomerID);
        // send emeail success of payment :
        $data['email'] = $request->stripeEmail;
        $data['freelancerName'] = $request->freelancerName;
        $this->sendMailSuccess($data);

        // create the booking : (user_id,client_id,amount_paid,hours)
        $this->createBooking($request , $data['client_id']);
        // update user available hours
        $freelancer = $this->updateHours($request);

        return redirect('/'.$freelancer->username)->with('successMessage','Thank you for your payment, we will get in touch with you soon!');
    }

    public function showHirePage(){
        if(!isset(request()->freelancerID)){
            return redirect(route('welcome'));
        }
        $freelancer  = User::where('id',request()->freelancerID)->first();
        $hours       = request()->hours;
        $amountToPay = ( $freelancer->userData->salary + 5 ) * 100 * intval($hours);

        return view('payment',compact('freelancer','hours','amountToPay'));
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

    protected function createBooking($request,$client_id){
        $booking = new Booking;
        $booking->amount_paid   = $request->amountToPay;
        $booking->hours         = $request->hours;
        $booking->user_id       = $request->freelancerID;
        $booking->client_id     =$client_id;
        $booking->booking_email = $request->stripeEmail;
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


}

