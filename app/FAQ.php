<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 7/25/2018
 * Time: 7:24 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    protected $table = 'campaign_faqs';
    protected $fillable = [
        'campaign_id','title','question','answer','approved'
    ];

    public function campaign(){
        return $this->belongsTo(Campaign::class);
    }

}