<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 11/6/2018
 * Time: 11:28 AM
 */

namespace App;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{

    protected $table = 'owners';
    protected $fillable = [
        'email','name','owned_freelancers','owned_clients'
    ];

    public function freelancers(){
        return $this->hasMany(User::class);
    }

    public function clients(){
        return $this->hasMany(Client::class);
    }

}