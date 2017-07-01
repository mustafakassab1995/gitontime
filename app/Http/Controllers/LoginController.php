<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    //



     public function Login(LoginRequest $request)
    {
    	$user = \DB::table('users')->where('username','=',$request->get('email'))->where('password','=',$request->get('password'))->first();
    	if($user){
    		\Auth::loginUsingId($user->id);
    		return redirect('/home');
    	}
    	else{
    		return $request->get('password');
    	}
    }
}
