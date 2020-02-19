<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 7/25/2018
 * Time: 6:39 PM
 */

namespace App\Http\Controllers;


use App\classes\Upload;
use App\EducationHistory;
use App\Recording;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class RecordingsController extends Controller
{
    public function getRecords(){
        // get current authenticated freelancer :
        if(Input::get('user_id') && currentUser()->is_admin){
            $currentUser = User::where('id',Input::get('user_id'))->first();
        }else{
            $currentUser = currentUser();
        }
        return $currentUser->recordings;
    }

    public function addRecord(Request $request,$businessSupport_id = ""){
        if(!empty($businessSupport_id)){
            $currentUser = User::where('id',$businessSupport_id)->first();
        }else{
            if(Input::get('user_id') && currentUser()->is_admin){
                $currentUser = User::where('id',Input::get('user_id'))->first();
            }else{
                $currentUser = currentUser();
            }
        }
        $request->validate([
            'title' => 'max:190',
            'transcription' => 'max:1500',
            'src' => 'max:190',
        ]);

        if(isset($request->id)){
            // edit
            $record = Recording::where('id',$request->id)->first();
        }else{
            // add
            $record = new Recording;
            $record->user_id = $currentUser->id;
            $record->src = "Default";
        }
        if(isset($request->title)){
            $record->title = $request->title;
        }
        if(isset($request->transcription)) {
            $record->transcription = $request->transcription;
        }

        if($request->src){
            $record->src = $request->src;
        }

        if($request->audioFile) {
            $pathToAudio = Upload::audio($request->audioFile, 'audioFile', '_159'.$currentUser->id.'Record_');
            if ($pathToAudio) {
                $record->src = '/'.$pathToAudio;
            }
        }

        $record->save();


        return ['id'=>$record->id , 'recordSrc'=> $record->src];

    }

    public function deleteRecord(Request $request){
        // delete education history
        $record = Recording::where('id',$request->recordID);
        // delete the audio file
        if(strpos($record->first()->src,'drive.google.com') !== false){
            $record->delete();
            return 'Record deleted';
        }
        if (file_exists(substr($record->first()->src, 1))){
            unlink(substr($record->first()->src, 1));
        }
        $record->delete();
        return 'Record deleted';
    }

}
