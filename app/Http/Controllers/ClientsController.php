<?php

namespace App\Http\Controllers;

use App\Affiliate;
use App\Client;
use App\Owner;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:client');
    }

    public function index(){
        $client = auth()->guard('client')->user();
        return view('client.welcome', compact('client'));
    }

    public function viewClientServiceAgreement()
    {

        return view('client.my_account.service_agreement');
    }


    public function viewClientPrivacyAgreement()
    {
        return view('client.my_account.privacy_agreement');
    }

    public function signContract(Request $request)
    {

        // timestamp
        $current_date_time = Carbon::now()->toDateTimeString();

        if ($request->type === 'privacy') {
            auth()->user()->update([
                'agreed_with_privacy_agreement_at' => $current_date_time
            ]);
        } else if ($request->type === 'service') {
            currentClient()->update([
                'agreed_with_service_agreement_at' => $current_date_time
            ]);
        }

        if (isset($request->signature)) {
            currentClient()->update([
                'signature' => $request->signature
            ]);
        }


        return [
            'status' => 'success'
        ];
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
