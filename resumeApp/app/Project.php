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
        'projectName','isActive','link','projectDesc','images','mainImage'
    ];


    public function freelancer(){
        return $this->belongsTo(User::class);
    }
}