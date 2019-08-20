<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
            return [
                'status' => 'success',
            ];
        }


        $validator = $this->validator($request->all());
        if ($validator->fails())
        {
            return [
                'status' => 'failure',
                'errors' => $validator->errors()
            ];
        }




        // attempt to log in as freelancer
        $loginAttemptFreelancer = Auth::guard()->attempt(['email'=> $request->email,'password'=>$request->password] , $request->filled('remember'));
        // if success : log them in
        if($loginAttemptFreelancer) {
            return [
                'status' => 'success',
                'redirect' => '/dashboard',
            ];
        }



        // if un successful redirect them back :
         $response['email'] = ['Your e-mail or password is not correct'];
        return [
            'status' => 'failure',
            'errors' => $response
        ];
    }

    public function logout(){
        Auth::guard('client')->logout();
        return [
            'status' => 'success',
        ];
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|email|max:255',
            'password' => 'required|min:6|max:255',
        ]);
    }
}
