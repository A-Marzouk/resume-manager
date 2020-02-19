<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{
    public function userDatas()
    {
        return $this->hasMany(UserData::class);
    }
}
