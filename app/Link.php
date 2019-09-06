<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $table = 'links';
    protected $fillable = [
        'campaign_id','title','url'
    ];

    public function campaign(){
        return $this->belongsTo(Campaign::class);
    }
}
