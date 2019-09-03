<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $table = 'subscriptions';

    protected $fillable= [
        'amount_paid',
        'hours_per_week',
        'hourly_rate',
        'duration_in_weeks',
        'original_duration_in_weeks',
        'start_date',
        'end_date',
        'canceled_at',
        'finished_at',
        'booking_email',
        'payment_gateway_subscription_id',
        'client_id',
        'agent_id',
        'campaign_id',
    ];


    public function campaign(){
        return $this->belongsTo(Campaign::class) ;
    }

    public function manager(){
        return $this->belongsTo(Agent::class,'agent_id') ;
    }

}
