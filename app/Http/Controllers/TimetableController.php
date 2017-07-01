<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TimetableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $data['times'] = \App\Timetable::where('id','>',0)->orderBy('id','decs')->get();

        return view('admin.timetable',$data);
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
  
           $inc =  \App\Timetable::create( $request->except(['_token']));
       

}
    catch (Exception $e) {

return response()->json(['result'=>0]);

    }
$inc = \App\Timetable::where('id',$inc->id)->first();
return response()->json(['result'=>1 , 'time'=>$inc]);

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
          $data['time'] = \App\Timetable::where('id','=',$id)->first();

        return view('admin.time-in',$data);
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
  
           $inc =  \App\Timetable::where('id',$id)->update( $request->except(['_token','_method']));
}
    catch (Exception $e) {

return response()->json(['result'=>0]);

    }
$inc = \App\Timetable::where('id',$id)->first();
return response()->json(['result'=>1 , 'time'=>$inc]);
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

        
           $inc =  \App\Timetable::destroy( $id);

       return redirect()->route('Timetable.index');

    }
}
