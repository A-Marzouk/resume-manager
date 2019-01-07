<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    protected $fillable = [
        'name', 'birth_date','user_id','email','city','nationality','languages','design_styles','photo','trainings',
        'design_skills','design_skills_checkbox','professional_attributes','personal_interests','audio','works','workForceAgent',
        'careerObjective','education','workExperience','primarySkills','charSkills','availableHours','salary','salary_month',
        'currency','preferredTime','surname','jobTitle','intro','githubLink','stackoverflowLink','googleCalendar','personalSite'
        ,'terms','MondayHours','TuesdayHours','WednesdayHours','ThursdayHours','FridayHours','SaturdayHours','SundayHours','behanceLink',
        'instagramLink','dribbleLink','freeDate','workDesc1','workDesc2','workDesc3',
        'workDesc4','workDesc5','workDesc6','video','timeZone','video_file','home_page_freelancer',
        'workDesc7','workDesc0','eduTitle1','eduTitle2','eduTitle3','eduYear1','eduYear2','eduYear3',
        'eduDesc1','eduDesc2','eduDesc3','trnTitle1','trnTitle2','trnTitle3','trnYear1','trnYear2','trnYear3',
        'trnDesc1','trnDesc2','trnDesc3','audioFile','future_plan','skype_id','telephone','social_apps','country','audio_transcript'
    ];


    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

}
