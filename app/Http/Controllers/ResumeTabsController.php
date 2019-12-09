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
use App\User;
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


    public function createDefaultResumeTab($user_id)
    {
        $user = User::where('id', $user_id)->first();
        $agent_id = $user->agent->id;
        if (count($user->agent->resumeTabs) > 1) {
            return $user->agent->resumeTabs;
        }
        ResumeTab::insert([
            [
                'agent_id' => $agent_id,
                'name' => 'portfolio',
                'label' => 'Portfolio',
                'type' => 'main_tab',
                'is_active' => 1,
                'view_order' => 1,
            ],
            [
                'agent_id' => $agent_id,
                'name' => 'skills',
                'label' => 'Skills',
                'type' => 'main_tab',
                'is_active' => 1,
                'view_order' => 2,
            ],
            [
                'agent_id' => $agent_id,
                'name' => 'work',
                'label' => 'Work',
                'type' => 'main_tab',
                'is_active' => 1,
                'view_order' => 3,
            ],
            [
                'agent_id' => $agent_id,
                'name' => 'education',
                'label' => 'Education',
                'type' => 'main_tab',
                'is_active' => 1,
                'view_order' => 4,
            ],
            [
                'agent_id' => $agent_id,
                'name' => 'recordings',
                'label' => 'Recordings',
                'type' => 'main_tab',
                'is_active' => 1,
                'view_order' => 5,
            ],
            [
                'agent_id' => $agent_id,
                'name' => 'references',
                'label' => 'References',
                'type' => 'main_tab',
                'is_active' => 1,
                'view_order' => 6,
            ]
        ]);

        return Agent::where('user_id', $user->id)->first()->resumeTabs;
    }


    public function updateTab(Request $request)
    {
        $tab = ResumeTab::where('id', $request->id)->first();
        $tab->update($request->toArray());
        return $tab;
    }


    public function getTabById($tab_id){
        return ResumeTab::where('id',$tab_id)->first();
    }

}
