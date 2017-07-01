@extends('layouts.main')
@section('content')
    <main id="app-main" class="app-main">
        <div class="wrap">
            <section class="app-content">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 pull-right">
                        <div class="p-md clearfix widget-def widget-panels widget-users widget-financial widget-request">
                            <div class="widget-header">
                                <h3>
                                    <i class="menu-icon zmdi zmdi-account zmdi-hc-lg"></i>
                                    <span>الحساب الشخصي</span>
                                </h3>
                                 @if($user->id == \Auth::user()->id)
                                <a href="{{route('User.edit',$user->id)}}" class="btn btn-primary">
                                    <i class="zmdi zmdi-settings"></i> تعديل الحساب
                                </a>
                                @endif
                            </div>
                            <div class="widget-body">
                                <div class="col-md-12">
                        <div class="widget widget-profile">
                            <div class="widget-pic col-md-3 col-xs-4">
                                <div class="pic-inner">
                                    <div class="promo-pic">
                                    <img src="
                                                     {{ $user->avatar}}
  " alt="">
                                </div>
                                <div class="usr-name">
                                    <h4>{{$user->full_name}}</h4>
                                </div>
                                <div class="promo-data">
                                    <ul>
                                        <li>
                                            <i class="zmdi zmdi-eye"></i>
                                            <p>{{$user->created_at}}</p>
                                        </li>
                                        <li>
                                            <i class="zmdi zmdi-phone"></i>
                                            <p class="en-txt">{{$user->phone}}</p>
                                        </li>
                                        <li>
                                            <i class="zmdi zmdi-email"></i>
                                            <p class="en-txt">{{$user->email}}</p>
                                        </li>
                                        <li>
                                            <i class="zmdi zmdi-pin"></i>
                                            <p>{{$user->location}}</p>
                                        </li>
                                        <li>
                                            <i class="zmdi zmdi-facebook-box"></i>
                                            <p class="en-txt"> (facebook.com)</p>
                                        </li>
                                        <li>
                                            <i class="zmdi zmdi-twitter"></i>
                                            <p class="en-txt"> (twitter.com)</p>
                                        </li>
                                    </ul>
                                </div>
                                </div>
                            </div>
                            <div class="m-b-lg nav-tabs-horizontal col-md-8 col-xs-8 widget-navs">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#tab-1" aria-controls="tab-3" role="tab" data-toggle="tab">نبذة عني</a></li>
                                    <li role="presentation"><a href="#tab-2" aria-controls="tab-1" role="tab" data-toggle="tab">التقيمات</a></li>
                                </ul>
                                <div class="tab-content p-md">
                                    <div role="tabpanel" class="tab-pane in active fade" id="tab-1">
                                        <div class="pr-block">
                                            <div class="pr_head">
                                                <h3>
                                                    <i class="zmdi zmdi-equalizer zmdi-hc-lg"></i>
                                                    نبذة عني
                                                    <ul class="actions">
                                                    @if($user->id == \Auth::user()->id)
                                                        <li class="dropdown">
                                                            <a href="#" data-toggle="dropdown" aria-expanded="false">
                                                                <i class="zmdi zmdi-more-vert"></i>
                                                            </a>

                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <a class="profile-edit" href="javascript:void(0)">تعديل</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        @endif
                                                    </ul>
                                                </h3>
                                            </div>
                                            <div class="pr-body">
                                                <div class="pr_body_view info_view">
                                                    <p>{{$user->bio}}

</p>
                                                </div>
                                                 @if($user->id == \Auth::user()->id)
                                                <div class="pr_body_edit info_edit">
                                                     <form action="{{route('User.update',$user->id)}}" method="post">
                                                     {{csrf_field()}}
                    <input type="hidden" name="_method" value="put" />
                                                        <div class="form-group col-md-12">
                                                            <textarea name="bio" class="form-control">{{$user->bio}}</textarea>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <button class="btn btn-success" type="submit">حفظ التعديل</button>
                                                            <button class="btn btn-danger hide-edit" type="reset">رجوع</button>
                                                        </div>
                                                    </form>
                                                </div>@endif
                                            </div>
                                        </div><!-- end pr-block -->
                                        
                                        <div class="pr-block personal-info">
                                            <div class="pr_head">
                                                <h3>
                                                    <i class="zmdi zmdi-account-box-mail zmdi-hc-lg"></i>
                                                    معلومات شخصية
                                                     @if($user->id == \Auth::user()->id)
                                                    <ul class="actions">
                                                        <li class="dropdown">
                                                            <a href="#" data-toggle="dropdown" aria-expanded="false">
                                                                <i class="zmdi zmdi-more-vert"></i>
                                                            </a>

                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <a class="personal-edit" href="javascript:void(0)">تعديل</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                    @endif
                                                </h3>
                                            </div>
                                            <div class="pr-body">
                                                <div class="pr_body_view pers_view">
                                                    <ul>
                                                        <li>
                                                            <dl>
                                                                <dt>الاسم بالكامل</dt>
                                                                <dd>{{$user->full_name}}</dd>
                                                            </dl>
                                                        </li>
                                                        <li>
                                                            <dl>
                                                                <dt>الوظيفة</dt>
                                                                <dd>{{$user->title}}</dd>
                                                            </dl>
                                                        </li>
                                                        <li>
                                                            <dl>
                                                                <dt>العنوان بالكامل</dt>
                                                                <dd>{{$user->location}}</dd>
                                                            </dl>
                                                        </li>
                                                       
                                                    </ul>
                                                </div>
                                                 @if($user->id == \Auth::user()->id)
                                                <div class="pr_body_edit pers_edit">
                                                    <form action="{{route('User.update',$user->id)}}" method="post">
                                                     {{csrf_field()}}
                    <input type="hidden" name="_method" value="put" />
                                                        <div class="form-group">
                                                            <ul>
                                                        <li>
                                                            <dl>
                                                                <dt>الاسم بالكامل</dt>
                                                                <dd>
                                                                    <div class="edit-line">
                                                                        <input type="text" name="full_name" class="form-control" value="{{$user->full_name}}">
                                                                    </div>
                                                                </dd>
                                                            </dl>
                                                        </li>
                                                        <li>
                                                            <dl>
                                                                <dt>الوظيفة</dt>
                                                                <dd>
                                                                    <div class="edit-line">
                                                                        <input type="text" name="title" class="form-control" value="{{$user->title}}">
                                                                    </div>
                                                                </dd>
                                                            </dl>
                                                        </li>
                                                        <li>
                                                            <dl>
                                                                <dt>العنوان بالكامل</dt>
                                                                <dd>
                                                                    <div class="edit-line">
                                                                        <input type="text" name="location" class="form-control" value="{{$user->location}}">
                                                                    </div>
                                                                </dd>
                                                            </dl>
                                                        </li>
                                                     
                                                    </ul>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <button class="btn btn-success" type="submit" >حفظ التعديل</button>
                                                            <button class="btn btn-danger hide1-edit" type="reset">رجوع</button>
                                                        </div>
                                                    </form>
                                                </div>@endif
                                            </div>
                                        </div><!-- end pr-block -->
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="tab-2">
                                        <!-- <div class="usr-rates">
                                            <ul>
                                                <li>
                                                    <div class="media">
                                                        <div class="media-left">
                                                            <div class="avatar avatar-xs avatar-circle"><img src="../assets/images/221.jpg" alt="" class="mCS_img_loaded"> <i class="status status-online"></i></div>
                                                        </div>
                                                        <div class="media-body">
                                                            <h5 class="media-heading">أمير ناجح</h5>
                                                            <span class="time">
                                                                <i class="zmdi zmdi-calendar-check"></i>
                                                                <b>11 ديسمبر 2017</b>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="panel-group accordion" id="accordion" role="tablist" aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading" role="tab" id="heading-1">
                                                                <a class="accordion-toggle" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-1" aria-expanded="true" aria-controls="collapse-1">
                                                                    <h4 class="panel-title">مجموع كل التقييمات</h4>
                                                                    <div class="rates-icon">
                                                                        <i class="zmdi zmdi-star-half text-warning"></i>
                                                                        <i class="zmdi zmdi-star text-warning"></i>
                                                                        <i class="zmdi zmdi-star text-warning"></i>
                                                                        <i class="zmdi zmdi-star text-warning"></i>
                                                                        <i class="zmdi zmdi-star text-warning"></i>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                            <div id="collapse-1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading-1">
                                                                <div class="panel-body">
                                                                    <p>شخص محترف جدا اتمم العمل بحرفية كبيرة وبجودة عالية جداَ واتمني التعامل معه دائما</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="media">
                                                        <div class="media-left">
                                                            <div class="avatar avatar-xs avatar-circle"><img src="../assets/images/201.jpg" alt="" class="mCS_img_loaded"> <i class="status status-online"></i></div>
                                                        </div>
                                                        <div class="media-body">
                                                            <h5 class="media-heading">أمير ناجح</h5>
                                                            <span class="time">
                                                                <i class="zmdi zmdi-calendar-check"></i>
                                                                <b>11 ديسمبر 2017</b>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="panel-group accordion" id="accordion" role="tablist" aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading" role="tab" id="heading-2">
                                                                <a class="accordion-toggle" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-2" aria-expanded="true" aria-controls="collapse-2">
                                                                    <h4 class="panel-title">مجموع كل التقييمات</h4>
                                                                    <div class="rates-icon">
                                                                        <i class="zmdi zmdi-star-half text-warning"></i>
                                                                        <i class="zmdi zmdi-star text-warning"></i>
                                                                        <i class="zmdi zmdi-star text-warning"></i>
                                                                        <i class="zmdi zmdi-star text-warning"></i>
                                                                        <i class="zmdi zmdi-star text-warning"></i>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                            <div id="collapse-2" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading-2">
                                                                <div class="panel-body">
                                                                    <p>شخص محترف جدا اتمم العمل بحرفية كبيرة وبجودة عالية جداَ واتمني التعامل معه دائما</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div> -->
                                        <div class="msg-no-panel col-md-12 col-xs-12">
                                    <h3 class="animated fadeInUp">عفوا لا يوجد تقييمات لديك <i class="zmdi zmdi-alert-triangle"></i></h3>
                                </div>
                                    </div>
                                </div>
                                </div>
                            </div>
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