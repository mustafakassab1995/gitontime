<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    //
     protected $fillable = [
        'file_id', 'user_id', 'status'
    ];
    public function user(){
        return $this->belongsTo('\App\User');
    }
   public function file(){
        return $this->belongsTo('\App\File');
    }
}
