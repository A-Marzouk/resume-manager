<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 7/25/2018
 * Time: 7:24 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = 'jobs';
    protected $fillable = [
        'client_id','title','description','time','budget','time','skills','status','posted'
    ];

    public function freelancersApplied(){
        return $this->belongsToMany(User::class);
    }

}