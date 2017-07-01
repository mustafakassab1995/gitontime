@extends('layouts.main')
@section('content')
    <main id="app-main" class="app-main">
        <div class="wrap">
            <section class="app-content">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 pull-right">
                        <div class="p-md clearfix widget-orders widget-def widget-panels widget-users widget-financial widget-request">
                            <div class="widget-header">
                                <h3>
                                    <i class="menu-icon zmdi zmdi-store zmdi-hc-lg"></i>
                                    <span>الحسابات البنكية</span>
                                </h3>
                            </div>
                        </div>
                        <!-- end widget -->
                        <div class="orders-types col-xs-12">
                            <div class="block col-md-6 colsm-6 col-xs-12 edit-type">
                                <div class="inner">
                                    <div class="block-title">
                                        <h3 class="bank_name">البنك الاهلي السعودي</h3>
                                    </div>
                                    <div class="block-img">
                                    <img src="{{asset('assets/images/b1.jpg')}}" alt="">
                                </div>
                                <div class="block-data">
                                    <ul class="bank_data">
                                        <li>
                                            <span>رقم الحساب</span>
                                            <p>30483935000108</p>
                                        </li>
                                        <li>
                                            <span>الإيبان</span>
                                            <p>SA7310000030483935000108</p>
                                        </li>
                                    </ul>
                                </div>
                                </div>
                            </div> 
                            
                            <div class="block col-md-6 colsm-6 col-xs-12 web-type">
                                <div class="inner">
                                    <div class="block-title">
                                        <h3 class="bank_name">مصرف الراجحي السعودي</h3>
                                    </div>
                                    <div class="block-img">
                                    <img src="{{asset('assets/images/b2.png')}}" alt="">
                                </div>
                                <div class="block-data">
                                    <ul class="bank_data">
                                        <li>
                                            <span>رقم الحساب</span>
                                            <p>132608010392497</p>
                                        </li>
                                        <li>
                                            <span>الإيبان</span>
                                            <p>SA1780000132608010392497</p>
                                        </li>
                                    </ul>
                                </div>
                                </div>
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
        
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">تعديل بيانات العضو</h4></div>
                <div class="modal-body">
                    <form action="#">
                        <h4 class="m-b-md">معلومات شخصية</h4>
                        <div class="form-group">
                                        <label for="exampleInputEmail1">الاسم بالكامل</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1">
                                    </div>
                        <div class="form-group">
                                        <label for="exampleInputEmail1">عنوان لحسابك</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1">
                                    </div>
                        <div class="form-group">
                                        <label for="exampleInputEmail1">البريد الالكتروني</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1">
                                    </div>
                        <div class="form-group">
                                        <label for="exampleInputEmail1">معلومات عنك</label>
                                        <textarea name="mail_body_field" id="mail_body_field" cols="30" rows="5" class="form-control"></textarea>
                                    </div>
                        <h4 class="m-b-md">صلاحيات المستخدم</h4>
                        <div class="form-group">
                                        <label for="exampleInputEmail1">مراقب</label>
                                        <select class="form-control">
                                <option>نعم</option>
                                            <option>لا</option>
                            </select>
                                    </div>
                        <div class="form-group">
                                        <label for="exampleInputEmail1">موظف</label>
                                        <select class="form-control">
                                <option>نعم</option>
                                            <option>لا</option>
                            </select>
                                    </div>
                        
                    </form>
                </div>
                <div class="modal-footer">
                    
                    <button type="button" data-dismiss="modal" class="btn btn-primary">حفظ التعديل</button>
                </div>
            </div>
        </div>
    </div>
        <div id="deleteModal" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">حذف المستخدم</h4></div>
                    <div class="modal-body">
                        <h5>هل انت متأكد من حذف هذا المستخدم ؟</h5></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">حذف</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
   @endsection