@extends('layouts.main')
@section('content')
    <main id="app-main" class="app-main">
        <div class="wrap">
            <section class="app-content">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 pull-right">
                        <div class="p-md clearfix widget-def widget-panels widget-users">
                            <div class="widget-header">
                                <h3>
                                    <i class="menu-icon zmdi zmdi-accounts zmdi-hc-lg"></i>
                                    <span>جميع المستخدمين</span>
                                </h3>
                            </div>
                            <div class="widget-search">
                                <form>
                                    <div class="form-group">
                                    <input type="search" placeholder="ابحث عن المستخدم بالاسم .." class="form-control">
                                </div>
                                </form>
                            </div>
                            <div class="widget-body">
                                <div class="col-md-12 col-sm-12">
                                    <div class="widget">
                                        <div class="widget-body p-h-lg">
                                            <div class="media">
                                                <div class="media-left">
                                                    <div class="avatar avatar-lg avatar-circle"><img class="img-responsive" src="../assets/images/221.jpg" alt="avatar"></div>
                                                </div>
                                                <div class="media-body">
                                                    <h4 class="media-heading">
                                                        
                                                        <a href="#">امير ناجح</a>
                                                    </h4>
                                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal">
                                            <span class="zmdi zmdi-edit"></span>
                                        </button>
                                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">
                                            <span class="zmdi zmdi-delete"></span>
                                        </button>
                                        
                                    </div>
                                                    <small class="media-meta media-mail">amir15@abc.com</small>
                                                    <small class="media-meta text-success">إدارة</small></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <!-- end widget-body -->
                        </div>
                        <!-- end widget -->
                        <div class="widget-navigation">
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