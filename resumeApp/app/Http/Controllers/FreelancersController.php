<?php

namespace App\Http\Controllers;

use App\Affiliate;
use App\Job;
use App\Owner;
use App\Project;
use App\User;
use App\UserData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FreelancersController extends Controller
{
    protected $freelancerData;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function form(){
        if(Auth::user()->admin == 1 && Auth::user()->username == 'admin_workforce'){
            return redirect(route('admin.dashboard'));
        }
        $data = $this->getFreelancerData();
        $affiliates = Affiliate::all();
        return view('freelancer.form',compact('data','affiliates'));
    }

    public function showEditForm(){
        if(Auth::user()->admin == 1 && Auth::user()->username == 'admin_workforce'){
            return redirect(route('admin.dashboard'));
        }
        $data = $this->getFreelancerData();
        return view('freelancer.edit_form',compact('data'));
    }

    public function showOldForm(){
        $data = $this->getFreelancerData();
        $affiliates = Affiliate::all();
        return view('freelancer.old_form',compact('data','affiliates'));
    }

    public function getFreelancerData () {
        $currFreelancer = auth()->user();
        if(!isset($currFreelancer->userData)){
            $userData = new UserData;
            $userData->user_id = $currFreelancer->id;
            $userData->save();
        }
        $data = [
            'name'=> $currFreelancer->userData->name ?? '',
            'birth_date'=>$currFreelancer->userData->birth_date ?? '',
            'email'=> $currFreelancer->userData->email ?? '' ,
            'salary'=> $currFreelancer->userData->salary ?? '' ,
            'googleCalendar'=> $currFreelancer->userData->googleCalendar ?? '' ,
            'currency'=> $currFreelancer->userData->currency ?? '' ,
            'preferredTime'=> $currFreelancer->userData->preferredTime ?? '' ,
            'surname'=> $currFreelancer->userData->surname ?? '' ,
            'timeZone'=> $currFreelancer->userData->timeZone ?? '' ,
            'audio'=> $currFreelancer->userData->audio ?? '' ,
            'city'=> $currFreelancer->userData->city ?? '' ,
            'country'=> $currFreelancer->userData->country ?? '' ,
            'professional_attributes'=> $currFreelancer->userData->professional_attributes ?? '' ,
            'personal_interests'=> $currFreelancer->userData->personal_interests ?? '' ,
            'design_styles'=> $currFreelancer->userData->design_styles ?? '' ,
            'workExperience'=> $currFreelancer->userData->workExperience ?? '' ,
            'trainings'=> $currFreelancer->userData->trainings ?? '' ,
            'nationality'=> $currFreelancer->userData->nationality ?? '' ,
            'workForceAgent'=> $currFreelancer->userData->workForceAgent ?? '' , // add to database
            'languages'=> $currFreelancer->userData->languages ?? '' ,
            'photoPath'=> $currFreelancer->userData->photo ?? '' ,
            'future_plan'=> $currFreelancer->userData->future_plan ?? '' ,
            'design_skills'=> $currFreelancer->userData->design_skills ?? '' ,
            'education'=> $currFreelancer->userData->education ?? '' ,
            'github'=> $currFreelancer->userData->githubLink ?? '' ,
            'intro'=> $currFreelancer->userData->intro ?? '' ,
            'jobTitle'=> $currFreelancer->userData->jobTitle ?? '' ,
            'stackoverflow'=> $currFreelancer->userData->stackoverflowLink ?? '' ,
            'careerObjective'=> $currFreelancer->userData->careerObjective ?? '' , // add to database
            'skillsCheckBox'=> explode(',',$currFreelancer->userData->design_skills_checkbox) ?? '' ,
            'charSkillsCheckBox'=> explode(',',$currFreelancer->userData->charSkills) ?? '' ,
            'PrimarySkillsCheckBox'=> explode(',',$currFreelancer->userData->primarySkills) ?? '' ,
            'availableHours'=> $currFreelancer->userData->availableHours ?? '' ,
            'works'=> explode(',',$currFreelancer->userData->works) ?? '' ,
            'terms'=> $currFreelancer->userData->terms ?? '' ,
            'username'=> auth()->user()->username,
            'profession'=> auth()->user()->profession,
            'personalSite'=> $currFreelancer->userData->personalSite ?? '' ,
            'behanceLink'=> $currFreelancer->userData->behanceLink ?? '' ,
            'instagramLink'=> $currFreelancer->userData->instagramLink ?? '' ,
            'dribbleLink'=> $currFreelancer->userData->dribbleLink ?? '' ,
            'freeDate'=> $currFreelancer->userData->freeDate ?? '' ,
            'eduTitle1'=> $currFreelancer->userData->eduTitle1 ?? '' ,
            'eduYear1'=> $currFreelancer->userData->eduYear1?? '' ,
            'eduDesc1'=> $currFreelancer->userData->eduDesc1?? '' ,
            'eduTitle2'=> $currFreelancer->userData->eduTitle2 ?? '' ,
            'eduYear2'=> $currFreelancer->userData->eduYear2?? '' ,
            'eduDesc2'=> $currFreelancer->userData->eduDesc2?? '' ,
            'eduTitle3'=> $currFreelancer->userData->eduTitle3 ?? '' ,
            'eduYear3'=> $currFreelancer->userData->eduYear3?? '' ,
            'eduDesc3'=> $currFreelancer->userData->eduDesc3?? '' ,
            'trnTitle1'=> $currFreelancer->userData->trnTitle1 ?? '' ,
            'trnYear1'=> $currFreelancer->userData->trnYear1?? '' ,
            'trnDesc1'=> $currFreelancer->userData->trnDesc1?? '' ,
            'trnTitle2'=> $currFreelancer->userData->trnTitle2 ?? '' ,
            'trnYear2'=> $currFreelancer->userData->trnYear2?? '' ,
            'trnDesc2'=> $currFreelancer->userData->trnDesc2?? '' ,
            'trnTitle3'=> $currFreelancer->userData->trnTitle3 ?? '' ,
            'trnYear3'=> $currFreelancer->userData->trnYear3?? '' ,
            'trnDesc3'=> $currFreelancer->userData->trnDesc3?? '' ,
            'audioFile'=> $currFreelancer->userData->audioFile?? '' ,
            'telephone'=> $currFreelancer->userData->telephone?? '' ,
            'skype_id'=> $currFreelancer->userData->skype_id?? '' ,
            'social_apps'=> $currFreelancer->userData->social_apps?? '' ,
            'salary_month'=> $currFreelancer->userData->salary_month?? '' ,
            'audio_transcript'=> $currFreelancer->userData->audio_transcript?? '' ,
            'video'=> $currFreelancer->userData->video?? '' ,
            'video_file'=> $currFreelancer->userData->video_file?? '' ,
            'workDesc'=> [
                $currFreelancer->userData->workDesc0 ?? '',
                $currFreelancer->userData->workDesc1 ?? '',
                $currFreelancer->userData->workDesc2 ?? '',
                $currFreelancer->userData->workDesc3 ?? '',
                $currFreelancer->userData->workDesc4 ?? '',
                $currFreelancer->userData->workDesc5 ?? '',
                $currFreelancer->userData->workDesc6 ?? '',
                $currFreelancer->userData->workDesc7 ?? '',
            ]
        ];

        return $data;
    }

    public function registerDesignerFromBehance(Request $request){
        $input     = $request->behanceDesignerLink;
        $multipleLinks = false;

        // check if we have more than one link in the input :
        if (strpos($input, ',') !== false) {
            $multipleLinks = true;
        }

        if($multipleLinks){
            $links = explode(',',$input);
            $mainBehanceLink  = $links[0];
        }else{
            $mainBehanceLink  = $input ;
        }

        $userDataController        = new UserDataController;
        $behanceUsername = $this->getBehanceUsername($mainBehanceLink);
        $dataFromBehance =  $userDataController->ArrDataFromBehance($behanceUsername);

        try{
            User::create([
                'firstName' => $dataFromBehance->first_name,
                'lastName' => $dataFromBehance->last_name,
                'email' => $behanceUsername.'@example.com',
                'username'=> $behanceUsername.'BeUser',
                'profession'=>'Designer',
                'password' => Hash::make($behanceUsername.'123456'),
            ]);
         }catch (\Exception $e){
            return redirect('/admin')->with('errorMessage','Fail. Link might be not correct or designer already exists');
        }

        $user = User::where('username',$behanceUsername.'BeUser')->first();

        $userData = new UserData;
        $userData->user_id = $user->id;
        $userData->name =$dataFromBehance->display_name;
        $userData->photo = end($dataFromBehance->images);
        $userData->city =$dataFromBehance->location;
        $userData->jobTitle =$dataFromBehance->occupation;
        $userData->behanceLink =$mainBehanceLink;

        if($dataFromBehance->has_social_links){
            foreach ($dataFromBehance->social_links as $link){
                if(isset($link->isInstagram)){
                    $userData->instagramLink = $link->url;
                }
                if(isset($link->isDribbble)){
                    $userData->dribbleLink = $link->url;
                }
            }
        }
        $userData->save();


//         bring user projects from behance and save them :
        if($multipleLinks){
            $projects = [];
            foreach ($links as $link){
                $behanceUsername = $this->getBehanceUsername($link);
                $dataFromBehance =  $userDataController->ArrDataFromBehance($behanceUsername);
                if(count($dataFromBehance->projects ) > 0){
                    array_push($projects,...$dataFromBehance->projects);
                }
            }
        }else{
            $projects = $dataFromBehance->projects;
        }

        if(count($projects ) > 0){
            foreach ($projects as $project){
                $dist = "resumeApp/uploads/project".$project->id."Behance".$user->id.".png";
                if (!file_exists($dist)){
                    copy($project->covers->original, $dist);
                }else{
                    continue;
                }
                // create new project :

                $moreMedia =[];
                $modules   = $project->modules;
                if(!empty($modules)){
                    foreach ($modules as $module){
                        if(isset($module->src)){
                            if(strpos($module->src, 'embed') !== false){ // it is video link !
                                $moreMedia[] = $module->src;
                            }else{
                                $newName = str_replace('https://mir-s3-cdn-cf.behance.net/project_modules/disp/','',$module->src);
                                $distMoreMedia = "resumeApp/uploads/behance_data/new_img".$project->id."Behance".$user->id.$newName;
                                if (!file_exists($distMoreMedia)){
                                    copy($module->src, $distMoreMedia);
                                }
                                $moreMedia[] = $distMoreMedia;
                            }
                        }
                    }
                }

                $localProject = new Project();
                $localProject->user_id = $user->id;
                $localProject->projectName = $project->name;
                $localProject->isActive = true;
                $localProject->projectDesc = $project->description;
                $localProject->link = $project->url;
                $localProject->mainImage = $dist;
                $localProject->images = implode(',',$moreMedia);
                $localProject->save();
            }
        }

        return redirect('/admin')->with('successMessage', 'Behance Designer has been successfully added.');

    }

    public function showFreelancerJobs(){
        $currFreelancer = auth()->user();
        $freelancerJobs = $currFreelancer->jobs;
        $allJobs        = Job::orderBy('created_at', 'DESC')->get();
        return view('freelancer.jobs',compact('freelancerJobs','allJobs','currFreelancer'));
    }

    public function applyToJob(Request $request){
        Job::find($request->jobID)->freelancersApplied()->attach(auth()->user()->id);
        return ['status'=> 'Applied'];
    }

    public function leaveJob(Request $request){
        Job::find($request->jobID)->freelancersApplied()->detach(auth()->user()->id);
        return ['status'=> 'Left'];
    }

    public function viewAgentRequirements(){
        return view('agent_requirements');
    }

    public function viewAgentContractorAgreement(){
        return view('agent_contractor_agreement');
    }


    public function hasAgreed(){
        $currUser = auth()->user();
        if($currUser->has_agreed == true){
            return ['terms' =>'AGREED'];
        }
        return [ 'terms' =>'NOT_AGREED'];
    }

    public function setTerms(Request $request){
        if($request->terms == 'AGREED'){
            $currUser = auth()->user();
            $currUser->has_Agreed = true;
            $currUser->save();
        }
        return 'agreed saved';
    }

    protected function getBehanceUsername($link){
        $behanceLink     = $link;
        $behanceLinkArr  = explode('/',$behanceLink);
        $behanceUsername = end($behanceLinkArr);

        return $behanceUsername ;
    }

}
