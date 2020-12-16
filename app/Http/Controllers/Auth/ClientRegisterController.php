<?php

namespace App\Http\Controllers\Auth;

use App\Affiliate;
use App\AffiliateClick;
use App\Client;
use App\Http\Controllers\NotificationsController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ClientRegisterController extends Controller
{
    protected $redirectTo = '/client';

    public function __construct()
    {
        $this->middleware('guest.client');
    }

    public function showRegisterForm(){
        return view('auth.client.register');
    }

    public function register(Request $request){

        $this->validator($request->all())->validate();

        $client = $this->create($request->all());

        Auth::guard('client')->login($client);

        return ['status' => 'success'];
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:clients',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    protected function create(array $data)
    {
        Client::create([
            'firstName'=>$data['name'],
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);


        $client = Client::where('email',$data['email'])->first();

        // send notification of registered client :
        $notification = new NotificationsController();
        $data['id'] = $client->id ;
        $notification->clientRegisteredEmail($data);


        return $client;
    }
}
