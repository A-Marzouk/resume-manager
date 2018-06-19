<?php

namespace App\Http\Controllers;

use App\Client;
use App\Conversation;
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
        $data['clients'] = Client::all();
        $data['conversations'] = Conversation::all();
        $admin = User::where('username','admin_workforce')->first();
        Auth::loginUsingId($admin->id);
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

    public function logInAsClient($client_id){
        // save admins token in separate session,
        session()->put('admin', 'AdminWasHere');
        // log him out and log in the chosen user in
        Auth::guard('client')->loginUsingId($client_id);
        $fromAdmin ='adminView';
        return redirect(route('client.dashboard',$fromAdmin));
    }

    public function deleteClient($id){
        if(Auth::user()->admin == 1) {
            Client::where('id', $id)->delete();
            return redirect('/admin#clients')->with('successMessage', 'Client has been deleted !');
        }
        return view('client.welcome');
    }

    public function deleteFreelancer($id){
        if(Auth::user()->admin == 1) {
            User::where('id', $id)->delete();
            return redirect(route('admin.dashboard'))->with('successMessage', 'Freelancer has been deleted !');;
        }
        return redirect(route('freelancer.dashboard'));
    }


}
