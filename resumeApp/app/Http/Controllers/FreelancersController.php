<?php

namespace App\Http\Controllers;

use App\UserData;
use Illuminate\Http\Request;

class FreelancersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function form(){
        return view('freelancer.form');
    }
}
