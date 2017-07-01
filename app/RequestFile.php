<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestFile extends Model
{
    //
    
    protected $fillable = [
       'request_id', 'employee_id', 'piclink', 'videolink'
    ];
}
