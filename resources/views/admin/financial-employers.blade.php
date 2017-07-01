@extends('layouts.main')
@section('content')
    <main id="app-main" class="app-main">
        <div class="wrap">
            <section class="app-content">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 pull-right">
                        <div class="p-md clearfix widget-def widget-panels widget-users widget-financial widget-employerr">
                            <div class="widget-header">
                                <h3>
                                    <i class="menu-icon zmdi zmdi-case zmdi-hc-lg"></i>
                                    <span>المالية / الموظفين</span>
                                </h3>
                            </div>
                            <div class="widget-body">
                                
                                <div class="col-md-12">
                        <div class="widget">
                            <div class="m-b-lg nav-tabs-horizontal">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#tab-1" aria-controls="tab-3" role="tab" data-toggle="tab">جميع</a></li>
                                    <li role="presentation"><a href="#tab-2" aria-controls="tab-1" role="tab" data-toggle="tab">تم الدفع</a></li>
                                    <li role="presentation"><a href="#tab-3" aria-controls="tab-2" role="tab" data-toggle="tab">في انتظار الدفع</a></li>
                                </ul>
                                <div class="tab-content p-md">
                                    <div role="tabpanel" class="tab-pane in active fade allpayments" id="tab-1">
                                    @include('admin.allpayments')
                                        
                                      
                                        
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade donepayments" id="tab-2">
                                        
                                        @include('admin.donepayments')
                                       
                                     
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade notdonepayments" id="tab-3">
                                    @include('admin.notdonepayments')
                                       
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
        @foreach($cos as $co)
        <div class="modal fade" id="confirmModal{{$co->id}}" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">تأكيد الدفع للموظف</h4></div>
                <div class="modal-body">
                    <form action="#" id="addemppayment">
                    {{csrf_field()}}
                    <input type="hidden" value="{{$co->employee_id}}" name="user_id">
                    <input type="hidden" value="{{$co->id}}" name="request_id">
                        <div class="form-group">
                                        <label for="exampleInputEmail1">العمل</label>
                                        <input type="text"  class="form-control" id="exampleInputEmail1" disabled value="{{$co->title}}">
                                    </div>
                        <div class="form-group">
                                        <label for="exampleInputEmail1">اسم الموظف</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" disabled value="{{$co->employee->full_name}}">
                                    </div>
                        <div class="form-group">
                                        <label for="exampleInputEmail1">المبلغ</label>
                                        <input type="text" name="price" class="form-control" id="exampleInputEmail1" required value="">
                                    </div>
                        <div class="form-group">
                                        <label for="exampleInputEmail1">رقم التحويل</label>
                                        <input type="text" name="transaction_number" class="form-control" id="exampleInputEmail1" >
                                    </div>
                        
                    </form>
                </div>
                <div class="modal-footer">
                    
                    <button type="button" data-dismiss="modal" class="btn btn-primary" onclick="javascript:addemppayment();">إرســال</button>
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
                            <h5 class="btn  btn-success" id="shitl">تم التأكيد بنجاح</h5></div>
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
        $(document).on('click', '.allpayments_button a', function (e) {
            getPosts($(this).attr('href').split('page=')[1]);
            e.preventDefault();
        });
    });
    function getPosts(page) {
        $.ajax({
            url : '?page=' + page,
            dataType: 'json',
          success: function (data) {
            $('.allpayments').html(data);
           },
           error : function (data) {
             alert("shit")
              
           }
        });
    }
</script>
<script>
   
   
    function addemppayment(){
        $.ajax({
            url : '{{url("addemppayment")}}',
             type: 'post',
          data: $("#addemppayment").serialize(),
          dataType: 'JSON',
          success: function (data) {
            if(data['result']==1){
                    $('#done').modal('toggle');

            setTimeout(
                  function() 
                  {
                    location.reload();
                  }, 5000);}
            else{
                $('#notdone').modal('toggle');
                
            }
            
           },
           error : function (data) {
                $('#notdone').modal('toggle');
             
              
           }
        });

    }
     $(document).ready(function() {
        $(document).on('click', '.notdonepayments_button a', function (e) {
            getnotdonepayments($(this).attr('href').split('page=')[1]);
            e.preventDefault();
        });
    });
    function getnotdonepayments(page) {
        $.ajax({
            url : '{{url("notdonepayments")}}?page=' + page,
            dataType: 'json',
          success: function (data) {
            $('.notdonepayments').html(data);
           },
           error : function (data) {
             alert("shit")
              
           }
        });
    }
     $(document).ready(function() {
        $(document).on('click', '.donepayments_button a', function (e) {
            getdonepayments($(this).attr('href').split('page=')[1]);
            e.preventDefault();
        });
    });
    function getdonepayments(page) {
        $.ajax({
            url : '{{url("donepayments")}}?page=' + page,
            dataType: 'json',
          success: function (data) {
            $('.donepayments').html(data);
           },
           error : function (data) {
             alert("shit")
              
           }
        });
    }
</script>
    @endsection