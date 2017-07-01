<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    //

    protected $fillable = [
       'category_id', 'title', 'content', 'delivery_time', 'price', 'price_employee', 'seen', 'status', 'payment_status', 'supervisor_id', 'employee_id', 'file_id', 'user_id',  'updated_by', 
    ];
   

    public function user(){
        return $this->belongsTo('\App\User');
    }
    public function supervisor(){
        return $this->belongsTo('\App\User');
    }
    public function employee(){
        return $this->belongsTo('\App\User');
    }
    public function comment(){
        return $this->belongsTo('\App\RequestMessageentry');
    }
    public function file(){
        return $this->belongsTo('\App\File');
    }
    public function category(){
        return $this->belongsTo('\App\Category');
    }
}
