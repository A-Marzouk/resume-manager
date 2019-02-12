<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 7/25/2018
 * Time: 6:39 PM
 */

namespace App\Http\Controllers;


use App\ActivityLog;
use App\Campaign;
use Illuminate\Http\Request;

class ActivityLogsController extends Controller
{
    public function getLogsByCampaignID($camp_id){
        $campaign = Campaign::where('id',$camp_id)->first();
        return $campaign->logs;
    }

    public function getMembersByCampaignID($camp_id){
        $campaign = Campaign::where('id',$camp_id)->first();
        $members = $campaign->members ;
        foreach ($members as &$member){
            $member['image'] = $member->userData->photo ;
        }
        return $members;
    }


    public function addLog(Request $request){
        $currentUser = auth()->user();
        $request->validate([
            'log_text' => 'max:1500|required',
        ]);

        // add
        $activityLog = new ActivityLog;
        $activityLog->user_id = $currentUser->id;
        $activityLog->log_text = $request->log_text;
        $activityLog->campaign_id = $request->campaign_id;

        $activityLog->save();

        return $activityLog;

    }

    public function deleteActivityLog(Request $request){
        // delete job post
        $activityLog = ActivityLog::where('id',$request->logID);
        $activityLog->delete();
        return 'ActivityLog has been deleted';
    }

}