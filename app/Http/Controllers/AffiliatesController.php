<?php

namespace App\Http\Controllers;

use App\Client;
use App\Owner;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AffiliatesController extends Controller
{
    protected $redirectTo = '/affiliate';

    public function __construct()
    {
        $this->middleware('auth:affiliate')->except('updateAffiliate','updateClientAffiliate');
    }

    public function showDashboard(){
        $affiliate = auth()->guard('affiliate')->user();
        return view('affiliate.dashboard',compact('affiliate'));
    }

    public function updateAffiliate(Request $request){
        $affiliateID = $request->affiliateID ;
        $currFreelancer = User::where('id',auth()->user()->id)->first();
        $currFreelancer->affiliate_id = $affiliateID;
        $currFreelancer->save();
        return ['status' => 'ok'];
    }

    public function updateClientAffiliate(Request $request){
        $affiliateID = $request->affiliateID ;
        $currClient = Client::where('id',auth()->guard('client')->user()->id)->first();
        $currClient->affiliate_id = $affiliateID;
        $currClient->save();
        return ['status' => 'ok'];
    }


}
