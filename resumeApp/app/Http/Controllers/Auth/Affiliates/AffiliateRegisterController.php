<?php

namespace App\Http\Controllers\Auth\Affiliates;

use App\Affiliate;
use App\Http\Controllers\NotificationsController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AffiliateRegisterController extends Controller
{
    protected $redirectTo = '/affiliate/dashboard';

    public function __construct()
    {
        $this->middleware('guest:affiliate');
    }

    public function showRegistrationForm()
    {
        return view('auth.affiliate.affiliate-register');
    }

    public function register(Request $request){
        // validate data
        $validator = $this->validator($request->all());
        if ($validator->fails())
        {
            return redirect('/affiliate/register')->withErrors($validator)->withInput();
        }

        // register a client
        $affiliate = $this->create($request->all());
        // log the client in :
        Auth::guard('affiliate')->login($affiliate);

        return redirect(route('affiliate.dashboard'));
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:affiliates',
            'agree_with_terms' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    protected function create(array $data)
    {
        Affiliate::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'agree_with_terms' => $data['agree_with_terms'],
            'password' => Hash::make($data['password']),
            'code' => md5(uniqid(rand(), true))
        ]);


        $affiliate = Affiliate::where('email',$data['email'])->first();

        // send notification of registered client :
        $notification = new NotificationsController();
        $data['id'] = $affiliate->id ;
        $data['affiliateEmail'] = $affiliate->email ;
        $notification->affiliateRegisteredEmail($data);


        // send welcome mail to the affiliate :
        $notification = new NotificationsController();
        $notification->affiliateWelcomeEmail($data);


        return $affiliate;

    }
}
