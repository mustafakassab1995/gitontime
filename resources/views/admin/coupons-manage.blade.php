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
                                    <span>ادارة الكوبونات</span>
                                </h3>
                                @if(\Auth::user()->admin==1)
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#adddebtModal">
                                    <i class="fa fa-plus"></i> إضافة كوبون
                                </button>
                                @endif
                            </div>
                            <div class="widget-body" >
                            @foreach($coupons as $d)
                                <div class="col-md-4 col-sm-6">
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
                                                    @if(\Auth::user()->admin == 1)
                                                    <div class="btn-group" role="group">
                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editdebtModal{{$d->id}}">
                                                            <span class="zmdi zmdi-edit"></span>
                                                        </button>
                                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{$d->id}}">
                                                            <span class="zmdi zmdi-delete"></span> 
                                                        </button>

                                                    </div>
                                                    @endif
                                                    
                                                    <span class="time">
                                            <i class="zmdi zmdi-calendar-check"></i>
                                            <b>{{$d->created_at}}</b>
                                        </span>
                                                    <p class="media-meta text-purple">خصم {{$d->offer*100}}% على الركويست :{{ $d->request->title}}</p>
                                                </div>
                                                <div class="profit-data">
                                                    <ul>
                                                        <li>
                                                            <span>نسبة الخصم</span>
                                                            <p>{{$d->offer*100}} %</p>
                                                        </li>
                                                        <li>
                                                            <span>كود الكوبون</span>
                                                            <p>{{$d->code}} </p>
                                                        </li>
                                                        <li>
                                                            <span>الخصم على</span>
                                                            @php
                                                            $dfd = route('Request.show',$d->request_id);

                                                            @endphp
                                                            <p> <a href="{{$dfd}}">{{$d->request->title}}</a></p>
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
                            {{$coupons->links()}}
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
        @if(\Auth::user()->admin==1)
        <div class="modal fade" id="adddebtModal" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">إضافة كوبون جديد</h4></div>
                    <div class="modal-body">
                        <form action="#" id="addform">
                        <input type="hidden" name="code" value="<?php echo rand().time().''; ?>">

                        {{csrf_field()}}
                              <div class="form-group">
                                <label for="exampleInputEmail1">الزبون المستفيد</label>
                                <select name="user_id" class="form-control users">
                                    
                                    @foreach($users as $user)
                                           
                                           <option value="{{$user->id}}">{{$user->full_name}} </option>
                                           @endforeach

                                </select> 
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">المدين</label>
                                <select name="request_id" class="form-control users">
                                    @foreach($requests as $request)
                                          
                                           <option value="{{$request->id}}">{{$request->title}} </option>
                                           @endforeach

                                </select> 
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">الخصم</label>
                                <input type="number" name="offer" class="form-control" id="exampleInputEmail1" value="" min="0.1" max="1.00">
                            </div>
                            

                        </form>
                    </div>
                    <div class="modal-footer">

                        <button type="button" data-dismiss="modal" class="btn btn-primary" onclick="javascript:addcoupon();">حفظ </button>
                    </div>
                </div>
            </div>

        </div>
        
        @foreach($coupons as $d)
        <div class="modal fade" id="editdebtModal{{$d->id}}" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">تعديل الكوبون</h4></div>
                    <div class="modal-body">
                        <form action="#" id="editform{{$d->id}}">
                        {{csrf_field()}}
                        <input type="hidden" name="id" value="{{$d->id}}">
                            <div class="form-group" >
                                <label for="exampleInputEmail1">الطلب</label>
                                <select name="request_id" class="form-control users">
                                    
                                    @foreach($requests as $request)
                                           @if( $d->request_id == $request->id)
                                           <option value="{{$request->id}}" selected>{{$request->title}} </option>
                                           @else
                                           <option value="{{$request->id}}">{{$request->request}} </option>
                                           @endif

                                    @endforeach

                                </select> 
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">المستخدم</label>
                                <select name="user_id" class="form-control users">
                                    
                                    @foreach($users as $user)
                                           @if( $d->user_id == $user->id)
                                           <option value="{{$user->id}}" selected>{{$user->full_name}} </option>
                                           @else
                                           <option value="{{$user->id}}">{{$user->full_name}} </option>
                                           @endif
                                           @endforeach

                                </select> 
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">الخصم</label>
                                <input type="number" name="offer" class="form-control" id="exampleInputEmail1" value="" min="0.1" max="1.00">
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
                        <h4 class="modal-title">حذف الكوبون</h4></div>
                    <div class="modal-body">
                        <h5>هل انت متأكد من حذف هذا الكوبون ؟ </h5></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" onclick="javascript:deletedebt({{$d->id}});" data-dismiss="modal">حذف</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @endif
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

     function addcoupon(){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
            url: "{{url('/addcoupon')}}",
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
            url: "{{url('/editcoupon')}}",
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
            url: "{{url('/deletecoupon')}}",
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