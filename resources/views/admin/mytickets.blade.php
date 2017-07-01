@extends('layouts.main')
@section('content')
    <main id="app-main" class="app-main">
        <div class="wrap">
            <section class="app-content">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 pull-right">
                        <div class="p-md clearfix widget-def widget-panels">
                            <div class="widget-header">
                                <h3>
                                    <i class="menu-icon zmdi zmdi-layers zmdi-hc-lg"></i>
                                    <span>التذاكر</span> 
                                </h3>
                               @if(\Auth::user()->client == 1)
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addreply">
                                    <i class="fa fa-plus"></i> فتح تذكرة
                                </button>
                                @endif
                            </div>
                            <div class="widget-body">
                              
                                <div class="trans-data col-xs-12">
                                    <h3>تذاكر الدعم</h3>
                                    <div class="table-responsive">
                                <table class="table table-bordered table-hover " style="
    background-color: white;
">
                                 <tr>
                                        
                                       <th>عنوان</th>
                                       <th>صاحب التذكرة</th>
                                       
                                        <th>الحالة</th>
                                        <th > تاريخ التذكرة</th>
                                        <!-- <th> التحكم </th> -->
                                    </tr>
                                   
                            @foreach($tickets as $ticket)
                                   
                                    <tr>
                                        <td><a href="{{url('/showticket',['id'=>$ticket->id])}}">{{$ticket->topic, 60}}</a></td>
                                        <td><a href="{{route('User.show',$ticket->user->id)}} "> {{$ticket->user->full_name}} </a></td>
                                        
                                       
                                        <td>
                                        @if($ticket->status == 0)
                                        <a href=""><span  style="
    background-color: #10c469!important;
    display: inline-block!important;
    float: left!important;
    font-size: 11px!important;
    padding: 2px 5px!important;
    border-radius: 3px!important;
    color: #fff!important;
    margin-right: 5px;
">مغلق وتم الحل </span></a>@endif
                                        @if($ticket->status == 1)
 <a class="btn btn-success" href="" style=" display: inline-block!important;font-size: 11px!important;">اضغط هنا لإغلاق الطلب</a>
 ||
<a href=""><span  style="
    background-color: #f9c851!important;
    display: inline-block!important;
   
    font-size: 11px!important;
    padding: 2px 5px!important;
    border-radius: 3px!important;
    color: #fff!important;
    margin-right: 5px;
">قيد الحل</span></a>


@endif
                                        
                                            </td>
                                            <td>{{$ticket->created_at->toDayDateTimeString()}}</td>
                                            

                                    </tr>
                                    @endforeach

                                </table>
                            </div>
                                </div>
                           
                                
                                </div>
                         
                               
                            <!-- end widget-body -->
                            
                        </div><!-- end widget -->
                        <div class="widget-navigation">
                        {{$tickets->links()}}
                               <!--  <ul class="pagination">
                                    <li class="paginate_button previous"><a href="#">السابق</a></li>
                                    <li class="paginate_button active"><a href="#">1</a></li>
                                    <li class="paginate_button"><a href="#">2</a></li>
                                    <li class="paginate_button"><a href="#">3</a></li>
                                    <li class="paginate_button"><a href="#">4</a></li>
                                    <li class="paginate_button"><a href="#">5</a></li>
                                    <li class="paginate_button"><a href="#">6</a></li>
                                    <li class="paginate_button next" id="default-datatable_next"><a href="#">التالي</a></li>
                                </ul> -->
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
    </main>
       <div class="modal fade" id="addreply" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">إضافة رد</h4></div>
                    <div class="modal-body">
                        <form action="#" id="addform">
                        {{csrf_field()}}
                              
                          
                           
                           <div class="form-group">
                                <label for="exampleInputEmail1">الموضوع</label>
                                <input type="text" name="topic" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">الرسالة</label>
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
        <script type="text/javascript">
        	  function adddebt(){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
            url: "{{url('openaticket')}}",
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
        </script>
@endsection