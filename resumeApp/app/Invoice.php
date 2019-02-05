<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 7/25/2018
 * Time: 7:24 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'invoices';
    protected $fillable = [
        'total_amount','campaign_brief_id','timeZone','service','hours','rate','notes','time_of_service','status','unique_number',
        'user_id','year','week','currency','start_time','end_time','days'
    ];


    public function client(){
        return $this->belongsTo(Client::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function campaignBrief(){
        return $this->belongsTo(CampaignBrief::class);
    }

}