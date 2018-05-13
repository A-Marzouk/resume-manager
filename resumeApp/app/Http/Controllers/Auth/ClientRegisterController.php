<?php

namespace App\Http\Controllers\Auth;

use App\Client;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ClientRegisterController extends Controller
{
    protected $redirectTo = '/client';

    public function __construct()
    {
        $this->middleware('guest:client');
    }

    public function showRegistrationForm()
    {
        return view('auth.client-register');
    }

    public function register(Request $request){
        // validate data
        $this->validator($request->all())->validate();
        // register a client
        $client = $this->create($request->all());
        // log the client in :
        Auth::guard('client')->login($client);

        return redirect(route('client.dashboard'));
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'agency' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:clients',
            'emailDept' => 'required|string|email|max:255|unique',
            'phone' => 'required|min:11|numeric',
            'timeZone' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    protected function create(array $data)
    {
        return Client::create([
            'name' => $data['name'],
            'agency' => $data['agency'],
            'email' => $data['email'],
            'emailDept' => $data['emailDept'],
            'phone' => $data['phone'],
            'timeZone' => $data['timeZone'],
            'password' => Hash::make($data['password']),
        ]);

    }
}
