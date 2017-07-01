<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestWeb extends Model
{
	
    //
    protected $fillable = [
      'request_id', 'framework', 'site_type'
    ];

     public function request(){
        return $this->belongsTo('\App\Request');
    }
}
