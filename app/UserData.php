<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserData extends Model
{
    protected $fillable = [
         'first_name',
        'last_name',
        'profile_picture',
        'skype',
        'whatsapp',
        'telegram',
        'phone',
        'paypal_email',
        'birth_date',
        'city',
        'country',
        'nationality',
        'design_styles',
        'trainings',
        'job_title',
        'intro',
        'github',
        'facebook',
        'second_email',
        'behance',
        'instagram',
        'dribble',
        'stackoverflow',
        'free_date',
        'website',
        'linkedin',
        'google_calendar',
        'professional_attributes',
        'personal_interests',
        'career_objective',
        'available_hours_per_week',
        'preferred_time',
        'gender',
        'education',
        'primary_skills',
        'char_skills',
        'video_url',
        'timezone',
        'future_plan',
        'monthly_salary',
        'approved_at',
        'audio_transcription',
        'is_homepage_visible',
        'agreed_with_terms_at',
        'avatar',
        'paypal_acc_number',
        'user_id',
        'profession_id',
        'currency_id',
];



    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function profession()
    {
        return $this->belongsTo(Profession::class);
    }

    public function createUserData(array $attributes = []){
        DB::beginTransaction();
        try {
            if (is_array($attributes['userData'])) {
                $userData = static::fill($attributes['userData']);
                $userData->save();
            }else{
                $userData = [] ;
            }
        } catch (Exception $e) {
            DB::rollback();
            throw $e;
        }

        DB::commit();

        return $userData;
    }
}
