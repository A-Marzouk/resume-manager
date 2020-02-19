<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 7/25/2018
 * Time: 7:24 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    protected $table = 'activity_logs';
    protected $fillable = [
        'log_text','status','campaign_id','agent_id'
    ];

    public function agent(){
        return $this->belongsTo(Agent::class);
    }


    public function campaign(){
        return $this->belongsTo(Campaign::class);
    }

    public function history(){
        return $this->hasMany(ActivityLogHistory::class,'activity_log_id');
    }

}
