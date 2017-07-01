@extends('layouts.main')
@section('content')
    <main id="app-main" class="app-main">
        <div class="wrap">
            <section class="app-content">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 pull-right">
                        <div class="widget p-md clearfix widget-def">
                            <div class="widget-header">
                                <h3>
                                    <i class="menu-icon zmdi zmdi-notifications-active zmdi-hc-lg"></i>
                                    <span>جميع التنبيهات</span>
                                </h3>
                            </div>
                            <div class="widget-body">
                                <ul>
                                <?php
                        $user =\Auth::user();
$data = [];
$i=0;
foreach ($user->notifications as $notification) {
    $d = $notification->data;
    if( strpos($d['id'], 'msg')){
    echo'<li> <a href="'.$d['url'].'" class="media-group-item notification" data-id="'.$d['id'].'">
                                <div class="media">
                                    <div class="media-left">
                                        <div class="avatar avatar-xs avatar-circle"><img src="'.$d['e']['sender']['avatar'].'" alt=""> <i class="status status-online"></i></div>
                                    </div>
                                    <div class="media-body">
                                        <h5 class="media-heading">'.$d['e']['sender']['full_name'].'</h5>
                                        <p class="media-meta">'.$d['msg'].'</p>
                                        
                                    </div>
                                </div>
                            </a>
                            </li>';}
                            else{
                            echo '
                            <li>
                            <a href="'.$d['url'].'" class="media-group-item notification" data-id="'.$d['id'].'">
                                <div class="media">
                                    <div class="media-body">
                                        <p class="media-meta">'.$d['msg'].'</p>
                                    </div>
                                </div>
                            </a>
                            </li>
                            ';
                            }
                            if($i>4){
                            break; }
 $i++;  
}



                        ?>
                                    <!-- <li>
                                        <a href="index.html" class="media-group-item">
                                            <div class="media">
                                                <div class="media-left">
                                                    <div class="avatar avatar-xs avatar-circle"><img src="../assets/images/221.jpg" alt="" class="mCS_img_loaded"> <i class="status status-online"></i></div>
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="media-heading">أمير ناجح</h5>
                                                    <p class="media-meta">قام بارسال رسالة جديدة الي لوحة تحكم هذا الموقعقام بارسال رسالة جديدة الي لوحة تحكم هذا الموقعقام بارسال رسالة جديدة الي لوحة تحكم هذا الموقع</p>
                                                    <span class="time">
                                            <i class="zmdi zmdi-calendar-check"></i>
                                            <b>11 ديسمبر 2017</b>
                                        </span>
                                                </div>
                                            </div>
                                        </a>
                                    </li> -->

                                    <!-- <li>
                                        <a href="index.html" class="media-group-item">
                                            <div class="media">
                                                <div class="media-left">
                                                    <div class="avatar avatar-xs avatar-circle"><img src="../assets/images/201.jpg" alt="" class="mCS_img_loaded"> <i class="status status-offline"></i></div>
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="media-heading">أمير ناجح</h5>
                                                    <p class="media-meta">قام بارسال رسالة جديدة الي لوحة تحكم هذا الموقعقام بارسال رسالة جديدة الي لوحة تحكم هذا الموقعقام بارسال رسالة جديدة الي لوحة تحكم هذا الموقع</p>
                                                    <span class="time">
                                            <i class="zmdi zmdi-calendar-check"></i>
                                            <b>11 ديسمبر 2017</b>
                                        </span>
                                                </div>
                                            </div>
                                        </a>
                                    </li> -->

                                   
                                </ul>
                            </div>
                            
                        </div><!-- end widget -->
                        <!-- <div class="widget-navigation">
                                <ul class="pagination">
                                    <li class="paginate_button previous"><a href="#">السابق</a></li>
                                    <li class="paginate_button active"><a href="#">1</a></li>
                                    <li class="paginate_button"><a href="#">2</a></li>
                                    <li class="paginate_button"><a href="#">3</a></li>
                                    <li class="paginate_button"><a href="#">4</a></li>
                                    <li class="paginate_button"><a href="#">5</a></li>
                                    <li class="paginate_button"><a href="#">6</a></li>
                                    <li class="paginate_button next" id="default-datatable_next"><a href="#">التالي</a></li>
                                </ul>
                            </div> -->
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