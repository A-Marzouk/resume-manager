<?php

namespace App\Http\Controllers;

use App\Subscription;
use Illuminate\Http\Request;

class SubscriptionsController extends Controller
{
    public function getClientSubscription(){
        return Subscription::where('client_id',currentClient()->id)->with('campaign.agents','manager.user.userData')->get();
    }
}
