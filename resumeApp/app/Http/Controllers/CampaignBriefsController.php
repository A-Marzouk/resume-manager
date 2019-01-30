<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 7/25/2018
 * Time: 6:39 PM
 */

namespace App\Http\Controllers;


use App\CampaignBrief;
use App\Client;
use App\Invoice;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class CampaignBriefsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function viewCampaignBriefPublicPage($id){
        $cBrief = CampaignBrief::where('id',$id)->first();
        return view('campaign_brief.campaign_brief_public',compact('cBrief'));
    }

    public function viewCBriefsPage(){
        $cBriefs = CampaignBrief::all();
        return view('admin.campaign_briefs',compact('cBriefs'));
    }

    public function getCBriefsByClient($client_id){
       // get current authenticated freelancer :
        $client = Client::where('id',$client_id)->first();
        return $client->campaignBriefs;
    }

    public function getCBriefs(){
        return CampaignBrief::all();
    }

    public function addCBrief(Request $request){
        $request->validate([
            'company_website'=> 'max:191|required',
            'client_name'=> 'max:191|required',
            'company_values'=> 'max:1500|required',
            'client_contact'=> 'max:1500|required',
            'objective'=> 'max:1500|required',
            'email_pitch'=> 'max:1500|required',
            'phone_pitch'=> 'max:1500|required',
            'data_systems'=> 'max:1500|required',
            'estimated_duration'=> 'max:191|required',
            'time_zone'=> 'max:191|required',
            'time_needed'=> 'max:191|required',
            'start_date'=> 'max:191|required',
            'contract_terms'=> 'max:191|required',
            'hours_per_week'=> 'max:10|required',
            'weekly_rate'=> 'max:10|required',
            'payment_method'=> 'max:191|required',
            'campaign_manager'=> 'max:191|required',
            'report_requirement'=> 'max:191|required'
        ]);

        if(isset($request->id)){
            // edit
            $cBrief = CampaignBrief::where('id',$request->id)->first();
        }else{
            // add
            $cBrief = new CampaignBrief;
        }

        $cBrief->company_website = $request->company_website ;
        $cBrief->client_name = $request->client_name ;
        $cBrief->company_values = $request->company_values ;
        $cBrief->client_contact = $request->client_contact ;
        $cBrief->email_pitch = $request->email_pitch ;
        $cBrief->phone_pitch = $request->phone_pitch ;
        $cBrief->objective = $request->objective ;
        $cBrief->data_systems = $request->data_systems ;
        $cBrief->estimated_duration = $request->estimated_duration;
        $cBrief->time_zone = $request->time_zone ;
        $cBrief->time_needed = $request->time_needed ;
        $cBrief->start_date = $request->start_date ;
        $cBrief->contract_terms = $request->contract_terms;
        $cBrief->hours_per_week = $request->hours_per_week ;
        $cBrief->weekly_rate = $request->weekly_rate ;
        $cBrief->payment_method = $request->payment_method ;
        $cBrief->campaign_manager = $request->campaign_manager ;
        $cBrief->report_requirement = $request->report_requirement ;

//        return $cBrief;

        $cBrief->save();

        return ['id'=> $cBrief->id];

    }

    public function deleteCBrief(Request $request){
        // delete campaign brief
        $cBrief = CampaignBrief::where('id',$request->cBriefID);
        $cBrief->delete();
        return 'Campaign Brief deleted';
    }


    public function cBriefToPDF($id){
        $cBrief = CampaignBrief::where('id',$id)->first();
        $pdf = App::make('dompdf.wrapper');
        $pdf->setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        $pdf->loadView('campaign_brief.campaign_brief_to_pdf', compact('cBrief'));
        return $pdf->stream();

    }
    
}