<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function welcomePage(){
        // get list of freelancers :
        $data['users'] = User::all();
        return view('admin.usersList', compact('data'));
    }

    public function logInAsUser($user_id){
        // save admins token in separate session,
        session()->put('admin', 'AdminWasHere');
        // log him out and log in the chosen user in
        Auth::loginUsingId($user_id);
        $fromAdmin ='adminView';
        return redirect(route('freelancer.dashboard',$fromAdmin));
    }
}
