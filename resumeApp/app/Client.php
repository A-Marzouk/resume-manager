<?php

namespace App;

use App\Notifications\ClientResetPasswordNotification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guard = 'client';

    protected $fillable = [
        'name', 'phone','email','password','username','agency','contact','emailDept','agree_with_terms','timeZone','firstName',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ClientResetPasswordNotification($token));
    }

    public function messages(){
        return $this->hasMany(Message::class);
    }

    public function conversations(){
        return $this->hasMany(Conversation::class)->orderBy('updated_at','desc');
    }


    public function searches()
    {
        return $this->hasMany(ClientSearch::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

}
