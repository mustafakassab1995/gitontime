<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    //
     protected $fillable = [
       'title', 'content', 'request_id', 'user_id', 'all_members', 'seen', 'creater_id'
    ];
   public function creater(){
        return $this->belongsTo('\App\User');
    }
}
