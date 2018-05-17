<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function welcomePage(){
        // get list of freelancers :
        $data['users'] = User::all();
        return view('admin.usersList', compact('data'));
    }
}
