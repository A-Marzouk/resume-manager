<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 7/25/2018
 * Time: 7:24 PM
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $table = 'skills';
    protected $fillable = [
        'name', 'skill_type_id', 'icon',
    ];

    public function freelancer()
    {
        return $this->belongsToMany(User::class, 'skill_user');
    }

    public function skillType()
    {
        return $this->belongsTo(SkillType::class, "skill_type_id");
    }
}
