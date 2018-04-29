<?php

namespace App\Http\Controllers;

use App\UserData;
use Illuminate\Http\Request;

class adminsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function form(){
        return view('admin.form');
    }
}
