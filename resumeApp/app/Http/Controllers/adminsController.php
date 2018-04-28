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
        $currUser = auth()->user();
        return view('admin.form',compact('currUser'));
    }
}
