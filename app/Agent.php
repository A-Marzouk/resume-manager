<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 7/25/2018
 * Time: 7:24 PM
 */

namespace App;

use App\Models\Concerns\HasUser;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasUser;

    protected $table = 'agents';
    protected $fillable = [
        'number', 'name', 'language', 'hourly_rate'
        , 'available_hours', 'location', 'experience', 'user_id',
    ];

    public function records()
    {
        return $this->hasMany(Recording::class);
    }

    public function businessUser()
    {
        return $this->belongsTo(User::class);
    }
}
