@if(empty($notdonepayments))
 <div class="msg-no-panel col-md-12 col-xs-12">
                                    <h3 class="animated fadeInUp">عفوا لا يوجد طلبات لديك <i class="zmdi zmdi-alert-triangle"></i></h3>
                                </div>
                                @else
@foreach($notdonepayments as $request)
@php
                                                $inc = \App\Emppayment::where('request_id',$request->id)->first();
                                                @endphp
<div class="col-md-4 col-sm-6">
                                        
                                    <div class="widget">
                                        <div class="widget-body p-h-lg">
                                            <div class="media">
                                                <div class="media-left">
                                                    <div class="avatar avatar-lg avatar-circle"><img class="img-responsive" src="{{$request->user->avatar}}" alt="avatar"></div>
                                                </div>
                                                <div class="media-body">
                                                    <h4 class="media-heading">
                                                        <a href="{{route('User.show',$request->employee->id)}}">{{$request->employee->full_name}}</a>
                                                    </h4>
                                                    <small class="media-meta media-mail">
                                                        <a href="{{route('Request.show',$request->id)}}">{{$request->title}}</a>
                                                    </small>
                                                </div>
                                                <div class="profit-data">
                                                    <ul>
                                                        <li>
                                                            <span>تكلفة الطلب</span>
                                                            <p>{{$request->price}} دولار</p>
                                                        </li>
                                                        <li>
                                                            <span>أجر الموظفين</span>
                                                            <p>{{$request->price_employee}} دولار</p>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="media-bill">
                                                
                                                @if(empty($inc))
                                                <a href="#" class="btn mw-md btn-success" data-toggle="modal" data-target="#confirmModal{{$request->id}}">
                                                <i class="zmdi zmdi-flash"></i>
                                                تأكيد الدفع
                                            </a>
                                                @else
                                                <a href="#" class="btn mw-md btn-primary">
                                                <i class="zmdi zmdi-eye"></i>
                                                معرفة التفاصيل
                                            </a>
                                                @endif
                                            
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                @endforeach
                                <div class="widget-navigation">
                            {{$notdonepayments->links('vendor.pagination.notdonepaymentsp')}}
                        </div>
                                @endif