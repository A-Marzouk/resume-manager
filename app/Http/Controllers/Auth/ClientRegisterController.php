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
            $ownerCode = $request->ownerCode;
            $affiliate = Affiliate::where('code',$request->ownerCode)->first();
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
        }
        return view('auth.client-register',compact('ownerCode'));
    }

    public function newRegisterForm(){
        return view('auth.new-register');
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
