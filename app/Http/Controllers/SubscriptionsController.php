<?php

namespace App\Http\Controllers;

use App\Campaign;
use App\Subscription;
use Illuminate\Http\Request;

class SubscriptionsController extends Controller
{
    public function getClientSubscription(){
        return Subscription::where('client_id',currentClient()->id)->with('campaign.agents','manager.user.userData')->get();
    }

    public function create(Request $request){
      // create campaign

        $campaign = Campaign::create([
            'title' => $request->hours_per_week . ' Hours/week Campaign' ,
            'description' => $request->amount_paid . ' per week, billed weekly - '. $request->duration_in_weeks . ' Weeks',
            'status' => 2, // paused until payment
            'client_id' => currentClient()->id,
        ]);

        $start_date = date('Y-m-d', strtotime(str_replace('-', '/', $request->start_date)));
        $date       = strtotime($start_date);
        $date       = strtotime("+".$request->duration_in_weeks. " week", $date);
        $end_date   =  date('Y-m-d', $date);

        // create subscription
        Subscription::create([
            'amount_paid' => $request->amount_paid ,
            'hours_per_week' => $request->hours_per_week ,
            'start_date' =>  date('Y-m-d', strtotime(str_replace('-', '/', $request->start_date))),
            'duration_in_weeks' => $request->duration_in_weeks,
            'end_date' => $end_date,
            'original_duration_in_weeks' => $request->duration_in_weeks,
            'hourly_rate' => $request->amount_paid/$request->hours_per_week,
            'campaign_id' => $campaign->id,
            'client_id' => currentClient()->id,
            'agent_id' => 1
        ]);


        return ['status' => 'success'];
    }


    public function update(Request $request){

        $subscription = Subscription::where('id',$request->id)->first();

        $start_date = date('Y-m-d', strtotime(str_replace('-', '/', $request->start_date)));
        $date       = strtotime($start_date);
        $date       = strtotime("+".$request->duration_in_weeks. " week", $date);
        $end_date   =  date('Y-m-d', $date);

        // create subscription
        $subscription->update([
            'amount_paid' => $request->amount_paid ,
            'hours_per_week' => $request->hours_per_week ,
            'start_date' =>  date('Y-m-d', strtotime(str_replace('-', '/', $request->start_date))),
            'duration_in_weeks' => $request->duration_in_weeks,
            'end_date' => $end_date,
            'original_duration_in_weeks' => $request->duration_in_weeks,
            'hourly_rate' => $request->amount_paid/$request->hours_per_week,
        ]);


        return ['status' => 'success'];
    }

    public function showUpdatePage($sub_id){
        $subscription = Subscription::where('id',$sub_id)->with('campaign.agents','manager.user.userData')->first();
        return view('client.payments.update_sub_plan',compact('subscription')) ;
    }

}
