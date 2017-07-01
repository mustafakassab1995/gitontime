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
                                    <span>جميع الطلبات</span> <br><br><a href=""><span  style="
    background-color: #10c469!important;
    display: inline-block!important;
    float: left!important;
    font-size: 11px!important;
    padding: 2px 5px!important;
    border-radius: 3px!important;
    color: #fff!important;
    margin-right: 5px;
">مكتملة </span></a>
<a href=""><span  style="
    background-color: #f9c851!important;
    display: inline-block!important;
    float: left!important;
    font-size: 11px!important;
    padding: 2px 5px!important;
    border-radius: 3px!important;
    color: #fff!important;
    margin-right: 5px;
">قيد التنفيذ</span></a>
<a href=""><span  style="
    background-color:#3b3e47!important;
    display: inline-block!important;
    float: left!important;
    font-size: 11px!important;
    padding: 2px 5px!important;
    border-radius: 3px!important;
    color: #fff!important;
    margin-right: 5px;
">معلقة</span></a>
<a href=""><span  style="
    background-color:#188ae2!important;
    display: inline-block!important;
    float: left!important;
    font-size: 11px!important;
    padding: 2px 5px!important;
    border-radius: 3px!important;
    color: #fff!important;
    margin-right: 5px;
">قيد المراجعة</span></a>
<a href=""><span  style="
    background-color:#ff5b5b!important;
    display: inline-block!important;
    float: left!important;
    font-size: 11px!important;
    padding: 2px 5px!important;
    border-radius: 3px!important;
    color: #fff!important;
    margin-right: 5px;
">ملغية</span></a>
                                </h3>
                            </div>
                            <div class="widget-body">
                              
                                <div class="trans-data col-xs-12">
                                    <h3>الطلبات</h3>
                                    <div class="table-responsive">
                                <table class="table table-bordered table-hover " style="
    background-color: white;
">
                                 <tr>
                                        
                                       <th>اسم الطلب</th>
                                       <th>صاحب الطلب</th>
                                       <th>وصف الطلب</th>
                                        <th>الحالة</th>
                                        <!-- <th > التوقيع</th>
                                        <th> التحكم </th> -->
                                    </tr>
                                   
                            @foreach($requests as $request)
                                   
                                    <tr>
                                        <td><a href="{{route('Request.show',$request->id)}}">{{$request->title, 60}}</a></td>
                                        <td><a href="{{route('User.show',$request->user->id)}} "> {{$request->user->full_name}} </a></td>
                                        <td><p> {{$request->content}}</p></td>
                                       
                                        <td>
                                        @if($request->status == 4)
                                        <a href=""><span  style="
    background-color: #10c469!important;
    display: inline-block!important;
    float: left!important;
    font-size: 11px!important;
    padding: 2px 5px!important;
    border-radius: 3px!important;
    color: #fff!important;
    margin-right: 5px;
">مكتملة </span></a>@endif
                                        @if($request->status == 2)

<a href=""><span  style="
    background-color: #f9c851!important;
    display: inline-block!important;
    float: left!important;
    font-size: 11px!important;
    padding: 2px 5px!important;
    border-radius: 3px!important;
    color: #fff!important;
    margin-right: 5px;
">قيد التنفيذ</span></a>@endif
                                        @if($request->status == 1)

<a href=""><span  style="
    background-color:#3b3e47!important;
    display: inline-block!important;
    float: left!important;
    font-size: 11px!important;
    padding: 2px 5px!important;
    border-radius: 3px!important;
    color: #fff!important;
    margin-right: 5px;
">معلقة</span></a>
@endif
                                        @if($request->status == 0)

<a href=""><span  style="
    background-color:#188ae2!important;
    display: inline-block!important;
    float: left!important;
    font-size: 11px!important;
    padding: 2px 5px!important;
    border-radius: 3px!important;
    color: #fff!important;
    margin-right: 5px;
">قيد المراجعة</span></a>
@endif
                                        @if($request->status == 3)

<a href=""><span  style="
    background-color:#ff5b5b!important;
    display: inline-block!important;
    float: left!important;
    font-size: 11px!important;
    padding: 2px 5px!important;
    border-radius: 3px!important;
    color: #fff!important;
    margin-right: 5px;
">ملغية</span></a>
@endif
                                            </td>
                                            <td>{{$request->created_at->toDayDateTimeString()}}</td>
                                    </tr>
                                    @endforeach

                                </table>
                            </div>
                                </div>
                           
                                
                                </div>
                         
                               
                            <!-- end widget-body -->
                            
                        </div><!-- end widget -->
                        <div class="widget-navigation">
                        {{$requests->links()}}
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
@endsection