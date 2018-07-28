<?php

namespace App\Http\Controllers;

use App\User;
use App\UserData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FreelancersController extends Controller
{
    protected $freelancerData;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function form(){
        if(Auth::user()->admin == 1){
            Auth::user()->token = str_random(16);
            Auth::user()->save();
            return redirect(route('admin.dashboard'));
        }
        $data = $this->getFreelancerData();
        return view('freelancer.form',compact('data'));
    }

    public function getFreelancerData () {
        $currFreelancer = auth()->user();
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
            'availableHoursCheckBox'=> explode(',',$currFreelancer->userData->availableHours) ?? '' ,
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
}
