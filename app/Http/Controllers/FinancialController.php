<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FinancialController extends Controller
{
    //
	public static $t = [];
    public function financialremittance(Request $request){
      if(\Auth::user()->admin == 1){
        $data['all']= \App\Remittance::where('status','!=',3)->with('request')->with('user')->orderBy('id','desc')->paginate(6);
        $data['notconfirmed']= \App\Remittance::where('status','=',0)->with('request')->with('user')->orderBy('id','desc')->paginate(6);
        $data['confirmed']= \App\Remittance::where('status','=',1)->with('request')->with('user')->orderBy('id','desc')->paginate(6);
        }
        else{
          abort(404);
        }
         if ($request->ajax()) {
            return response()->json(view('admin.finall',$data)->render());
        }
        return view('admin.financial' ,$data);
    }

    public function notconfirmed(Request $request){
      if(\Auth::user()->admin == 1){
        $data['notconfirmed']= \App\Remittance::where('status','=',0)->with('request')->with('user')->orderBy('id','desc')->paginate(6);
        }
        else{
          abort(404);
        }
         if ($request->ajax()) {
            return response()->json(view('admin.notconfirmed',$data)->render());
        }
    }
     public function confirmed(Request $request){
      if(\Auth::user()->admin == 1){
        $data['confirmed']= \App\Remittance::where('status','=',1)->with('request')->with('user')->orderBy('id','desc')->paginate(6);
        }
        else{
          abort(404);
        }
         if ($request->ajax()) {
            return response()->json(view('admin.confirmed',$data)->render());
        }
    }
    public function balance(Request $request){
      $total = 0;
      $nottaken = 0;
      $notin = [];
      $data['totaldebts'] = 0 ;
      $data['totalcred'] = 0 ;
      $data['done'] = \App\Emppayment::where('user_id','=',\Auth::user()->id)->with('request')->orderBy('id','desc')->get();
      if(!empty($data['done'])){
        foreach ($data['done'] as $d ) {
          
      $total = $total+  $d->price;
            
        $notin[] = $d->request_id;
      }}
      $data['emprequests'] = \App\Request::where('employee_id',\Auth::user()->id)->whereNotIn('id',$notin)->where('status','=','4')->get(); 
      if(!empty($data['emprequests'])){
        foreach ($data['emprequests'] as $d ) {
          if($d->user_id==10)
      $nottaken = $nottaken+  $d->price;
            else
      $nottaken = $nottaken+  $d->price_employee;
      }
      }
      $debts = \App\Debt::where('debtor_id',\Auth::user()->id)->get();
       if(!empty($debts)){
        foreach ($debts as $d ) {
      $data['totaldebts'] = $data['totaldebts'] +  $d->amount;
      }
      }
      $debts = \App\Debt::where('creditor_id',\Auth::user()->id)->get();
       if(!empty($debts)){
        foreach ($debts as $d ) {
      $data['totalcred'] = $data['totalcred'] +  $d->amount;
      }
      }
      // $nottaken = $total - $nottaken ;
      $data['nottaken'] = $nottaken;
      $data['total']= $total;

      return view('admin.employee-balance',$data);
      
    }

     public function showremittance(Request $request){
      if(\Auth::user()->admin == 1){
        $data['rem']= \App\Remittance::where('id','=',$request->get('id'))->with('request')->with('user')->first();
        
        }
        else{
          abort(404);
        }
        
        return view('admin.financialin' ,$data);
    }
    public function acceptpayment(Request $request){
      try{
      	if($request->get('status') == 1){


         \App\Remittance::where('id','=',$request->get('id'))->update(['status'=>1]);
         $inc = \App\Remittance::where('id','=',$request->get('id'))->first();
         \App\Request::where('id','=',$inc->request_id)->update(['payment_status'=>1]);
         return response()->json(['result'=>1]);

     }
    else if($request->get('status') == 2){


         \App\Remittance::where('id','=',$request->get('id'))->update(['status'=>1]);
         $inc = \App\Remittance::where('id','=',$request->get('id'))->first();
         \App\Request::where('id','=',$inc->request_id)->update(['payment_status'=>2]);
         return response()->json(['result'=>2]);
     }
     else if($request->get('status') == 3){


         \App\Remittance::where('id','=',$request->get('id'))->update(['status'=>3]);
         $inc = \App\Remittance::where('id','=',$request->get('id'))->first();
         \App\Request::where('id','=',$inc->request_id)->update(['payment_status'=>0]);

         return response()->json(['result'=>3]);

     }
      }
        catch(Exception $e){
         return response()->json(['result'=>0]);


        }
        
          
        
        return view('admin.financialin' ,$data);
    }
     public function employeepayments(Request $request){
        $data['payments']= \App\Emppayment::where('id','>',0)->with('request')->with('user')->orderBy('id','desc')->paginate(6);
     
        
          if($request->ajax()){
            return response()->json(view('admin.payments',$data)->render());

          }
        
        return view('admin.financial-admin' ,$data);
    }
     public function employeepaymentstatus(Request $request){
        $data['allpayments']= \App\Request::where('payment_status','=',1)->with('employee')->orderBy('id','desc')->paginate(6);
       
        $data['donepayments']= \App\Emppayment::where('id','>',0)->with('user')->with('request')->orderBy('id','desc')->paginate(6);
        $cf = \App\Emppayment::where('id','>',0)->with('user')->with('request')->orderBy('id','desc')->get();
        $h=[];
        foreach ($cf as $x ) {
        	$h[] = $x->request_id;

        }

        $data['notdonepayments']= \App\Request::whereNotIn('id',$h)->with('employee')->orderBy('id','desc')->paginate(6);
        $hk= \App\Request::whereNotIn('id',$h)->with('employee')->orderBy('id','desc')->get();

        $data['cos'] = $hk;
       
     
        
          if($request->ajax()){
            return response()->json(view('admin.allpayments',$data)->render());

          }
        
        return view('admin.financial-employers' ,$data);
    }
         public function salaryemp(Request $request){
        $data['users'] = \App\User::where('employee',1)->get();
        $data['salaries'] = \App\Salary::where('id','>',0)->with('user')->paginate(6);
        
        return view('admin.financial-money' ,$data);

    }
     public function donepayments(Request $request){
       
        $data['donepayments']= \App\Emppayment::where('id','>',0)->with('user')->with('request')->orderBy('id','desc')->paginate(6);
        
       
     
        
          if($request->ajax()){
            return response()->json(view('admin.donepayments',$data)->render());

          }
        
    }
     public function notdonepayments(Request $request){
       
        $data['donepayments']= \App\Emppayment::where('id','>',0)->with('user')->with('request')->orderBy('id','desc')->get();
        $h=[];
        foreach ($data['donepayments'] as $x ) {
        	$h[] = $x->request_id;

        }

        $data['notdonepayments']= \App\Request::whereNotIn('id',$h)->with('employee')->orderBy('id','desc')->paginate(6);

       
     
        
          if($request->ajax()){
            return response()->json(view('admin.notdonepayments',$data)->render());

          }
        
    }
    public function addemppayment(Request $request){
    	$inc = \App\Remittance::where('transaction_number',$request->get('transaction_number'))->first();
    	if(empty($inc)){
    		return response()->json(['result'=>0]);
    	}
    	else{
    		\App\Emppayment::create($request->except(['_token','transaction_number']));
    		return response()->json(['result'=>1]);
    	}
    		return response()->json(['result'=>0]);

    }
    public function addsalary(Request $request){
    	try{
    	\App\Salary::create($request->except(['_token']));
    	return response()->json(['result'=>1]);
    }catch(Exception $e){
    	return response()->json(['result'=>0]);

    }

    }
      public function debts(Request $request){
        if(\Auth::user()->admin==1)
    	 $data['debts'] = \App\Debt::where('id','>',0)->with('debtor')->with('creditor')->orderBy('id','desc')->paginate(6);
      else
       $data['debts'] = \App\Debt::where('creditor_id','=',\Auth::user()->id)->orWhere('debtor_id',\Auth::user()->id)->with('debtor')->with('creditor')->orderBy('id','desc')->paginate(6);
        $data['users'] = \App\User::all();
        return view('admin.financial-debt' ,$data);

    }
   
     public function adddebt(Request $request){
    	try{
    	\App\Debt::create($request->except(['_token']));
    	return response()->json(['result'=>1]);
    }catch(Exception $e){
    	return response()->json(['result'=>0]);

    }

    }
    public function editdebt(Request $request){
      try{
      \App\Debt::where('id',$request->get('id'))->update($request->except(['_token']));
      return response()->json(['result'=>1]);
    }catch(Exception $e){
      return response()->json(['result'=>0]);

    }

    }
      public function deletedebt(Request $request){
      try{
      \App\Debt::where('id',$request->get('id'))->delete();
      return response()->json(['result'=>1]);
    }catch(Exception $e){
      return response()->json(['result'=>0]);

    }

    }
    public function coupons(Request $request){
        if(\Auth::user()->admin==1){
       $data['coupons'] = \App\Coupon::where('id','>',0)->with('user')->with('request')->orderBy('id','desc')->paginate(6);
     $data['users'] = \App\User::where('client','=',1)->get();
     $data['requests'] = \App\Request::all();

   }
      else
       $data['coupons'] = \App\Coupon::where('user_id','=',\Auth::user()->id)->with('user')->with('request')->paginate(6);

        
        return view('admin.coupons-manage' ,$data);

    }
     public function addcoupon(Request $request){
      try{
        $offer= $request->get('offer');
      if($offer>1){
        $offer = $offer/100;
        $request->merge(['offer' => $offer]);
      }
      $inc = \App\Coupon::create($request->except(['_token']));
      $offer= $inc->offer;
      
      $r = \App\Request::where('id',$inc->request_id)->first();
      $newprice = $r->price - ($r->price*$offer);
      // $newpriceemp = $newprice - ($newprice*0.20);
      \App\Request::where('id',$request->get('request_id'))->update(['price'=>$newprice]);
      return response()->json(['result'=>1]);
    }catch(Exception $e){
      return response()->json(['result'=>0]);

    }

    }
    public function editcoupon(Request $request){
      try{
      \App\Coupon::where('id',$request->get('id'))->update($request->except(['_token']));
      return response()->json(['result'=>1]);
    }catch(Exception $e){
      return response()->json(['result'=>0]);

    }

    }
      public function deletecoupon(Request $request){
      try{
      \App\Coupon::where('id',$request->get('id'))->delete();
      return response()->json(['result'=>1]);
    }catch(Exception $e){
      return response()->json(['result'=>0]);

    }

    }
}
