@extends('layouts.main')
@section('content')
    <main id="app-main" class="app-main">
        <div class="wrap">
            <section class="app-content">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 pull-right">
                        <div class="p-md clearfix widget widget-def widget-panels widget-users widget-financial widget-request">
                            <div class="widget-header">
                                <h3>
                                    <i class="menu-icon zmdi zmdi-plus zmdi-hc-lg"></i>
                                    <span>طلب جديد</span>
                                </h3>
                            </div>
                            <div class="widget-body">
                                <div class="contact-form col-xs-12">
                                    <form action="{{url('openaticket')}} " method="post">
                                    {{csrf_field()}}
                                     <input type="hidden" name="category_id" class="form-control" value="56">
                                     
                                        <div class="form-group col-xs-12">
                                            <label for="full_name">العنوان</label>
                                            <input type="text" name="topic" class="form-control" id="full_name" required>
                                        </div>
                                        <div class="form-group col-xs-12">
                                            <label for="msg">الرسالة</label>
                                            <textarea class="form-control" name="content" id="msg" required></textarea>
                                        </div>
                                       
                                        
                                        
                                       
                                       
                                       
                                        <div class="form-group col-xs-12">
                                                    <label for="exampleInputEmail1">ملف مرفق</label>
                                <input  name="file" type="file" class="form-control ll">
                                                </div>
                                        <div class="form-group col-xs-12">
                                            <input type="submit" value="إرسال الطلب" class="btn btn-success btn1">
                                        </div>
                                    </form>
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
        
     
        
    </main>
    <script>
        $(document).ready(function() { 
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

       
        

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
    @endsection