<?php

namespace App\Http\Controllers\Auth;

use App\Affiliate;
use App\AffiliateClick;
use App\Client;
use App\Http\Controllers\Controller;
use App\Mail\Clients\ClientRegistered;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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
        if (isset($request->ownerCode)) {
            $this->affiliate($request->ownerCode);
        }

        return view('auth.client-register');
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $client = $this->create($request->all());

        Mail::send(new ClientRegistered($client));

        auth()->login($client->user);

        return redirect()->route('dashboard.index');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'agency' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'department_email' => 'required|string|email|max:255|unique:clients',
            'phone' => 'required|min:7|numeric',
            'timezone' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new client instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return app(User::class)->createClient([
            'user' => [
                'email' => $data['email'],
                'password' => $data['password'],
                'username' => $data['email'],
                'timezone' => $data['timezone'],
            ],
            'client' => [
                'contact' => $data['name'],
                'agency' => $data['agency'],
                'agency_phone' => $data['phone'],
                'department_email' => $data['department_email'],
            ],
            'user_data' => [
                'first_name' => $data['name'],
                'phone' => $data['phone'],
                // 'timezone' => $data['timezone'],
            ],
        ]);
    }

    // protected function create(array $data)
    // {
    //     Client::create([
    //         'firstName' => $data['name'],
    //         'name' => $data['name'],
    //         'agency' => $data['agency'],
    //         'email' => $data['email'],
    //         'emailDept' => $data['emailDept'],
    //         'phone' => $data['phone'],
    //         'timeZone' => $data['timeZone'],
    //         'password' => Hash::make($data['password']),
    //     ]);

    //     $client = Client::where('email', $data['email'])->first();

    //     // send notification of registered client :
    //     $notification = new NotificationsController();
    //     $data['id'] = $client->id;
    //     $notification->clientRegisteredEmail($data);

    //     // save the owner :
    //     // add the owner code if exists
    //     if (isset($data['ownerCode'])) {
    //         // get owner with this code
    //         $owner = Owner::where('code', $data['ownerCode'])->first();
    //         $client->owner_id = $owner->id;
    //         $client->save();
    //     }

    //     return $client;
    // }

    protected function affiliate($ownerCode)
    {
        $affiliate = Affiliate::where('code', $ownerCode)->first();
        if (!$affiliate) {
            return redirect('client/register')->with('errorMessage', 'Wrong affiliate code');
        }
        // new click on the affiliate link
        if (!Session::get('AffiliateLinkClient')) {
            // if not clicked
            $click = new AffiliateClick;
            $click->affiliate_id = $affiliate->id;
            $click->client = 1;
            $click->save();
        }
        Session::put('AffiliateLinkClient', 'clicked'); // clicked once

        return view('auth.client-register', compact('ownerCode'));
    }
}
