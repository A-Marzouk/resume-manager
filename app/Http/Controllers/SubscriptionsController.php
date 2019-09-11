<?php

namespace App\Http\Controllers;

use App\Campaign;
use App\Subscription;
use App\SubscriptionHistory;
use Illuminate\Http\Request;

class SubscriptionsController extends Controller
{
    public function getClientSubscription(){
        return Subscription::where('client_id',currentClient()->id)->with('campaign.agents','manager.user.userData','invoices')->get();
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

        // update subscription
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

    public function requestUpdate(Request $request){

        if(isset($request->status) && $request->status == 'updateSub'){
            // 1- send update request email with the new updated subscription data.

            $subscription = Subscription::where('id',$request->updated_subscription['id'])->first();

            // 2- save a subscription history and don't apply it :
            $subscriptionHistory = SubscriptionHistory::create($subscription->toArray());

            // update the SubscriptionHistory
            $start_date = date('Y-m-d', strtotime(str_replace('-', '/', $request->updated_subscription['start_date'])));
            $date       = strtotime($start_date);
            $date       = strtotime("+".$request->updated_subscription['duration_in_weeks']. " week", $date);
            $end_date   =  date('Y-m-d', $date);

            $subscriptionHistory = SubscriptionHistory::where('id',$subscriptionHistory->id)->first();

             $subscriptionHistory->update([
                'amount_paid' => $request->updated_subscription['amount_paid'] ,
                'hours_per_week' => $request->updated_subscription['hours_per_week'] ,
                'start_date' =>  date('Y-m-d', strtotime(str_replace('-', '/', $request->updated_subscription['start_date']))),
                'duration_in_weeks' => $request->updated_subscription['duration_in_weeks'],
                'end_date' => $end_date,
                'original_duration_in_weeks' => $request->updated_subscription['duration_in_weeks'],
                'hourly_rate' => $request->updated_subscription['amount_paid']/$request->updated_subscription['hours_per_week']
            ]);

        }

        return [
            'status' => 'success'
        ];
    }

    public function showUpdatePage($sub_id){
        $subscription = Subscription::where('id',$sub_id)->with('campaign.agents','manager.user.userData')->first();
        return view('client.payments.update_sub_plan',compact('subscription')) ;
    }

}
