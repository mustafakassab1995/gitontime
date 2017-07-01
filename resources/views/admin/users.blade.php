@extends('layouts.main')
@section('content')
    <main id="app-main" class="app-main">
        <div class="wrap">
            <section class="app-content">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 pull-right">
                        <div class="p-md clearfix widget-def widget-panels widget-users">
                            <div class="widget-header">
                                <h3>
                                    <i class="menu-icon zmdi zmdi-accounts zmdi-hc-lg"></i>
                                    <span>جميع المستخدمين</span>
                                </h3>
                            </div>
                            <div class="widget-search">
                                <form>
                                    <div class="form-group">
                                    <input type="search" placeholder="ابحث عن المستخدم بالاسم .." class="form-control">
                                </div>
                                </form>
                            </div>
                            <div class="widget-body">
                            @foreach($users as $user)
                                <div class="col-md-4 col-sm-6 userpon" data-id="{{$user->id}}">
                                    <div class="widget">
                                        <div class="widget-body p-h-lg">
                                            <div class="media">
                                                <div class="media-left">
                                                    <div class="avatar avatar-lg avatar-circle"><img class="img-responsive" 
                                                    src="
                                                     {{ $user->avatar}}
                                                      " alt="avatar"></div>
                                                </div>
                                                <div class="media-body">
                                                    <h4 class="media-heading">
                                                        
                                                        <a id="name" href="{{route('User.show',$user->id)}}">{{$user->full_name}}</a>
                                                    </h4>
                                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal{{$user->id}}">
                                            <span class="zmdi zmdi-edit"></span>
                                        </button>
                                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{$user->id}}">
                                            <span class="zmdi zmdi-delete"></span>
                                        </button>
                                        
                                    </div>
                                                    <small id="email" class="media-meta media-mail">{{$user->email}}</small>
                                                    <small class="media-meta text-success">@if($user->admin == 1) إدارة
                                                    @elseif($user->employee == 1)موظف
                                                    @elseif($user->control == 1)تسويق
                                                    @elseif($user->client == 1)عميل
                                                    @endif
                                                    </small></div>
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
                               {{$users->links()}}
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
        @foreach($users as $user)
        <div class="modal fade" id="editModal{{$user->id}}" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">تعديل بيانات العضو</h4></div>
                <div class="modal-body">
                    <form  id="updateusered_{{$user->id}}">
                     {{csrf_field()}}
                    <input type="hidden" name="id" value="{{$user->id}}" />
                        <h4 class="m-b-md">معلومات شخصية</h4>
                        <div class="form-group">
                                        <label for="exampleInputEmail1">الاسم بالكامل</label>
                                        <input type="text" name="full_name" class="form-control" id="exampleInputEmail1" value="{{$user->full_name}}">
                                    </div>
                        <div class="form-group">
                                        <label for="exampleInputEmail1">الوظيفة</label>
                                        <input type="text" name="title" class="form-control" id="exampleInputEmail1" value="{{$user->title}}">
                                    </div>
                        <div class="form-group">
                                        <label for="exampleInputEmail1">البريد الالكتروني</label>
                                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="{{$user->email}}">
                                    </div>
                        <div class="form-group">
                                        <label for="exampleInputEmail1">معلومات عنك</label>
                                        <textarea name="bio" id="mail_body_field" cols="30" rows="5" class="form-control"> {{$user->bio}}</textarea>
                                    </div>
                        <h4 class="m-b-md">صلاحيات المستخدم</h4>
                        <div class="form-group">
                                        <label for="exampleInputEmail1">الصلاحيات</label>
                                        <select name="role" onchange="addemp({{$user->id}});"  class="form-control">
                                <option value="control" @if($user->control==1) selected @endif >مسوق</option>
                                            <option value="employee" @if($user->employee==1) selected @endif >موظف</option>
                                            <option value="client" @if($user->client==1) selected @endif >عميل</option>
                                            <option value="admin" @if($user->admin==1) selected @endif >إدارة</option>
                            </select>

                                    </div>
                                    <div class="form-group emp_type" style="@if($user->employee==1) @else display: none;@endif">
                                        <label for="exampleInputEmail1">نوع الموظف</label>
                                        <select  onchange="salary({{$user->id}});"  class="form-control emp_types">
                                <option value="1"  >بالقطعة</option>
                                <option value="0"  @if($user->salted && $user->salted > 0) selected @endif>راتب</option>
                            </select>
                            </div>
                                    <div class="form-group salted" style="@if($user->salted && $user->salted > 0) @else display: none;@endif">
                                        <label for="exampleInputEmail1">الراتب بالدولار</label>
                                        <input name="salted" type="text" class="form-control" value="@if($user->salted && $user->salted > 0){{$user->salted}}@endif" >
                                

                                    </div>
                      
                        
                    </form>
                </div>
                <div class="modal-footer">
                    
                    <button type="button" data-dismiss="modal" class="btn btn-primary" onclick="javascript:updateauser({{$user->id}});">حفظ التعديل</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @foreach($users as $user)
        <div id="deleteModal{{$user->id}}" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">حذف المستخدم</h4></div>
                    <div class="modal-body">
                        <h5>هل انت متأكد من حذف هذا المستخدم ؟</h5></div>
                    <div class="modal-footer">
                    <form id="deleteuser">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="delete" />

                        <input type="hidden" name="id" value="{{$user->id}}">

                    </form>
                        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="javascript:deleteauser({{$user->id}});">حذف</button>
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

    <script type="text/javascript">
      
      function addemp(id){
       var xo =  $('#updateusered_'+id).find('select[name=role]').val();

        if(xo=="employee"){
        $('#updateusered_'+id).find('.emp_type').css('display','');}
        else{
            $('#updateusered_'+id).find('.emp_type').remove();
             $('#updateusered_'+id).find('.salted').remove();
        }
      }  
      function salary(id){
       var cvf =  $('#updateusered_'+id).find('.emp_types').val();
       console.log(cvf);
        if(cvf=="0"){
        $('#updateusered_'+id).find('.salted').css('display','');}
        else{
             $('#updateusered_'+id).find('.salted').remove();
            
        }
      }

    function deleteauser(id){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        var id = id ;
            $.ajax({
            url: "{{route('User.index')}}/"+id,
           type: 'delete',
          data: $("#deleteuser").serialize(),
          dataType: 'JSON',
          success: function (data) {

             if(data['result']==1){
                $('.userpon[data-id="'+id+'"]').remove();
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

         function updateauser(id){
     
                console.log("دخل");
        var id = id ;
            $.ajax({
            url: "{{url('ajaxuserupdate')}}",
           type: 'post',
          data: $("#updateusered_"+id).serialize(),
          dataType: 'JSON',
          success: function (data) {
            
             if(data['result']==1){
                var id = data['user']['id'];
              
           
                 $('#name'+id).text(data['user']['full_name']);
                 $('#email'+id).text(data['user']['email']);
                 
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