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
                                    <span>طلبات معلقة</span>
                                </h3>
                            </div>
                            <div class="widget-body">
                                <div class="msg-no-panel col-md-12 col-xs-12">
                                    <h3 class="animated fadeInUp">عفوا لا يوجد طلبات لديك <i class="zmdi zmdi-alert-triangle"></i></h3>
                                </div>
                            </div><!-- end widget-body -->
                            
                        </div><!-- end widget -->
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