<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 7/25/2018
 * Time: 6:39 PM
 */

namespace App\Http\Controllers;


use App\Campaign;
use App\Client;
use Illuminate\Http\Request;

class CampaignsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function viewCampaigns(){
        return view('admin.campaigns');
    }

    public function getAllClients(){
        return Client::all();
    }

    public function getAllCamps(){
        return Campaign::all();
    }

    public function getClientCamps(){
       // get current authenticated client :
        $currClient = auth()->guard('client')->user();
        return $currClient->campaigns;
    }

    public function addCamp(Request $request){
        $currClient = Client::where('id',$request->client_id)->first();
        $request->validate([
            'title' => 'max:190|required',
            'description' => 'max:1500|required',
            'status' => 'max:190',
            'start_date' => 'max:190|required',
            'end_date' => 'max:190|required',
        ]);

        if(isset($request->id)){
            // edit
            $campaign = Campaign::where('id',$request->id)->first();
        }else{
            // add
            $campaign = new Campaign;
            $campaign->client_id = $currClient->id;
        }

        $campaign->title       = $request->title;
        $campaign->description = $request->description;
        $campaign->status      = $request->status;
        $campaign->start_date  = $request->start_date;
        $campaign->end_date    = $request->end_date;

        $campaign->save();

        return ['id'=>$campaign->id];

    }

    public function deleteCamp(Request $request){
        // delete $campaign
        $campaign = Campaign::where('id',$request->campID);
        $campaign->delete();
        return 'Campaign has been deleted';
    }

    public function getCampMembers(Request $request){
        $campID = $request->campID;
        return Campaign::find($campID)->members;
    }

}