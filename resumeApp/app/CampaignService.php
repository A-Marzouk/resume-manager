<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 7/25/2018
 * Time: 7:24 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class CampaignService extends Model
{
    protected $table = 'campaign_services';
    protected $fillable = [
        'campaign_brief_id','service_required','hourly_rate','hours'
        ,'language','agent_location','number_of_agents','agent_experience'
    ];


    public function campaignBrief(){
        return $this->belongsTo(CampaignBrief::class);
    }
}