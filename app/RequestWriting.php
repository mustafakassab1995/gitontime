<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestWriting extends Model
{ 
    //
    protected $fillable = [
      'request_id', 'type'
    ];

     public function request(){
        return $this->belongsTo('\App\Request');
    }
}
