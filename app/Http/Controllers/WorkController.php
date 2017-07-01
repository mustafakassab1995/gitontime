<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function uploadeditworkfile(Request $request){

        $photolink = time().'.'.$request->file('file')->getClientOriginalExtension();
                    $request->file('file')->move(public_path('images'), $photolink);
                    $photolink = asset('images/'.$photolink);
                    $data['photolink'] = $photolink;
return response()->json(['result'=>1]);

    }
    public function index()
    {
        //
          $data['works']=\App\Work::where('id','>',0)->with('category')->orderBy('id', 'decs')->paginate(6); 
          $data['categories']=\App\Category::all(); 
          return view('admin.our-works',$data);
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
  $data['title']= $request->get('title');
  $data['content']= $request->get('content');
  $data['category_id']= $request->get('category_id');
  $data['user_id']= \Auth::user()->id;
   $g = \Cache::pull("file_".\Auth::user()->id);
                    if(empty($g)){
                        $data['image_id']= null;
                    }
                    else{
                        $data['image_id']= $g->id;
                    }
  $data['work_url']= $request->get('work_url');
           $inc =  \App\Work::create( $data);
}
    catch (Exception $e) {

return response()->json(['result'=>0]);

    }
$inc = \App\Work::where('id',$inc->id)->with('category')->first();
return response()->json(['result'=>1 , 'work'=>$inc]);
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
        $data['work'] = \App\Work::where('id',$id)->with('image')->first();
          return view('admin.work-view',$data);

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
  $data['title']= $request->get('title');
  $data['content']= $request->get('content');
  $data['category_id']= $request->get('category_id');
  $data['user_id']= \Auth::user()->id;
   $g = \Cache::pull("file_".\Auth::user()->id);
                    if(empty($g)){
                        $data['image_id']= null;
                    }
                    else{
                        $data['image_id']= $g->id;
                    }
  $data['work_url']= $request->get('work_url');
           $inc =  \App\Work::where('id',$id)->update( $data);
}
    catch (Exception $e) {

return response()->json(['result'=>0]);

    }
$inc = \App\Work::where('id',$id)->first();
return response()->json(['result'=>1 , 'work'=>$inc]);
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
        
           $inc =  \App\Work::destroy( $id);

       

}
    catch (Exception $e) {

return response()->json(['result'=>0]);

    }

return response()->json(['result'=>1 ]);
    }
}
