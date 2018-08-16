<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientSearch extends Model
{
    protected $table = 'clients_search';

    protected $fillable = [
        'freelancers_id','client_id','name'
    ];
}
