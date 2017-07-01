     @if(empty($notconfirmed))
   <div class="msg-no-panel col-md-12 col-xs-12">
                                    <h3 class="animated fadeInUp">عفوا لا يوجد طلبات لديك <i class="zmdi zmdi-alert-triangle"></i></h3>
                                </div>
                                @else

   @foreach($notconfirmed as $a)
                                        <div class="col-sm-6 col-md-4">
                                    <div class="panel panel-inverse">
                                        <div class="panel-heading" 
@if($a->status == 1)
                                        style="
    background-color: #10c469!important;
"
@elseif($a->status == 0)
style="
    background-color: #ff5b5b!important;
"
@endif
>
                                            <h4 class="panel-title">
                                                <a href="{{route('Request.show',$a->request_id)}}">{{$a->request->title}}</a>
                                            </h4></div>
                                        <div class="panel-body">
                                <div class="media">
                                    
                                    <div class="media-left">
                                        <div class="avatar avatar-xs avatar-circle"><img src="{{$a->user->avatar}}" alt="" class="mCS_img_loaded"> <i class="status status-online"></i></div>
                                    </div>
                                    <div class="media-body">
                                        
                                        <h5 class="media-heading">
                                            <a href="{{route('User.show',$a->user->id)}}">{{$a->user->full_name}}</a>
                                            <span class="time">
                                            <i class="zmdi zmdi-calendar-check"></i>
                                            <b>{{$a->created_at->toDayDateTimeString()}}</b>
                                        </span>
                                        </h5>
                                        
                                    </div>
                                    <div class="media-bill">
                                            <a href="{{url('showremittance')}}?id={{$a->id}}" class="btn mw-md btn-primary">
                                                <i class="zmdi zmdi-eye"></i>
                                                معاينة التحويل
                                            </a>
                                        </div>
                                    
                                </div>
                                        </div>
                                    </div>
                                </div>
                                   @endforeach     
                                    <div class="widget-navigation">
                                {{$notconfirmed->links('vendor.pagination.notconfirmedp')}}
                            </div>
                            @endif