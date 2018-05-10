<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ClientLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:client')->except('logout');
    }

    public function showLoginForm(){
        return view('auth.client-login');
    }

    public function login(Request $request){
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
            return redirect()->back()->withInput($request->only('email','remember'));
    }

    public function logout(){
        Auth::guard('client')->logout();
        return redirect(route('client.login'));
    }
}
