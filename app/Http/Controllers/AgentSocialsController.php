<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 7/25/2018
 * Time: 6:39 PM
 */

namespace App\Http\Controllers;


use App\ActivityLog;
use App\ActivityLogHistory;
use App\Agent;
use App\AgentSocial;
use App\Campaign;
use App\ResumeCustom;
use App\ResumeTab;
use App\User;
use Illuminate\Http\Request;

class AgentSocialsController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:agent|admin');
    }

    public function getAgentSocialsByAgentID($agent_id)
    {
       $agent = Agent::where('id',$agent_id)->first();
       return $agent->customResume;

    }

    public function createSocialRecord(Request $request){

        $request->validate([
            'name' => ['unique:socials,name,NULL,id,agent_id,200','required']
        ]);

        if(isset($request->id)){
            $social = AgentSocial::where('id',$request->id)->first();
            $social->update($request->toArray());
            return $social ;
        }
        return AgentSocial::create($request->toArray());
    }

    public function deleteSocialIcon(Request $request){
        $id = $request->id ;
        $social = AgentSocial::find($id);
        $social->delete();
    }

}
