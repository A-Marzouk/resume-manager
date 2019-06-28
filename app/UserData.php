<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    protected $fillable = [
        'name', 'birth_date', 'user_id', 'email', 'city', 'nationality', 'languages', 'design_styles', 'photo', 'trainings',
        'design_skills', 'design_skills_checkbox', 'professional_attributes', 'personal_interests', 'audio', 'works', 'workForceAgent',
        'careerObjective', 'education', 'workExperience', 'primarySkills', 'charSkills', 'availableHours', 'salary', 'salary_month',
        'currency', 'preferredTime', 'surname', 'jobTitle', 'intro', 'githubLink', 'stackoverflowLink', 'googleCalendar', 'personalSite'
        , 'terms', 'MondayHours', 'TuesdayHours', 'WednesdayHours', 'ThursdayHours', 'FridayHours', 'SaturdayHours', 'SundayHours', 'behanceLink',
        'instagramLink', 'dribbleLink', 'freeDate', 'video', 'timeZone', 'video_file', 'home_page_freelancer',
        'audioFile', 'future_plan', 'skype_id', 'telephone', 'social_apps', 'country', 'audio_transcript', 'profession_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function profession()
    {
        return $this->belongsTo(Profession::class);
    }
}
