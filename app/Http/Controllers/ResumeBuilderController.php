<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResumeBuilderController extends Controller
{

    public function __construct()
    {
        $this->middleware('role:agent');
    }

    public function index(){
        return view('freelancer.resume_builder.index');
    }

}
