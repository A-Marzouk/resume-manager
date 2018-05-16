<?php

namespace App\Http\Controllers;

use App\UserData;
use Illuminate\Http\Request;

class FreelancersController extends Controller
{
    protected $freelancerData;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function form(){
        $data = $this->getFreelacerData();
        return view('freelancer.form',compact('data'));
    }

    public function getFreelacerData () {
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
        ];

        return $data;
    }
}
