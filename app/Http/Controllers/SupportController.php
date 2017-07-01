<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupportController extends Controller
{
    //
    public function openaticket(Request $request){

    	$gr['topic'] = $request->get('topic');
    	$gr['user_id'] = \Auth::user()->id;
 	$inc = \App\Messagesgroupsupports::create($gr);

 	$entry['user_id']=\Auth::user()->id;
 	$entry['message']=$request->get('message');
 	$entry['gr_id']=$inc->id;
 	\App\Messagesupports::create($entry);
 		return response()->json(['result'=>1 ]);
    }
    public function replyaticket(Request $request){

 $id = $request->get('gr_id');
 	$entry['user_id']=\Auth::user()->id;
 	$entry['message']=$request->get('message');
 	$entry['gr_id']=$request->get('gr_id');
 	\App\Messagesupports::create($entry);
 		return response()->json(['result'=>1 ]);
			

		
    }
    public function closeaticket(Request $request){
 $id = $request->get('id');

    	\App\Messagesgroupsupports::where('id',$id)->update(['status'=>0]);
 		return response()->json(['result'=>1 ]);

    }
    public function deleteareply(Request $request){
 $id = $request->get('id');

    	\App\Messagesupports::where('id',$id)->delete();
 		return response()->json(['result'=>1 ]);

    }
}
