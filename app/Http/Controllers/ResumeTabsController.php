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
use App\ResumeTab;
use Illuminate\Http\Request;

class ResumeTabsController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:agent|admin');
    }

    public function getResumeTabsByAgentID($agent_id)
    {
       $agent = Agent::where('id',$agent_id)->first();
       return $agent->resumeTabs;

    }


    public function addTab(Request $request)
    {
        $requestArray = $request->toArray();
        $requestArray['agent_id'] = currentAgent()->id;
        $tab = ResumeTab::create($requestArray);
        return $tab ;
    }

    public function updateTab(Request $request)
    {
        $tab = ResumeTab::where('id', $request->agent_id)->first();
        $tab->update($request->toArray());
        return $tab;
    }


    public function getTabById($tab_id){
        return ResumeTab::where('id',$tab_id)->first();
    }

}
