<?php

namespace App;
use Illuminate\Database\Eloquent\Model;


class AffiliateClick extends Model
{

    protected $table = 'affiliate_link_clicks';

    protected $fillable = [
        'affiliate_id'
    ];


}
