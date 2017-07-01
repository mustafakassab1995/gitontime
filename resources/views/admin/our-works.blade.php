@extends('layouts.main')
@section('content')
    <main id="app-main" class="app-main">
        <div class="wrap">
            <section class="app-content">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 pull-right">
                        <div class="p-md clearfix widget-def widget-panels widget-users widget-financial widget-money widget-request widget-notes">
                            <div class="widget-header">
                                <h3>
                                    <i class="menu-icon zmdi zmdi-storage zmdi-hc-lg"></i>
                                    <span>جميع الاعمال</span>
                                </h3>
                                
                                @if(\Auth::user()->admin == 1 || \Auth::user()->control == 1)
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addwork">
                                    <i class="fa fa-plus"></i> إضافة عمل جديد
                                </button>
                                @endif
                                
                            </div>
                            <div class="widget-body" id="wokes">
                            @foreach($works as $work)
                                <div class="col-md-4 col-sm-6" id="workah{{$work->id}}">
                                    <div class="widget">
                                        <div class="widget-body p-h-lg">
                                            <div class="media">
                                                <div class="media-body">
                                                    <h4 class="media-heading">
                                                        <a id="worka{{$work->id}} " href="{{route('Work.show',$work->id)}}">{{$work->title}}</a>
                                                    </h4>
                                                    <span class="time">
                                                        <i class="zmdi zmdi-calendar-check"></i>
                                                        <b>{{$work->created_at->toDayDateTimeString()}}</b>
                                                    </span>
                                                    <span class="req-state empty"> {{$work->category->title}}</span>
                                                </div>
                                               <div class="media-notes">
                                               @if(\Auth::user()->admin==1||\Auth::user()->control==1)
                                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editwork{{$work->id}}">
                                            <span class="zmdi zmdi-edit"></span>
                                        </button>
                                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{$work->id}}">
                                            <span class="zmdi zmdi-delete"></span>
                                        </button>
                                        
                                    </div>
                                    @endif
                                                </div>
                                        </div>
                                    </div>
                                </div>
                             </div>
                             @endforeach
                                
                             
                            </div>
                            <!-- end widget-body -->
                        </div>
                        <!-- end widget -->
                        <div class="widget-navigation">
                            <ul class="pagination">
                                {{$works->links()}}
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="wrap p-t-0">
            <footer class="app-footer">
                <div class="clearfix">
                    <ul class="footer-menu pull-left">
                        <li><a href="javascript:void(0)">لينك</a></li>
                        <li><a href="javascript:void(0)">سياسة الاستخدام</a></li>
                        <li><a href="javascript:void(0)">أسئلة شائعة</a></li>
                    </ul>
                    <div class="copyright pull-right">جميع الحقوق محفوظة لدي شبكة اون تايم 2017 &copy;</div>
                </div>
            </footer>
        </div>
        @foreach($works as $work)
        <div class="modal fade" id="editwork{{$work->id}}" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">تعديل العمل</h4></div>
                <div class="modal-body">
                    <form action="#" id="updateworked">
                     {{csrf_field()}}
                    <input type="hidden" name="_method" value="put" />
                        <div class="form-group">
                                        <label for="exampleInputEmail1">عنوان العمل</label>
                                        <input type="text" class="form-control" id="title{{$work->id}}" name="title" value="{{$work->title}}">
                                    </div>
                        <div class="form-group">
                                        <label for="exampleInputEmail1">محتوي العمل</label>
                                        <textarea  name="content" id="content{{$work->id}}" cols="30" rows="5" class="form-control">
                                            {{$work->content}}
                                        </textarea>
                                    </div>
                        <div class="form-group">
                                        <label for="exampleInputEmail1">رابط العمل</label>
                                        <input type="text" class="form-control" name="work_url" id="work_url{{$work->id}}"  value="{{$work->work_url}}">
                                    </div>
                        <div class="form-group">
                             <label for="exampleInputEmail1">التصنيف</label>
                            <select id="category_id{{$work->id}}" name="category_id" class="form-control">
                            @foreach($categories as $category)
                            @if($category->id == $work->category->id)
                                <option value="{{$category->id}} " selected>{{$category->title}}</option>
                                @else
                                <option value="{{$category->id}} ">{{$category->title}}</option>
                                @endif
                              @endforeach  
                            </select>
                        </div>
                        </form>
                       <div class="form-group">
                             <label for="exampleInputEmail1">صورة مصغرة</label>
<input  name="file"  type="file" class="file-loading ll">
                        </div>
                        
                    
                </div>
                <div class="modal-footer">
                    
                    <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="javascript:updatework({{$work->id}});">حفظ التعديل</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
         <div class="modal fade" id="addwork" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">اضافة عمل جديد</h4></div>
                <div class="modal-body">
                    <form action="#" id="addworkk">
                    {{csrf_field()}}
                        <div class="form-group">
                                        <label for="exampleInputEmail1">عنوان العمل</label>
                                        <input type="text" class="form-control" name="title" >
                                    </div>
                        <div class="form-group">
                                        <label for="exampleInputEmail1">محتوي العمل</label>
                                        <textarea name="content"  cols="30" rows="5" class="form-control"></textarea>
                                    </div>
                        <div class="form-group">
                                        <label for="exampleInputEmail1">رابط العمل</label>
                                        <input type="text" name="work_url" placeholder="هذا الرابط فقط للفيديو" class="form-control"  >
                                    </div>
                        <div class="form-group">
                             <label for="exampleInputEmail1">التصنيف</label>
                            <select  name="category_id" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{$category->id}} ">{{$category->title}}</option>
                              @endforeach  
                            </select>
                        </div>
                        </form>
                        <div class="form-group">
                             <label for="exampleInputEmail1">صورة مصغرة</label>
<input id="ll" name="file" type="file"  class="file-loading ll">
                        </div>
                        
                    
                </div>
                <div class="modal-footer">
                    
                    <button type="button" data-dismiss="modal" class="btn btn-primary" onclick="javascript:addawork();">اضافة</button>
                </div>
            </div>
        </div>
    </div>
     @foreach($works as $work)
        <div id="deleteModal{{$work->id}}" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <form id="deleteworked">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="delete" />

                        <input type="hidden" name="id" value="{{$work->id}}">

                    </form>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">حذف العمل</h4></div>
                    <div class="modal-body">
                        <h5>هل انت متأكد من حذف هذا العمل ؟</h5></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal" 
                        onclick="javascript:deleteawork({{$work->id}});">حذف</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
            <div id="done" class="modal fade" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">تمت المهمة</h4></div>
                        <div class="modal-body">
                            <h5 class="btn  btn-success">تم التنفيذ بنجاح</h5></div>
                        <div class="modal-footer">
                            
                        </div>
                    </div>
                </div>
            </div>
            <div id="notdone" class="modal fade" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">حدث خطأ</h4></div>
                        <div class="modal-body">
                            <h5 class="btn  label-danger">لم تتم المهم بنجاح</h5></div>
                        <div class="modal-footer">
                            
                        </div>
                    </div>
                </div>
            </div>
    </main>
     <script>
        $(document).ready(function() { 
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

         $("#users").select2({
    placeholder: "اذا لم تختر أحد فسيكون عام للكل",
    allowClear: true,
     maximumSelectionSize: 1,
});
        

        $(".ll").fileinput({
        theme: "explorer",
        uploadUrl: "{{url('uploadcommentfile')}}",
        allowedFileExtensions: ['jpg', 'png', 'gif'],
        overwriteInitial: false,
        initialPreviewAsData: true,
        uploadExtraData : {_token: CSRF_TOKEN  },
    });
       
       
 });
    </script>
    <script type="text/javascript">
        
      $(document).ready(function(){
      
    });
      function addawork(){
        console.log("دخل00");
          $.ajax({
            url: "{{route('Work.store')}}",
           type: 'post',
          data: $("#addworkk").serialize(),
          dataType: 'JSON',
          success: function (data) {
            
             if(data['result']==1){
                var id = data['work']['id'];
                
               
               
                 $('#wokes').append('  <div class="col-md-4 col-sm-6" data-id="'+id+'">'+
                                    '<div class="widget">'+
                                        '<div class="widget-body p-h-lg">'+
                                            '<div class="media">'+
                                                '<div class="media-body">'+
                                                    '<h4 class="media-heading">'+
                                            '<a id="worka'+id+'" href="{{route("Work.index")}}/'+id+'">'+data['work']['title']+'</a>'+
                                                    '</h4>'+
                                                    '<span class="time">'+
                                                        '<i class="zmdi zmdi-calendar-check"></i>'+
                                                        '<b>'+data['work']['created_at']+'</b>'+
                                                    '</span>'+
                                '<span class="req-state empty">'+data['work']['category']['title']+
                                                '</div>'+
                                               '<div class="media-notes">'+
                                                    '<div class="btn-group" role="group">'+
                                                  
                                    '</div>'+
                                                '</div>'+
                                        '</div>'+
                                 '   </div>'+
                                '</div>'+
                                '</div>');
              
                $('#done').modal('toggle');
             }
             else{
                $('#notdone').modal('toggle');
                

             }
           },
           error : function (data) {
             
                $('#notdone').modal('toggle');
              
           }
});
      }
         function deleteawork(id){
     
                console.log("دخل");
        var id = id ;
            $.ajax({
            url: "{{route('Work.index')}}/"+id,
           type: 'DELETE',
          data: $("#deleteworked").serialize(),
          dataType: 'JSON',
          success: function (data) {
            
             if(data['result']==1){
                
              console.log(id);
           
                $("#workah"+id).remove();
                
                $('#done').modal('toggle');
             }
             else{
                $('#notdone').modal('toggle');
                

             }
           },
           error : function (data) {
             
                $('#notdone').modal('toggle');
              
           }
});
         }
               function updatework(id){
     
                console.log("دخل");
        var id = id ;
            $.ajax({
            url: "{{route('Work.index')}}/"+id,
           type: 'PUT',
          data: $("#updateworked").serialize(),
          dataType: 'JSON',
          success: function (data) {
            
             if(data['result']==1){
                var id = data['work']['id'];
              
           
                 $('#title'+id).val(data['work']['title']);
                 $('#content'+id).val(data['work']['content']);
                 $('#category_id'+id).val(data['work']['category_id']);
                 $('#work_url'+id).val(data['work']['work_url']);
                 $('#worka'+id).text(data['work']['title']);
                $('#done').modal('toggle');
             }
             else{
                $('#notdone').modal('toggle');
                

             }
           },
           error : function (data) {
             
                $('#notdone').modal('toggle');
              
           }
});
         }
          


    </script>
    @endsection