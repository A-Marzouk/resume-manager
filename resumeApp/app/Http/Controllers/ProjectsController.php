<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 7/25/2018
 * Time: 6:39 PM
 */

namespace App\Http\Controllers;


use App\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function getProjects(){
       // get current authenticated freelancer :
        $currentUser = auth()->user();
        return $currentUser->projects;
    }

    public function addProject(Request $request){
        $currentUser = auth()->user();
        $request->validate([
            'projectName' => 'max:190',
            'projectDesc' => 'max:1500',
            'link' => 'max:190',
            'isActive' => 'max:190',
        ]);


        if(isset($request->id)){
            // edit
            $project = Project::where('id',$request->id)->first();
        }else{
            // add
            $project = new Project();
            $project->user_id = $currentUser->id;
        }

        $project->projectName = $request->projectName;
        $project->projectDesc = $request->projectDesc;
        $project->link = $request->link;
        $project->isActive = $request->isActive;
        if(isset($request->mainImage)){
            $handler = new UserDataController;
            $path  = $handler->uploadProjectPhoto('','mainImage','');
            $project->mainImage = '/'. $path ;
        }

        $project->save();

        // edited/added project Id
        return ['id'=>$project->id , 'mainImagePath' => $project->mainImage];

    }

    public function deleteProject(Request $request){
        // delete work history
        $project = Project::where('id',$request->projectID);
        $project->delete();
        return 'Project deleted';
    }
}