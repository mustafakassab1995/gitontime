<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Messagesgroups extends Model
{
    //
     protected $fillable = [
        'userone_id',  'usertwo_id'
    ];
     public function userone(){
        return $this->belongsTo('\App\User');
    }
    public function usertwo(){
        return $this->belongsTo('\App\User');
    }
}
