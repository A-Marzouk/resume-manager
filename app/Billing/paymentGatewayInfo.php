<?php

namespace App\Billing;

use App\User;
use Illuminate\Database\Eloquent\Model;

class paymentGatewayInfo extends Model
{
    protected $table = 'pay_gateway_info';
    protected $guarded = [] ;


    // relation belongs to
    public function user(){
        return $this->belongsTo(User::class);
    }

}
