<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 7/25/2018
 * Time: 7:24 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $table = 'campaigns';
    protected $fillable = [
        'client_id','title','description','status','process_flow'
    ];

    public function members(){
        return $this->belongsToMany(Agent::class);
    }




    public function agents(){
        return $this->belongsToMany(Agent::class)->withPivot('status');
    }

    public function faqs(){
        return $this->hasMany(FAQ::class);
    }


    public function files(){
        return $this->hasMany(CampaignFile::class);
    }

    public function links(){
        return $this->hasMany(Link::class);
    }

    public function shifts(){
        return $this->hasMany(Shift::class);
    }

    public function activityLog(){
        return $this->hasMany(ActivityLog::class);
    }

    public function client(){
        return $this->belongsTo(Client::class);
    }

}