<?php

namespace App\Http\Controllers;

use App\User;
use App\UserData;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('welcomePage','ResumePage');
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
}
