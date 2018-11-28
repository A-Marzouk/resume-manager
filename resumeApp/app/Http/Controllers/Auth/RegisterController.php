<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\NotificationsController;
use App\Owner;
use App\User;
use App\Http\Controllers\Controller;
use App\UserData;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
        protected $redirectTo = '/freelancer';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'profession' => 'required',
            'englishLevel' => 'accepted'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // generate user name from the id and the firstName
        User::create([
            'firstName' => $data['firstName'],
            'lastName' => $data['lastName'],
            'email' => $data['email'],
            'username'=>'holder value',
            'profession'=>$data['profession'],
            'password' => Hash::make($data['password']),
        ]);

        $user = User::where('email',$data['email'])->first();
        $user->username = 'freelancer_resume_'.$user->id;
        $data['username'] = $user->username;
        $user->save();

        $userData = new UserData;
        $userData->user_id = $user->id;
        $userData->salary = 5;
        $userData->name = $user->name;
        $userData->save();

        // save the owner :
        // add the owner code if exists
        if(isset($data['ownerCode'])){
            // get owner with this code
            $owner = Owner::where('code',$data['ownerCode'])->first();
            $user->owner_id = $owner->id;
            $user->save();
        }

        // send admins email when freelancer registers.
        $notification = new NotificationsController();
        $notification->freelancerRegisteredEmail($data);
        $notification->freelancerWelcomeEmail($data);

        return $user;
    }

}
