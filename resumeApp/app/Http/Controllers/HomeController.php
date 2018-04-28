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
        $this->middleware('auth')->except('welcomePage');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.form');
    }

    public function welcomePage($username){
        $user =  User::where('username',$username)->first();
        if($user !== null){
            $user = $user->userData;
        }else{
            return redirect('/');
        }
        return view('welcome', compact('user'));
    }
}
