@extends('layouts.main')
@section('content')
    <main id="app-main" class="app-main">
        <div class="wrap">
            <section class="app-content">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 pull-right">
                        <div class="p-md clearfix widget-def widget-panels widget-users widget-financial widget-money widget-debt widget-timetable">
                            <div class="widget-header">
                                <h3>
                                    <i class="menu-icon zmdi zmdi-collection-text zmdi-hc-lg"></i>
                                    <span>الاستضافة</span>
                                </h3>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addtable">
                                    <i class="fa fa-plus"></i> إضافة جدول
                                </button>
                            </div>
                            <div class="widget-body">
                                <div class="col-md-12">
                        <div class="widget">
                            <div class="widget-body">
                                <div class="table-responsive">
                                    <table id="default-datatable" data-plugin="DataTable" class="table table-striped" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>عنوان الخدمة</th>
                                                <th>المستضيف</th>
                                                <th>مدة الحجز</th>
                                                <th>المبلغ</th>
                                                <th>الايام المتبقية</th>
                                            </tr>
                                        </thead>
                                        <tbody id="table1">
                                        @foreach($times as $time)
                                            <tr>
                                                <td><a  href="{{route('Timetable.show',$time->id)}}">{{$time->name}}</a></td>
                                                <td >{{$time->hosting}}</td>
                                                <td id="days">{{$time->days}}</td>
                                                <td id="price">{{$time->price}}</td>
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
                                            @endforeach
                                        </tbody>
                                    </table>
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

        <div class="modal fade" id="addtable" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">إضافة جدول جديد</h4></div>
                    <div class="modal-body">
                        <form action="#" id="addtime">
                    {{csrf_field()}}

                            <div class="form-group">
                                <label for="exampleInputEmail1">عنوان الجدول</label>
                                <input type="text" name="name" class="form-control" id="" >
                                <input type="text" name="user_id" class="form-control" value="{{\Auth::user()->id}}"  >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">المستضيف</label>
                                <input type="text" name="hosting" class="form-control" id="" >
                            </div>
                            <div class="form-group" style="position: relative">
                                            <label for="datetimepicker5">تاريخ الاشتراك</label>
                                            <input type="date" name="signup_date" id="datetimepicker5" class="form-control" data-plugin="datetimepicker" data-options="{ defaultDate: '3/27/2016' }" > 
                            </div>
                            <div class="form-group" style="position: relative">
                                            <label for="datetimepicker5">تاريخ الانتهاء</label>
                                            <input type="date" name="expiration_date" id="datetimepicker5" class="form-control" data-plugin="datetimepicker" data-options="{ defaultDate: '3/27/2016' }" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">المبلغ المدفوع</label>
                                <input type="text" name="price" class="form-control" id="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">مدة الحجز</label>
                                <input type="text" name="days" class="form-control" id="" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">اسم المستخدم</label>
                                <input type="text" name="username" class="form-control" id="" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">كلمة المرور</label>
                                <input type="password" name="password" class="form-control" id="" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">ملاحظات</label>
                                <textarea name="note" id="" cols="30" rows="5" class="form-control"></textarea>
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">

                        <button type="button" data-dismiss="modal" class="btn btn-primary" onclick="javascript:addtimetable();">اضافة الجدول</button>
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
          function addtimetable(){
     
                console.log("دخل");
        var id = id ;
            $.ajax({
            url: "{{route('Timetable.store')}}",
           type: 'POST',
          data: $("#addtime").serialize(),
          dataType: 'JSON',
          success: function (data) {
            
             if(data['result']==1){
                var id = data['time']['id'];
              $('#table1').append( '<tr>'+
                                                '<td><a  href="'+'{{route("Timetable.index")}}'+'/'+id+'">'+data['time']['name'] +'</a></td>'+
                                                '<td >'+data['time']['hosting']+'</td>'+
                                                '<td >'+data['time']['days']+'</td>'+
                                                '<td >'+data['time']['price']+'</td>'+
                                                '<td>'+data['time']['days']+'</td>'+
                                            '</tr>');
           
                
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