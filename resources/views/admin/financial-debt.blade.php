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
                                    <span>المالية / الرواتب</span>
                                </h3>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#adddebtModal">
                                    <i class="fa fa-plus"></i> إضافة مديونية
                                </button>
                            </div>
                            <div class="widget-body" >
                            @foreach($debts as $d)
                                <div class="col-md-4 col-sm-6">
                                    <div class="widget">
                                        <div class="widget-body p-h-lg">
                                            <div class="media">
                                                <div class="media-left">
                                                    <div class="avatar avatar-lg avatar-circle"><img class="img-responsive" src="{{$d->creditor->avatar}}" alt="avatar"></div>
                                                </div>
                                                <div class="media-body">
                                                    <h4 class="media-heading">
                                                        
                                                       {{$d->creditor->full_name}}
                                                    </h4>
                                                    <div class="btn-group" role="group">
                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editdebtModal{{$d->id}}">
                                                            <span class="zmdi zmdi-edit"></span>
                                                        </button>
                                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{$d->id}}">
                                                            <span class="zmdi zmdi-delete"></span> تم الدفع
                                                        </button>

                                                    </div>
                                                    
                                                    <span class="time">
                                            <i class="zmdi zmdi-calendar-check"></i>
                                            <b>{{$d->created_at}}</b>
                                        </span>
                                                    <p class="media-meta text-purple">{{$d->subject}}</p>
                                                </div>
                                                <div class="profit-data">
                                                    <ul>
                                                        <li>
                                                            <span>المبلغ</span>
                                                            <p>{{$d->amount}} دولار</p>
                                                        </li>
                                                        <li>
                                                            <span>المدين</span>
                                                            <p>{{$d->debtor->full_name}}</p>
                                                        </li>
                                                    </ul>
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
                            {{$debts->links()}}
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

        <div class="modal fade" id="adddebtModal" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">إضافة مديونية جديدة</h4></div>
                    <div class="modal-body">
                        <form action="#" id="addform">
                        {{csrf_field()}}
                              <div class="form-group">
                                <label for="exampleInputEmail1">الدائن</label>
                                <select name="creditor_id" class="form-control users">
                                    
                                    @foreach($users as $user)
                                           
                                           <option value="{{$user->id}}">{{$user->full_name}} </option>
                                           @endforeach

                                </select> 
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">المدين</label>
                                <select name="debtor_id" class="form-control users">
                                    
                                    @foreach($users as $user)
                                          
                                           <option value="{{$user->id}}">{{$user->full_name}} </option>
                                           @endforeach

                                </select> 
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">المبلغ</label>
                                <input type="text" name="amount" class="form-control" id="exampleInputEmail1" value="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">الموضوع</label>
                                <textarea name="subject" id="mail_body_field" cols="30" rows="5" class="form-control"></textarea>
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">

                        <button type="button" data-dismiss="modal" class="btn btn-primary" onclick="javascript:adddebt();">حفظ </button>
                    </div>
                </div>
            </div>

        </div>
        @foreach($debts as $d)
        <div class="modal fade" id="editdebtModal{{$d->id}}" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">تعديل المديونية</h4></div>
                    <div class="modal-body">
                        <form action="#" id="editform{{$d->id}}">
                        {{csrf_field()}}
                        <input type="hidden" name="id" value="{{$d->id}}">
                            <div class="form-group" >
                                <label for="exampleInputEmail1">الدائن</label>
                                <select name="creditor_id" class="form-control users">
                                    
                                    @foreach($users as $user)
                                           @if( $d->creditor_id == $user->id)
                                           <option value="{{$user->id}}" selected>{{$user->full_name}} </option>
                                           @else
                                           <option value="{{$user->id}}">{{$user->full_name}} </option>
                                           @endif

                                    @endforeach

                                </select> 
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">المدين</label>
                                <select name="debtor_id" class="form-control users">
                                    
                                    @foreach($users as $user)
                                           @if( $d->debtor_id == $user->id)
                                           <option value="{{$user->id}}" selected>{{$user->full_name}} </option>
                                           @else
                                           <option value="{{$user->id}}">{{$user->full_name}} </option>
                                           @endif
                                           @endforeach

                                </select> 
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">المبلغ</label>
                                <input type="text" name="amount" class="form-control" id="exampleInputEmail1" value="40">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">الموضوع</label>
                                <textarea name="subject" id="mail_body_field" cols="30" rows="5" class="form-control">{{$d->subject}} </textarea>
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">

                        <button type="button" data-dismiss="modal" class="btn btn-primary" onclick="javascript:editdebt({{$d->id}});">حفظ التعديل</button>
                    </div>
                </div>
            </div>

        </div>
        <div id="deleteModal{{$d->id}}" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">حذف المديونية</h4></div>
                    <div class="modal-body">
                        <h5>هل انت متأكد من حذف هذه المديوينة ؟ (هذه المديونية مدفعة ؟) </h5></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" onclick="javascript:deletedebt({{$d->id}});" data-dismiss="modal">حذف</button>
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
            url: "{{url('/adddebt')}}",
           type: 'post',
          data: $("#addform").serialize(),
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


          function editdebt(id){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
var id =id ;
            $.ajax({
            url: "{{url('/editdebt')}}",
           type: 'post',
          data: $("#editform"+id).serialize(),
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
function deletedebt(id){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
var id =id ;
            $.ajax({
            url: "{{url('/deletedebt')}}",
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

    </script>
   @endsection