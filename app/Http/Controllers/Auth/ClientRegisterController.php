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
        $this->middleware('guest:client');
    }

    public function showRegistrationForm(Request $request)
    {
        if(isset($request->ownerCode)){
            $this->affiliate($request->ownerCode) ;
        }

        return view('auth.client-register');
    }

    public function register(Request $request){
        // validate data
        $validator = $this->validator($request->all());
        if ($validator->fails())
        {
            return [
                'status' => 'failure',
                'errors' => $validator->errors()
            ];
        }

        // register a client
        $client = $this->create($request->all());
        // log the client in :
        Auth::guard('client')->login($client);

        return ['status' => 'success'];
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'agency' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:clients',
            'emailDept' => 'required|string|email|max:255|unique:clients',
            'phone' => 'required|min:7|numeric',
            'timeZone' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    protected function create(array $data)
    {
        Client::create([
            'firstName'=>$data['name'],
            'name' => $data['name'],
            'agency' => $data['agency'],
            'email' => $data['email'],
            'emailDept' => $data['emailDept'],
            'phone' => $data['phone'],
            'timeZone' => $data['timeZone'],
            'password' => Hash::make($data['password']),
        ]);


        $client = Client::where('email',$data['email'])->first();

        // send notification of registered client :
        $notification = new NotificationsController();
        $data['id'] = $client->id ;
        $notification->clientRegisteredEmail($data);

        // save the owner :
        // add the owner code if exists
        if(isset($data['ownerCode'])){
            // get owner with this code
            $owner = Owner::where('code',$data['ownerCode'])->first();
            $client->owner_id = $owner->id;
            $client->save();
        }

        return $client;

    }

    protected function affiliate($ownerCode){
        $affiliate = Affiliate::where('code',$ownerCode)->first();
        if(!$affiliate){
            return redirect('client/register')->with('errorMessage','Wrong affiliate code');
        }
        // new click on the affiliate link
        if(!Session::get('AffiliateLinkClient')){ // if not clicked
            $click = new AffiliateClick;
            $click->affiliate_id = $affiliate->id;
            $click->client = 1;
            $click->save();
        }
        Session::put('AffiliateLinkClient','clicked'); // clicked once

        return view('auth.client-register',compact('ownerCode'));
    }
}
