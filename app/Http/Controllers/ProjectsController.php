<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 7/25/2018
 * Time: 6:39 PM
 */

namespace App\Http\Controllers;


use App\classes\Upload;
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
            'order' => 'max:190',
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
        $project->order = $request->order;
        $project->work_history_id = $request->relatedWorkID;
        if(isset($request->mainImage)){
            $path  = Upload::projectPhoto('','mainImage','');
            $project->mainImage = '/'. $path ;
        }

        // uploading images and save paths to images :
        $moreImages = [];
        for($i=0; $i<100 ; $i++){
            $currRequest = 'moreImages'.$i ;
            if(isset($request->{$currRequest})){
                $path  = Upload::projectPhoto('',$currRequest,'');
                $moreImages[] =  '/'. $path ;
            }else{
                break;
            }
        }

        if(!empty($project->images)){
            $project->images = $project->images .','. implode(',',$moreImages);
        }else{
            $project->images = implode(',',$moreImages);

        }


        $project->save();

        // edited/added project Id
        return ['id'=>$project->id , 'mainImagePath' => $project->mainImage];

    }

    public function deleteProject(Request $request){
        $project = Project::where('id',$request->projectID)->first();
        // delete project image :

        $dist = $project->mainImage;
        if (file_exists($dist)) {
            unlink($dist);
        }

        // delete from database :
        $project->delete();
        return 'Project deleted';
    }


    public function deleteProjectImage(Request $request){
        $project = Project::where('id',$request->projectID)->first();
        $imageSrc = $request->imageSrc ;


        $currentImagesArr = explode(',',$project->images);
        for($i=0 ; $i< count($currentImagesArr) ; $i++){
            if($currentImagesArr[$i] == $imageSrc){
                $currentImagesArr[$i] = '' ;
            }
        }

        $project->images = implode(',',array_filter($currentImagesArr));
        $project->save();

        return $project->id;
    }
}