@extends('layouts.main')
@section('content')
    <main id="app-main" class="app-main">
        <div class="wrap">
            <section class="app-content">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 pull-right">
                        <div class="p-md clearfix widget-orders widget-def widget-panels widget-users widget-financial widget-request">
                        </div>
                        <!-- end widget -->
                        <div class="messages card">
                            <div class="m-sidebar">
                                <header>
                                    <h3 class="hidden-xs">الرسائل الواردة</h3>
                                    <ul class="actions">
                                        <li>
                                            <button type="button" class="btn open-compose" data-target="#composeM" data-toggle="modal" title="ارسال رسالة جديدة">
                                                <i class="zmdi zmdi-comment-text"></i>
                                            </button>
                                        </li>
                                    </ul>
                                </header>
                                <!-- <div class="ms-search hidden-xs">
                                
                            </div> -->
                            <div class="list-group c-overflow">
                            @foreach($groups as $g)
                            @if($g->userone_id == \Auth::user()->id)
                                <a class="list-group-item mg" data-id="{{$g->id}}" href="javascript:getmgs({{$g->id}});">
                                    <div class="usr-img">
                                        <img src="{{$g->usertwo->avatar}}" alt="" class="lgi-img">
                                    </div>
                                    <div class="usr-body">
                                        <div class="lgi-heading">{{$g->usertwo->full_name}}</div>
                                        <small class="lgi-text">اضغط هنا لرؤية نص الرسالة</small>
                                        <small class="ms-time">{{$g->created_at->toDayDateTimeString()}}</small>
                                    </div>
                                </a>
                                @elseif($g->usertwo_id == \Auth::user()->id)
                                <a class="list-group-item mg" data-id="{{$g->id}}" href="javascript:getmgs({{$g->id}});">
                                    <div class="usr-img">
                                        <img src="{{$g->userone->avatar}}" alt="" class="lgi-img">
                                    </div>
                                    <div class="usr-body">
                                        <div class="lgi-heading">{{$g->userone->full_name}}</div>
                                        <small class="lgi-text">اضغط هنا لرؤية نص الرسالة</small>
                                        <small class="ms-time">{{$g->created_at->toDayDateTimeString()}}</small>
                                    </div>
                                </a>
                                @endif
                                @endforeach
                               
                                </div>
                            </div><!-- end m-sidebar -->
                            <div class="m-body">
                                <header class="mb-header">
                                <div class="mbh-user clearfix" id="photo">
                                    
                                </div>
<!-- 
                                <ul class="actions">
                                    <li>
                                        <a href="#" title="تحديث الرسالة">
                                            <i class="zmdi zmdi-refresh-alt"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="حذف الرسالة">
                                            <i class="zmdi zmdi-delete"></i>
                                        </a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" data-toggle="dropdown">
                                            <i class="zmdi zmdi-more-vert"></i>
                                        </a>

                                        <ul class="dropdown-menu dropdown-menu-left">
                                            <li>
                                                <a href="#">معلومات الراسل</a>
                                            </li>
                                            <li>
                                                <a href="#">حذف الرسائل</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul> -->
                            </header>
                                <div class="mb-list">
                                <div class="mbl-messages c-overflow msgs" id="msjs">
                                
                                    </div>
                                    <form action="#" id="sendform">
                                    {{csrf_field()}}
                                    <input type="hidden" name="gr_id" id="form_input_gr" value="">
                                    <input type="hidden" name="sender_id" id="sender_id" value="">
                                    <input type="hidden" name="rcv_id" id="rcv_id" value="">
                                <div class="mbl-compose">
                                    <textarea name="message" placeholder="اكتب رسالتك ..." id="msginput" disabled="true"></textarea>
                                    </form>
                                    <button type="button" onclick="javascript:sendamsg();" id="msgbtn" disabled="true"><i class="zmdi zmdi-mail-send" ></i></button>
                                    <button class="upload_files" type="button" data-toggle="modal" data-target="#Uploaded_files" title="رفع ملفات"><i class="zmdi zmdi-cloud-upload"></i></button>
                                </div>
                            </div>
                            </div><!-- end m-body -->
                        </div><!-- end messages -->
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
        
        <div class="modal fade" id="composeM" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">إرسال رسالة جديدة</h4></div>
                <div class="modal-body">
                    <form action="#">
                        <div class="form-group">
                                        <label for="exampleInputEmail1">اسم المتلقي</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1">
                                    </div>
                        <div class="form-group">
                                        <label for="exampleInputEmail1">عنوان الرسالة</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1">
                                    </div>
                        <div class="form-group">
                                        <label for="exampleInputEmail1">محتوي الرسالة</label>
                                        <textarea name="mail_body_field" id="mail_body_field" cols="30" rows="5" class="form-control"></textarea>
                                    </div>
                        
                    </form>
                </div>
                <div class="modal-footer">
                    
                    <button type="button" data-dismiss="modal" class="btn btn-primary">إرسال</button>
                </div>
            </div>
        </div>
    </div>
        <div id="Uploaded_files" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">ارفاق ملفات</h4></div>
                    <div class="modal-body">
                        <input name="file"  type="file" class="file-loading ll">    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">حفظ التغييرات</button>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
         $(document).ready(function() { 
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

       
        

        $(".ll").fileinput({
        theme: "explorer",
        uploadUrl: "{{url('uploadcommentfile')}}",
        overwriteInitial: false,
        initialPreviewAsData: true,
        uploadExtraData : {_token: CSRF_TOKEN  },
    });
       
       
 });
    function sendamsg() {
         var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
             url: "{{url('/sendamsg')}}",
           type: 'post',
          data: $("#sendform").serialize(),
          dataType: 'JSON',
          success: function (data) {
            $("#msginput").val('');
            if(data['file']!=null){
                $('.msgs').append('<div class="mblm-item mblm-item-right">'+
                                        '<div>'+
                                            '<div class="item-up">'+
                                               '<div class="item-icon">'+
                                                    '<i class="zmdi zmdi-file-text"></i>'+
                                                '</div>'+
                                                '<div class="item-data">'+
                                                    '<h3>'+
                                                        '<a href="'+data['file']['file_name']+'">لينك تحميل مباشر للملف</a>'+
                                                        
                                                    '</h3>'+
                                                    '<span>'+data['file']['size']+'</span>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                        '<small>'+data['file']['created_at']+'</small>'+
                                    '</div> ');
            }
            $('.msgs').append('<div class="mblm-item mblm-item-right">'+
                                        '<div>'+
                                            ''+data['msg']['message']+''+
                                        '</div>'+
                                        '<small>'+data['msg']['created_at']+'</small>'+
                                    '</div>');
            $('#msjs').scrollTop($('#msjs')[0].scrollHeight - $('#msjs')[0].clientHeight);

           },
           error : function (data) {
             alert("فشل الإرسال");
              
           }
        });
    }
     function getmgs(gr_id) {
         var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
         var gr_id = gr_id;
        $.ajax({
             url: "{{url('/getmgs')}}",
           type: 'post',
          data: {_token: CSRF_TOKEN , gr_id: gr_id  },
          dataType: 'JSON',
          success: function (data) {
            $("#msginput").prop('disabled', false);
            $("#msgbtn").prop('disabled', false);
            $('#photo').html('<img src="'+data['jaha']['user']['avatar']+'"  alt="'+data['jaha']['user']['full_name']+'">'+
                                    '<div class="p-t-5" id="convname"></div>');
            $('#convname').text(data['jaha']['user']['full_name']);

            $('.msgs').html(data['data']);
            $('#form_input_gr').val(gr_id);
            $('#sender_id').val(data['jaha']['sender_id']);
            $('#rcv_id').val(data['jaha']['rcv_id']);
            $('#msjs').scrollTop($('#msjs')[0].scrollHeight - $('#msjs')[0].clientHeight);
            
             setTimeout(
                  function() 
                  {
                   getnewgroupmsgs(gr_id); 
                  }, 5000);
           },
           error : function (data) {
             // alert("shit")
              
           }
        });
    }
    function getnewgroupmsgs(gr_id) {
         var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
         var gr_id = gr_id;
        $.ajax({
             url: "{{url('/getnewgroupmsgs')}}",
           type: 'post',
          data: {_token: CSRF_TOKEN , gr_id: gr_id  },
          dataType: 'JSON',
          success: function (data) {
             
             var msgs =  data['msgs'];
             for (var i = 0; i < msgs.length; i++) {
                 $('.msgs').append('<div class="mblm-item mblm-item-left">'+
                                        '<div>'+
                                            ''+msgs[i]['message']+''+
                                        '</div>'+
                                        '<small>'+msgs[i]['created_at']+'</small>'+
                                    '</div>');
            $('#msjs').scrollTop($('#msjs')[0].scrollHeight - $('#msjs')[0].clientHeight);

             }
          
            setTimeout(
                  function() 
                  {
                   getnewgroupmsgs(gr_id); 
                  }, 5000);
           },
           error : function (data) {
             // alert("shit")
              
           }
        });
    }



        </script>
    </main>
    @endsection