<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 7/25/2018
 * Time: 7:24 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class EducationHistory extends Model
{
    protected $table = 'education_histories';
    protected $fillable = [
        'school_title','description','date_to','date_from','currently_learning','type'
    ];


    public function freelancer(){
        return $this->belongsTo(User::class);
    }
}