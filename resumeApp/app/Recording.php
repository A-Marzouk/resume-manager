<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 7/25/2018
 * Time: 7:24 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Recording extends Model
{
    protected $table = 'recordings';
    protected $fillable = [
        'title','transcription','src'
    ];


    public function freelancer(){
        return $this->belongsTo(User::class);
    }
}