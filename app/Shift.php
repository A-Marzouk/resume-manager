<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 7/25/2018
 * Time: 7:24 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    protected $table = 'shifts';
    protected $fillable = [
        'start_time','end_time','campaign_id','days'
    ];

    public function workers(){
        return $this->belongsToMany(User::class);
    }

    public function daysAsRecords(){
        return $this->hasMany(ShiftDay::class);
    }


    public function campaign(){
        return $this->belongsTo(Campaign::class);
    }

    public function invoice(){
        return $this->belongsTo(Invoice::class);
    }


}