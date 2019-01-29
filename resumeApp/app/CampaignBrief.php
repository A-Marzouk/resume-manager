<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 7/25/2018
 * Time: 7:24 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class CampaignBrief extends Model
{
    protected $table = 'campaign_briefs';
    protected $fillable = [
        'client_id','company_website','company_values','client_contact'
        ,'objective','email_pitch','phone_pitch','data_systems'
        ,'estimated_duration','time_zone','time_needed','start_Date'
        ,'contract_terms','hours_per_week','weekly_rate','payment_method'
        ,'campaign_manager','report_requirement'
    ];


    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function services(){
        return $this->hasMany(CampaignService::class,'campaign_brief_id');
    }
}