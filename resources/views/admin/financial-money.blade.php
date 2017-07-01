@extends('layouts.main')
@section('content')
    <main id="app-main" class="app-main">
        <div class="wrap">
            <section class="app-content">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 pull-right">
                        <div class="p-md clearfix widget-def widget-panels widget-users widget-financial widget-money">
                            <div class="widget-header">
                                <h3>
                                    <i class="menu-icon zmdi zmdi-case zmdi-hc-lg"></i>
                                    <span>المالية / الرواتب</span>
                                </h3>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
                                    <i class="fa fa-plus"></i> إضافة راتب جديد
                                </button>
                            </div>
                            <div class="widget-body">
                            @foreach($salaries as $salary)
                                <div class="col-md-4 col-sm-6">
                                    <div class="widget">
                                        <div class="widget-body p-h-lg">
                                            <div class="media">
                                                <div class="media-left">
                                                    <div class="avatar avatar-lg avatar-circle"><img class="img-responsive" src="{{$salary->user->avatar}}" alt="avatar"></div>
                                                </div>
                                                <div class="media-body">
                                                    <h4 class="media-heading">
                                                        
                                                        {{$salary->user->full_name}}
                                                    </h4>
                                                    <div class="btn-group" role="group">
                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal{{$salary->id}}">
                                                            <span class="zmdi zmdi-edit"></span>
                                                        </button>
                                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{$salary->id}}">
                                                            <span class="zmdi zmdi-delete"></span>
                                                        </button>

                                                    </div>
                                                    <small class="media-meta text-purple">{{$salary->note}}</small>
                                                    <span class="time">
                                            <i class="zmdi zmdi-calendar-check"></i>
                                            <b>{{$salary->created_at->toDayDateTimeString()}}</b>
                                        </span>
                                                </div>
                                                <div class="profit-data">
                                                    <ul>
                                                        <li>
                                                            <span>المبلغ</span>
                                                            <p>{{$salary->amount}} دولار</p>
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
                           {{$salaries->links()}}
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
        @foreach($salaries as $salary)
        <div class="modal fade" id="editModal{{$salary->id}}" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">تعديل الراتب</h4></div>
                    <div class="modal-body">
                        <form action="#" id="editform{{$salary->id}}">
{{csrf_field()}}
<input type="hidden" name="id" value="{{$salary->id}}">
                            <div class="form-group">
                                <label for="users">الموظف</label>
                               <select class="form-control users" name="user_id" >
                                         
                                           @foreach($users as $user)
                                           @if((!empty($requests->employee_id)) && $requests->employee_id == $user->id)
                                           <option value="{{$user->id}}" selected>{{$user->full_name}} </option>
                                           @endif
                                           <option value="{{$user->id}}">{{$user->full_name}} </option>
                                           @endforeach
    </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">المبلغ</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" value="{{$salary->amount}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">ملاحظات</label>
                                <textarea name="mail_body_field" id="mail_body_field" cols="30" rows="5" class="form-control">{{$salary->note}}</textarea>
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">

                        <button type="button" data-dismiss="modal" class="btn btn-primary" onclick="javascript:editform()">حفظ التعديل</button>
                    </div>
                </div>
            </div>

        </div>
        @endforeach
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">تعديل الراتب</h4></div>
                    <div class="modal-body">
                        <form action="#" id="addform">
{{csrf_field()}}

                            <div class="form-group">
                                <label for="emps">الموظف</label>
                                <select class="form-control users" name="user_id" id="emps">
                                         
                                           @foreach($users as $user)
                                           @if((!empty($requests->employee_id)) && $requests->employee_id == $user->id)
                                           <option value="{{$user->id}}" selected>{{$user->full_name}} </option>
                                           @endif
                                           <option value="{{$user->id}}">{{$user->full_name}} </option>
                                           @endforeach
    </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">المبلغ</label>
                                <input type="text" name="amount" class="form-control" id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">ملاحظات</label>
                                <textarea name="note" id="mail_body_field" cols="30" rows="5" class="form-control"></textarea>
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">

                        <button type="button" data-dismiss="modal" class="btn btn-primary" onclick="javascript:addsalary()">حفظ</button>
                    </div>
                </div>
            </div>

        </div>
        @foreach($salaries as $salary)
        <div id="deleteModal{{$salary->id}}" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">حذف الراتب</h4></div>
                    <div class="modal-body">
                        <h5>هل انت متأكد من حذف هذا الراتب ؟</h5></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="javascript:deletesalary({{$salary->id}})">حذف</button>
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
                            <h5 class="btn  btn-success" id="shitl">تمت المهمة بنجاح</h5></div>
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
            <script type="text/javascript">
                 $(document).ready(function() {
                $(".users").select2({
    
     maximumSelectionSize: 1,
});
            });

    function addsalary(){
        $.ajax({
            url : '{{url("addsalary")}}',
             type: 'post',
          data: $("#addform").serialize(),
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



            </script>
    </main>
    @endsection