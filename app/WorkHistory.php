<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 7/25/2018
 * Time: 7:24 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class WorkHistory extends Model
{
    protected $table = 'works_history';
    protected $fillable = [
        'job_title','company','job_description','date_to','date_from','currently_working'
    ];


    public function freelancer(){
        return $this->belongsTo(User::class);
    }

    public function projects(){
        return $this->hasMany(Project::class);
    }
}