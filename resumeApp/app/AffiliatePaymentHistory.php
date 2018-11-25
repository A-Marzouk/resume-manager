<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AffiliatePaymentHistory extends Model
{
    protected $table = 'affiliate_payment_history' ;

    protected $fillable = [
        'affiliate_id','amount_paid','admin_paid'
    ];

}
