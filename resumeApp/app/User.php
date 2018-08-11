<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    public $emptyFields ;

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstName','lastName', 'email', 'password','username','profession','token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function userData()
    {
        return $this->hasOne(UserData::class);
    }

    public function worksHistory()
    {
        return $this->hasMany(WorkHistory::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }


    public function messages(){
        return $this->hasMany(Message::class);
    }

    public function isComplete(){
        $userData = $this->userData->attributes;
        $except    = ['approved','birth_date','trainings','education','nationality','terms','googleCalendar','workForceAgent','preferredTime','surname'];
        if($this->profession == 'Developer'){
            array_push($except,'dribbleLink','instagramLink');
        }elseif($this->profession == 'Designer'){
            array_push($except,'githubLink','stackoverflowLink');
        }
        $emptyFields = [];
        foreach ($userData as $key => $data){
            if($data == null || empty($data) ){
                if($key == 'audio' || $key == 'audioFile'){
                    continue;
                }
                if(in_array($key,$except)){
                    continue;
                }
                $emptyFields[] = $key;
            }
        }

        $this->emptyFields =  $emptyFields;

        if(count($emptyFields) > 0){
            return false;
        }
        return true;

    }
}
