<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{

    protected $table = 'subscriptions';

    protected $guarded = [] ;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function promocode(){
        return $this->belongsTo(Promocode::class);
    }

    public function isExpired(){

        if($this->expires_at === null){
            return false;
        }

        $expiring_date = Carbon::parse($this->expires_at);
        $now           = Carbon::now();

        return $now->gt($expiring_date);
    }

    public function isActive(){
        return $this->sub_status === 'active' ;
    }


}
