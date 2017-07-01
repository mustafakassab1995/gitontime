@extends('layouts.main')
@section('content')
    <main id="app-main" class="app-main">
        <div class="wrap">
            <section class="app-content">
               <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 pull-right">
                        <div class="widget p-md clearfix" style="
    background-color: #2fdc85;
">
                            <div class="pull-right welcome-msg">
                                <h3 class="widget-title" style="
    color: #fff;
">تم اضافة طلبك , سيتم اشعارك بمجرد قبوله
</h3>
                                <small class="text-color" style="
    color: #fff;
">شكرا لك</small>
                            </div>
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
    <script type="text/javascript">
        window.setTimeout(function() {
    window.location.href = '{{url("orderspanels")}}';
}, 5000);
    </script>

    @endsection