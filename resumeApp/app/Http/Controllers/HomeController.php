<?php

namespace App\Http\Controllers;

use App\Booking;
use App\ClientSearch;
use App\User;
use App\UserData;
use Dompdf\Exception;
use Illuminate\Http\Request;
use Stripe\Charge;
use Stripe\Customer;
use Stripe\Stripe;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('privacyView','showHirePage','getSearch','stripePayment','termsView','customPayment','welcomePage','ResumePage','stripeTest');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function ResumePage($username){
        $user1 =  User::where('username',$username)->first();
        if($user1 !== null){
            $profession = $user1->profession;
            $user = $user1->userData;
            $user->username = $user1->username;
        }else{
            return redirect('/');
        }
        $primarySkills = explode(',',$user->primarySkills);
        $charSkills = explode(',',$user->charSkills);
        return view('resume', compact('user','profession','primarySkills','charSkills','user1'));
    }


    public function welcomePage(){
        return view('welcome');
    }

    public function stripeTest(){
       return view('stripe');
    }

    public function stripePayment(Request $request){
        if(auth()->guard('client')->guest()){
            // client is not logged in.
            $data['clientName']= '123 Workforce Client';
            $client_id = null ;
            // send email to invite him to register.
        }else{
            $data['clientName'] = auth()->guard('client')->user()->firstName ;
            $client_id = auth()->guard('client')->user()->id;
            // thank him mail
        }

        Stripe::setApiKey("sk_test_WlqUYgob2e2ALpZfJw5AfIaG");

        $description = "Hire freelancer for 10 hours'";

        if(isset($request->description)){
            $description = $request->description ;
        }

        $amountToPay = intval($request->amountToPay);
        $token = $request->stripeToken;

        $customer = Customer::create(
            [
                "source" => $token,
                "description" =>  $data['clientName']
            ]
        );

        // Charge the Customer instead of the card
         $charge = Charge::create([
             'amount' => $amountToPay,
             'currency' => 'usd',
             'description' => $description,
             "customer" => $customer->id,
             'receipt_email' => 'AhmedMarzouk266@gmail.com',
         ]);


        // send emeail success of payment :
        $data['email'] = $request->stripeEmail;
        $data['freelancerName'] = $request->freelancerName;


        $notification = new NotificationsController;
        $notification->clientPaidEmail($data);


        // create the booking : (user_id,client_id,amount_paid,hours)
        $booking = new Booking;
        $booking->amount_paid = $request->amountToPay;
        $booking->hours       = $request->hours;
        $booking->user_id     = $request->freelancerID;
        $booking->client_id   = $client_id;
        $booking->save();

        $freelancer     = User::where('id',$request->freelancerID)->first();
        $currentHours   = $freelancer->userData->availableHours;
        $freelancerData = UserData::where('user_id',$freelancer->id)->first();
        $freelancerData->availableHours = intval($currentHours) - intval( $request->hours) ;
        $freelancerData->save();

        return redirect('/'.$freelancer->username)->with('successMessage','Thank you for your payment, we will get in touch with you soon!');
    }


    public function customPayment(){
        return view('custom_payment');
    }

    public function termsView(){
        return view('terms');
    }

    public function privacyView(){
        return view('privacy');
    }

    public function getSearch($search_id){
        $freelancers = [];
        $search = ClientSearch::where('id',$search_id)->first();

        if($search){
            $search_name = $search->name;
            $freelancers_id = $search->freelancers_id;
            $freelancers=[];
            foreach (explode(',',$freelancers_id) as $id){
                $freelancers[] = User::where('id',$id)->first();
            }
        }

        return view('public_search',compact('freelancers','search_name'));
    }

    public function showHirePage(){
        $freelancer  = User::where('id',request()->freelancerID)->first();
        $hours       = request()->hours;
        $amountToPay = ( $freelancer->userData->salary + 5 ) * 100 * intval($hours);

        return view('payment',compact('freelancer','hours','amountToPay'));
    }
}
