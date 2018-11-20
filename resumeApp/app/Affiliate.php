<?php

namespace App;

use App\Http\Controllers\Auth\AffiliateResetPasswordController;
use App\Notifications\AffiliateResetPasswordNotification;
use App\Notifications\ClientResetPasswordNotification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Affiliate extends Authenticatable
{

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'affiliates';

    protected $guard = 'affiliate';

    protected $fillable = [
        'name','email','password','agree_with_terms','code'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password','remember_token',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AffiliateResetPasswordNotification($token));
    }

    public function freelancers(){
        return $this->hasMany(User::class);
    }

    public function clients(){
        return $this->hasMany(Client::class);
    }


}
