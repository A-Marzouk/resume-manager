<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class ClientLoginController extends Controller
{

    public function login(Request $request){
        $this->validator($request->all())->validate();
        // attempt to log in
        $loginAttempt = Auth::guard('client')->attempt(['email'=> $request->email,'password'=>$request->password] , $request->filled('remember'));
        // if success : log them in
        if($loginAttempt) {
            return ['status' => 'success'];
        }

        throw ValidationException::withMessages([
            'email' => [trans('auth.failed')],
        ]);
    }

    public function logout(){
        Auth::guard('client')->logout();
        return redirect(route('client.login'));
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
        ]);
    }
}
