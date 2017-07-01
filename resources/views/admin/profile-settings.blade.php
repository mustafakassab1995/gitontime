@extends('layouts.main')
@section('content')
    <main id="app-main" class="app-main">
        <div class="wrap">
            <section class="app-content">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 pull-right">
                        <div class="p-md clearfix widget-def widget-panels widget-users widget-financial widget-request">
                            <div class="widget-header">
                                <h3>
                                    <i class="menu-icon zmdi zmdi-settings zmdi-hc-lg"></i>
                                    <span>تعديل الحساب الشخصي</span>
                                </h3>
                            </div>
                            <div class="widget-body">
                                <div class="col-md-12">
                        <div class="widget">
                            <div class="m-b-lg nav-tabs-horizontal col-md-12 col-xs-12">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#tab-1" aria-controls="tab-3" role="tab" data-toggle="tab">الاعدادات العامة</a></li>
                                    <li role="presentation"><a href="#tab-2" aria-controls="tab-1" role="tab" data-toggle="tab">الرقم السري</a></li>
                                    <li role="presentation"><a href="#tab-3" aria-controls="tab-3" role="tab" data-toggle="tab">الصورة الشخصية</a></li>
                                </ul>
                                <div class="tab-content p-md">
                                    <div role="tabpanel" class="tab-pane in active fade" id="tab-1">
                                        <div class="edit-pr-form">
                                            <form  id="updateusered1">
                     {{csrf_field()}}
                    <input type="hidden" name="id" value="{{$user->id}}" />
                                                <div class="form-group col-md-6 col-xs-12">
                                                    <label for="full_name">الاسم بالكامل</label>
                                                    <input type="text" name="full_name" value="{{$user->full_name}}" class="form-control" id="full_name">
                                                </div>
                                                <div class="form-group col-md-6 col-xs-12">
                                                    <label for="title">الوظيفة</label>
                                                    <input type="text" name="title" value="{{$user->title}}" class="form-control" id="title">
                                                </div>
                                                <div class="form-group col-md-6 col-xs-12">
                                                    <label for="email">البريد الالكتروني</label>
                                                    <input type="email" name="email" value="{{$user->email}}" class="form-control" id="email">
                                                </div>
                                                
                                                <div class="form-group col-md-12 col-xs-12">
                                                    <label for="bio">نبذة عنك</label>
                                                    <textarea class="form-control" name="bio"  id="bio"> {{$user->bio}}</textarea>
                                                </div>
                                                <div class="form-group col-md-6 col-xs-12">
                                                    <label for="currency">العملة</label>
                                                    <select name="currency" class="form-control" id="currency">
                                                        <option value="USD">الدولار الامريكي</option>
                                                        <option value="RSA">الريال السعودي</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6 col-xs-12">
                                                    <label for="location">العنوان</label>
                                                     <input type="text" name="location" value="{{$user->location}}" class="form-control" id="location">
                                                </div>
                                                <div class="form-group col-md-6 col-xs-12">
                                                    <input type="reset" value="إلغاء" class="btn btn-danger btn1">

                                                </form>
                                                    <button type="submit"  class="btn btn-success btn1" onclick="javascript:updateauser1({{$user->id}});">حفظ</button> 
                                                </div>
                                                
                                            
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="tab-2">
                                        <div class="edit-pr-form">
                                             <form  id="updateusered2">
                     {{csrf_field()}}
                    <input type="hidden" name="id" value="{{$user->id}}" />
                                               <!--  <div class="form-group col-md-12 col-xs-12">
                                                    <label for="curr_pass">كلمة السر الحالية</label>
                                                    <input type="password" class="form-control" id="curr_pass">
                                                </div> -->
                                                <div class="form-group col-md-6 col-xs-12">
                                                    <label for="n_pass">كلمة السر الجديدة</label>
                                                    <input name="password" type="password" class="form-control" id="n_pass">
                                                </div>
                                                <div class="form-group col-md-6 col-xs-12">
                                                    <label for="cn_pass">تأكيد كلمة السر الجديدة</label>
                                                    <input type="password" class="form-control" id="cn_pass">
                                                </div>
                                                <div class="form-group col-md-12 col-xs-12">
                                                    <input type="submit" value="حفظ" class="btn btn-success btn1" onclick="javascript:updateauser2({{$user->id}});">
                                                    <input type="reset" value="إلغاء" class="btn btn-danger btn1">
                                                </div>
                                                
                                            </form>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="tab-3">
                                        <div class="edit-pr-form">
                                            <form  id="updateusered3">
                     {{csrf_field()}}
                    <input type="hidden" name="id" value="{{$user->id}}" />
                                                <div class="form-group col-md-12 col-xs-12">
                                                    <label for="exampleInputEmail1">صورة الحساب</label>
                                                        <input id="input-folder-1" name="inputfa[]" type="file" class="file-loading">
                                                </div>
                                                <div class="form-group col-md-12 col-xs-12">
                                                    <input type="submit" value="حفظ" class="btn btn-success btn1" onclick="javascript:updateauser3({{$user->id}});">
                                                    <input type="reset" value="إلغاء" class="btn btn-danger btn1">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                            </div>
                            <!-- end widget-body -->
                        </div>
                        <!-- end widget -->
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
     function updateauser3(id){
     
                console.log("دخل");
        var id = id ;
            $.ajax({
            url: "{{url('ajaxuserupdate')}}",
           type: 'post',
          data: $("#updateusered3").serialize(),
          dataType: 'JSON',
          success: function (data) {
            
             if(data['result']==1){
               
                 
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
         function updateauser2(id){
     
                console.log("دخل");
        var id = id ;
            $.ajax({
            url: "{{url('ajaxuserupdate')}}",
           type: 'post',
          data: $("#updateusered2").serialize(),
          dataType: 'JSON',
          success: function (data) {
            
             if(data['result']==1){
               
                 
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
         function updateauser1(id){
     
                console.log("دخل");
        var id = id ;
            $.ajax({
            url: "{{url('ajaxuserupdate')}}",
           type: 'post',
          data: $("#updateusered1").serialize(),
          dataType: 'JSON',
          success: function (data) {
            
             if(data['result']==1){
                var id = data['user']['id'];
              
           
                
                 
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