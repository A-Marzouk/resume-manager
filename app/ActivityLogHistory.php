<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 7/25/2018
 * Time: 7:24 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class ActivityLogHistory extends Model
{
    protected $table = 'activity_logs_history';
    protected $fillable = [
        'log_text','status','activity_log_id'
    ];


}
