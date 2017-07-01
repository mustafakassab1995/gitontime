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
                                    <i class="menu-icon zmdi zmdi-collection-text zmdi-hc-lg"></i>
                                    <span>استضافة</span>
                                </h3>
                                <div class="time_actions">
                                    <button type="button" class="btn btn-danger"  data-target="#deleteModal" data-toggle="modal" >
                                        <i class="fa fa-trash"></i>
                                    </button>
                                    
                                    <button type="button" class="btn btn-primary" data-target="#editModal" data-toggle="modal">
                                        <i class="fa fa-pencil"></i>
                                    </button>
                                    
                                </div>
                            </div>
                            <div class="widget-body">
                                <div class="trans-data col-xs-12">
                                    <h3>تفاصيل اساسية</h3>
                                    <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <tr>
                                        
                                        <th>إسم البرنامج</th>
                                        <th>المستضيف</th>
                                        <th>تاريخ الاشتراك</th>
                                        <th>تاريخ الانتهاء</th>
                                        <th>مدة الحجز</th>
                                        <th>المبلغ المدفوع</th>
                                        <th>أيما متبقية</th>
                                    </tr>
                                    <tr>
                                        <td id="name">{{$time->name}}</td>
                                        <td id="hosting">{{$time->hosting}}</td>
                                        <td id="signup_date"> {{$time->signup_date}}</td>
                                        <td id="expiration_date"> {{$time->expiration_date}}</td>
                                        <td id="days">{{$time->days}} يوم</td>
                                        <td id="price">{{$time->price}} دولار</td>
                                        @php
                                                $now = time(); // or your date as well
$your_date = strtotime($time->expiration_date);
if($now > $your_date){
    $s = "لم يتبقى وقت";
}
else{
$datediff = $now - $your_date;

$s = floor($datediff / (60 * 60 * 24));
$s = $s * -1 ;
$s = $s."يوم";
}
                                                @endphp
                                                <td>{{$s}}</td>
                                    </tr>
                                </table>
                            </div>
                                </div>
                                <div class="trans-data col-xs-12">
                                    <h3>معلومات الدخول</h3>
                                    <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <tr>
                                        
                                        <th>إسم المستخدم</th>
                                        <th>كلمة المرور</th>
                                    </tr>
                                    <tr>
                                        <td id="username">{{$time->username}}</td>
                                        <td id="password">{{$time->password}}</td>
                                    </tr>
                                </table>
                            </div>
                                </div>
                                <div class="trans-data col-xs-12">
                                    <h3>ملاحظات</h3>
                                    <div class="table-responsive">
                                <p id="note" class="ads_notes">{{$time->note}}</p>
                            </div>
                                    <div class="confirm-btns">
                                       <!--  <input type="submit" class="btn btn-success" value="قبول الطلب">
                                        <input type="reset" class="btn btn-danger" value="تجاهل الطلب"> -->
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
                        <h4 class="modal-title">إضافة جدول جديد</h4></div>
                    <div class="modal-body">
                        <form action="#" id="edittime">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="put" />

                            <div class="form-group">
                                <label for="exampleInputEmail1">عنوان الجدول</label>
                                <input type="text" name="name" class="form-control" id="" value="{{$time->name}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">المستضيف</label>
                                <input type="text" name="hosting" class="form-control" id="" value="{{$time->hosting}}">
                            </div>
                            <div class="form-group" style="position: relative">
                                            <label for="datetimepicker5">تاريخ الاشتراك</label>
                                            <input type="date" name="signup_date" id="datetimepicker5" class="form-control" data-plugin="datetimepicker" data-options="{ defaultDate: '3/27/2016' }" value="{{$time->signup_date}}"> 
                            </div>
                            <div class="form-group" style="position: relative">
                                            <label for="datetimepicker5">تاريخ الانتهاء</label>
                                            <input type="date" name="expiration_date" id="datetimepicker5" class="form-control" data-plugin="datetimepicker" data-options="{ defaultDate: '3/27/2016' }" value="{{$time->expiration_date}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">المبلغ المدفوع</label>
                                <input type="text" name="price" class="form-control" id="" value="{{$time->price}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">مدة الحجز</label>
                                <input type="text" name="days" class="form-control" id="" value="{{$time->days}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">اسم المستخدم</label>
                                <input type="text" name="username" class="form-control" id="" value="{{$time->username}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">كلمة المرور</label>
                                <input type="password" name="password" class="form-control" id="" value="{{$time->password}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">ملاحظات</label>
                                <textarea name="note" id="" cols="30" rows="5" class="form-control">{{$time->note}}</textarea>
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">

                        <button type="button" data-dismiss="modal" class="btn btn-primary" onclick="javascript:updatetime({{$time->id}})">اضافة الجدول</button>
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
                    <form action="{{route('Timetable.destroy',$time->id)}} " method="Post">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="delete" />
                        <button type="submit" class="btn btn-danger" >حذف</button></form>
                    </div>
                </div>
            </div>
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
        
      $(document).ready(function(){
      
    });
      
        
               function updatetime(id){
     
                console.log("دخل");
        var id = id ;
            $.ajax({
            url: "{{route('Timetable.index')}}/"+id,
           type: 'PUT',
          data: $("#edittime").serialize(),
          dataType: 'JSON',
          success: function (data) {
            
             if(data['result']==1){
                var id = data['time']['id'];
              
           
                 $('#name').text(data['time']['name']);
                 $('#hosting').text(data['time']['hosting']);
                 $('#username').text(data['time']['username']);
                 $('#password').text(data['time']['password']);
                 $('#expiration_date').text(data['time']['expiration_date']);
                 $('#signup_date').text(data['time']['signup_date']);
                 $('#price').text(data['time']['price']);
                 $('#note').text(data['time']['note']);
                 $('#days').text(data['time']['days']);
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