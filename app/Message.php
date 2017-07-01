<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //
     protected $fillable = [
        'gr_id', 'rcv_id', 'file_id', 'message', 'seen',  'sender_id'
    ];
    public function sender(){
        return $this->belongsTo('\App\User');
    }
    public function rcv(){
        return $this->belongsTo('\App\User');
    }
     public function file(){
        return $this->belongsTo('\App\File');
    }
}
