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
        if($currClient->agree_with_terms == true){
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
        return 'agreed saved';
    }

    public function viewClientAgreement(){
        $client = auth()->guard('client')->user();
        if($client){
            return view('client_agreement',compact('client'));
        }else{
            redirect('/client');
        }
    }

    public function viewClientPrivacyPolicy(){
        $client = auth()->guard('client')->user();
        if($client){
            return view('client_privacy_policy',compact('client'));
        }else{
            redirect('/client');
        }
    }

    public function viewJobsPage(){
        $currClient = auth()->guard('client')->user();
        return view('client.jobs',compact('currClient'));
    }

    public function getJobs(){
        $currClient = auth()->guard('client')->user();
        return $currClient->jobs;
    }

    public function viewProfilePage($client_id){
        $client = Client::where('id',$client_id)->first();
        return view('client.profile',compact('client'));
    }

    public function showClientSearchPage(){
        return view('client.search');
    }
}
