@extends('layouts.main')
@section('content')
    <main id="app-main" class="app-main">
        <div class="wrap">
            <section class="app-content">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 pull-right">
                        <div class="p-md clearfix widget widget-def widget-panels widget-users widget-financial widget-request">
                            <div class="widget-header">
                                <h3>
                                    <i class="menu-icon zmdi zmdi-headset-mic zmdi-hc-lg"></i>
                                    <span>تواصل معنا</span>
                                </h3>
                            </div>
                            <div class="widget-body">
                                <div class="contact-form col-xs-12">
                                    <form action="{{url('makeanewgroup')}}" method="post">
                                        <input type="hidden" name="rcv_id" value="9">
                                        <input type="hidden" name="sender_id" value="{{\Auth::user()->id}}">
                                        
                                        <div class="form-group col-xs-12">
                                            <label for="msg">رسالتك</label>
                                            <textarea class="form-control" id="msg" name="message"></textarea>
                                        </div>
                                        <div class="form-group col-xs-12">
                                            <input type="submit" value="إرسال" class="btn btn-success">
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- end widget-body -->
                        </div>
                        <!-- end widget -->
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