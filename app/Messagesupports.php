<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Messagesupports extends Model
{
    //
     protected $fillable = [
        'gr_id', 'user_id', 'file_id', 'message', 
    ];
    public function user(){
        return $this->belongsTo('\App\User');
    }
   
}
