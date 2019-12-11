<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 7/25/2018
 * Time: 7:24 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class ResumeCustom extends Model
{
    protected $table = 'resume_customs';
    protected $fillable = [
        'agent_id','background_color',
        'is_weekly_rate_active',
        'is_available_hours_active',
        'is_audio_interview_active',
        'is_video_interview_active',
        'is_hire_me_active',
        'is_chat_with_me_active',
    ];

    public function agent(){
        return $this->belongsTo(Agent::class);
    }

}
