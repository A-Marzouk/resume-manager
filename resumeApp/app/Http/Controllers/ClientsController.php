<?php

namespace App\Http\Controllers;

use App\Affiliate;
use App\Client;
use App\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:client');
    }

    public function index(){
        $affiliates = Affiliate::all();
        return view('client.welcome',compact('affiliates'));
    }

    public function hasAgreed(){
        $currClient = auth()->guard('client')->user();
        if($currClient->agree_with_terms){
            return ['terms' =>'AGREED'];
        }
        return [ 'terms' =>'NOT_AGREED'];
    }

    public function setTerms(Request $request){
        if($request->terms == 'AGREED'){
            $currClient = auth()->guard('client')->user();
            $currClient->agree_with_terms = true;
            $currClient->save();
        }
    }

    public function viewProfilePage(){
        return view('client.profile');
    }
}
