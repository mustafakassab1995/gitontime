<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Http\Request;
Route::post('ve',function(Request $request){
	
	$user = \App\User::where('id',$request->get('id'))->where('confirme','=',$request->get('code'))->first();
	if( !empty($user)){
		\App\User::where('id',$request->get('id'))->where('confirme','=',$request->get('code'))->update(['deleted'=>0]);
Auth::loginUsingId($request->get('id'), true);
return redirect()->route('Request.index');
	}
	else{
		  return view('auth.verify',['id'=>$request->get('id') , 'error'=>'الرمز غير صحيح']);
	}
});
Route::get('go','PaypalController@go');
Route::get('getDone','PaypalController@getDone');
Route::get('getDone','PaypalController@getCancel');

Route::post('/llogin','LoginController@Login');
Auth::routes();
Route::get('/', function () {
        return redirect('/login');
    
});
Route::group(['middleware' => 'auth'], function(){



			Route::get('/newTicket', function () {
		       return view('admin.newticket');
		    
		});
route::post('openaticket','SupportController@openaticket');
route::post('replyaticket','SupportController@replyaticket');
route::post('closeaticket','SupportController@closeaticket');
route::post('deleteareply','SupportController@deleteareply');
	Route::get('/mytickets',function (){
		if(\Auth::user()->admin==1){
		$data['tickets'] = \App\Messagesgroupsupports::where('id','>',0)->orderBy('id','desc')->paginate(10);
		return view('admin.mytickets',$data);
		}
		if(\Auth::user()->client==1){
			$data['tickets'] = \App\Messagesgroupsupports::where('id','>',0)->orderBy('id','desc')->paginate(10);
		return view('admin.mytickets',$data);
		}
		abort(404);
	});
	Route::get('/showticket/{id}',function ($id){

		if(\Auth::user()->admin==1){
		$data['mainticket'] = \App\Messagesgroupsupports::where('id',$id)->with('user')->orderBy('id','desc')->first();
		if(count($data['mainticket'])<1){
				abort(404);
			}
		$data['tickets'] = \App\Messagesupports::where('gr_id',$id)->with('user')->orderBy('id','desc')->get();
		return view('admin.showticket',$data);
		}
		if(\Auth::user()->client==1){
			$data['mainticket'] = \App\Messagesgroupsupports::where('id','=',$id)->where('user_id','=',\Auth::user()->id)->orderBy('id','desc')->first();
			if(count($data['mainticket'])<1){
				abort(404);
			}
		$data['tickets'] = \App\Messagesupports::where('gr_id',$id)->with('user')->orderBy('id','desc')->get();

		return view('admin.showticket',$data);
		}
		abort(404);
	});


		
Route::get('/shit',function(){
	return view('admin.index');
});
Route::get('/deleteacomment/{id}', function($id){
	try{
	
	\App\RequestMessageentry::destroy($id);
}
	catch (Exception $e) {

return response()->json(['result'=>0]);

	}

return response()->json(['result'=>1]);
});
Route::post('/sendamsg', function(Request $request){
	try{
	
	\Mobily::send($request->get('number'),$request->get('msg'));
}
	catch (Exception $e) {

return response()->json(['result'=>0]);

	}

return response()->json(['result'=>1]);
});
route::get('requestsreports','ChartsController@requestsreports');
route::get('balance','FinancialController@balance');
Route::get('getunread','NotificationController@getunread');
Route::get('showallnotifications','NotificationController@showallnotifications');
Route::get('marksee','NotificationController@marksee');
Route::get('getmgroups','ChatController@getmgroups');
Route::post('makeanewgroup','ChatController@makeanewgroup');
Route::post('getmgs','ChatController@getmgs');
Route::post('sendamsg','ChatController@sendamsg');
Route::post('getnewgroupmsgs','ChatController@getnewgroupmsgs');
Route::get('financialremittance','FinancialController@financialremittance');
Route::get('showremittance','FinancialController@showremittance');
Route::get('notconfirmed','FinancialController@notconfirmed');
Route::get('confirmed','FinancialController@confirmed');
Route::get('employeepayments','FinancialController@employeepayments');
Route::get('employeepaymentstatus','FinancialController@employeepaymentstatus');
Route::get('notdonepayments','FinancialController@notdonepayments');
Route::get('donepayments','FinancialController@donepayments');
Route::get('salaryemp','FinancialController@salaryemp');
Route::get('debts','FinancialController@debts');
Route::get('coupons','FinancialController@coupons');
Route::post('acceptpayment','FinancialController@acceptpayment');
Route::post('adddebt','FinancialController@adddebt');
Route::post('editdebt','FinancialController@editdebt');
Route::post('deletedebt','FinancialController@deletedebt');
Route::post('addcoupon','FinancialController@addcoupon');
Route::post('editcoupon','FinancialController@editcoupon');
Route::post('deletecoupon','FinancialController@deletecoupon');
Route::post('addemppayment','FinancialController@addemppayment');
Route::post('addsalary','FinancialController@addsalary');


Route::resource('Request','RequestController');
Route::resource('Message','MessageController');
Route::resource('Note','NoteController');
Route::resource('Work','WorkController');
Route::resource('Timetable','TimetableController');
Route::resource('User','UserController');

Route::post('/addcomment','RequestController@addcomment');
Route::post('/acceptrequest','RequestController@acceptrequest');
Route::post('/editrequest','RequestController@editrequest');
Route::post('/confirmpayment','RequestController@confirmpayment');
Route::post('/confirmcompletepayment','RequestController@confirmcompletepayment');
Route::post('/confirmbitpayment','RequestController@confirmbitpayment');
Route::get('/orderscomplete','RequestController@orderscomplete');
Route::get('/finicialrequests','RequestController@finicialrequests');
Route::get('/nothing','RequestController@nothing');
Route::get('/notwhole','RequestController@notwhole');
Route::get('/whole','RequestController@whole');
Route::get('/notsure','RequestController@notsure');
Route::get('/makeinvoice','RequestController@makeinvoice');
Route::get('/viewcontracts','ContractController@viewcontracts');
Route::post('/newcontract','ContractController@newcontract');
Route::post('/signcontract','ContractController@signcontract');

Route::get('/kmk',function(){
$s = \Auth::user()->client;
return dd($s);
});
Route::get('/banks',function(){
	return view('admin.banks-account');
});
Route::get('/contactus',function(){
	return view('admin.contact-us');
});

Route::get('/orderspanels',function(){
	return view('admin.new-order-panels');
});
Route::get('/orderwrite',function(){
	return view('admin.new-order-write');
});
Route::get('/orderweb',function(){
	return view('admin.new-order-web');
});
Route::get('/ordersmartphones',function(){
	return view('admin.new-order-smartphones');
});
Route::get('/ordervideo',function(){
	return view('admin.new-order-video');
});
Route::get('/orderdesgin',function(){
	return view('admin.new-order-design');
});
Route::get('/orderelse',function(){
	return view('admin.new-order-else');
});
Route::get('/ordersbills','RequestController@ordersbills');
Route::get('/ordersinprogress','RequestController@ordersinprogress');
Route::get('/ordersinhold','RequestController@ordersinhold');
Route::get('/orderscanceld','RequestController@orderscanceld');
Route::get('/ordersinreview','RequestController@ordersinreview');
Route::post('/uploadcommentfile','RequestController@uploadcommentfile');
Route::post('/uploadreqfiles','RequestController@uploadreqfiles');
Route::post('/requestwritestore','RequestController@requestwritestore');
Route::post('/requestwebstore','RequestController@requestwebstore');
Route::post('/requestsmartphonestore','RequestController@requestsmartphonestore');
Route::post('/requestvideostore','RequestController@requestvideostore');
Route::post('/requestdesignstore','RequestController@requestdesignstore');
Route::post('/requestelsestore','RequestController@requestelsestore');
Route::post('/ajaxuserupdate','UserController@ajaxuserupdate');
Route::post('/uploadeditworkfile','WorkController@uploadeditworkfile');

Route::get('/home', 'HomeController@index');


	});
