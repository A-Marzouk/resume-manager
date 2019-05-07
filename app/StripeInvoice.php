<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StripeInvoice extends Model
{
    protected $table='stripe_invoices';
    protected $fillable = ['title', 'price', 'payment_status','payer_email','count','subscription_id','subscription_type'];

    public function client(){
        $this->belongsTo(Client::class);
    }
}
