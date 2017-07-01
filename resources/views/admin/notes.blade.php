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
                                    <span>جميع الملاحظات</span>
                                </h3>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addnoteModal">
                                    <i class="fa fa-plus"></i> إضافة ملاحظة جديدة
                                </button>
                            </div>
                            <div class="widget-body" id="noteos">
                            @foreach($notes as $note)
                                <div class="col-md-4 col-sm-6 notah"  data-id="{{$note->id}}">
                                    <div class="widget">
                                        <div class="widget-body p-h-lg">
                                            <div class="media">
                                                <div class="media-body">
                                                    <h4 class="media-heading">
                                                        <a id="notea{{$note->id}}" href="{{route('Note.show',$note->id)}}">{{$note->title}}</a>
                                                    </h4>
                                                    <span class="time">
                                                        <i class="zmdi zmdi-calendar-check"></i>
                                                        <b>{{$note->created_at->toDayDateTimeString()}}</b>
                                                    </span>
                                                    <span class="req-state empty">{{$note->all_members == 1 ? 'لجميع الموظفين' : 'خاصة'}}</span>
                                                </div>
                                               <div class="media-notes">
                                                    <div class="btn-group" role="group">
                                                    @if(\Auth::user()->admin == 1 || \Auth::user()->id == $note->creater_id)
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editnoteModal{{$note->id}}">
                                            <span class="zmdi zmdi-edit"></span>
                                        </button>
                                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{$note->id}}">
                                            <span class="zmdi zmdi-delete"></span>
                                        </button>@endif
                                        
                                    </div>
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
                           {{$notes->links()}}
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
        @foreach($notes as $note)
        <div class="modal fade" id="editnoteModal{{$note->id}}" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">تعديل الملاحظة</h4></div>
                <div class="modal-body">
                    <form action="javascript:updatenote({{$note->id}});" id="updatenoted" >
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="put" />
                        <div class="form-group">
                                        <label for="exampleInputEmail1">عنوان الملاحظة</label>
                                        <input type="text" name="title" class="form-control" id="title{{$note->id}}" value="{{$note->title}}">
                                    </div>
                        <div class="form-group">
                                        <label for="exampleInputEmail1">محتوي الملاحظة</label>
                                        <textarea name="content" name="content" id="content{{$note->id}}" cols="30" rows="5" class="form-control">{{$note->content}}</textarea>
                                    </div>
                        
                    
                </div>
                <div class="modal-footer">
                    
                    <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="javascript:updatenote({{$note->id}});">حفظ التعديل</button></form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
        <div class="modal fade" id="addnoteModal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">إضافة ملاحظة جديدة</h4></div>
                <div class="modal-body">
                   <form action="javascript:addanote();" id="addnoted" >
                    {{csrf_field()}}
                    
                        <div class="form-group">
                                        <label for="exampleInputEmail1">المتلقي</label>
                                         <select class="form-control" name="user_id" id="users">
                                         <option value="">الجميع</option>
                                           @foreach($users as $user)
                                           <option value="{{$user->id}}">{{$user->full_name}} </option>
                                           @endforeach
    </select>
                                    </div>
                                    <input type="hidden" name="all_members" value="0">
                                    <input type="hidden" name="creater_id" value="{{\Auth::user()->id}}">
                        <div class="form-group">
                                        <label for="exampleInputEmail1">عنوان الملاحظة</label>
                                        <input type="text" name="title" class="form-control" id="exampleInputEmail1" value="ملاحظة مهمة">
                                    </div>
                        <div class="form-group">
                                        <label for="exampleInputEmail1">محتوي الملاحظة</label>
                                        <textarea name="content"  cols="30" rows="5" class="form-control"></textarea>
                                    </div>
                        
                    
                </div>
                <div class="modal-footer">
                    
                    <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="javascript:addanote();">حفظ</button></form>
                </div>
            </div>
        </div>
    </div>
    @foreach($notes as $note)
        <div id="deleteModal{{$note->id}}" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <form id="deletenoted">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="delete" />

                        <input type="hidden" name="id" value="{{$note->id}}">

                    </form>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">حذف الملاحظة</h4></div>
                    <div class="modal-body">
                        <h5>هل انت متأكد من حذف هذه الملاحظة ؟</h5></div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger" data-dismiss="modal" 
                        onclick="javascript:deleteanote({{$note->id}});">حذف</button>
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
        $(document).ready(function() {  $("#users").select2({
    placeholder: "اذا لم تختر أحد فسيكون عام للكل",
    allowClear: true,
     maximumSelectionSize: 1,
});
 });
    </script>
    <script type="text/javascript">
        
      $(document).ready(function(){
      
    });
      function addanote(){
        console.log("دخل00");
          $.ajax({
            url: "{{route('Note.store')}}",
           type: 'post',
          data: $("#addnoted").serialize(),
          dataType: 'JSON',
          success: function (data) {
            
             if(data['result']==1){
                var id = data['note']['id'];
                var am = "لجميع الموظفين";
                var editbutton = "";
                if(data['note']['creater_id']=={{\Auth::user()->id}}){
                    editbutton =   '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editnoteModal'
                    +id+'">'+
                                            '<span class="zmdi zmdi-edit"></span>'+
                                       '</button>'+
                                         '<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal'+id+'">'+
                                            '<span class="zmdi zmdi-delete"></span>'+
                                        '</button>';
                }
                 if({{\Auth::user()->admin}} == 1){
                    editbutton =   '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editnoteModal'
                    +id+'">'+
                                            '<span class="zmdi zmdi-edit"></span>'+
                                       '</button>'+
                                         '<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal'+id+'">'+
                                            '<span class="zmdi zmdi-delete"></span>'+
                                        '</button>';
                }
                if(data['note']['all_members']==0){
            am = "خاصة";
                    
                }
                 $('#noteos').append('  <div class="col-md-4 col-sm-6" data-id="'+id+'">'+
                                    '<div class="widget">'+
                                        '<div class="widget-body p-h-lg">'+
                                            '<div class="media">'+
                                                '<div class="media-body">'+
                                                    '<h4 class="media-heading">'+
                                            '<a id="notea'+id+'" href="{{route("Note.index")}}/'+id+'">'+data['note']['title']+'</a>'+
                                                    '</h4>'+
                                                    '<span class="time">'+
                                                        '<i class="zmdi zmdi-calendar-check"></i>'+
                                                        '<b>'+data['note']['created_at']+'</b>'+
                                                    '</span>'+
                                '<span class="req-state empty">'+am+
                                                '</div>'+
                                               '<div class="media-notes">'+
                                                    '<div class="btn-group" role="group">'+
                                                    +editbutton+
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
         function deleteanote(id){
     
                console.log("دخل");
        var id = id ;
            $.ajax({
            url: "{{route('Note.index')}}/"+id,
           type: 'DELETE',
          data: $("#deletenoted").serialize(),
          dataType: 'JSON',
          success: function (data) {
            
             if(data['result']==1){
                
              console.log(id);
           
                $('.notah[data-id="'+id+'"]').remove();
                
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
               function updatenote(id){
     
                console.log("دخل");
        var id = id ;
            $.ajax({
            url: "{{route('Note.index')}}/"+id,
           type: 'PUT',
          data: $("#updatenoted").serialize(),
          dataType: 'JSON',
          success: function (data) {
            
             if(data['result']==1){
                var id = data['note']['id'];
              
           
                 $('#title'+id).val(data['note']['title']);
                 $('#content'+id).val(data['note']['content']);
                 $('#notea'+id).text(data['note']['title']);
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