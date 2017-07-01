<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    //
     protected $fillable = [
       'user_id', 'amount', 'note'
    ];
   

    public function user(){
        return $this->belongsTo('\App\User');
    }
}
