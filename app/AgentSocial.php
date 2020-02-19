<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 7/25/2018
 * Time: 7:24 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class AgentSocial extends Model
{
    protected $table = 'socials';
    protected $fillable = [
        'agent_id',
        'link',
        'icon_src',
        'name',
    ];

    public function agent(){
        return $this->belongsTo(Agent::class);
    }

}
