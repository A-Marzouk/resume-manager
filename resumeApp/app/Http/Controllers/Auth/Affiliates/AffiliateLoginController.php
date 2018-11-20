<?php

namespace App\Http\Controllers\Auth\Affiliates;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AffiliateLoginController extends Controller
{
    protected $redirectTo ='/affiliate';

    public function showLoginForm(){
        if(Auth::guard('affiliate')->check()){
            return redirect(route('affiliate.dashboard'));
        }
        return view('auth.affiliate.affiliate-login');
    }

    public function login(Request $request){
        // check if is already logged in
        if(Auth::guard('affiliate')->check()){
            return redirect(route('affiliate.dashboard'));
        }
        // validation
        $this->validate($request,[
           'email' => 'required|email|max:255',
           'password' =>'required|min:6|max:255'
        ]);

        // attempt to log in
        $loginAttempt = Auth::guard('affiliate')->attempt(['email'=> $request->email,'password'=>$request->password] , $request->filled('remember'));
        // if success : log them in
        if($loginAttempt) {
            return redirect((route('affiliate.dashboard')));
        }
        // if un successful redirect them back :
         $errors['email'] = 'Your e-mail or password is not correct';
        return redirect(route('affiliate.login'))->withErrors($errors)->withInput($request->only('email','remember'));
    }

    public function logout(){
        Auth::guard('affiliate')->logout();
        return redirect(route('affiliate.login'));
    }
}
