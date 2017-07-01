 @if(empty($notsure))
<div class="msg-no-panel col-md-12 col-xs-12">
                                    <h3 class="animated fadeInUp">عفوا لا يوجد طلبات لديك <i class="zmdi zmdi-alert-triangle"></i></h3>
                                </div>
 @else 


   @foreach($notsure as $request)
                                        <div class="col-md-4 col-sm-6">
                                    <div class="widget">
                                        <div class="widget-body p-h-lg">
                                            <div class="media">
                                                <div class="media-body">
                                                    <h4 class="media-heading">
                                                        <a href="{{route('Request.show',$request->id)}}">{{$request->title}}</a>
                                                    </h4>
                                                    <span class="time">
                                                        <i class="zmdi zmdi-calendar-check"></i>
                                                        <b>{{$request->created_at->toDayDateTimeString()}} </b>
                                                    </span>
                                                     @if($request->payment_status == 0) 
                                                    <span class="req-state empty">لا يوجد تحويلات</span>
                                                    @elseif($request->payment_status == 2)
                                                     <span class="req-state un-complete">غير مكتملة</span>
                                                    @elseif($request->payment_status == 1)
                                                    <span class="req-state complete">مكتملة الميزانية</span>
                                                    @elseif($request->payment_status == 3)
                                                    <span class="req-state " style="
    background-color: orange;
">تحويل غير مؤكد</span>
                                                    @endif
                                                </div>
                                                <div class="profit-data">
                                                    <ul>
                                                        <li>
                                                            <span>أرباح</span>
                                                            <p>{{$request->price - $request->price_employee}} دولار</p>
                                                        </li>
                                                        <li>
                                                            <span>أجر الموظف</span>
                                                            <p>{{$request->price_employee}} دولار</p>
                                                        </li>
                                                        <li>
                                                            <span>الإجمالي</span>
                                                            <p>{{$request->price}} دولار</p>
                                                        </li>
                                                    </ul>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                @endforeach
                                <div class="widget-navigation">
                            <ul class="pagination">
                             
                                {{$notsure->links('vendor.pagination.notsurep')}}
                            </ul>
                        </div>  

@endif


