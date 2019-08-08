<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 7/25/2018
 * Time: 7:24 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';
    protected $fillable = [
        'projectName','isActive','link','projectDesc','images','mainImage','order'
    ];


    public function freelancer(){
        return $this->belongsTo(User::class);
    }

    public function workHistory(){
        return $this->belongsTo(WorkHistory::class,'work_history_id');
    }
}