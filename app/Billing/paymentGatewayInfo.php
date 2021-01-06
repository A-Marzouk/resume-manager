<?php

namespace App\Billing;

use App\Client;
use Illuminate\Database\Eloquent\Model;

class paymentGatewayInfo extends Model
{
    protected $table = 'pay_gateway_info';
    protected $guarded = [] ;


    // relation belongs to
    public function client(){
        return $this->belongsTo(Client::class);
    }

}
