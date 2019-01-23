<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 7/25/2018
 * Time: 7:24 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $table = 'campaigns';
    protected $fillable = [
        'client_id','title','description','start_date','end_date','status'
    ];

    public function members(){
        return $this->belongsToMany(User::class);
    }

    public function faqs(){
        return $this->hasMany(FAQ::class);
    }

    public function shifts(){
        return $this->hasMany(Shift::class);
    }

}