@if(empty($donepayments))
 <div class="msg-no-panel col-md-12 col-xs-12">
                                    <h3 class="animated fadeInUp">عفوا لا يوجد طلبات لديك <i class="zmdi zmdi-alert-triangle"></i></h3>
                                </div>
                                @else
@foreach($donepayments as $dp)
<div class="col-md-4 col-sm-6">
                                        
                                    <div class="widget">
                                        <div class="widget-body p-h-lg">
                                            <div class="media">
                                                <div class="media-left">
                                                    <div class="avatar avatar-lg avatar-circle"><img class="img-responsive" src="{{$dp->user->avatar}}" alt="avatar"></div>
                                                </div>
                                                <div class="media-body">
                                                    <h4 class="media-heading">
                                                        <a href="{{route('User.show',$dp->user->id)}}">{{$dp->user->full_name}}</a>
                                                    </h4>
                                                    <small class="media-meta media-mail">
                                                        <a href="{{route('Request.show',$dp->request_id)}}">{{$dp->request->title}}</a>
                                                    </small>
                                                </div>
                                                <div class="profit-data">
                                                    <ul>
                                                        <li>
                                                            <span>تكلفة الطلب</span>
                                                            <p>{{$dp->request->price}} دولار</p>
                                                        </li>
                                                        <li>
                                                            <span>أجر الموظفين</span>
                                                            <p>{{$dp->request->price_employee}} دولار</p>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="media-bill">
                                              
                                                <a href="#" class="btn mw-md btn-primary">
                                                <i class="zmdi zmdi-eye"></i>
                                                معرفة التفاصيل
                                            </a>
                                                
                                            
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                @endforeach
                                <div class="widget-navigation">
                            
                        </div>
                                @endif