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
                                    <span>فواتير الطلبات</span>
                                </h3>
                            </div>
                            <div class="widget-body">
                            @foreach($requests as $request)
                                <div class="col-sm-6 col-md-4">
                                    <div class="panel panel-inverse">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a href="{{route('Request.show',$request->id)}}">{{$request->title}}</a>
                                            </h4></div>
                                        <div class="panel-body">
                                <div class="media">
                                    
                                    <div class="media-left">
                                        <div class="avatar avatar-xs avatar-circle"><img src="{{$request->user->avatar}}" alt="" class="mCS_img_loaded"> <i class="status status-online"></i></div>
                                    </div>
                                    <div class="media-body">
                                        
                                        <h5 class="media-heading">
                                            <a href="{{route('User.show',$request->user->id)}}">{{$request->user->full_name}}</a>
                                            <span class="time">
                                            <i class="zmdi zmdi-calendar-check"></i>
                                            <b>{{$request->created_at->toDayDateTimeString()}}</b>
                                        </span>
                                        </h5>
                                        
                                    </div>
                                    <div class="media-bill">
                                            <a href="{{url('/makeinvoice')}}?id={{$request->id}}" class="btn mw-md btn-primary">
                                                <i class="zmdi zmdi-cloud-download"></i>
                                                تحميل فاتورة الطلب
                                            </a>
                                        </div>
                                    
                                </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div><!-- end widget-body -->
                            
                        </div><!-- end widget -->
                        <div class="widget-navigation">
                        {{$requests->links()}}
                                
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