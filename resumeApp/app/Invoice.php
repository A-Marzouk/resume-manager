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
    protected $table = 'invoices';
    protected $fillable = [
        'total_amount','service','hours','rate','notes','time_of_service','status','unique_number'
    ];


    public function client(){
        return $this->belongsTo(Client::class);
    }
}