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

    public function jobs(){
        return $this->belongsToMany(Job::class);
    }

    public function hasApplied($jobID){
        $job        = Job::find($jobID);
        $freelancersApplied = $job->freelancersApplied()->get(['user_id']);
        $hasApplied = false;
        foreach ($freelancersApplied as $freelancer){
            if($freelancer->user_id == auth()->user()->id){
                $hasApplied = true;
            }
        }
        return $hasApplied;
    }

    public function userData()
    {
        return $this->hasOne(UserData::class);
    }

    public function worksHistory()
    {
        return $this->hasMany(WorkHistory::class);
    }

    public function educationsHistory()
    {
        return $this->hasMany(EducationHistory::class);
    }

    public function owner()
    {
        return $this->belongsTo(Affiliate::class);
    }


    public function affiliate()
    {
        return $this->belongsTo(Affiliate::class);
    }


    public function skills()
    {
        return $this->hasMany(Skill::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }


    public function messages(){
        return $this->hasMany(Message::class);
    }


    public function conversations(){
        return $this->hasMany(Conversation::class)->orderBy('updated_at','desc');
    }

    public function isComplete(){
        $userData = $this->userData->attributes;
        $except    = ['online','approved','birth_date','trainings','education','nationality','terms','googleCalendar','workForceAgent','preferredTime','surname'
        ,'workDesc0','workDesc1','workDesc2','workDesc3','workDesc4','workDesc5','workDesc6','workDesc7','works','workExperience'];
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

    public function unreadMessages(){
        $conversations = $this->conversations;
        $countUnread = 0 ;
        foreach ($conversations as $conversation){
            $countUnread += $conversation->unread_messages_freelancer ;
        }

        return $countUnread;
    }

    public function getCompletionPercent(){
        // field to check :
        // name, profession, audio, video,
    }
}
