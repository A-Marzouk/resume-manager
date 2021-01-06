<?php

namespace App\Billing;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table='payments';
    protected $guarded = [] ;


    // relation belongs to
    public function user(){
        return $this->belongsTo(User::class);
    }

}
