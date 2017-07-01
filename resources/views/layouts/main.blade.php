<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="description" content="Admin, Dashboard, Bootstrap">
    <link rel="shortcut icon" sizes="196x196" href="{{asset('assets/images/logo.png')}}">
    <title>أون تايم - شركة عبد العزيز الحارثي</title>
    <link rel="stylesheet" href="{{asset('assets/bower/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/bower/material-design-iconic-font/dist/css/material-design-iconic-font.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/app.min.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900,300">
    <script src="{{asset('assets/bower/breakpoints.js/dist/breakpoints.min.js')}}"></script>
    <!-- <link rel="stylesheet" type="text/css" href="{{asset('assets/bower/switchery/dist/switchery.min.css')}}"> -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/bower/select2/dist/css/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/jquery.mCustomScrollbar.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
     <link rel="stylesheet" href="{{asset('assets/css/star-rating.min.css')}}">
     <link rel="stylesheet" href="{{asset('assets/bower/bootstrap-fileInput/fileinput.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/ontime.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/ontime-rtl.css')}}">
    <!-- <link rel="stylesheet" type="text/css" href="{{asset('assets/css/datatables.css')}}"> -->
    

 @if(\Auth::user()->deleted==1)
    <script type="text/javascript">
       jQuery(document).ready(function() {
        document.getElementById('logout-form').submit();
       }); 


    </script>
    @endif
    
@if(\Auth::guard(null)->check())
    @if(\Auth::user()->admin==1)

@else
      <script >
    function clearData(){
        window.clipboardData.setData('text','') 
    }
    function cldata(){
        if(clipboardData){
            clipboardData.clearData();
        }
    }
    setInterval("cldata();", 1000);
</script>
@endif

@else
   <script >
    function clearData(){
        window.clipboardData.setData('text','') 
    }
    function cldata(){
        if(clipboardData){
            clipboardData.clearData();
        }
    }
    setInterval("cldata();", 1000);
</script>
  @endif
    <script>
        Breakpoints();
    </script>
</head>

<body
class="menubar-left menubar-unfold menubar-light theme-primary amir-rtl" 
 @if(\Auth::guard(null)->check())
    @if(\Auth::user()->admin==1)

@else
      ondragstart="return false;" onselectstart="return false;"  oncontextmenu="return false;" onload="clearData();" onblur="clearData();
@endif

@else
  ondragstart="return false;" onselectstart="return false;"  oncontextmenu="return false;" onload="clearData();" onblur="clearData();
 @endif
     ">
    <nav id="app-navbar" class="navbar navbar-inverse navbar-fixed-top primary">
        <div class="navbar-header">
            <button type="button" id="menubar-toggle-btn" class="navbar-toggle visible-xs-inline-block navbar-toggle-left hamburger hamburger--collapse js-hamburger"><span class="sr-only">Toggle navigation</span> <span class="hamburger-box"><span class="hamburger-inner"></span></span>
            </button>
            <button type="button" class="navbar-toggle navbar-toggle-right collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false"><span class="sr-only">Toggle navigation</span> <span class="zmdi zmdi-hc-lg zmdi-more"></span></button>
            <button type="button" class="navbar-toggle navbar-toggle-right collapsed" data-toggle="collapse" data-target="#navbar-search" aria-expanded="false"><span class="sr-only">Toggle navigation</span> <span class="zmdi zmdi-hc-lg zmdi-search"></span></button> <a href="#" class="navbar-brand"><span class="brand-icon"></span> <span class="brand-name">ONTIME</span></a></div>
        <div class="navbar-container container-fluid">
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <ul class="nav navbar-toolbar navbar-toolbar-left navbar-right">
                    <li class="hidden-float hidden-menubar-top"><a href="javascript:void(0)" role="button" id="menubar-fold-btn" class="hamburger hamburger--arrowalt is-active js-hamburger"><span class="hamburger-box"><span class="hamburger-inner"></span></span></a></li>
                    @unless(\Auth::user()->employee==1)
                        <li>
                        
                        <h5 class="page-title hidden-menubar-top hidden-float"><a href="{{url('orderspanels')}}" style="color: white;">طلب جديد</a> </h5></li>
                        @endunless

                         <li>
                        
                        <h5 class="page-title hidden-menubar-top hidden-float"><a href="{{url('banks')}}" style="color: white;">الحسابات البنكية</a> </h5></li>
                </ul>
                <ul class="nav navbar-toolbar navbar-toolbar-right navbar-left">
                    <li class="nav-item dropdown hidden-float"><a href="javascript:void(0)" data-toggle="collapse" data-target="#navbar-search" aria-expanded="false"><i class="zmdi zmdi-hc-lg zmdi-search"></i></a></li>
                    <li><a href="javascript:void(0)" data-toggle="modal" data-target="#contact-support" title="مراسلة الادارة"><i class="zmdi zmdi-hc-lg zmdi-headset-mic"></i></a></li>
                    <li class="dropdown "><a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="zmdi zmdi-hc-lg zmdi-notifications " onclick="myFunction()" id="notiscount">
                    @php
                     $user =\Auth::user();
                     echo count($user->unreadNotifications);
                    @endphp

                    </i></a>
                        <div class="media-group dropdown-menu animated flipInY top-nav-inner" id="notis">
                             <?php
                        $user =\Auth::user();
$data = [];
$i=0;
foreach ($user->notifications as $notification) {
    $d = $notification->data;
    if( strpos($d['id'], 'msg')){
    echo' <a href="'.$d['url'].'" class="media-group-item notification" data-id="'.$d['id'].'">
                                <div class="media">
                                    <div class="media-left">
                                        <div class="avatar avatar-xs avatar-circle"><img src="'.$d['e']['sender']['avatar'].'" alt=""> <i class="status status-online"></i></div>
                                    </div>
                                    <div class="media-body">
                                        <h5 class="media-heading">'.$d['e']['sender']['full_name'].'</h5>
                                        <p class="media-meta">'.$d['msg'].'</p>
                                    </div>
                                </div>
                            </a>';}
                            else{
                            echo '
                            <a href="'.$d['url'].'" class="media-group-item notification" data-id="'.$d['id'].'">
                                <div class="media">
                                    <div class="media-body">
                                        <p class="media-meta">'.$d['msg'].'</p>
                                    </div>
                                </div>
                            </a>
                            ';
                            }
                            if($i>4){
                            break; }
 $i++;  
}



                        ?>
                        <a href="{{url('showallnotifications')}} " class="media-group-item notification" data-id="">
                                
                                    اضغط لمشاهدة الجميع 
                            </a>
                            <!-- <a href="" class="media-group-item notification" data-id="">
                                <div class="media">
                                    <div class="media-left">
                                        <div class="avatar avatar-xs avatar-circle"><img src="{{asset('assets/images/221.jpg')}}" alt=""> <i class="status status-online"></i></div>
                                    </div>
                                    <div class="media-body">
                                        <h5 class="media-heading">أمير ناجح</h5>
                                        <p class="media-meta">قام بارسال رسالة جديدة الي لوحة تحكم هذا الموقعقام بارسال رسالة جديدة الي لوحة تحكم هذا الموقعقام بارسال رسالة جديدة الي لوحة تحكم هذا الموقع</p>
                                    </div>
                                </div>
                            </a> -->
                            
                        </div>
                    </li>
                    <li class="dropdown"><a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="zmdi zmdi-hc-lg zmdi-settings"></i></a>
                        <ul class="dropdown-menu animated flipInY">
                            <li><a href="{{route('User.show',\Auth::user()->id)}}"><i class="zmdi m-r-md zmdi-hc-lg zmdi-account-box"></i>حسابي</a></li>
                            @if(\Auth::user()->employee==1)
                            <li><a href="{{url('/balance')}}"><i class="zmdi m-r-md zmdi-hc-lg zmdi-balance-wallet"></i>رصيدي</a></li>
                            @endif
                            <li><a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="zmdi m-r-md zmdi-hc-lg zmdi-square-right"></i>خروج</a></li>
                      

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="javascript:void(0)" class="side-panel-toggle" data-toggle="class" data-target="#side-panel" data-class="open" role="button"><i class="zmdi zmdi-hc-lg zmdi-apps"></i></a></li>
                </ul>
            </div>
        </div>
    </nav>

    <aside id="menubar" class="menubar light">
        <div class="app-user">
            <div class="media">
                <div class="media-left">
                    <div class="avatar avatar-md avatar-circle">
                        <a href="javascript:void(0)"><img class="img-responsive" src="{{\Auth::user()->avatar}}" alt="avatar"></a>
                    </div>
                </div>
                <div class="media-body">
                    <div class="foldable">
                        <h5><a href="javascript:void(0)" class="username">{{Auth::user()->full_name}}</a></h5>
                        <ul>
                            <li class="dropdown"><a href="javascript:void(0)" class="dropdown-toggle usertitle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><small>{{Auth::user()->title}}</small> <span class="caret"></span></a>
                                <ul class="dropdown-menu animated flipInY">
                                    <li><a class="text-color" href="{{route('Request.index')}}"><span class="m-r-xs"><i class="fa fa-home"></i></span> <span>الرئيسية</span></a></li>
                                    <li><a class="text-color" href="{{route('User.show',\Auth::user()->id)}}"><span class="m-r-xs"><i class="fa fa-user"></i></span> <span>الحساب</span></a></li>
                                    <li><a class="text-color" href="{{route('User.edit',\Auth::user()->id)}}"><span class="m-r-xs"><i class="fa fa-gear"></i></span> <span>الاعدادات</span></a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a class="text-color" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><span class="m-r-xs"><i class="fa fa-power-off"></i></span> <span>خروج</span></a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="menubar-scroll">
            <div class="menubar-scroll-inner">
           
                <ul class="app-menu">
                    <li class="active"><a href="{{url('home')}}" ><i class="menu-icon zmdi zmdi-home zmdi-hc-lg"></i> <span class="menu-text">الرئيسية</span></a>
                    </li>
                    <li><a href="{{url('/showallnotifications')}}" ><i class="menu-icon zmdi zmdi-notifications-active zmdi-hc-lg"></i> <span class="menu-text">جميع التنبيهات</span></a>
                    </li>
                    @php
                    $g=0;
                    if(\Auth::user()->admin==1)
                    $g = count(\App\Request::all());
                    else
                    $g = count(\App\Request::where('employee_id',\Auth::user()->id)->orWhere('user_id',\Auth::user()->id)->get());


                    @endphp
                    <li class="has-submenu"><a href="javascript:void(0)" class="submenu-toggle"><i class="menu-icon zmdi zmdi-layers zmdi-hc-lg"></i> <span class="menu-text">الطلبات</span> <span class="label label-warning menu-label">{{$g}}</span> <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right menu-inner-caret"></i></a>
                        <ul class="submenu">
                            <li><a href="{{route('Request.index')}}"><span class="menu-text">الجميع</span> </a></li>
                            <li><a href="{{url('/ordersinreview')}}"><span class="menu-text">قيد لمراجعة</span> </a></li>
                            <li><a href="{{url('/ordersinhold')}}"><span class="menu-text">معلقة</span></a></li>
                            <li><a href="{{url('/ordersinprogress')}}"><span class="menu-text">قيد العمل عليها</span> </a></li>
                            <li><a href="{{url('/orderscomplete')}}"><span class="menu-text">تم تسليمها</span> </a></li>
                            <li><a href="{{url('/orderscanceld')}}"><span class="menu-text">ملغية</span></a></li>
                            <li><a href="{{url('/ordersbills')}}"><span class="menu-text">فواتير الطلبات</span></a></li>
                        </ul>
                    </li>
                            @if(\Auth::user()->admin==1 )

                    <li class="has-submenu"><a href="javascript:void(0)" class="submenu-toggle"><i class="menu-icon zmdi zmdi-accounts zmdi-hc-lg"></i> <span class="menu-text">المستخدمين</span> <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i></a>
                        <ul class="submenu">
                            <li><a href="{{route('User.index')}}"><span class="menu-text">جميع المستخدمين</span></a></li>
                            <!-- <li><a href="alerts.html"><span class="menu-text">المديرين</span></a></li>
                            <li><a href="panels.html"><span class="menu-text">المشرفين</span></a></li>
                            <li><a href="lists.html"><span class="menu-text">الموظفين</span></a></li>
                            <li><a href="icons.html"><span class="menu-text">العملاء</span></a></li> -->
                        </ul>
                    </li>
                    @endif
                    <li class="has-submenu"><a href="javascript:void(0)" class="submenu-toggle"><i class="menu-icon zmdi zmdi-inbox zmdi-hc-lg"></i> <span class="menu-text">الرسائل الواردة</span> <!-- <span class="label label-warning menu-label">24</span> --> <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right menu-inner-caret"></i></a>
                        <ul class="submenu">
                            <li><a href="{{url('getmgroups')}}"><span class="menu-text">جميع الرسائل</span> <!-- <span class="label label-primary menu-label">12</span> --></a></li>
                           <!--  <li><a href="compose.html"><span class="menu-text">رسائل الموظفين</span></a></li>
                            <li><a href="inbox.html"><span class="menu-text">رسائل العملاء</span> <span class="label label-primary menu-label">12</span></a></li>
                            <li><a href="compose.html"><span class="menu-text">رسالة جديدة</span></a></li> -->
                        </ul>
                    </li>
                    @if(\Auth::user()->admin==1)
                    <li class="has-submenu"><a href="javascript:void(0)" class="submenu-toggle"><i class="menu-icon zmdi zmdi-collection-text zmdi-hc-lg"></i> <span class="menu-text">الاستضافة</span> <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i></a>
                        <ul class="submenu">
                            <li><a href="{{route('Timetable.index')}}"><span class="menu-text">جميع المهام</span></a></li>
                        </ul>
                    </li>
                    <li class="has-submenu"><a href="javascript:void(0)" class="submenu-toggle"><i class="menu-icon zmdi zmdi-store zmdi-hc-lg"></i> <span class="menu-text">اعمالنا</span> <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i></a>
                        <ul class="submenu" style="display: none;">
                            <li ><a href="{{route('Work.index')}}"><span class="menu-text">جميع الاعمال</span></a></li>
                        </ul>
                    </li>
                    @endif
                    
                            @if(\Auth::user()->admin==1 || \Auth::user()->employee == 1)

                    <li class="has-submenu"><a href="javascript:void(0)" class="submenu-toggle"><i class="menu-icon zmdi zmdi-case zmdi-hc-lg"></i> <span class="menu-text">المالية</span> <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i></a>
                        <ul class="submenu">
                    @if(\Auth::user()->admin==1)

                            <li><a href="{{url('financialremittance')}}"><span class="menu-text">التحويلات البنكية للعميل</span></a></li>
                            <!-- <li><a href="{{url('makecheck')}}"><span class="menu-text">عمل ايصال</span></a></li> -->
                            <li><a href="{{url('employeepayments')}}"><span class="menu-text">التحويلات البنكية للإدارة</span></a></li>
                            <li><a href="{{url('finicialrequests')}}"><span class="menu-text">الطلبات</span></a></li>
                            <!-- <li><a href="form.plugins.html"><span class="menu-text">الموظفين</span></a></li> -->
                            <li><a href="{{url('salaryemp')}}"><span class="menu-text">الرواتب</span></a></li>
                            @endif
                            @if(\Auth::user()->admin==1 || \Auth::user()->employee == 1)
                            <li><a href="{{url('debts')}}"><span class="menu-text">المديونيات</span></a></li>
                            @endif
                        </ul>
                    </li>
                     <li class="has-submenu"><a href="javascript:void(0)" class="submenu-toggle"><i class="menu-icon zmdi  zmdi-collection-case-play zmdi-hc-lg"></i> <span class="menu-text">تقارير </span> <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i></a>
                        <ul class="submenu">
                            <li><a href="{{url('requestsreports')}}"><span class="menu-text">تقارير الطلبات</span></a></li>
                            <!-- <li><a href="datatables.html"><span class="menu-text">إضافة ملاحظة جديدة</span></a></li> -->
                        </ul>
                    </li>
                    @endif
                    @unless(\Auth::user()->client ==1  )
                   
                    <li class="has-submenu"><a href="javascript:void(0)" class="submenu-toggle"><i class="menu-icon zmdi zmdi-storage zmdi-hc-lg"></i> <span class="menu-text">ملاحظات</span> <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i></a>
                        <ul class="submenu">
                            <li><a href="{{route('Note.index')}}"><span class="menu-text">جميع الملاحظات</span></a></li>
                            <!-- <li><a href="datatables.html"><span class="menu-text">إضافة ملاحظة جديدة</span></a></li> -->
                        </ul>
                    </li>
                   @endunless
                  
                   
                    <li class="has-submenu"><a href="javascript:void(0)" class="submenu-toggle"><i class="menu-icon zmdi  zmdi-collection-case-play zmdi-hc-lg"></i> <span class="menu-text">العقود</span> <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i></a>
                        <ul class="submenu">
                            <li><a href="{{url('viewcontracts')}}"><span class="menu-text">العقود</span></a></li>
                            <!-- <li><a href="datatables.html"><span class="menu-text">إضافة ملاحظة جديدة</span></a></li> -->
                        </ul>
                    </li>
                   

                    @unless(\Auth::user()->employee ==1  )
                    <li class="has-submenu"><a href="javascript:void(0)" class="submenu-toggle"><i class="menu-icon zmdi  zmdi-code-setting zmdi-hc-lg"></i> <span class="menu-text">الكوبونات</span> <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i></a>
                        <ul class="submenu">
                            <li><a href="{{url('coupons')}}"><span class="menu-text">{{ \Auth::user()->admin == 1  ? 'جميع الكوبونات ' : 'كوبوناتي'}}</span></a></li>
                        </ul>
                    </li>
                   @endunless

                  
                    
                     
                  
                </ul>
               
            </div>
        </div>
    </aside>
    <div id="navbar-search" class="navbar-search collapse">
        <div class="navbar-search-inner">
            <form action="#"><span class="search-icon"><i class="fa fa-search"></i></span>
                <input class="search-field" type="search" placeholder="ابحث هنا...">
            </form>
            <button type="button" class="search-close" data-toggle="collapse" data-target="#navbar-search" aria-expanded="false"><i class="fa fa-close"></i></button>
        </div>
        <div class="navbar-search-backdrop" data-toggle="collapse" data-target="#navbar-search" aria-expanded="false"></div>
    </div>

     @yield('content')


     <div id="app-customizer" class="app-customizer"><a href="javascript:void(0)" class="app-customizer-toggle theme-color" data-toggle="class" data-class="open" data-active="false" data-target="#app-customizer"><i class="fa fa-gear"></i></a>
        <div class="customizer-tabs">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#menubar-customizer" aria-controls="menubar-customizer" role="tab" data-toggle="tab">Menubar</a></li>
                <li role="presentation"><a href="#navbar-customizer" aria-controls="navbar-customizer" role="tab" data-toggle="tab">Navbar</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane in active fade" id="menubar-customizer">
                    <div class="hidden-menubar-top hidden-float">
                        <div class="m-b-0">
                            <label for="menubar-fold-switch">Fold Menubar</label>
                            <div class="pull-left">
                                <input id="menubar-fold-switch" type="checkbox" data-switchery data-size="small">
                            </div>
                        </div>
                        <hr class="m-h-md">
                    </div>
                    <div class="radio radio-default m-b-md">
                        <input type="radio" id="menubar-light-theme" name="menubar-theme" data-toggle="menubar-theme" data-theme="light">
                        <label for="menubar-light-theme">Light</label>
                    </div>
                    <div class="radio radio-inverse m-b-md">
                        <input type="radio" id="menubar-dark-theme" name="menubar-theme" data-toggle="menubar-theme" data-theme="dark">
                        <label for="menubar-dark-theme">Dark</label>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="navbar-customizer"></div>
            </div>
        </div>
        <hr class="m-0">
        <div class="customizer-reset">
            <button id="customizer-reset-btn" class="btn btn-block btn-outline btn-primary">Reset</button>
        </div>
    </div>
    <!-- <div id="side-panel" class="side-panel">
        <div class="panel-header">
            <h4 class="panel-title">Friends</h4></div>
        <div class="scrollable-container">
            <div class="media-group">
                <a href="javascript:void(0)" class="media-group-item">
                    <div class="media">
                        <div class="media-left">
                            <div class="avatar avatar-xs avatar-circle"><img src="{{asset('assets/images/221.jpg')}}" alt=""> <i class="status status-online"></i></div>
                        </div>
                        <div class="media-body">
                            <h5 class="media-heading">أمير ناجح</h5><small class="media-meta">قام بارسال رسالة جديدة الي لوحة تحكم هذا الموقع</small></div>
                    </div>
                </a>
                <a href="javascript:void(0)" class="media-group-item">
                    <div class="media">
                        <div class="media-left">
                            <div class="avatar avatar-xs avatar-circle"><img src="{{asset('assets/images/205.jpg')}}" alt=""> <i class="status status-online"></i></div>
                        </div>
                        <div class="media-body">
                            <h5 class="media-heading">John Doe</h5><small class="media-meta">active now</small></div>
                    </div>
                </a>
                <a href="javascript:void(0)" class="media-group-item">
                    <div class="media">
                        <div class="media-left">
                            <div class="avatar avatar-xs avatar-circle"><img src="{{asset('assets/images/206.jpg')}}" alt=""> <i class="status status-online"></i></div>
                        </div>
                        <div class="media-body">
                            <h5 class="media-heading">Adam Kiti</h5><small class="media-meta">active now</small></div>
                    </div>
                </a>
                <a href="javascript:void(0)" class="media-group-item">
                    <div class="media">
                        <div class="media-left">
                            <div class="avatar avatar-xs avatar-circle"><img src="{{asset('assets/images/207.jpg')}}" alt=""> <i class="status status-away"></i></div>
                        </div>
                        <div class="media-body">
                            <h5 class="media-heading">Jane Doe</h5><small class="media-meta">away</small></div>
                    </div>
                </a>
                <a href="javascript:void(0)" class="media-group-item">
                    <div class="media">
                        <div class="media-left">
                            <div class="avatar avatar-xs avatar-circle"><img src="{{asset('assets/images/208.jpg')}}" alt=""> <i class="status status-away"></i></div>
                        </div>
                        <div class="media-body">
                            <h5 class="media-heading">Sara Adams</h5><small class="media-meta">away</small></div>
                    </div>
                </a>
                <a href="javascript:void(0)" class="media-group-item">
                    <div class="media">
                        <div class="media-left">
                            <div class="avatar avatar-xs avatar-circle"><img src="{{asset('assets/images/209.jpg')}}" alt=""> <i class="status status-away"></i></div>
                        </div>
                        <div class="media-body">
                            <h5 class="media-heading">Smith Doe</h5><small class="media-meta">away</small></div>
                    </div>
                </a>
                <a href="javascript:void(0)" class="media-group-item">
                    <div class="media">
                        <div class="media-left">
                            <div class="avatar avatar-xs avatar-circle"><img src="{{asset('assets/images/219.jpg')}}" alt=""> <i class="status status-away"></i></div>
                        </div>
                        <div class="media-body">
                            <h5 class="media-heading">Dana Dyab</h5><small class="media-meta">away</small></div>
                    </div>
                </a>
                <a href="javascript:void(0)" class="media-group-item">
                    <div class="media">
                        <div class="media-left">
                            <div class="avatar avatar-xs avatar-circle"><img src="{{asset('assets/images/210.jpg')}}" alt=""> <i class="status status-offline"></i></div>
                        </div>
                        <div class="media-body">
                            <h5 class="media-heading">Jeffry Way</h5><small class="media-meta">2 hours ago</small></div>
                    </div>
                </a>
                <a href="javascript:void(0)" class="media-group-item">
                    <div class="media">
                        <div class="media-left">
                            <div class="avatar avatar-xs avatar-circle"><img src="{{asset('assets/images/211.jpg')}}" alt=""> <i class="status status-offline"></i></div>
                        </div>
                        <div class="media-body">
                            <h5 class="media-heading">Jane Doe</h5><small class="media-meta">5 hours ago</small></div>
                    </div>
                </a>
                <a href="javascript:void(0)" class="media-group-item">
                    <div class="media">
                        <div class="media-left">
                            <div class="avatar avatar-xs avatar-circle"><img src="{{asset('assets/images/212.jpg')}}" alt=""> <i class="status status-offline"></i></div>
                        </div>
                        <div class="media-body">
                            <h5 class="media-heading">Adam Khoury</h5><small class="media-meta">22 minutes ago</small></div>
                    </div>
                </a>
                <a href="javascript:void(0)" class="media-group-item">
                    <div class="media">
                        <div class="media-left">
                            <div class="avatar avatar-xs avatar-circle"><img src="{{asset('assets/images/207.jpg')}}" alt=""> <i class="status status-offline"></i></div>
                        </div>
                        <div class="media-body">
                            <h5 class="media-heading">Sara Smith</h5><small class="media-meta">2 days ago</small></div>
                    </div>
                </a>
                <a href="javascript:void(0)" class="media-group-item">
                    <div class="media">
                        <div class="media-left">
                            <div class="avatar avatar-xs avatar-circle"><img src="{{asset('assets/images/211.jpg')}}" alt=""> <i class="status status-offline"></i></div>
                        </div>
                        <div class="media-body">
                            <h5 class="media-heading">Donia Dyab</h5><small class="media-meta">3 days ago</small></div>
                    </div>
                </a>
            </div>
        </div>
    </div> -->
    <div class="modal fade" id="contact-support" tabindex="-1" role="dialog" >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">إرسال رسالة الي ادراة الموقع</h4></div>
                    <div class="modal-body">
                  
                    <form action="{{url('makeanewgroup')}}" method="post">
                        
                           <input type="hidden" name="rcv_id" value="9">
                                        <input type="hidden" name="sender_id" value="{{\Auth::user()->id}}">
                                        
                            <div class="form-group">
                                <label for="exampleInputEmail1">محتوي الرسالة</label>
                                <textarea  name="message" id="mail_body_field" cols="30" rows="5" class="form-control" required="true"></textarea>
                            </div>

                    </div>
                    <div class="modal-footer">

                        <button type="submit" data-dismiss="modal" class="btn btn-primary">إرسال</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    <script src="{{asset('assets/js/core.min.js')}}"></script>
    <script src="{{asset('assets/js/app.min.js')}}"></script>
    <script src="{{asset('assets/bower/moment/moment.js')}}"></script>
    <script src="{{asset('assets/bower/fullcalendar/dist/fullcalendar.min.js')}}"></script>
    <script src="{{asset('assets/js/fullcalendar.js')}}"></script>
    <!-- <script src="{{asset('assets/bower/switchery/dist/switchery.min.js')}}"></script> -->
    <script src="{{asset('assets/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script src="{{asset('assets/bower/bootstrap-fileInput/fileinput.min.js')}}"></script>
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/js/star-rating.min.js')}}"></script>
    <script src="{{asset('assets/js/ontime.js')}}"></script>
    <!-- <script src="{{asset('assets/js/datatables.js')}}"></script> -->
    <script src="{{asset('assets/bower/select2/dist/js/select2.full.min.js')}}"></script>

<script>
jQuery(document).ready(function() {

    // TableDatatablesAjax.init();
 
function addtasknotification(kk){

    for (var i = kk['count'] - 1; i >= 0; i--) {
       
        var Notificationid =kk[i].id;
        var gurl =kk[i].url;
        var msg =kk[i].msg;


        console.log(i);

var doesExists = $('.notification[data-id="'+Notificationid+'"]').length >= 1;
console.log(doesExists);

    if(doesExists)
    {
    }
    else{
        var lm = kk[i].id;
        lm = lm.toString();
        if (~lm.indexOf("msg")){

             $("#notis").prepend('<a href="'+kk[i].url+'" class="media-group-item notification" data-id="'+kk[i].id+'">'+
                                '<div class="media">'+
                                    '<div class="media-left">'+
                    '<div class="avatar avatar-xs avatar-circle">'+
                    '<img src="{{asset("assets/images/221.jpg")}}" alt="">'+
                     '<i class="status status-online"></i></div>'+
                                    '</div>'+
                                    '<div class="media-body">'+
                                        '<h5 class="media-heading">'+kk[i].e.sender.full_name+'</h5>'+
                                        '<p class="media-meta">'+kk[i].msg+'</p>'+
                                    '</div>'+
                                '</div>'+
                            '</a>');
        }

        else{
         $("#notis").prepend('<a href="'+gurl+'" class="media-group-item notification" data-id="'+Notificationid+'">'+
                                '<div class="media">'+
                                    '<div class="media-body">'+
                                        '<p class="media-meta">'+msg+'</p>'+
                                    '</div>'+
                                '</div>'+
                            '</a>');
        }
    }
    }
    
 gettasks();

    }
  
 gettasks();
      
   
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

     function gettasks() {
         setTimeout(
    
       function getMessage(){
            $.ajax({
            url: '{{url("getunread")}}' ,
           type: 'GET',
          data: {_token: CSRF_TOKEN},
          dataType: 'JSON',
          success: function (data) {
             addtasknotification(data);
            
           },
           error : function (data) {
             
            
           }
});
         } 
, 5000);} //5 seconds
   // initiate layout and plugins

     $("#notiscount").on("click", function(event){
    console.log('clicked');
});
 
});
        function myFunction(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
            url: '{{url("marksee")}}' ,
           type: 'GET',
          data: {_token: CSRF_TOKEN},
          dataType: 'JSON',
          success: function (data) {
            
            
           },
           error : function (data) {
             
            
           }
});
  } 
</script>
</body>

</html>