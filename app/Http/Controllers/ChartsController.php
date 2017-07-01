<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChartsController extends Controller
{
    //
    public function requestsreports(Request $request){
    	$type= "area";
    	if($request->get('type')){
    		$type=$request->get('type');
    	}
    	$chart = \Charts::database(\App\Request::all(), $type, 'highcharts')
    	->template('google')
      ->elementLabel("عدد الطلبات")
      ->dimensions(1000, 500)
      ->responsive(true)
      ->groupByYear(4,true);
      return view('admin.report',['chart' => $chart]);
    }
}
