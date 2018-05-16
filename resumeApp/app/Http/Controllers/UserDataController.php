<?php

namespace App\Http\Controllers;

use App\Mail\welcome;
use App\UserData;
use Illuminate\Http\Request;
use App\classes\Telegram;
use Illuminate\Support\Facades\Mail;
use PharIo\Manifest\Email;

class UserDataController extends Controller
{

    public function store(Request $request){
        $userData = UserData::where('user_id',auth()->user()->id)->first();
        if ($userData){
            // update
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
                    if(is_numeric($value)){ // delete photo number x
                        if(!empty($works)){
                            $worksArr = explode(',',$works);
                            foreach ($worksArr as &$work){
                                if(strpos($work, 'works'.$value) !== false){
                                    $work ='';
                                }
                            }
                            $works = implode(',',$worksArr);
                        }
                    }else{
                        $pathToPhoto = $this->uploadPhoto($value,$key,$key);
                        if(empty($works)){
                            $works = $pathToPhoto ;
                        }else{
                            $works .= ','.$pathToPhoto;
                        }
                    }

                }elseif($key == 'audio'){
                    // get Id :
                    $data = $value;
                    $explodedData= explode("/", $data);
                    foreach ($explodedData as $id){
                        if(strlen($id) == 33){
                            $userData->{$key} = $id;
                        }
                    }
                }elseif(strpos($key, 'day') !== false){
                    // save in the database values of days and from to also !
                    $days=['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'];
                    foreach ($days as $day){
                        $DBColumn = $day.'Hours';
                        if($key == $day.'From'){
                            $userData->{$DBColumn} = $value;
                        }elseif ($key == $day.'To'){
                            $userData->{$DBColumn} .= ','.$value;
                        }
                    }
                }
                else{
                    $userData->{$key} = $value ;
                }
                $userData->works = $works ;
            }
            $userData->save();

//                $this->sendTelegram();
//                $this->sendNotification();
            return redirect('/freelancer')->with('successMessage', 'Your changes have been successfully saved.');
        }else{
            return redirect('/freelancer/home');
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

    public function sendTelegram(){
        $msg = auth()->user()->username ;
        $msg .= ' has updated his resume .. please view updated resume here..  ';
        $msg .= str_replace_last('freelancer',auth()->user()->username, url()->current());
        $telegram = new Telegram('-279372621');
        $telegram->sendMessage($msg);
    }

    public function sendNotification(){
        Mail::send('emails.welcome', ['key' => 'value'], function($message)
            {
                $message->to('conor@123workforce.com', 'Conor Majoram')->subject('User has updated resume !');
            });
    }

}
