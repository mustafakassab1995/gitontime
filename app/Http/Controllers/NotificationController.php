<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    //
    public function getunread(){
    	$user =\Auth::user();
$data = [];
$i=0;
foreach ($user->unreadNotifications  as $notification) {
	$d = $notification->data;
    $data[] = $d;
    $i++;
}
$data['count'] = $i;
return response()->json($data);
    }
    public function marksee(){
    	$user =\Auth::user();
$user->unreadNotifications->markAsRead();
    }
    public function showallnotifications(){
    	return view('admin.notifications');
    }
}
