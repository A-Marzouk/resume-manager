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
    public function freelancer(){
        return $this->belongsTo(User::class);
    }
}