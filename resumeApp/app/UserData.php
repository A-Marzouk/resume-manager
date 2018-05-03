<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    protected $fillable = [
        'name', 'birth_date','user_id','email','city','nationality','languages','design_styles','photo','trainings',
        'design_skills','design_skills_checkbox','professional_attributes','personal_interests','audio','works','workForceAgent',
        'careerObjective','education','workExperience','primarySkills','charSkills','availableHours','salary',
        'currency','preferredTime','surname','jobTitle','intro','githubLink','stackoverflowLink','googleCalendar'
    ];

}
