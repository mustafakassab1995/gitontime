<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    //
     
     protected $fillable = [
       'title', 'content', 'image_id', 'work_url', 'category_id', 'request_id', 'user_id',  'updated_by',
    ];
    public function image(){
    	 return $this->belongsTo('\App\File');
    }
    public function user(){
        return $this->belongsTo('\App\User');
    }
    public function request(){
        return $this->belongsTo('\App\Request');
    }
     public function category(){
        return $this->belongsTo('\App\Category');
    }
}
