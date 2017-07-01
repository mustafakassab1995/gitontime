@extends('layouts.main')
@section('content')
<main id="app-main" class="app-main in">
        <div class="wrap">
            <section class="app-content">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 pull-right">
                        <div class="p-md clearfix widget widget-def widget-panels widget-users widget-financial widget-request">
                            <div class="widget-header">
                                <h3>
                                    <i class="menu-icon zmdi zmdi-collection-text zmdi-hc-lg"></i>
                                    <span>معلومات الدفع</span>
                                </h3>
                                <div class="time_actions">
                                @if($rem->status == 0)
                                   @if($rem->amount == $rem->request->price)
                                   <span class="label-state"  style="background-color:#a7d1f2!important;
                                                    display: inline-block!important;
                                                    font-size: 20px!important;
                                                    width:100%;
    padding: 2px 5px!important;
    border-radius: 3px!important;
    color: #fff!important;
">تحويل كامل يحتاج لتأكيد </span>
                                   @elseif($rem->amount != $rem->request->price)
                                   <span class="label-state"  style="background-color:#a7d1f2!important;
                                                    display: inline-block!important;
                                                    font-size: 20px!important;
                                                    width:100%;
    padding: 2px 5px!important;
    border-radius: 3px!important;
    color: #fff!important;
">دفعة تحتاج لتأكيد </span> 
@endif
@elseif($rem->status == 1)
@if($rem->amount == $rem->request->price)
<span class="label-state"  style="background-color:#10c469!important;
                                                    display: inline-block!important;
                                                    font-size: 20px!important;
                                                    width:100%;
    padding: 2px 5px!important;
    border-radius: 3px!important;
    color: #fff!important;
">دفع كامل تم تأكيده </span>
@elseif($rem->amount != $rem->request->price)
<span class="label-state"  style="background-color:#10c469!important;
                                                    display: inline-block!important;
                                                    font-size: 20px!important;
                                                    width:100%;
    padding: 2px 5px!important;
    border-radius: 3px!important;
    color: #fff!important;
">دفعة  تم تأكيدها </span>
@endif
@endif

                                </div>
                            </div>
                            <div class="widget-body">
                                <div class="trans-data col-xs-12">
                                    <h3>معلومات الدفعة</h3>
                                    <div class="table-responsive">
                                <table class="table table-bordered  table-hover">
                                    <tbody><tr>
                                        
                                        <th>اسم محول الدفعة</th>
                                        <th>المبلغ المحول</th>
                                        <th>وقت وصول الدفعة</th>
                                        <th>اسم البنك</th>
                                        <th>رقم الحوالة</th>
                                        <th>رقم جوال المحول</th>
                                    </tr>
                                    <tr>
                                        <td>{{$rem->adapter_name}} </td>
                                        <td>{{$rem->amount}}</td>
                                        <td> {{$rem->created_at->toDayDateTimeString()}}</td>
                                        <td> {{$rem->bank_name}}</td>
                                        <td>{{$rem->transaction_number}}</td>
                                        <td>{{$rem->user->phone}}</td>
                                    </tr>
                                </tbody></table>
                            </div>
                                </div>
                                <div class="trans-data col-xs-12">
                                    <h3>معلومات الطلب</h3>
                                    <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <tbody><tr>
                                        
                                        <th>اسم صاحب الطلب</th>
                                        <th>وقت انشاء الطلب</th>
                                        <th>الميزانية المحددة للطلب</th>
                                        <th>عنوان الطلب</th>
                                        
                                    </tr>
                                    <tr>
                                        <td>{{$rem->user->full_name}} </td>
                                        <td>{{$rem->request->created_at->toDayDateTimeString()}} </td>
                                        <td>{{$rem->request->price}} دولار </td>
                                        <td><a href="{{route('Request.show',$rem->request->id)}} ">{{$rem->request->title}}</a>  </td>
                                    </tr>
                                </tbody></table>
                            </div>
                                </div>
                                <div class="trans-data col-xs-12">
                                    
                                    <div class="confirm-btns">
                                    @if($rem->status == 0)
                                    @if($rem->amount == $rem->request->price)
                                        <button type="submit" class="btn btn-success"  onclick="javascript:acceptpayment({{$rem->id}},1);">تأكيد الدفع كامل</button>
                                        @elseif($rem->amount != $rem->request->price)
                                        <button type="submit" class="btn btn-success" onclick="javascript:acceptpayment({{$rem->id}},2);">تاكيد الدفع كدفع </button>
                                        @endif
                                        <button type="reset" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" >تجاهل</button>
                                        @endif
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
                    <div class="copyright pull-right">جميع الحقوق محفوظة لدي شبكة اون تايم 2017 ©</div>
                </div>
            </footer>
        </div>
         <div id="doneconfirmbitpayment" class="modal fade" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">تمت المهمة</h4></div>
                        <div class="modal-body">
                            <h5 class="btn  btn-success" id="shitl">تم تأكيد دفعة من مبلغ الطلب</h5></div>
                        <div class="modal-footer">
                            
                        </div>
                    </div>
                </div>
            </div>
       <div id="doneconfirmfullpayment" class="modal fade" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">تمت المهمة</h4></div>
                        <div class="modal-body">
                            <h5 class="btn  btn-success" id="shitl">تم تأكيد الدفع بشكل كامل</h5></div>
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
        <div id="deleteModal" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">حذف الدفعة</h4></div>
                    <div class="modal-body">
                        <h5>هل انت متأكد من حذف هذا الدفعة ؟</h5></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="javascript:acceptpayment({{$rem->id}},3);">حذف</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
<script type="text/javascript">
         function acceptpayment(id,status){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            var status = status ;
            var id = id ;
        
            $.ajax({
            url: "{{url('/acceptpayment')}}",
           type: 'POST',
          data: {_token:CSRF_TOKEN , id : id , status : status},
          dataType: 'JSON',
          success: function (data) {

             if(data['result']==1){
                    $('#doneconfirmfullpayment').modal('toggle');

               setTimeout(
                  function() 
                  {
                    location.reload();
                  }, 5000);

                
             }
              if(data['result']==2){
                    $('#doneconfirmbitpayment').modal('toggle');

               setTimeout(
                  function() 
                  {
                    location.reload();
                  }, 5000);

                
             }
              if(data['result']==3){
                    $('#done').modal('toggle');

               window.location.replace("{{url('financialremittance')}}");

                
             }
             if(data['result']==0){
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