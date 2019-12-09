<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 7/25/2018
 * Time: 6:39 PM
 */

namespace App\Http\Controllers;


use App\EducationHistory;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class EducationHistoryController extends Controller
{
    public function getEducations(){
       // get current authenticated freelancer :
        if(Input::get('user_id') && currentUser()->is_admin){
            $currentUser = User::where('id',Input::get('user_id'))->first();
        }else{
            $currentUser = currentUser();
        }
        return $currentUser->educationsHistory;
    }

    public function addEducation(Request $request){
        if(Input::get('user_id') && currentUser()->is_admin){
            $currentUser = User::where('id',$request->user_id)->first();
        }else{
            $currentUser = currentUser();
        }

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
        if($request->is_currently_learning !== true){
            $educationH->date_to = $request->date_to;
        }
        $educationH->is_currently_learning = $request->is_currently_learning;

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
        if($request->is_currently_learning!== true){
            $educationH->date_to = $request->date_to;
            $educationH->is_currently_learning = $request->is_currently_learning;
        }
        $educationH->save();
    }
}
