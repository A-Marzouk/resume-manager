<?php

namespace App\Http\Controllers;

use App\classes\Upload;
use App\Mail\welcome;
use App\Project;
use App\User;
use App\UserData;
use Behance\Client;
use http\Exception;
use Illuminate\Http\Request;
use App\classes\Telegram;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;
use Laravel\Socialite\Facades\Socialite;
use PharIo\Manifest\Email;
use Vinkla\Instagram\Instagram;

class UserDataController extends Controller
{

    public function store(Request $request){
        $userData = UserData::where('user_id',auth()->user()->id)->first();
        if ($userData){
            $sendTelegram = false;
            if(!$request->ajax()){
                $request->validate([
                   'trnTitle1'=>'max:190',
                   'trnTitle2'=>'max:190',
                   'trnTitle3'=>'max:190',
                   'eduTitle1'=>'max:190',
                   'eduTitle2'=>'max:190',
                   'eduTitle3'=>'max:190',
                   'languages'=>'required|max:190',
                   'telephone'=>'required|max:190',
                   'skype_id'=>'required|max:190',
                   'social_apps'=>'max:190',
                   'future_plan'=>'max:1500',
                   'audio_transcript'=>'max:1500',
//                   'photo'=>'required',
                   'nationality'=>'max:190',
                   'audioFile'=>'max:190',
                   'audio'=>'max:190',
                   'video'=>'max:190',
                   'video_file'=>'max:190',
                   'intro'=>'max:1000',
                   'professional_attributes'=>'max:190',
                   'careerObjective'=>'max:1500',
                   'design_styles'=>'max:1500',
                   'personal_interests'=>'max:190',
                   'currency'=>'max:190',
                   'personalSite'=>'max:190',
                   'behanceLink'=>'max:190',
                   'instagramLink'=>'max:190',
                   'dribbleLink'=>'max:190',
                   'stackoverflowLink'=>'max:190',
                   'design_skills'=>'max:190',
                   'name'=>'required|max:190',
                   'jobTitle'=>'required|max:190',
                   'salary'=>'required|max:190',
                   'salary_month'=>'max:190',
                   'availableHours'=>'required|max:190',
                   'city'=>'required|max:190',
                   'country'=>'required|max:190',
                   'email'=>'required|max:190',
                   'primarySkills'=>'',
                   'design_skills_checkbox'=>'',
                ]);

                $sendTelegram = true;
            }
            $data = $request->all();
            $works = $userData->works ;
            foreach ($data as $key => $value){
                if($key == '_token'){
                    continue;
                }
                elseif ($key == 'photo'){
                    if(is_numeric($value)){
                        $userData->{$key} = "";
                    }else{
                        $pathToPhoto = Upload::photo($value,'photo','');
                        $userData->{$key} = $pathToPhoto ;
                    }
                }elseif($key == 'audioFile'){
                    if(is_numeric($value)){
                        $userData->{$key} = " ";
                    }else{
                        $pathToAudio = Upload::audio($value,'audioFile','');
                        if($pathToAudio){
                            $userData->{$key} = $pathToAudio ;
                        }
                    }
                }elseif ($key == 'video_file'){
                    if(is_numeric($value)){
                        $userData->{$key} = " ";
                    }else{
                        $pathToVideo = Upload::video($value,'video_file','');
                        if($pathToVideo){
                            $userData->{$key} = $pathToVideo ;
                        }
                    }
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
                }elseif ($key == 'social_apps'){
                    $social_appsCheckBoxes = implode(',',$value);
                    $userData->{$key} = $social_appsCheckBoxes ;
                }elseif(strpos($key, 'works') !== false){
                    // clear array
                    $worksArr = array_filter(explode(',',$works));

                    if(is_numeric($value)){ // delete photo number x
                        if(!empty($works)){
                            foreach ($worksArr as &$work){
                                if(strpos($work, 'works'.$value) !== false){
                                    $work ='';
                                }
                            }
                            $works = implode(',',$worksArr);
                        }
                    }else{
                        // check if photo is not repeated :
                        $pathToPhoto = Upload::photo($value,$key,$key);
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
                        if(strlen($id) > 20 ){
                            $userData->{$key} = $id;
                            break;
                        }else{
                            $userData->{$key} = "NOT-VALID-LINK";
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
            if($sendTelegram){
                $notification = new NotificationsController();
                $notification->resumeEditedTelegram();
                $notification->resumeEditedEmail();
            }
            return redirect('/freelancer')->with('successMessage', 'Your changes have been successfully saved.');
        }else{
            return redirect('/freelancer/home');
        }
    }

    public function dataFromBehance($behanceUsername){
        $apiKey = "JqLizSfJOtrq1fNwBPnJ56oTerbqVh2P";
        $client = new Client($apiKey);

        if(!empty($behanceUsername)){
            $data = $client->getUser($behanceUsername);
            if(!$data){
                return;
            }
            $projects = $client->getUserProjects($behanceUsername);
            $fullProjects = [] ;
            foreach($projects as $project){
                $fullProjects[] = $client->getProject($project->id);
            }
            $data->projects = $fullProjects;
            $this->saveBehanceProjects($fullProjects);
        }else{
            $data = [];
        }

        return Response::json($data);
    }

    public function ArrDataFromBehance($behanceUsername){
        $apiKey = "JqLizSfJOtrq1fNwBPnJ56oTerbqVh2P";

        $client = new Client($apiKey);

        if(!empty($behanceUsername)){
            $data = $client->getUser($behanceUsername);
            if(!$data){
                return;
            }
            $projects = $client->getUserProjects($behanceUsername);
            $fullProjects = [] ;
            foreach($projects as $project){
                $fullProjects[] = $client->getProject($project->id);
            }
            $data->projects = $fullProjects;
        }else{
            $data = [];
        }

        return $data;
    }


    public function saveImgLink(Request $request){
        $userData = UserData::where('user_id',auth()->user()->id)->first();
        $userData->photo = $request->img;
        $userData->design_skills = implode(', ',$request->design_skills);
        $userData->save();

        return ['status' => 'ok'];
    }

    public function saveBehanceProjects($projects){
        $user = User::where('id',auth()->user()->id)->first();
        $userExistingProjects  = $user->projects ;

        $existingProjectsNames = [];
        foreach ($userExistingProjects as $project){
            $existingProjectsNames[] = $project->projectName;
        }

       foreach ($projects as $project){
            if(in_array($project->name,$existingProjectsNames)){
                continue;
            }
           $dist = "resumeApp/uploads/project".$project->id."Behance".$user->id.".png";
           if (!file_exists($dist)){
               copy($project->covers->original, $dist);
           }else{
               continue;
           }
           // create new project :
           // check if we have more images ( modules )
           $modules   = $project->modules;
           $moreMedia =[];
           if(!empty($modules)){
               foreach ($modules as $module){
                   if(isset($module->src)){
                       $moreMedia[] = $module->src;
                   }
               }
           }
           $localProject = new Project();
           $localProject->user_id = $user->id;
           $localProject->projectName = $project->name;
           $localProject->projectDesc = $project->description;
           $localProject->link = $project->url;
           $localProject->mainImage = $dist;
           $localProject->images = implode(',',$moreMedia);
           $localProject->save();
       }

    }


    public function dataFromLinkedIn(){
        try {
            $user = Socialite::driver('linkedin')->stateless()->user();
            $currentUser = auth()->user();
            $userData = UserData::where('user_id',$currentUser->id)->first();
            $userData->name = $user->user['formattedName'];
            $userData->photo = $user->avatar_original;
            $userData->intro = $user->user['headline'];

            $userData->save();
            return redirect('/freelancer')->with('successMessage','Data is successfully imported from Linked In.');

        } catch (Exception $e) {
            return redirect('/freelancer')->with('errorMessage','Something went wrong, please try again.');
        }

    }

    public function dataFromInstagram(){
        $client = new \GuzzleHttp\Client();

        $res = $client->request('POST', 'https://api.instagram.com/oauth/access_token',
            ['form_params' => [
                'client_id' => 'f877808c985d4f43ad73ae517db95151',
                'client_secret' => '2f113fcf0bbc4a24ab30e1b5f90b5220',
                'grant_type' => 'authorization_code',
                'redirect_uri' => 'https://123workforce.com/freelancer/instagram',
                'code' => $_GET['code'] ?? ''
                ]
            ]
        );

        $responseJson  = $res->getBody()->getContents();
        $responseArr = json_decode($responseJson,true);

        $userMediaJson = $client->request('GET','https://api.instagram.com/v1/users/'.$responseArr["user"]["id"].'/media/recent?access_token='.$responseArr["access_token"]);
        $userMediaArr  = json_decode($userMediaJson->getBody()->getContents());

        foreach ($userMediaArr->data as $instagramProject){
            $project = new Project;
            $project->mainImage = $instagramProject->images->standard_resolution->url;
            if($instagramProject->caption !== null){
                $project->projectName = $instagramProject->caption->text;
            }
            $project->user_id = auth()->user()->id;
            $project->save();
        }

        return redirect('/freelancer#portfolio')->with('successMessage','Instagram data successfully imported');

    }

    public function showAudioPage(){
        return view('audio');
    }

    public function saveAudio(Request $request){
        $currFreelancer = auth()->user();
        if(isset($_FILES['file']) and !$_FILES['file']['error']){
            $fname = "Record".$currFreelancer->id.'.ogg';
            $target_file = "resumeApp/uploads/audios/" . $fname ;

            if (file_exists($target_file)) {
                unlink($target_file);
            }

            move_uploaded_file($_FILES['file']['tmp_name'], $target_file);
        }

        // save audio to the freelancer :
        $userData = UserData::where('user_id',$currFreelancer->id)->first();
        $userData->audioFile = "/" . $target_file ;
        $userData->save();
    }

    public function saveAudioForChat(Request $request){
        if(isset($_FILES['file']) and !$_FILES['file']['error']){
            $fname = "Record_".date(time()).'.ogg';
            $target_file = "resumeApp/storage/chat_shared_files/" . $fname ;

            if (file_exists($target_file)) {
                unlink($target_file);
            }

            move_uploaded_file($_FILES['file']['tmp_name'], $target_file);
        }

        return $target_file;
    }
}
