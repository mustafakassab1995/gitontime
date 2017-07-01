<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestMessageentry extends Model
{
    //
    protected $fillable = [
       'request_id', 'message', 'file_id', 'user_id',  'updated_by',
    ];
   

    public function user(){
        return $this->belongsTo('\App\User');
    }
    public function file(){
        return $this->belongsTo('\App\File');
    }
    public function request(){
        return $this->belongsToMany('\App\Request');
    }
}
