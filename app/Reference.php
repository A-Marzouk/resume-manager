<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 7/25/2018
 * Time: 7:24 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    protected $table = 'user_references';
    protected $fillable = [
        'title','name','company','phone','email','details','user_id'
    ];


    public function freelancer(){
        return $this->belongsTo(User::class);
    }

}
