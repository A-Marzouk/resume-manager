<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 7/25/2018
 * Time: 6:39 PM
 */

namespace App\Http\Controllers;


use App\Campaign;
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

    public function getClientCampaigns(){
       // get current authenticated client :
        $currClient = auth()->guard('client')->user();
        return $currClient->campaigns;
    }

    public function addCampaign(Request $request){
        $currClient = auth()->guard('client')->user();
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

    public function deleteCampaign(Request $request){
        // delete $campaign
        $campaign = Campaign::where('id',$request->campaignID);
        $campaign->delete();
        return 'Campaign has been deleted';
    }

}