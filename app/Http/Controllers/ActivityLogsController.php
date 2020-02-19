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
use App\Campaign;
use Illuminate\Http\Request;

class ActivityLogsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getLogsByCampaignID($camp_id)
    {
        $campaign = Campaign::where('id', $camp_id)->first();
        return $campaign->logs;
    }

    public function getShiftsByCampaignID($camp_id)
    {
        $campaign = Campaign::where('id', $camp_id)->first();
        $shifts = $campaign->shifts;
        foreach ($shifts as &$shift) {
            $days = $shift->daysAsRecords;
            foreach ($days as &$day) {
                $day['users'] = $day->users;
            }
            $shift['daysArray'] = $days;
        }
        return $shifts;
    }

    public function getMembersByCampaignID($camp_id)
    {
        $campaign = Campaign::where('id', $camp_id)->first();
        $members = $campaign->members;
        foreach ($members as &$member) {
            $member['image'] = $member->userData->photo;
        }
        return $members;
    }


    public function addLog(Request $request)
    {
        $requestArray = $request->toArray();
        $requestArray['agent_id'] = currentAgent()->id;
        $log = ActivityLog::create($requestArray);
        $log['history'] = $log->history;
        return $log ;
    }

    public function editLog(Request $request)
    {
        $log = ActivityLog::where('id', $request->id);
        $this->saveLogHistory($log->first());
        $log->update($request->toArray());
        $log = $log->first();
        $log['history'] = $log->history;
        return $log;
    }

    protected function saveLogHistory($log){
        ActivityLogHistory::create([
            'log_text' => $log->log_text,
            'activity_log_id' => $log->id,
            'status' => $log->status,
        ]);
    }

    public function getLogById($log_id){
        return ActivityLog::where('id',$log_id)->with('history')->first();
    }

    public function deleteLog(Request $request)
    {
        $activityLog = ActivityLog::find($request->log_id);
        $activityLog->history()->delete();
        $activityLog->delete();

        return [
            'status' => 'success',
        ];
    }

}
