<?php

namespace App\Models\Concerns;

use App\User;

trait HasUser
{
    public function getFullNameAttribute()
    {
        return $this->user->full_name;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getEmailAttribute()
    {
        return $this->user->email;
    }
}
