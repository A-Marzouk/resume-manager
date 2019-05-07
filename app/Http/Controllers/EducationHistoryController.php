<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 7/25/2018
 * Time: 6:39 PM
 */

namespace App\Http\Controllers;


use App\EducationHistory;
use Illuminate\Http\Request;

class EducationHistoryController extends Controller
{
    public function getEducations(){
       // get current authenticated freelancer :
        $currentUser = auth()->user();
        return $currentUser->educationsHistory;
    }

    public function addEducation(Request $request){
        $currentUser = auth()->user();
        $request->validate([
            'school_title' => 'max:190|required',
            'description' => 'max:1500|required',
            'date_from' => 'max:190|required',
            'date_to' => 'max:190',
        ]);

        if(isset($request->id)){
            // edit
            $educationH = EducationHistory::where('id',$request->id)->first();
        }else{
            // add
            $educationH = new EducationHistory;
            $educationH->user_id = $currentUser->id;
        }

        $educationH->school_title = $request->school_title;
        $educationH->description = $request->description;
        $educationH->date_from = $request->date_from;
        if($request->currently_learning !== true){
            $educationH->date_to = $request->date_to;
        }
        $educationH->currently_learning = $request->currently_learning;

        $educationH->save();


        return ['id'=>$educationH->id];

    }

    public function deleteEducation(Request $request){
        // delete education history
        $eduHistory = EducationHistory::where('id',$request->educationHistoryID);
        $eduHistory->delete();
        return 'Education deleted';
    }

    public function editEducation(Request $request){
        $educationH = EducationHistory::where('id',$request->id);

        $educationH->school_title = $request->school_title;
        $educationH->description = $request->description;
        $educationH->date_from = $request->date_from;
        if($request->currently_learning!== true){
            $educationH->date_to = $request->date_to;
            $educationH->currently_learning = $request->currently_learning;
        }
        $educationH->save();
    }
}