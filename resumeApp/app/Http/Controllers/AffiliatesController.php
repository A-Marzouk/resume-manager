<?php

namespace App\Http\Controllers;

use App\Client;
use App\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AffiliatesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:affiliate');
    }

    public function showDashboard(){
        return view('affiliate.dashboard');
    }

}
