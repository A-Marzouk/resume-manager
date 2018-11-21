<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 6/9/2018
 * Time: 1:56 PM
 */

namespace App\Http\Controllers\Auth\Affiliates;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class AffiliateForgotPasswordController extends Controller
{
    //Sends Password Reset emails
    use SendsPasswordResetEmails;

    public function __construct()
    {
        $this->middleware('guest:affiliate');
    }

    //Shows form to request password reset
    public function showLinkRequestForm()
    {
        return view('auth.affiliate.passwords.email');
    }

    //Password Broker for Seller Model
    public function broker()
    {
        return Password::broker('affiliates');
    }

}