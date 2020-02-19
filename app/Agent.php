<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 7/25/2018
 * Time: 7:24 PM
 */

namespace App;

use App\Models\Concerns\HasUser;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasUser;

    protected $table = 'agents';
    protected $fillable = [
        'number', 'name', 'language', 'hourly_rate','status','recording_type','recording','cv'
        , 'available_hours_per_week', 'experience', 'user_id','voice_character','technologies','monthly_salary','monthly_salary_part_time'
    ];

    public function records()
    {
        return $this->hasMany(Recording::class);
    }


    public function logs()
    {
        return $this->hasMany(ActivityLog::class)->orderBy('created_at','desc');
    }

    public function resumeTabs()
    {
        return $this->hasMany(ResumeTab::class)->orderBy('view_order','asc');
    }

    public function socials()
    {
        return $this->hasMany(AgentSocial::class);
    }

    public function customResume()
    {
        return $this->hasOne(ResumeCustom::class);
    }


    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public function shifts()
    {
        return $this->hasMany(WorkingShift::class);
    }

    public function businessUser()
    {
        return $this->belongsTo(User::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function campaigns()
    {
        return $this->belongsToMany(Campaign::class);
    }


}
