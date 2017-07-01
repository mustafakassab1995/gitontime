<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Remittance extends Model
{
    //

	protected $fillable = [
       'bank_name', 'adapter_name', 'amount', 'object_model', 'request_id', 'transaction_number', 'status', 'user_id',
    ];
    public function user(){
        return $this->belongsTo('\App\User');
    }
    public function request(){
        return $this->belongsTo('\App\Request');
    }
}
