<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 7/25/2018
 * Time: 6:39 PM
 */

namespace App\Http\Controllers;


use App\Job;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    public function getClientJobs(){
       // get current authenticated client :
        $currClient = auth()->guard('client')->user();
        return $currClient->jobs;
    }

    public function getFreelancerJobs(){
       // get current authenticated freelancer :
        $currFreelancer = auth()->user();
        return $currFreelancer->jobs;
    }

    public function appliedFreelancers(Request $request){
        $jobID = $request->jobID;
        return Job::find($jobID)->freelancersApplied;
    }

    public function addJobPost(Request $request){
        $currClient = auth()->guard('client')->user();
        $request->validate([
            'title' => 'max:190|required',
            'description' => 'max:1500|required',
            'skills' => 'max:190|required',
            'budget' => 'max:190|required',
            'time' => 'max:190',
            'posted' => 'max:190',
            'status' => 'max:190',
            'level' => 'max:190',
        ]);

        if(isset($request->id)){
            // edit
            $jobPost = Job::where('id',$request->id)->first();
        }else{
            // add
            $jobPost = new Job();
            $jobPost->client_id = $currClient->id;
        }

        $jobPost->title = $request->title;
        $jobPost->description = $request->description;
        $jobPost->time = $request->time;
        $jobPost->budget = $request->budget;
        $jobPost->skills = $request->skills;
        $jobPost->level = $request->level;
        $jobPost->posted = $request->posted;
        $jobPost->status = $request->status;

        $jobPost->save();

        return ['id'=>$jobPost->id];

    }

    public function deleteJobPost(Request $request){
        // delete job post
        $jobPost = Job::where('id',$request->jobID);
        $jobPost->delete();
        return 'job post has been deleted';
    }

}