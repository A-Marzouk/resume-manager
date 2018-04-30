<?php

namespace App\Http\Controllers;

use App\UserData;
use Illuminate\Http\Request;

class UserDataController extends Controller
{

    public function store(Request $request){
        $userData = UserData::where('user_id',auth()->user()->id)->first();
        if ($userData){
            // update
            $this->validate($request,[
                ''=> '',
            ]);
            $data = $request->all();
            foreach ($data as $key => $value){
                if($key == '_token'){
                    continue;
                }
                elseif ($key == 'photo'){
                    $this->uploadPhoto($value);
                }
                else{
                    $userData->{$key} = $value ;
                }
            }
            $userData->save();
            return redirect('/admin')->with('successMessage', 'Your changes has been successfully saved.');
        }else{
            // create
            return redirect('/admin/home');
        }
    }

    public function uploadPhoto($src){
        $target_dir = "resumeApp/uploads/";
        $target_file = $target_dir . basename($_FILES["photo"]["name"]);
        $uploadOk = 1;
// Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["photo"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }
        }
// Check file size
        if ($_FILES["photo"]["size"] > 500000) {
            $uploadOk = 0;
        }
// Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            return false;
// if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
                return $target_file;
            } else {
                return false;
            }
        }
    }
}
