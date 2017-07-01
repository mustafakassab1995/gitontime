<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'username', 'password', 'email', 'phone', 'full_name', 'title', 'bio', 'location', 'avatar', 'credit', 'credit_panding', 'credit_payable', 'currency', 'salted', 'request', 'confirme', 'date', 'notifications_time', 'admin', 'control', 'employee', 'client', 'deleted',  'last_login','remember_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
