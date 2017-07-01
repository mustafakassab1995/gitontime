<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emppayment extends Model
{
    //
    protected $fillable = [
        'request_id', 'user_id', 'price', 'payment_id'
    ];
    public function user(){
        return $this->belongsTo('\App\User');
    }
    public function request(){
        return $this->belongsTo('\App\Request');
    }
    public function payment(){
        return $this->belongsTo('\App\Remittance');
    }
}
