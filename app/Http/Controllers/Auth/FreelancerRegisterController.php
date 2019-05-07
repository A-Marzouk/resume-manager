<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FreelancerRegisterController extends Controller
{
    public function showRegistrationForm(){
        return view('auth.agent-register');
    }
}
