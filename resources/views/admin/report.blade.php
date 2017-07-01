@extends('layouts.main')
@section('content')
{!! Charts::assets() !!}
    <main id="app-main" class="app-main">
        <div class="wrap">
            <section class="app-content">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 pull-right">
                        <div class="widget p-md clearfix">
                            <div class="pull-right welcome-msg">
                                <h3 class="widget-title">{{\Auth::user()->full_name}}</h3>
                                <small class="text-color">اخر ظهور لك منذ 15 دقيقة</small>
                                <form action="requestsreports" method="get" id="shiw" onchange="document.getElementById('shiw').submit();">
                                    <select class="form-control " name="type">
                                    <option value="area">رسم بياني </option>
                                    
                                    <option value="line" >خطوط</option>
                                    <option value="bar">أعمدة</option>

                                </select>

                                </form>
                                
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="widget row no-gutter p-lg">
                            <div class="col-md-12 col-sm-12 ">
                             
 {!! $chart->render() !!}




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
                        <li><a href="javascript:void(0)">عن الموقع</a></li>
                        <li><a href="javascript:void(0)">شروط الاستخدام</a></li>
                        <li><a href="javascript:void(0)">عقد الاتفاقية</a></li>
                        <li><a href="javascript:void(0)">تواصل معنا</a></li>
                    </ul>
                    <div class="copyright pull-right">جميع الحقوق محفوظة لدي شبكة اون تايم 2017 &copy;</div>
                </div>
            </footer>
        </div>
        <div class="modal fade" id="contact-support" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">إرسال رسالة الي ادراة الموقع</h4></div>
                    <div class="modal-body">
                        <form action="#">
                            <div class="form-group">
                                <label for="exampleInputEmail1">عنوان الرسالة</label>
                                <input type="text" class="form-control" id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">محتوي الرسالة</label>
                                <textarea name="mail_body_field" id="mail_body_field" cols="30" rows="5" class="form-control"></textarea>
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">

                        <button type="button" data-dismiss="modal" class="btn btn-primary">إرسال</button>
                    </div>
                </div>
            </div>

        </div>
        
    </main>
   @endsection