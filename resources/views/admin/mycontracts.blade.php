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
                                    <i class="menu-icon zmdi zmdi-case zmdi-hc-lg"></i>
                                    <span>العقود</span>
                                </h3>
                                @if(\Auth::user()->admin==1)
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addcontract">
                                    <i class="fa fa-plus"></i> إضافة عقد جديد
                                </button>
                                @endif
                            </div>
                            <div class="widget-body">
                              
                                <div class="trans-data col-xs-12">
                                    <h3>معلومات العقود</h3>
                                    <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                 @if(\Auth::user()->admin==1)
                                 <tr>
                                        
                                       <th>تحميل العقد</th>
                                       <th>اسم الطرف الثاني</th>
                                        <th>تاريخ العقد</th>
                                        <th > التوقيع</th>
                                        <th> التحكم </th>
                                    </tr>
                                   
                                    @foreach($contracts as $d)
                                    <tr>
                                        <td><a href="{{$d->file->file_name}} "> تحميل العقد </a></td>
                                        <td><a href="{{route('User.show',$d->user->id)}} "> {{$d->user->full_name}} </a></td>
                                        <td>{{$d->created_at}}</td>
                                        @if($d->status == 1)
                                        <td>تم التوقيع</td>
                                        @else
                                        <td>لم يتم التوقيع بعد</td>
                                        @endif
                                        <td>
                                        <form action="{{url('deletecontract')}} " method="post">
                                            {{csrf_field()}}
                                            <input type="hidden" name="id" value="{{$d->id}}">
                                             <button type="submit" class="btn  btn-accom" >
                                                   حذف العقد
                                                </button>   
                                            </form>
                                            </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        
                                       <th>تحميل العقد</th>
                                        <th>تاريخ العقد</th>
                                        <th > التوقيع</th>
                                    </tr>
                                   
                                    @foreach($contracts as $d)
                                    <tr>
                                        <td><a href="{{$d->file->file_name}} "> تحميل العقد </a></td>
                                        <td>{{$d->created_at}}</td>
                                        @if($d->status == 1)
                                        <td>تم التوقيع</td>
                                        @else
                                        <td>
                                            <form action="{{url('signcontract')}} " method="post">
                                            {{csrf_field()}}
                                            <input type="hidden" name="id" value="{{$d->id}}">
                                             <button type="submit" class="btn  btn-accom" >
                                                    اضغط هنا اذا كنت موافق على العقد
                                                </button>   
                                            </form>


                                        </td>
                                        @endif
                                    </tr>
                                    @endforeach
                                    @endif
                                </table>
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
        @if(\Auth::user()->admin==1)
                    <div class="modal fade" id="addcontract" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">اضافة عقد</h4></div>
                        <div class="modal-body">
                            <form action="{{url('newcontract')}}" method="post" id="ncont">
                    {{csrf_field()}}

                               
                            
                                
                                      <div class="form-group">
                                        <label for="exampleInputEmail1">اسم الطرف الثاني</label>
                                         <select class="form-control" name="user_id" id="users">
                                         
                                           @foreach($users as $user)
                                          
                                           <option value="{{$user->id}}">{{$user->full_name}} </option>
                                           @endforeach
    </select>
                                    </div>
                            </form>
                                                          <input  name="file"  type="file" class="file-loading ll">

                        </div>
                        <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn btn-primary" id="kv">ارسال الطلب</button>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        
    </main>
    <script type="text/javascript">
     $(document).ready(function() { 
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        var form = document.getElementById("ncont");


// 2. Get a reference to our preferred element (link/button, see below) and
//    add an event listener for the "click" event.
document.getElementById("kv").addEventListener("click", function () {
  form.submit();
});

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