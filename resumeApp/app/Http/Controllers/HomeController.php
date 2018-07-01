<?php

namespace App\Http\Controllers;

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
        $this->middleware('auth')->except('stripePayment','welcomePage','ResumePage','stripeTest');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function ResumePage($username){
        $user =  User::where('username',$username)->first();
        if($user !== null){
            $profession = $user->profession;
            $user = $user->userData;
        }else{
            return redirect('/');
        }
        $primarySkills = explode(',',$user->primarySkills);
        $charSkills = explode(',',$user->charSkills);
        return view('resume', compact('user','profession','primarySkills','charSkills'));
    }


    public function welcomePage(){
        return view('welcome');
    }

    public function stripeTest(){
       return view('stripe');
    }

    public function stripePayment(Request $request){
        Stripe::setApiKey("sk_test_WlqUYgob2e2ALpZfJw5AfIaG");
        $token = $request->stripeToken;
        $charge = Charge::create([
            'amount' => 97500,
            'currency' => 'eur',
            'description' => 'Test charge',
            'source' => $token,
        ]);

        return redirect()->back();
    }
}
