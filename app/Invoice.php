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
    protected $fillable = [
        'identifier',
        'total',
        'service_title',
        'status',
        'billing_date',
        'discount',
        'hours',
        'rate',
        'status',
        'notes',

        'currency_id',
        'client_id',
        'subscription_id',
    ];

    protected $table = 'invoices';


    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function agent(){
        return $this->belongsTo(Agent::class);
    }


    public function subscription(){
        return $this->belongsTo(Subscription::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function services(){
        return $this->hasMany(Service::class);
    }


    public function campaignBrief(){
        return $this->belongsTo(CampaignBrief::class);
    }

}
