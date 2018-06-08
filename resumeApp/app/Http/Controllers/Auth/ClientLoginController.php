<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ClientLoginController extends Controller
{

    public function showLoginForm(){
        if(Auth::guard('client')->check()){
            return redirect(route('client.dashboard'));
        }
        return view('auth.client-login');
    }

    public function login(Request $request){
        // check if is already logged in
        if(Auth::guard('client')->check()){
            return redirect(route('client.dashboard'));
        }
        // validation
        $this->validate($request,[
           'email' => 'required|email',
           'password' =>'required|min:6'
        ]);

        // attempt to log in
        $loginAttempt = Auth::guard('client')->attempt(['email'=> $request->email,'password'=>$request->password] , $request->filled('remember'));
        // if success : log them in
        if($loginAttempt) {
            return redirect((route('client.dashboard')));
        }
        // if un successful redirect them back :
         $errors['email'] = 'Your e-mail or password is not correct';
        return redirect('/client/login')->withErrors($errors)->withInput($request->only('email','remember'));
    }

    public function logout(){
        Auth::guard('client')->logout();
        return redirect(route('client.login'));
    }
}
