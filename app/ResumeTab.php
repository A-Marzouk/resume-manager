<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 7/25/2018
 * Time: 7:24 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class ResumeTab extends Model
{
    protected $table = 'resume_tabs';
    protected $fillable = [
        'name','label','type','view_order','default_icon_src','is_active','agent_id'
    ];

    public function agent(){
        return $this->belongsTo(Agent::class);
    }

}
