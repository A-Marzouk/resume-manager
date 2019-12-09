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
        'agent_id','background_color'
    ];

    public function agent(){
        return $this->belongsTo(Agent::class);
    }

}
