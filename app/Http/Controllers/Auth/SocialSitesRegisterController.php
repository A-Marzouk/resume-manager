<?php
/**
 * Created by PhpStorm.
 * User: Ahmed-pc
 * Date: 1/27/2020
 * Time: 1:52 PM
 */

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Validator;


class SocialSitesRegisterController extends  Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function simpleRegisterView(){
        $referral_code = 'NOT_DEFINED' ;
        if (Input::get('referral_code')) {
            // it means this client is refered by someone.
            $referral_code = Input::get('referral_code') ;
        }
        return view('auth.freelancerSimpleRegister',compact('referral_code'));
    }

    public function simpleRegister(Request $request)
    {
        $this->validator($request->all())->validate();
        $agent = $this->create($request->all());
        if(isset($request->referral_code)){
            $agent->user->update([
                'referred_by_code' => $request->referral_code
            ]);
        }
        auth()->login($agent->user);

        return [
            'status' => 'success'
        ];
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|min:7|numeric',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    protected function create(array $data)
    {
        return app(User::class)->createAgent([
            'user' => [
                'email' => $data['email'],
                'password' => $data['password'],
                'username' => $data['email'],
            ],
            'agent' => [],
            'user_data' => [
                'first_name' => $data['name'],
                'phone' => $data['phone'],
            ],
        ]);
    }


    //    github

    public function redirectToGitHubProvider(){
        return Socialite::driver('github')->redirect();
    }

    public function handleGitHubProviderCallback(){
        $user = Socialite::driver('github')->user();
        dd($user);
    }

//    facebook

    public function redirectToFaceBookProvider(){
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFaceBookProviderCallback(){
        $user = Socialite::driver('facebook')->user();
        dd($user);
    }

//    instagram

    public function redirectToInstagramProvider(){
        return Socialite::driver('instagram')->redirect();
    }

    public function handleInstagramProviderCallback(){
        $user = Socialite::driver('instagram')->user();
        dd($user);
    }

//    google

    public function redirectToGoogleProvider(){
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleProviderCallback(){
        $user = Socialite::driver('google')->user();
        dd($user);
    }

//    linkedin

    public function redirectToLinkedinProvider(){
        return Socialite::driver('linkedin')->redirect();
    }

    public function handleLinkedinProviderCallback(){
        $user = Socialite::driver('linkedin')->stateless()->user();
        dd($user);
    }
}
