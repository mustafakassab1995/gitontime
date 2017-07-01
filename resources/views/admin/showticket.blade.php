@extends('layouts.main')
@section('content')
    <main id="app-main" class="app-main">
        <div class="wrap">
            <section class="app-content">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 pull-right">
                        <div class="p-md clearfix widget-def widget-panels widget-users widget-financial widget-money widget-debt">
                            <div class="widget-header">
                                <h3>
                                    <i class="menu-icon zmdi zmdi-case zmdi-hc-lg"></i>
                                    <span>{{$mainticket->topic}} </span>
                                </h3>
                                @if($mainticket->status == 1)
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addreply">
                                    <i class="fa fa-plus"></i> إضافة رد
                                </button>
                                @else
                                <a href=""><span  style="
    background-color: #10c469!important;
    display: inline-block!important;
    float: left!important;
    font-size: 11px!important;
    padding: 2px 5px!important;
    border-radius: 3px!important;
    color: #fff!important;
    margin-right: 5px;
">مغلق وتم الحل </span></a>
                                @endif
                                @if(\Auth::user()->admin==1 && $mainticket->status == 1)
                                 <button type="button" class="btn btn-success" onclick="closeit({{$mainticket->id}});">
                                     اضغط هنا اذا تم حل هذا الطلب واغلاقه
                                </button>
                                @endif
                            </div>
                            <div class="widget-body" >
                            @foreach($tickets as $d)
                                <div class="col-md-12 ">
                                    <div class="widget">
                                        <div class="widget-body p-h-lg">
                                            <div class="media">
                                                <div class="media-left">
                                                    <div class="avatar avatar-lg avatar-circle"><img class="img-responsive" src="{{$d->user->avatar}}" alt="avatar"></div>
                                                </div>
                                                <div class="media-body">
                                                    <h4 class="media-heading">
                                                        
                                                       {{$d->user->full_name}}
                                                    </h4>
                                                    <div class="btn-group" role="group">
                                                        @if(\Auth::user()->admin==1)
                                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{$d->id}}">
                                                            <span class="zmdi zmdi-delete"></span> 
                                                        </button>
                                                        @endif

                                                    </div>
                                                    
                                                    <span class="time">
                                            <i class="zmdi zmdi-calendar-check"></i>
                                            <b>{{$d->created_at}}</b>
                                        </span>
                                                    <p class="media-meta text-purple">{{$d->message}}</p>
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

        <div class="modal fade" id="addreply" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">إضافة رد</h4></div>
                    <div class="modal-body">
                        <form action="#" id="addform">
                        {{csrf_field()}}
                              
                          <input type="hidden" name="gr_id" value="{{$mainticket->id}}">
                           
                            
                            <div class="form-group">
                                <label for="exampleInputEmail1">الموضوع</label>
                                <textarea name="message" id="mail_body_field" cols="30" rows="5" class="form-control"></textarea>
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">

                        <button type="button" data-dismiss="modal" class="btn btn-primary" onclick="javascript:adddebt();">حفظ </button>
                    </div>
                </div>
            </div>

        </div>
        @foreach($tickets as $d)
        @if(\Auth::user()->admin==1)
        <div id="deleteModal{{$d->id}}" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">حذف الرد</h4></div>
                    <div class="modal-body">
                        <h5>هل انت متأكد من حذف هذا الرد ؟ </h5></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" onclick="javascript:deletedebt({{$d->id}});" data-dismiss="modal">حذف</button>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endforeach
        <div id="done" class="modal fade" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">تمت المهمة</h4></div>
                        <div class="modal-body">
                            <h5 class="btn  btn-success" id="shitl">تم التنفيذ بنجاح</h5></div>
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

        $(document).ready(function() { 
         $(".users").select2({
    allowClear: true,
     maximumSelectionSize: 1,
});
     });

     function adddebt(){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
            url: "{{url('replyaticket')}}",
           type: 'post',
          data: $("#addform").serialize(),
          dataType: 'JSON',
          success: function (data) {

             if(data['result']==1){
             	$('#done').modal('toggle');
                location.reload();
                
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

@if(\Auth::user()->admin==1)
function deletedebt(id){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
var id =id ;
            $.ajax({
            url: "{{url('/deleteareply')}}",
           type: 'post',
          data: {_token:CSRF_TOKEN,id:id},
          dataType: 'JSON',
          success: function (data) {

             if(data['result']==1){
                location.reload();
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
         function closeit(id){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
var id =id ;
            $.ajax({
            url: "{{url('/closeaticket')}}",
           type: 'post',
          data: {_token:CSRF_TOKEN,id:id},
          dataType: 'JSON',
          success: function (data) {

             if(data['result']==1){
                location.reload();
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
         @endif

    </script>
   @endsection