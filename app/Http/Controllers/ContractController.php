<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContractController extends Controller
{
    //
    public function newcontract(Request $request){
if(\Auth::user()->admin==1){
    	 $g = \Cache::pull("file_".\Auth::user()->id);
                    if(empty($g)){
                   // return redirect()->route('viewcontracts');
    		return redirect('viewcontracts');
                      
                    }
                    else{
                        $data['file_id']= $g->id;
                    }

                    $data['user_id']=$request->get('user_id');
                    \App\Contract::create($data);}
    		return redirect('viewcontracts');
                   
    }
    public function viewcontracts(){

    	if(\Auth::user()->admin==1){
$data['users']=\App\User::all();

    		$data['contracts'] = \App\Contract::where('id','>',0)->with('file')->with('user')->orderBy('id','desc')->paginate(6);
    		return view('admin.mycontracts',$data);

    	}
    	else{
    		$data['contracts'] = \App\Contract::where('user_id','=',\Auth::user()->id)->with('file')->orderBy('id','desc')->paginate(6);
    		return view('admin.mycontracts',$data);
    	}
    }
    public function signcontract(Request $request){
    	$inc = \App\Contract::findOrFail($request->get('id'));
    	if(\Auth::user()->id == $inc->user_id){

    		\App\Contract::where('id',$inc->id)->update(['status'=>1]);
    		return redirect('viewcontracts');

    	}
    	else{
    		return redirect('viewcontracts');
    	}
    }
}
