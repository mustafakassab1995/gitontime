<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
    //
    protected $fillable = [
       'name', 'hosting', 'price', 'signup_date', 'expiration_date', 'days', 'username', 'password', 'note', 'user_id'
    ];
}
