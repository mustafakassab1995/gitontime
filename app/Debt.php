<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Debt extends Model
{
    //
     protected $fillable = [
        'creditor_id', 'debtor_id', 'amount', 'subject',
    ];
     public function creditor(){
        return $this->belongsTo('\App\User');
    }
     public function debtor(){
        return $this->belongsTo('\App\User');
    }
}
