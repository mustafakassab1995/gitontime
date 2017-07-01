     <div class="col-md-12 col-sm-12 col-xs-12 pull-right">
                        <div class="p-md clearfix widget-def widget-panels widget-users widget-financial">
                            <div class="widget-header">
                                <h3>
                                    <i class="menu-icon zmdi zmdi-case zmdi-hc-lg"></i>
                                    <span>التحويلات البنكية للإدارة</span>
                                </h3>
                            </div>
                            <div class="widget-body">
                                @if(empty($payments))
   <div class="msg-no-panel col-md-12 col-xs-12">
                                    <h3 class="animated fadeInUp">عفوا لا يوجد طلبات لديك <i class="zmdi zmdi-alert-triangle"></i></h3>
                                </div>
                                @else
                            @foreach($payments as $payment)
                                <div class="col-md-4 col-sm-6">
                                    <div class="widget">
                                        <div class="widget-body p-h-lg">
                                            <div class="media">
                                                <div class="media-left">
                                                    <div class="avatar avatar-lg avatar-circle"><img class="img-responsive" src="{{$payment->user->avatar}}" alt="avatar"></div>
                                                </div>
                                                <div class="media-body">
                                                    <h4 class="media-heading">
                                                        <a href="{{route('User.show',$payment->user->id)}}">{{$payment->user->full_name}}</a>
                                                    </h4>
                                                    <small class="media-meta media-mail">{{$payment->request->title}}</small>
                                                    <span class="time">
                                                        <i class="zmdi zmdi-calendar-check"></i>
                                                        <b>{{$payment->created_at->toDayDateTimeString()}}</b>
                                                    </span>
                                                </div>
                                                <div class="profit-data">
                                                    <ul>
                                                        <li>
                                                            <span>أرباح</span>
                                                            <p>{{$payment->request->price - $payment->request->price_employee}} دولار</p>
                                                        </li>
                                                        <li>
                                                            <span>أجر الموظف</span>
                                                            <p>{{$payment->request->price_employee}} دولار</p>
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
                            {{$payments->links()}}
                        </div>
                        @endif
                    </div>