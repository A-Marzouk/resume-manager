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
use App\Reference;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ReferencesController extends Controller
{
    public function getReferences(){
       // get current authenticated freelancer :
        if(Input::get('user_id') && currentUser()->is_admin){
            $currentUser = User::where('id',Input::get('user_id'))->first();
        }else{
            $currentUser = currentUser();
        }
        return $currentUser->references;
    }

    public function addReference(Request $request){
        if(Input::get('user_id') && currentUser()->is_admin){
            $currentUser = User::where('id',$request->user_id)->first();
        }else{
            $currentUser = currentUser();
        }
        $request->validate([
            'title' => 'max:190|required',
            'name' => 'max:190',
            'phone' => 'max:190|required',
            'company' => 'max:190|required',
            'email' => 'max:190|required',
            'details' => 'max:1500',
        ]);

        if(isset($request->id)){
            // edit
            $reference = Reference::where('id',$request->id)->first();
        }else{
            // add
            $reference = new Reference();
            $reference->user_id = $currentUser->id;
        }
        if(isset($request->title)){
            $reference->title = $request->title;
        }
        if(isset($request->name)) {
            $reference->name = $request->name;
        }

        if(isset($request->company)) {
            $reference->company = $request->company;
        }
        if($request->details){
            $reference->details = $request->details;
        }
        if($request->phone){
            $reference->phone = $request->phone;
        }
        if($request->email){
            $reference->email = $request->email;
        }


        $reference->save();

        return ['id'=>$reference->id];

    }

    public function deleteReference(Request $request){
        // delete education history
        $reference = Reference::where('id',$request->referenceID);
        $reference->delete();
        return 'Reference deleted';
    }

}
