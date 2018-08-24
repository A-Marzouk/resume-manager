<?php

namespace App\Http\Controllers;

use App\ClientSearch;
use App\User;
use App\UserData;
use Illuminate\Http\Request;
use Stripe\Charge;
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
        $this->middleware('auth')->except('getSearch','stripePayment','termsView','customPayment','welcomePage','ResumePage','stripeTest');
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
        Stripe::setApiKey("sk_test_WlqUYgob2e2ALpZfJw5AfIaG");
        $description = "Hire freelancer for 10 hours'";
        if(isset($request->description)){
            $description = $request->description ;
        }
        $amountToPay = intval($request->amountToPay) * 100;
        $token = $request->stripeToken;
        $charge = Charge::create([
            'amount' => $amountToPay,
            'currency' => 'usd',
            'description' => $description,
            'source' => $token,
            'receipt_email' => 'AhmedMarzouk266@gmail.com',
        ]);


        // send emeail success of payment :
        $data['email'] = $request->stripeEmail;
        $data['freelancerName'] = $request->freelancerName;

        if(auth()->guard('client')->guest()){
            // client is not logged in.
            $data['clientName']= '123 Workforce Client';
            // send email to invite him to register.
        }else{
            $data['clientName'] = auth()->guard('client')->user()->firstName ;
            // thank him mail
        }

        $notification = new NotificationsController;
        $notification->clientPaidEmail($data);

        return redirect()->back()->with('successMessage','Thank you for your payment, we will get in touch with you soon!');
    }


    public function customPayment(){
        return view('custom_payment');
    }

    public function termsView(){
        return view('terms');
    }

    public function getSearch($search_id){
        $search = ClientSearch::where('id',$search_id)->first();
        $search_name = $search->name;
        $freelancers_id = $search->freelancers_id;
        $freelancers=[];
        foreach (explode(',',$freelancers_id) as $id){
            $freelancers[] = User::where('id',$id)->first();
        }

        return view('public_search',compact('freelancers','search_name'));
    }
}
