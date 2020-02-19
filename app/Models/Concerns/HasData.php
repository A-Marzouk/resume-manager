<?php

namespace App\Models\Concerns;

trait HasData
{
    public function getNameAttribute()
    {
        return optional($this->userData)->first_name;
    }

    public function getFirstNameAttribute()
    {
        return optional($this->userData)->first_name;
    }

    public function getLastNameAttribute()
    {
        return optional($this->userData)->last_name;
    }

    public function getFullNameAttribute()
    {
        return implode(array_filter([
            optional($this->userData)->first_name,
            optional($this->userData)->last_name,
        ]), ' ');
    }
}
