<?php

namespace App\Http\Controllers;

use App\Affiliate;
use App\Campaign;
use App\Client;
use App\Owner;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientsController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:client');
    }

    public function index(){
        $client = auth()->guard('client')->user();
        return view('client.dashboard',compact('client'));
    }

    public function campaignActivity($campaign_id){
        $campaign = Campaign::where('id',$campaign_id)->with('agents.user','agents.user.userData','agents.logs')->first();
        return view('client.campaign_main',compact('campaign'));
    }

    public function viewAccountEditPage(){
        return view('client.my_account.account_information_edition');
    }

    public function viewClientServiceAgreement(){
        return view('client.my_account.service_agreement') ;
    }

    public function viewUpdateSubPlan(){
        return view('client.payments.update_sub_plan') ;
    }

    public function viewClientPrivacyAgreement(){
        return view('client.my_account.privacy_agreement') ;
    }

     public function viewClientPaymentShowInvice(){
         return view('client.payments.payment_show_invoice') ;
     }

      public function viewClientSubSetUp(){
         return view('client.payments.sub_set_up') ;
      }

    public function viewClientPaymentPay(){
        return view('client.payments.payment_pay') ;
    }

    public function viewClientCampaignAgents(){
    return view('client.campaign_agents');
    }

    public function viewClientManagerCalculation(){
        return view('client.payments.manager_calculation') ;
    }

    public function showAddAgentPage(){
        return view('client.add_agent_view');
    }

    public function campaignArchives(){
        return view('client.campaign_archives');
    }

    public function campaignAddAgent(){
        return view('client.add_agent_view');

    }


    public function getCurrentClient(){
       return User::whereHas('roles', function ($query) {
            $query->where('name', '=', 'client');
        })->where('id',currentClient()->user_id)->with('client')->first();
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

    public function updateClient(Request $request){
        $user =  User::whereHas('roles', function ($query) {
            $query->where('name', '=', 'client');
        })->where('id',$request->id)->with('client')->first();

        if(isset($request->password) && !empty($request->password)){
            $this->validate($request, [
                'password' => 'confirmed|min:7',
            ]);
        }


        $requestArray = $request->toArray() ;
        $user->update(
            $requestArray
        );

        $user->client->update(
            $requestArray['client']
        );

        return [
            'user' => $user,
            'status' => 'success',
        ] ;

    }
}
