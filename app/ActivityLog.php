<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 7/25/2018
 * Time: 7:24 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    protected $table = 'logs';
    protected $fillable = [
        'log_text','campaign_id','user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

}