<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestSmartphone extends Model
{
    //
     protected $fillable = [
       'request_id', 'os_type'
    ];

     public function request(){
        return $this->belongsTo('\App\Request');
    }
}
