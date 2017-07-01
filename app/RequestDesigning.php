<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestDesigning extends Model
{
    // 
     protected $fillable = [
       'request_id', 'format', 'size', 'type'
    ];
    public function request(){
        return $this->belongsTo('\App\Request');
    }
}
