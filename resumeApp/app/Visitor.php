<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $fillable = ['chatHistory','firstName','lastName'];
    public function messages(){
        return $this->hasMany(Message::class);
    }
}
