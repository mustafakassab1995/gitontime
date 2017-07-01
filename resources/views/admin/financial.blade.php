@extends('layouts.main')
@section('content')
    <main id="app-main" class="app-main">
        <div class="wrap">
            <section class="app-content">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 pull-right">
                        <div class="p-md clearfix widget-def widget-panels widget-users widget-financial">
                            <div class="widget-header">
                                <h3>
                                    <i class="menu-icon zmdi zmdi-case zmdi-hc-lg"></i>
                                    <span>التحويلات المالية</span>
                                </h3>
                            </div>
                            <div class="widget-body">
                                <div class="col-md-12">
                        <div class="widget">
                            <div class="m-b-lg nav-tabs-horizontal">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#tab-1" aria-controls="tab-3" role="tab" data-toggle="tab">جميع التحويلات</a></li>
                                    <li role="presentation"><a href="#tab-2" aria-controls="tab-1" role="tab" data-toggle="tab">لم تراجع بعد</a></li>
                                    <li role="presentation"><a href="#tab-3" aria-controls="tab-2" role="tab" data-toggle="tab">تم تأكيدها</a></li>
                                </ul>
                                <div class="tab-content p-md">
                                    <div role="tabpanel" class="tab-pane in active fade finall" id="tab-1">
                                 @include('admin.finall')
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade notconfirmed" id="tab-2">
                                       @include('admin.notconfirmed') 
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade confirmed" id="tab-3">
                                       @include('admin.confirmed') 
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                            </div><!-- end widget-body -->
                            
                        </div><!-- end widget -->
                        
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
    </main>
    <script>
   
    $(document).ready(function() {
        $(document).on('click', '.all_button a', function (e) {
            getPosts($(this).attr('href').split('page=')[1]);
            e.preventDefault();
        });
    });
    function getPosts(page) {
        $.ajax({
            url : '?page=' + page,
            dataType: 'json',
          success: function (data) {
            $('.finall').html(data);
           },
           error : function (data) {
             alert("shit")
              
           }
        });
    }
</script>
<script>
    
    $(document).ready(function() {
        $(document).on('click', '.notconfirmed_button a', function (e) {
            getwhole($(this).attr('href').split('page=')[1]);
            e.preventDefault();
        });
    });
    function getwhole(page) {
        $.ajax({
            url : '{{url("notconfirmed")}}?page=' + page,
            dataType: 'json',
          success: function (data) {
            $('.notconfirmed').html(data);
           },
           error : function (data) {
             alert("shit")
              
           }
        });
    }
</script>
<script>
   
    $(document).ready(function() {
        $(document).on('click', '.confirmed_button a', function (e) {
            getnotwhole($(this).attr('href').split('page=')[1]);
            e.preventDefault();
        });
    });
    function getnotwhole(page) {
        $.ajax({
            url : '{{url("confirmed")}}?page=' + page,
            dataType: 'json',
          success: function (data) {
            $('.confirmed').html(data);
           },
           error : function (data) {
             alert("shit")
              
           }
        });
    }
</script>
    @endsection