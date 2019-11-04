<?php
/**
 * Created by PhpStorm.
 * User: Ahmed-pc
 * Date: 10/26/2019
 * Time: 10:04 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class SearchResult extends Model
{

    protected $table = 'searches';

    protected $fillable = [
        'client_id','title'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function agents()
    {
        return $this->belongsToMany(Agent::class,'agent_search','search_id','agent_id');
    }

}
