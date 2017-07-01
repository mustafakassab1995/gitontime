<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(\Auth::user()->admin == 1){
         
          $data['notes']=\App\Note::where('id','>',0)->orderBy('id', 'decs')->paginate(6); 
        }
        else if(\Auth::user()->employee == 1){
          $data['notes']= \App\Note::where('user_id',\Auth::user()->id)->orWhere('all_members','=',1)->orderBy('id','desc')->paginate(6); 
          
        }
        $data['users']=\App\User::where('admin',1)->orWhere('employee',1)->orderBy('id','desc')->get();
        return view('admin.notes',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
         try{
  if(empty($request->get('user_id')))
           $inc =  \App\Note::create( $request->except(['_token']));
       else{
        $jaha = $request->except(['_token']);
        $jaha['all_members'] = 1;
           $inc =  \App\Note::create( $jaha);

       }

}
    catch (Exception $e) {

return response()->json(['result'=>0]);

    }
$inc = \App\Note::where('id',$inc->id)->first();
return response()->json(['result'=>1 , 'note'=>$inc]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

         if(\Auth::user()->admin == 1){
         
          $data['note']=\App\Note::where('id',$id)->first(); 
        }
        else if(\Auth::user()->employee == 1){
          $data['note']= \App\Note::where('user_id',\Auth::user()->id)->where('id',$id)->first(); 
          
        }
        else{
            abort(404);
        }
        if(empty(($data['note'])))
        abort(404);
        else
        return view('admin.note-in',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
            try{
  
           $inc =  \App\Note::where('id',$id)->update( $request->except(['_token','_method']));
}
    catch (Exception $e) {

return response()->json(['result'=>0]);

    }
$inc = \App\Note::where('id',$id)->first();
return response()->json(['result'=>1 , 'note'=>$inc]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try{
        
           $inc =  \App\Note::destroy( $id);

       

}
    catch (Exception $e) {

return response()->json(['result'=>0]);

    }

return response()->json(['result'=>1 ]);
    }





}
