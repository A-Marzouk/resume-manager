<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SkillType extends Model
{
    protected $table = 'skill_types';
    protected $fillable = [
        'name', 'label'
    ];

    public function skills ()
    {
        return $this->hasMany(Skill::class);
    }
}
