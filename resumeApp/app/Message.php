<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['message'];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function visitor(){
        return $this->belongsTo(Visitor::class);
    }

    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function conversation(){
        return $this->belongsTo(Conversation::class);
    }
}
