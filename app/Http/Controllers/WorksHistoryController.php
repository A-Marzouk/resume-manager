<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 7/25/2018
 * Time: 6:39 PM
 */

namespace App\Http\Controllers;


use App\WorkHistory;
use Illuminate\Http\Request;

class WorksHistoryController extends Controller
{
    public function getWorks(){
       // get current authenticated freelancer :
        $currentUser = auth()->user();
        return $currentUser->worksHistory;
    }

    public function addWork(Request $request){
        $currentUser = currentUser();
        $request->validate([
            'job_title' => 'max:190|required',
            'job_description' => 'max:1500|required',
            'company' => 'max:190|required',
            'date_from' => 'max:190|required',
            'date_to' => 'max:190',
        ]);

        if(isset($request->id)){
            // edit
            $workH = WorkHistory::where('id',$request->id)->first();
        }else{
            // add
            $workH = new WorkHistory;
            $workH->user_id = $currentUser->id;
        }

        $workH->job_title = $request->job_title;
        $workH->company = $request->company;
        $workH->job_description = $request->job_description;
        $workH->date_from = $request->date_from;
        if($request->is_currently_working !== true){
            $workH->date_to = $request->date_to;
        }
        $workH->is_currently_working = $request->is_currently_working;


        $workH->save();


        return ['id'=>$workH->id];

    }

    public function deleteWork(Request $request){
        // delete work history
        $workHistory = WorkHistory::where('id',$request->workHistoryID);
        $workHistory->delete();
        return 'Work deleted';
    }

    public function editWork(Request $request){
        $workH = WorkHistory::where('id',$request->id);

        $workH->job_title = $request->job_title;
        $workH->company = $request->company;
        $workH->job_description = $request->job_description;
        $workH->date_from = $request->date_from;
        if($request->is_currently_working !== true){
            $workH->date_to = $request->date_to;
            $workH->is_currently_working = $request->is_currently_working;
        }
        $workH->save();
    }
}
