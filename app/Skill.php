<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 7/25/2018
 * Time: 7:24 PM
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $table = 'skills';
    protected $fillable = [
        'skill_title','type','icon','percentage','user_id'
    ];


    public function freelancer(){
        return $this->belongsTo(User::class);
    }
}
