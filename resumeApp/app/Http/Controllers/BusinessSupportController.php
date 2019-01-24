<?php

namespace App\Http\Controllers;

use App\User;
use App\UserData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class BusinessSupportController extends Controller
{

    public function __construct()
    {
    }

    public function showRegistrationForm(){
        return view('auth.business_support.register');
    }

    public function register(Request $request){
        // validate data
        $validator = $this->validator($request->all());
        if ($validator->fails())
        {
            return redirect('/freelancer/workforce/register')->withErrors($validator)->withInput();
        }

        // register a business support user

        $businessSupport = $this->create($request->all());
        return view('business_application_received');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstName' => 'required|string|max:191|min:3',
            'lastName' => 'required|string|max:191|min:3',
            'email' => 'required|string|email|max:191|unique:users',
            'phone' => 'required|max:191|min:7',
            'whatsapp' => 'max:191|min:7',
            'skype' => 'max:191|string|alpha_dash|unique:users'
        ]);
    }

    protected function create(array $data)
    {
        User::create([
            'firstName' => $data['firstName'],
            'lastName' => $data['lastName'],
            'email' => $data['email'],
            'username' => $data['email'],
            'phone' => $data['phone'],
            'whatsapp' => $data['whatsapp'],
            'skype' => $data['skype'],
            'profession' =>'businessSupport',
            'password' => Hash::make($data['email']),
        ]);


        $businessSupport = User::where('email',$data['email'])->first();
        $data['id']      = $businessSupport->id;
        // send notification of registered client :
        $notification = new NotificationsController();
        $notification->businessSupportApplication($data);


        return $businessSupport;

    }

}
