<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatController extends Controller
{
    //
    public function getmgroups(){
    	$data['groups'] = \App\Messagesgroups::where('userone_id',\Auth::user()->id)->orWhere('usertwo_id',\Auth::user()->id)->with('userone')->with('usertwo')->get();
    	$x="";
    	foreach ($data['groups'] as $d ) {
    		$x = $d->id;
    		break;
    	}
    	$data['msgs'] = \App\Message::where('gr_id',$x)->with('rcv')->with('sender')->get();

    	return view('admin.inbox',$data);
    }
    public function getmgs(Request $request){
         \App\Message::where('gr_id',$request->get('gr_id'))->update(['seen'=>1]);
    	$inc = \App\Messagesgroups::where('id',$request->get('gr_id'))->first();
        $rcv_id="";
        if($inc->userone_id == \Auth::user()->id){
            $jaha['rcv_id']=$inc->usertwo_id;
            $jaha['sender_id']=$inc->userone_id;
        }
        if($inc->usertwo_id == \Auth::user()->id){
            $jaha['rcv_id']=$inc->userone_id;
            $jaha['sender_id']=$inc->usertwo_id;
        }
    	$data['msgs'] = \App\Message::where('gr_id',$request->get('gr_id'))->orderBy('id','asc')->with('file')->with('rcv')->with('sender')->get();
        $jaha['user'] = \App\User::where('id',$jaha['rcv_id'])->first(); 
    	if($request->ajax()){
            return response()->json(['data'=>view('admin.msgs',$data)->render(),'jaha'=>$jaha]);

          }
    	
    }
    public function sendamsg(Request $request){
    	try{
           
             $g = \Cache::pull("file_".\Auth::user()->id);

                    if(empty($g)){
                        $data['file_id']= null;
                    }
                    else{

                    $f['file_id']=$g->id;
                    
                    }

                    $f['rcv_id']=$request->get('rcv_id');
                    $f['sender_id']=$request->get('sender_id');
                    $f['message']=$request->get('message');
                    $f['gr_id']=$request->get('gr_id');
                    

        $inc = \App\Message::create($f);
    	$h = \App\Message::where('id',$inc->id)->with('sender')->first();
         $t['url'] = url('getmgroups');
             $t['id'] = $h->id."msg";
             $t['e'] = $h;
             $t['msg'] = "وصلت رسالة جديدة";
               \Notification::send(\App\User::find($h->rcv_id), new \App\Notifications\NewMessage($t));

    	if($request->ajax()){
            
            return response()->json(['result'=>1 , 'msg'=>$inc , 'file'=>$g ]);

            
          }
      }catch(Exception $e){
            return response()->json(['result'=>0  ]);

      }

    }
     public function makeanewgroup(Request $request){
      try{
           
            
                    

                    $f['rcv_id']=$request->get('rcv_id');
                    $f['sender_id']=$request->get('sender_id');
                    $f['message']=$request->get('message');
                    $data['userone_id']=$request->get('sender_id');
                    $data['usertwo_id']=$request->get('rcv_id');
                    $incg = \App\Messagesgroups::create($data);
                    $f['gr_id']=$incg->id;

        $inc = \App\Message::create($f);
      $h = \App\Message::where('id',$inc->id)->with('sender')->first();
         $t['url'] = url('getmgroups');
             $t['id'] = $h->id."msg";
             $t['e'] = $h;
             $t['msg'] = "وصلت رسالة جديدة";
               \Notification::send(\App\User::find($h->rcv_id), new \App\Notifications\NewMessage($t));

     
      }catch(Exception $e){
            return redirect()->json(['result'=>0  ]);

      }
      return redirect('getmgroups');

    }
      public function getnewgroupmsgs(Request $request){
    	try{
    	$inc = \App\Message::where('gr_id',$request->get('gr_id'))->where('rcv_id',\Auth::user()->id)->where('seen',0)->get();
    	\App\Message::where('gr_id',$request->get('gr_id'))->where('rcv_id',\Auth::user()->id)->where('seen',0)->update(['seen'=>1]);

    	if($request->ajax()){
            return response()->json(['result'=>1 , 'msgs'=>$inc ]);

          }
      }catch(Exception $e){
            return response()->json(['result'=>0  ]);

      }

    }

}
