<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestVideo extends Model
{
    //
    protected $fillable = [
       'request_id', 'time', 'size', 'voice_comment', 'vioce_model', 'music', 'personal'
    ];

     public function request(){
        return $this->belongsTo('\App\Request');
    }
}
