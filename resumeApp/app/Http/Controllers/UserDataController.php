<?php

namespace App\Http\Controllers;

use App\UserData;
use Illuminate\Http\Request;
use App\classes\Telegram;
use Illuminate\Support\Facades\Mail;

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
            $works = $userData->works ;
            foreach ($data as $key => $value){
                if($key == '_token'){
                    continue;
                }
                elseif ($key == 'photo'){
                    $pathToPhoto = $this->uploadPhoto($value,'photo','');
                    $userData->{$key} = $pathToPhoto ;
                }elseif ($key == 'design_skills_checkbox'){
                    // convert to string and save on database
                    $skillsCheckBox = implode(',',$value);
                    $userData->{$key} = $skillsCheckBox ;
                }elseif($key == 'primarySkills'){
                    // convert to string and save on database
                    $PrimarySkillsCheckBox = implode(',',$value);
                    $userData->{$key} = $PrimarySkillsCheckBox ;
                }elseif ($key == 'charSkills'){
                    $charSkillsCheckBox = implode(',',$value);
                    $userData->{$key} = $charSkillsCheckBox ;
                }elseif ($key == 'availableHours'){
                    $availableHoursCheckBox = implode(',',$value);
                    $userData->{$key} = $availableHoursCheckBox ;
                }elseif(strpos($key, 'works') !== false){
                    $pathToPhoto = $this->uploadPhoto($value,$key,$key);
                    if(empty($works)){
                        $works = $pathToPhoto ;
                    }else{
                        $works .= ','.$pathToPhoto;
                    }
                }
                else{
                    $userData->{$key} = $value ;
                }
                // save works :
                $userData->works = $works ;
            }
            $userData->save();
            // send Message to Telegram :
            $msg = auth()->user()->username ;
            $msg .= ' has updated his resume .. please view updated resume here..  ';
            $msg .= str_replace_last('admin',auth()->user()->username, url()->current());
            $telegram = new Telegram('-279372621');
            $telegram->sendMessage($msg);
            // send mail :
//            $this->sendMail($msg);

            return redirect('/admin')->with('successMessage', 'Your changes have been successfully saved.');
        }else{
            // create
            return redirect('/admin/home');
        }
    }

    public function uploadPhoto($src,$name,$newName){
        $target_dir = "resumeApp/uploads/";
        $target_file = $target_dir . $newName. basename($_FILES[$name]["name"]);
        $uploadOk = 1;
// Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES[$name]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }
        }
// Check file size
        if ($_FILES[$name]["size"] > 500000) {
            $uploadOk = 0;
        }
// Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            return false;
// if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES[$name]["tmp_name"], $target_file)) {
                return $target_file;
            } else {
                return false;
            }
        }
    }

    public function sendMail($msg){

    }
}
