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
                                    <i class="menu-icon zmdi zmdi-case zmdi-hc-lg"></i>
                                    <span>المالية / الطلبات</span>
                                </h3>
                            </div>
                            <div class="widget-body">
                                <div class="col-md-12">
                        <div class="widget">
                            <div class="m-b-lg nav-tabs-horizontal">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#tab-1" aria-controls="tab-3" role="tab" data-toggle="tab">جميع الطلبات</a></li>
                                    <li role="presentation"><a href="#tab-2" aria-controls="tab-1" role="tab" data-toggle="tab">مكتملة الميزاينة</a></li>
                                    <li role="presentation"><a href="#tab-3" aria-controls="tab-2" role="tab" data-toggle="tab">غير مكتملة الميزانية</a></li>
                                    <li role="presentation"><a href="#tab-4" aria-controls="tab-2" role="tab" data-toggle="tab">لا يوجد بها تحويلات</a></li>
                                    <li role="presentation"><a href="#tab-5" aria-controls="tab-2" role="tab" data-toggle="tab">تحويلات غير مؤكدة</a></li>
                                </ul>
                                <div class="tab-content p-md">
                                    <div role="tabpanel" class="tab-pane in active fade requests" id="tab-1">
                                  @include('admin.requestsf')
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade whole " id="tab-2">
                                   @include('admin.whole')
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade notwhole" id="tab-3">
                                     @include('admin.notwhole')
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade nothing" id="tab-4">
                                     @include('admin.nothing')
                                        
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade notsure" id="tab-5">
                                     @include('admin.notsure')
                                        
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
        
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">تعديل بيانات العضو</h4></div>
                <div class="modal-body">
                    <form action="#">
                        <h4 class="m-b-md">معلومات شخصية</h4>
                        <div class="form-group">
                                        <label for="exampleInputEmail1">الاسم بالكامل</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1">
                                    </div>
                        <div class="form-group">
                                        <label for="exampleInputEmail1">عنوان لحسابك</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1">
                                    </div>
                        <div class="form-group">
                                        <label for="exampleInputEmail1">البريد الالكتروني</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1">
                                    </div>
                        <div class="form-group">
                                        <label for="exampleInputEmail1">معلومات عنك</label>
                                        <textarea name="mail_body_field" id="mail_body_field" cols="30" rows="5" class="form-control"></textarea>
                                    </div>
                        <h4 class="m-b-md">صلاحيات المستخدم</h4>
                        <div class="form-group">
                                        <label for="exampleInputEmail1">مراقب</label>
                                        <select class="form-control">
                                <option>نعم</option>
                                            <option>لا</option>
                            </select>
                                    </div>
                        <div class="form-group">
                                        <label for="exampleInputEmail1">موظف</label>
                                        <select class="form-control">
                                <option>نعم</option>
                                            <option>لا</option>
                            </select>
                                    </div>
                        
                    </form>
                </div>
                <div class="modal-footer">
                    
                    <button type="button" data-dismiss="modal" class="btn btn-primary">حفظ التعديل</button>
                </div>
            </div>
        </div>
    </div>
        <div id="deleteModal" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">حذف المستخدم</h4></div>
                    <div class="modal-body">
                        <h5>هل انت متأكد من حذف هذا المستخدم ؟</h5></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">حذف</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
 <script>
    
    $(document).ready(function() {
        $(document).on('click', '.nothing_button a', function (e) {
            getnothing($(this).attr('href').split('page=')[1]);
            e.preventDefault();
        });
    });
    function getnothing(page) {
        $.ajax({
            url : '{{url("nothing")}}?page=' + page,
            dataType: 'json',
          success: function (data) {
            $('.nothing').html(data);
           },
           error : function (data) {
             alert("shit")
              
           }
        });
    }
</script>
 <script>
   
    $(document).ready(function() {
        $(document).on('click', '.req a', function (e) {
            getPosts($(this).attr('href').split('page=')[1]);
            e.preventDefault();
        });
    });
    function getPosts(page) {
        $.ajax({
            url : '?page=' + page,
            dataType: 'json',
          success: function (data) {
            $('.requests').html(data);
           },
           error : function (data) {
             alert("shit")
              
           }
        });
    }
</script>
<script>
    
    $(document).ready(function() {
        $(document).on('click', '.whole_button a', function (e) {
            getwhole($(this).attr('href').split('page=')[1]);
            e.preventDefault();
        });
    });
    function getwhole(page) {
        $.ajax({
            url : '{{url("whole")}}?page=' + page,
            dataType: 'json',
          success: function (data) {
            $('.whole').html(data);
           },
           error : function (data) {
             alert("shit")
              
           }
        });
    }
</script>
<script>
   
    $(document).ready(function() {
        $(document).on('click', '.notwhole_button a', function (e) {
            getnotwhole($(this).attr('href').split('page=')[1]);
            e.preventDefault();
        });
    });
    function getnotwhole(page) {
        $.ajax({
            url : '{{url("notwhole")}}?page=' + page,
            dataType: 'json',
          success: function (data) {
            $('.notwhole').html(data);
           },
           error : function (data) {
             alert("shit")
              
           }
        });
    }
</script>
<script>
   
    $(document).ready(function() {
        $(document).on('click', '.notsure_button a', function (e) {
            getnotsure($(this).attr('href').split('page=')[1]);
            e.preventDefault();
        });
    });
    function getnotsure(page) {
        $.ajax({
            url : '{{url("notsure")}}?page=' + page,
            dataType: 'json',
          success: function (data) {
            $('.notsure').html(data);
           },
           error : function (data) {
             alert("shit")
              
           }
        });
    }
</script>
    @endsection