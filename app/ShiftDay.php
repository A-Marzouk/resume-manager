<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 7/25/2018
 * Time: 7:24 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class ShiftDay extends Model
{
    protected $table = 'shift_days';
    protected $fillable = [
        'date','shift_id'
    ];

    public function shift(){
        return $this->belongsTo(Shift::class);
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }

}