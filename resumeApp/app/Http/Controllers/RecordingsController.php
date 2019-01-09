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
use Illuminate\Http\Request;

class RecordingsController extends Controller
{
    public function getRecords(){
       // get current authenticated freelancer :
        $currentUser = auth()->user();
        return $currentUser->recordings;
    }

    public function addRecord(Request $request){
        $currentUser = auth()->user();
        $request->validate([
            'title' => 'max:190|required',
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
        }
        if(isset($request->title)){
            $record->title = $request->title;
        }
        if(isset($request->transcription)) {
            $record->transcription = $request->transcription;
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
        $record->delete();
        return 'Record deleted';
    }

}