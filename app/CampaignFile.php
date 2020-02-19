<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CampaignFile extends Model
{
    protected $table = 'campaign_files';
    protected $fillable = [
        'name',
        'path',
        'file_name',
        'mime_type',
        'campaign_id',
        'category',
    ];

    public function campaign(){
        return $this->belongsTo(Campaign::class);
    }

}
