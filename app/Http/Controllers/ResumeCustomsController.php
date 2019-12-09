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
use App\Campaign;
use App\ResumeCustom;
use App\ResumeTab;
use App\User;
use Illuminate\Http\Request;

class ResumeCustomsController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:agent|admin');
    }

    public function getResumeCustomsByAgentID($agent_id)
    {
       $agent = Agent::where('id',$agent_id)->first();
       return $agent->customResume;

    }


    public function createDefaultCustomResume($user_id)
    {
        $user = User::where('id', $user_id)->first();
        $agent_id = $user->agent->id;
        if ($user->agent->customResume) {
            $user->agent->customResume ;
        }
        ResumeCustom::insert([
            [
                'agent_id' => $agent_id,
                'background_color' => '#4E75E8',
            ],
        ]);

        return Agent::where('user_id', $user->id)->first()->customResume;
    }

    public function updateResume(Request $request)
    {
        $resume = ResumeCustom::where('id', $request->id)->first();
        $resume->update($request->toArray());
        return $resume;
    }


}
