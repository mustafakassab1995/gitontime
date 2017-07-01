<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       $data['users'] = \App\User::where('id','>',0)->orderBy('id','desc')->paginate(6);
       return view('admin.users',$data);
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
        $data['user'] = \App\User::findOrFail($id);
       return view('admin.profile',$data);
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
         $data['user'] = \App\User::findOrFail($id);
       return view('admin.profile-settings',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ajaxuserupdate(Request $request){
        try{
  
           $inc =  \App\User::where('id',$request->get('id'))->update( $request->except(['_token','role','salted']));

           $role = $request->get('role');
           if($role=="client"){
             \App\User::where('id',$request->get('id'))->update(['client'=>1,'admin'=>0,'employee'=>0,'control'=>0]);
           }
           if($role=="control"){
             \App\User::where('id',$request->get('id'))->update(['client'=>0,'admin'=>0,'employee'=>0,'control'=>1]);
           }
           if($role=="employee"){
             \App\User::where('id',$request->get('id'))->update(['client'=>0,'admin'=>0,'employee'=>1,'control'=>0 , 'salted'=>$request->get('salted')]);
           }
           if($role=="admin"){
             \App\User::where('id',$request->get('id'))->update(['client'=>0,'admin'=>1,'employee'=>0,'control'=>0]);
           }
            

}
    catch (Exception $e) {

return response()->json(['result'=>0]);

    }
$inc = \App\User::where('id',$request->get('id'))->first();
return response()->json(['result'=>1 , 'user'=>$inc]);
    }
    public function update(Request $request, $id)
    {
        //
        
  
           $inc =  \App\User::where('id',$id)->update( $request->except(['_token','_method']));
           return redirect()->route('User.show',$id);

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
        
           $inc =  \App\User::destroy( $id);

       

}
    catch (Exception $e) {

return response()->json(['result'=>0]);

    }

return response()->json(['result'=>1 ]);
    }
}
