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
                                    <i class="menu-icon zmdi zmdi-layers zmdi-hc-lg"></i>
                                    <span>خصائص الطلب</span>
                                </h3>
                                @if(\Auth::user()->admin==1 || $requests->supervisor_id == \Auth::user()->id)
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#order_edit">
                                    تعديل الطلب
                                </button>
                                @endif
                            </div>
                            <div class="order-card col-xs-12">
                                <div class="order-panel order col-md-8 col-xs-12">
                                    <div class="inner">
                                        <div class="order-head order_wid">
                                            <p class="order-title ">{{$requests->title}}</p>
                                        </div>
                                        <div class="order-extra">
                                            <ul>
                                                <li>
                                                @if($requests->status == 4)
                                    <span class="label-state"  style="
    background-color: #10c469!important;
    
">مكتملة </span>
                                    @elseif($requests->status == 1)
                                     <span class="label-state"  style="
    background-color:#3b3e47!important;
    
">معلقة</span>
@elseif($requests->status == 0)
                                     <span class="label-state"  style="
    background-color:#188ae2!important;
    
">قيد المراجعة</span>
@elseif($requests->status == 3)
                                     <span class="label-state"  style="
    background-color:#ff5b5b!important;
    
">ملغية</span>
                                     @elseif($requests->status == 2)
                                     <span class="label-state"  style="
    background-color: #f9c851!important;
">قيد التنفيذ</span>
                                     @endif
                                                </li>
                                                <li>
                                                    <span>
                                                    <i class="zmdi zmdi-calendar-note"></i>
                                                    {{$requests->created_at->toDayDateTimeString()}}                                                </span>
                                                </li>
                                                <li>
                                                    <span>رقم الطلب : #{{$requests->id}}</span>
                                                </li>
                                                <li>
                                                    <span class="price">
                                                    <i class="zmdi zmdi-money"></i>
                                                    @if(\Auth::user()->employee==1)
                                                        {{$requests->price_employee}} دولار
                                                    @else
                                                        {{$requests->price}} دولار

                                                    @endif
                                                     
                                                </span>
                                                </li>
                                                <li>
                                                    <span>
                                                    <i class="zmdi zmdi-time"></i>
                                                    {{$requests->delivery_time}} أيام
                                                </span>
                                                </li>
                                                <li>
                                                    <span>
                                                    <i class="zmdi zmdi-label"></i>
                                                   {{$requests->category->title}}
                                                </span>
                                                </li>
                                            </ul>
                                        </div>
                                        
                                        
                                        
                                        
                                    </div>
                                    
                                    <div class="inner">
                                        <div class="order-desc">
                                            <div class="desc-head order_wid">
                                                <i class="zmdi zmdi-file-text zmdi-hc-lg"></i>
                                                <h3>تفاصيل المشروع</h3>
                                            </div>
                                            <div class="desc-body">
                                                <p class="pro-body">{{$requests->content}}. </p>
                                                <!-- <div class="work-body">
                                                    <div class="work-slider">
                                                        <div class="work-item">
                                                            <img src="../assets/images/wiok.jpg" alt="">
                                                        </div>
                                                        <div class="work-item">
                                                            <img src="../assets/images/wiok.jpg" alt="">
                                                        </div>
                                                        <div class="work-item">
                                                            <img src="../assets/images/wiok.jpg" alt="">
                                                        </div>
                                                        <div class="work-item">
                                                            <iframe height="700" src="https://www.youtube.com/embed/dyUkAk4GNBo" frameborder="0" allowfullscreen></iframe>
                                                        </div>
                                                    </div>
                                                </div> -->

                                            </div>
                                        </div>
                                    </div>
                                    <div class="inner">
                                        <div class="attached-files">
                                            <div class="attach-head order_wid">
                                                <i class="zmdi zmdi-attachment-alt zmdi-hc-lg"></i>
                                                <h3>ملفات مرفقة</h3>
                                            </div>
                                            <div class="attach-body">
                                                <ul>
                                                @if($requests->file)
                                                    <li>
                                                        <a href="{{$requests-> file->file_name}}">
                                                            <i class="zmdi zmdi-cloud-download"></i> {{$requests->file->title}}

                                                        </a>
                                                        
                                                    </li>
                                                     @else
                                                    <div class="hint-body">
                                                <p>لا توجد ملفات مرفقة
                                                        </p>
                                                
                                            </div>
                                                    @endif

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="inner">
                                        <div class="edit-order">
                                            <div class="edit-head order_wid">
                                                <i class="zmdi zmdi-wrench zmdi-hc-lg"></i>
                                                <h3>التحكم في الطلب</h3>
                                            </div>
                                            <div class="edit-body">
                                            
                                            @if(\Auth::user()->employee==1 || \Auth::user()->admin==1)

                                                <button type="button" class="btn btn_com btn-purple" data-toggle="modal" data-target="#order_com">
                                                    <i class="zmdi zmdi-headset-mic"></i> تواصل مع العميل
                                                </button>
                                                @endif

                                                
                                                <!-- $requests->status==4 -->
                                                @if($requests->user_id==\Auth::user()->id && $requests->status==4)
                                                <a href="{{url('makeinvoice')}}?id={{$requests->id}} " class="btn btn_rec btn-success" >
                                                    <i class="zmdi zmdi-file-plus"></i> إصدار الفاتورة
                                                </a>
                                                <button type="button" class="btn btn_rate btn-warning" data-toggle="modal" data-target="#order_rate">
                                                    <i class="zmdi zmdi-star"></i> تقييم العمل
                                                </button>
                                                @endif
                                            </div>
                                            <div class="edit-footer order_wid" style="
    text-align: center;
">
@if(\Auth::user()->admin==1 && $requests->status != 4)
<a type="button" class="btn btn-accom" style="
                            background-color: #ff5b5b;
                        " data-toggle="modal" data-target="#holdrequest"> <!-- data-toggle="modal" data-target="#order_complete" -->تعليق الطلب</a>
@endif
                                            @if((\Auth::user()->id==$requests->employee_id  || \Auth::user()->id==$requests->supervisor_id || \Auth::user()->admin==1) && ($requests->status == 2 ))

                                            <!-- kk -->
                                                <a type="button" class="btn btn-accom" data-toggle="modal" data-target="#order_complete" style="
    background-color: #10c469;
">تسليم الطلب</a>
                                                @endif
                                                @if($requests->status == 0 && \Auth::user()->admin==1)
                                                            <button type="button" class="btn btn-accom"  data-toggle="modal" data-target="#acceptrequest" style="
                background-color: #f9c851;
            " >قبول الطلب</button>
                                                            <!-- <a type="button" class="btn btn-accom" > data-toggle="modal" data-target="#order_hold"تعليق الطلب</a> -->
                                               
                                                @endif
                                                @if(($requests->status == 1 || $requests->status == 3) && \Auth::user()->admin==1)
                                                                        
                                                                        <a type="button" class="btn btn-accom" style="
                            background-color: #f9c851;
                        " data-toggle="modal" data-target="#acceptrequest"> <!--  -->تفعيل وقبول الطلب</a>
                                                                        
                                               
                                                @endif
                                                @if(\Auth::user()->admin == 1 && $requests->status != 3)
                            <a type="button" class="btn btn-delete" style="
                                background-color: #ff5b5b;
                            " data-toggle="modal" data-target="#cancelrequest" > <!-- --> الغاء الطلب</a>
                                                @endif
                                               
                                            </div>
                                        </div>
                                    </div>
                                    <div class="inner">
                                        <div class="comments">
                                            <div class="comment-head order_wid">
                                                <i class="zmdi zmdi-comments zmdi-hc-lg"></i>
                                                <h3>نقاش الطلب</h3>
                                            </div>
                                            <div class="comment-body">
                                                <div class="comment-users">
                                                    <ul id="commentos">
                                                    @if($comments)
                                                    @foreach($comments as $comment)
                                                        <li class="commento" data-id="{{$comment->id}}">
                                                            <div class="user">
                                                            @if(\Auth::user()->admin==1 || $requests->supervisor_id==\Auth::user()->id)
                                                            <a href="javascript:deleteacomment({{$comment->id}});" class="label label-danger pull-left"><i class="fa fa-times"></i></a>
                                                            @endif
                                                                <div class="usr-img">
                                                                    <img src="{{$comment->user->avatar}}">
                                                                </div>
                                                                <div class="usr-data">
                                                                    <h3>
                                                                    <a href="#">{{$comment->user->full_name}}</a>
                                                                </h3>
                                                                    <span>
                                                                    <i class="zmdi zmdi-calendar"></i>
                                                                    {{$comment->created_at->toDayDateTimeString()}}
                                                                </span>
                                                                 
                                                                    <p>{{$comment->message}} </p>

                                                                    @if($comment->file)
                                                                    @php
                                                                    $dg = $comment->file->title;
                                                                    $dg = explode('.',$dg);
                                                                    if(strcasecmp($dg[1],'jpg')==0 || strcasecmp($dg[1] , 'png')==0 || strcasecmp($dg[1],'gif')==0){
                                                                    $jkp = '<img src="'.$comment->file->file_name.'" width="500px" height="500px">';
                                                                    }
                                                                    if(strcasecmp($dg[1],'mp4')==0 ){
                                                                    $jkp = '<div align="center" class="embed-responsive embed-responsive-16by9">
    <video  class="embed-responsive-item" width="320" height="240" controls>
        <source src="'.$comment->file->file_name.'" type="video/mp4">
    </video>
</div>';
                                                                    }
                                                                    @endphp
                                                                    
                                                                    
                                                                <div class="attach-body">
                                                <ul>
                                               
                                                @if($jkp)
                                                            {!!$jkp!!}
                                                            @else
                                                            <li>
                                                   
                                                        <a href="{{$comment-> file->file_name}}">
                                                            <i class="zmdi zmdi-cloud-download"></i> {{$comment->file->title}}
                                                            
                                                        </a>
                                                        
                                                    </li>
                                                            @endif
                                                    
                                                    
                                                    

                                                </ul>
                                            </div>
                                            @endif
                                                                </div>
                                                            </div>
                                                        </li>
                                                        @endforeach
                                                        @else
                                                            <div class="hint-body" data-id="0">
                                                <p>لا يوجد تعليقات على هذا الطلب
</p>
                                                
                                            </div>
                                                        @endif
                                                        
                                                    </ul>
                                                </div>

                                                <div class="comment-form">
                                                 @if($requests->status == 4 || $requests->status == 2)
                                                    <form action="javascript:addcomment();" method="post">
                                                    <input type="hidden" name="file_id" value="">
                                                        <div class="form-group">
                                                            <label for="comment_ad">اكتب تعليقك</label>
                                                            <textarea name="message" class="form-control" id="message" required=""></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit" class="btn">ارسال</button>
                                                            <button type="button" class="btn btn-upload" data-toggle="modal" data-target="#file_upload">
                                                                <i class="zmdi zmdi-cloud-upload"></i> إرفاق ملفات
                                                            </button>
                                                        </div>
                                                    </form>
                                                    @else
                                                    <div  data-id="0" style="background-color:#ff5b5b!important;
                                                    display: inline-block!important;
                                                    font-size: 20px!important;
                                                    width:100%;
    padding: 2px 5px!important;
    border-radius: 3px!important;
    color: #fff!important;">
                                                <p style="text-align: center;">لا يمكنك التعليق على هذا الطلب
</p>
                                                
                                            </div>
                                            @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="order-sidebar order col-md-4 col-xs-12">
                                @if(empty($requests->supervisor))

                                            @else
                                <div class="inner">
                                        <div class="owner">
                                            <div class="owner-head side_head">
                                                <h3>
                                                    <i class="zmdi zmdi-account zmdi-hc-lg"></i>
                                                    المشرف
                                                </h3>
                                            </div>
                                            
                                            <div class="owner-body">
                                                <div class="owner-usr">
                                                    <div class="usr-img">
                                                        <img src="@if(empty($requests->supervisor->avatar)) 
                                                     {{asset('assets/images/221.jpg')}}
                                                      @else
                                                     {{ $requests->supervisor->avatar}}
                                                      @endif" alt="">
                                                    </div>
                                                    <div class="usr-data">
                                                        <h3>
                                                            <a href="{{route('User.show',$requests->supervisor->id)}}">{{$requests->supervisor->full_name}}</a>
                                                        </h3>
                                                        
                                                        <span>
                                                            <i class="zmdi zmdi-pin"></i>
                                                          {{$requests->supervisor->location}}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    @endif
                                    <div class="inner">
                                        <div class="owner">
                                            <div class="owner-head side_head">
                                                <h3>
                                                    <i class="zmdi zmdi-account zmdi-hc-lg"></i>
                                                    صاحب العمل
                                                </h3>
                                            </div>
                                            <div class="owner-body">
                                                <div class="owner-usr">
                                                    <div class="usr-img">
                                                        <img src="@if(empty($requests->user->avatar)) 
                                                     {{asset('assets/images/221.jpg')}}
                                                      @else
                                                     {{ $requests->user->avatar}}
                                                      @endif" alt="">
                                                    </div>
                                                    <div class="usr-data">
                                                        <h3>
                                                            <a href="{{route('User.show',$requests->user->id)}}">{{$requests->user->full_name}}</a>
                                                        </h3>
                                                        
                                                        <span>
                                                            <i class="zmdi zmdi-pin"></i>
                                                            {{$requests->user->location}}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="inner">
                                        <div class="order-details">
                                            <div class="det-head side_head">
                                                <h3>
                                                    <i class="zmdi zmdi-collection-text zmdi-hc-lg"></i>
                                                    {{$requests->category->title}}
                                                </h3>
                                            </div>
                                            <div class="det-body">

                                                <ul>
                                                 @if($requests->category_id == 55)

                                            @php
                                            $inc = \App\RequestVideo::where('request_id',$requests->id)->first();
                                            @endphp
                                                    <li>
                                                        <span>مدة الفيديو بالثانية</span>
                                                        <small>{{$inc->time == 1 ? 'نعم' : 'لا'}} </small>
                                                        </li>
                                                       <li> <span>مقاس الفيديو</span>
                                                       <small>{{$inc->size}} </small>
                                                       </li>
                                                       <li> <span>تعليق صوتي</span>
                                                       <small>{{$inc->voice_comment == 1 ? 'نعم' : 'لا'}}</small>
                                                       </li>
                                                       <li> <span>نماذج الصوت</span>
                                                       <small>{{$inc->vioce_model == 1 ? 'نعم' : 'لا'}}</small>
                                                       </li>
                                                       <li> <span>وجود موسيقى</span>
                                                       <small>{{$inc->music == 1 ? 'نعم' : 'لا'}}</small>
                                                       </li>
                                                       <li> <span>وجود شخصيات</span>
                                                       <small>{{$inc->personal == 1 ? 'نعم' : 'لا'}}</small>
                                                       </li>
                                                   @endif 
                                                    @if($requests->category_id == 56)

                                            @php
                                            $inc = \App\RequestDesigning::where('request_id',$requests->id)->first();
                                            @endphp
                                                    <li>
                                                        <span>صيغة التصميم</span>
                                                        <small>@if($inc->format == 1) PNG @elseif($inc->format == 2) JPG , JPEG @elseif($inc->format == 3) GIF @endif </small>
                                                        </li>
                                                       <li> <span>مقاس التصميم</span>
                                                       <small>{{$inc->size  == 1 ? 'نعم' : 'لا'}} </small>
                                                       </li>
                                                       <li> <span>نوع التصميم</span>
                                                       <small>@if($inc->type == 0) أغلفة كتب ومجلات @elseif($inc->type == 1) بانرات إعلانية
                                                        @elseif($inc->type == 2) بطاقات أعمال
                                                        @elseif($inc->type == 3) شعارات </small>
                                                        @elseif($inc->type == 4) عروض تقديمية</small>
                                                        @elseif($inc->type == 5) شيء أخر @endif</small>
                                                       </li>
                                                      
                                                   @endif 
                                                    @if($requests->category_id == 57)

                                            @php
                                            $inc = \App\RequestWeb::where('request_id',$requests->id)->first();
                                            @endphp
                                                    <li>
                                                        <span>استخدام اطار العمل</span>
                                                        <small>@if($inc->framework == 1) نعم @elseif($inc->framework == 0) لا
                                                         @endif </small>
                                                        </li>
                                                       <li> <span>نوع الموقع</span>
                                                       <small>@foreach($category as $cat)
                                                        @if($cat->id == $inc->stie_type)
                                                        {{$cat->title}}
                                                        @endif
                                                         @endforeach </small>
                                                       </li>
                                                       
                                                      
                                                   @endif 
                                                   
                                                    @if($requests->category_id == 59)

                                            @php
                                            $inc = \App\RequestWriting::where('request_id',$requests->id)->first();
                                            @endphp
                                                   
                                                       <li> <span>نوع الكتابة</span>
                                                       <small>@foreach($category as $cat)
                                                        @if($cat->id == $inc->type)
                                                        {{$cat->title}}
                                                        @endif
                                                         @endforeach </small>
                                                       </li>
                                                       
                                                      
                                                   @endif 
                                                   @if($requests->category_id == 58)

                                            @php
                                            $inc = \App\RequestSmartphone::where('request_id',$requests->id)->first();
                                            @endphp
                                                    <li>
                                                        <span>نوع النظام</span>
                                                        <small>@if($inc->os_type == 0) Andriod @elseif($inc->os_type == 1) iOS @elseif($inc->os_type == 2) iOS &amp; Andriod @endif </small>
                                                        </li>
                                                       
                                                      
                                                   @endif 
                                                    
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                     
                                                
                                    <div class="inner">
                                        <div class="employee-det">
                                            <div class="emp-head side_head">
                                                <h3>
                                                    <i class="zmdi zmdi-accounts zmdi-hc-lg"></i>
                                                    تعيين موظف
                                                </h3>
                                            </div>
                                            <div class="emp-body">
                                                @if(!$requests->employee_id )
                                                <p>لم يتم تحديد موظفين حتي الان</p>
                                                @if(\Auth::user()->admin==1)
                                                <button type="button" class="btn btn-new btn-success" data-toggle="modal" data-target="#new_emp">تعيين موظف جديد</button>
                                                @endif
                                                @else

                                                <div class="emp-usr">
                                                    <div class="emp-img">
                                                       <img src="@if(empty($requests->employee->avatar)) 
                                                     {{asset('assets/images/221.jpg')}}
                                                      @else
                                                     {{ $requests->employee->avatar}}
                                                      @endif" alt="">
                                                    </div>
                                                    <div class="emp-data">
                                                        <h3>
                                                            <a href="{{route('User.show',$requests->employee->id)}}">{{$requests->employee->full_name}}</a>
                                                        </h3>

                                                        <span class="label-danger">@if($requests->payment_status == 1) 
                                                        تم استلام المبلغ كامل وقامت الإدارة بتأكيده 
                                                        @elseif($requests->payment_status == 2) 
                                                        لم يتم استلام المبلغ بالكامل 
                                                        @elseif($requests->payment_status == 0)
                                                        لم يتم استلام أي مبلغ بعد
                                                        @elseif($requests->payment_status == 3) 
                                                        تم استلام مبلغ  , وبانتظار الإدارة لتأكيده 
                                                        @endif 
                                                        </span>
                                                        
                                                    </div>
                                                    
                                                    @if( (\Auth::user()->admin == 1 || $requests->user_id == \Auth::user()->id)&&($requests->payment_status != 1 && $requests->payment_status != 3))
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#confirmModal">
                                                            <i class="zmdi zmdi-flash"></i>
                                                            ارسال المبلغ كامل أو دفعه منه
                                                        </button>
                                                        @endif
                                                        <br>
                                                        @if(\Auth::user()->admin == 1 && $requests->payment_status == 3)
                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#confirmModalbitpayment">
                                                            <i class="zmdi zmdi-flash"></i>
                                                            تأكيد وصول دفعة من المبلغ
                                                        </button>
                                                        @endif
                                                        @if(\Auth::user()->admin == 1 && $requests->payment_status != 1)
                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#confirmModald">
                                                            <i class="zmdi zmdi-flash"></i>
                                                            تأكيد اكتمال الدفع
                                                        </button>
                                                        @endif

                                                        
                                                </div>
                                               @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="inner">
                                        <div class="add-hint">
                                            <div class="hint-head side_head">
                                                <h3>
                                                    <i class="zmdi zmdi-storage zmdi-hc-lg"></i>
                                                    اضافة ملاحظات
                                                </h3>
                                            </div>
                                            <div class="hint-body">
                                            @php
                                            $flag = false;
                                            @endphp
                                            
                                               
                                               
                                                @foreach($notes as $note)

                                                @if(($note->request_id==$requests->id)&&($note->user_id==\Auth::user()->id || 
                                                $note->all_members==1 || \Auth::user()->admin==1
                                                ))
                                                <a><p>{{$note->title}}
                                                </p></a>

                                                @php 
                                                $flag = true;
                                                @endphp
                                                @endif


                                                @endforeach
                                                @if(!$flag)
                                                 <p>لا توجد ملاحظات على هذا الطلب بعد

                                               
                                                </p>
                                                @endif
                                                 @if(\Auth::user()->admin==1 || $requests->supervisor_id == \Auth::user()->id)
                                                 <button type="button" class="btn btn-purple btn-hint" data-toggle="modal" data-target="#note_edit">اضافة ملاحظة جديدة</button>
                                                @endif
                                               

                                            </div>
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

            @if(\Auth::user()->admin==1 || $requests->supervisor_id == \Auth::user()->id)
            <div class="modal fade" id="order_edit" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">تعديل الطلب</h4></div>
                        <div class="modal-body">
                            <form action="#" id="editrequestform">
                    {{csrf_field()}}

                                <div class="form-group">
                                    <label for="p_p"> سعر الطلب</label>
                                    <input type="text" name="price" class="form-control" id="priceoo" value="{{$requests->price}}">
                                    <input type="hidden" name="id"  value="{{$requests->id}}">
                                </div>
                            
                                <div class="form-group">
                                    <label for="p_oo">مدة التسليم</label>
                                    <input type="text" name="delivery_time" class="form-control" id="p_oo" value="{{$requests->delivery_time}}">
                                </div>
                                      <div class="form-group">
                                        <label for="exampleInputEmail1">اسم الموظف</label>
                                         <select class="form-control" name="employee_id" id="users">
                                         
                                           @foreach($users as $user)
                                           @if((!empty($requests->employee_id)) && $requests->employee_id == $user->id)
                                           <option value="{{$user->id}}" selected>{{$user->full_name}} </option>
                                           @endif
                                           <option value="{{$user->id}}">{{$user->full_name}} </option>
                                           @endforeach
    </select>
                                    </div>
                                <div class="form-group">
                                    <label for="p_dd"> سعر الموظف</label>
                                    <input type="text" class="form-control" id="price_employee" name="price_employee" value="{{$requests->price_employee}}">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn btn-primary" onclick="javascript:editrequest();">ارسال الطلب</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="note_edit" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">اضافة ملاحظة</h4></div>
                        <div class="modal-body">
                            <form action="#">
                                <div class="form-group">
                                    <label for="p_p"> عنوان الملاحظة</label>
                                    <input type="text" class="form-control" id="p_p">
                                </div>
                                <div class="form-group">
                                    <label for="p_dd"> محتوي الملاحظة</label>
                                    <textarea class="form-control"></textarea>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn btn-primary" >اضافة</button>
                        </div>
                    </div>
                </div>
            </div>
                           <div class="modal fade" id="confirmModalbitpayment" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">دفع جزء من المبلغ او المبلغ كامل</h4></div>
                        <div class="modal-body">
                            <form action="#" id="confirmbitpaymentform">
                    {{csrf_field()}}

                             
                                <div class="form-group">
                                                <label for="exampleInputEmail1">المبلغ</label>
                                                <input type="text" name="amount" class="form-control" id="exampleInputEmail1" required value="{{$requests->price}}">
                                                <input type="hidden" name="request_id" class="form-control" id="exampleInputEmail1"  value="{{$requests->id}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">رقم التحويل</label>
                                                <input type="text" name="transaction_number" class="form-control" id="exampleInputEmail1">
                                            </div>

                            </form>
                        </div>
                        <div class="modal-footer">

                            <button type="button" data-dismiss="modal" class="btn btn-primary" onclick="javascript:confirmbitpayment();">إرســال</button>
                        </div>
                    </div>
                </div>
            </div>
            @endif
               <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">دفع جزء من المبلغ او المبلغ كامل</h4></div>
                        <div class="modal-body">
                            <form action="#" id="confirmpayment">
                    {{csrf_field()}}

                             
                                <div class="form-group">
                                                <label for="exampleInputEmail1">المبلغ</label>
                                                <input type="text" name="amount" class="form-control" id="exampleInputEmail1" required value="{{$requests->price}}">
                                                <input type="hidden" name="request_id" class="form-control" id="exampleInputEmail1"  value="{{$requests->id}}">
                                                <input type="hidden" name="adapter_name" class="form-control" id="exampleInputEmail1"  value="{{$requests->user->full_name}}">
                                                <input type="hidden" name="user_id" class="form-control" id="exampleInputEmail1"  value="{{$requests->user->id}}">
                                            </div>
                                <div class="form-group">
                                                <label for="exampleInputEmail1">اسم البنك</label>
                                                <input type="text" name="bank_name" class="form-control" id="exampleInputEmail1">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">رقم التحويل</label>
                                                <input type="text" name="transaction_number" class="form-control" id="exampleInputEmail1">
                                            </div>

                            </form>
                        </div>
                        <div class="modal-footer">

                            <button type="button" data-dismiss="modal" class="btn btn-primary" onclick="javascript:confirmpayment();">إرســال</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="confirmModald" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">تأكيد الدفع للموظف</h4></div>
                        <div class="modal-body">
                            <form action="#" id="confirmcompletepaymentform">
                    {{csrf_field()}}

                              
                                <div class="form-group">
                                                <label for="exampleInputEmail1">المبلغ</label>
                                                <input type="text" name="amount" class="form-control" id="exampleInputEmail1" required value="{{$requests->price}}">
                                                <input type="hidden" name="request_id" class="form-control"  value="{{$requests->id}}">
                                            </div>
                                <div class="form-group">
                                                <label for="exampleInputEmail1">رقم التحويل</label>
                                                <input type="text" name="transaction_number" class="form-control" id="exampleInputEmail1">
                                            </div>

                            </form>
                        </div>
                        <div class="modal-footer">

                            <button type="button" data-dismiss="modal" class="btn btn-primary" onclick="javascript:confirmcompletepayment()" >إرســال</button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="modal fade" id="new_emp" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">تعيين موظف جديد</h4></div>
                        <div class="modal-body">
                            <form action="#">
                                <div class="form-group">
                                                <label for="exampleInputEmail1">اسم الموظف</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" required value="160">
                                            </div>
                                <div class="form-group">
                                                <label for="exampleInputEmail1">المبلغ</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1">
                                            </div>

                            </form>
                        </div>
                        <div class="modal-footer">

                            <button type="button" data-dismiss="modal" class="btn btn-primary">تأكيد</button>
                        </div>
                    </div>
                </div>
            </div>
            
            
            <div class="modal fade" id="order_com" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">تواصل مع العميل</h4></div>
                        <div class="modal-body">
                            <form action="#" id="smsmsg">
                    {{csrf_field()}}

                                <div class="form-group">
                                    <label for="p_n"> رقم الهاتف</label>
                                    <input type="text" name="number" class="form-control" id="p_n">
                                </div>
                                <div class="form-group">
                                    <label for="mail_body_field">رسالة للعميل</label>
                                    <textarea name="msg" id="mail_body_field" cols="30" rows="5" class="form-control"></textarea>
                                </div>


                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn btn-primary" onclick="javascript:sendmsg();">ارسال</button>
                        </div>
                    </div>
                </div>
            </div>
@if($requests->user_id==\Auth::user()->id && $requests->status==4)
            <div class="modal fade" id="order_rate" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">تقييم العمل</h4></div>
                        <div class="modal-body">
                            <form action="#">
                                <div class="form-group rating">
                                    <label class="label-rate"> تقييمك للعمل</label>
                                    <input type="text" class="kv-gly-star" dir="rtl" data-size="xs" title="">
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group">
                                    <label for="mail_body_field">تعليقك علي العمل</label>
                                    <textarea name="mail_body_field" id="mail_body_field" cols="30" rows="5" class="form-control"></textarea>
                                </div>


                            </form>
                        </div>
                        <div class="modal-footer">

                            <button type="button" data-dismiss="modal" class="btn btn-primary">حفظ</button>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <div class="modal fade" id="order_complete" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">تسليم الطلب</h4></div>
                        <div class="modal-body">
                            <form action="#">
                             {{csrf_field()}}
                                <div class="form-group">
                                    <label for="mail_body_field">رسالة للعميل</label>
                                    <textarea name="msg" id="mail_body_field" cols="30" rows="5" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <div class="m-b-lg m-r-xl inline-block">
                                        <label for="switch-3-3"> إرسال رسالة هاتفية للعميل</label>
                                        <input id="switch-3-3" type="checkbox" data-switchery data-size="small" checked="checked">
                                    </div>
                                    <input type="text" class="form-control" name="number" value="{{$requests->user->phone}}" placeholder="اكتب رقم الهاتف">
                                    <input type="hidden" class="form-control" name="request_id" value="{{$requests->id}}" >
                                </div>

                                 <div class="form-group">
                                   
                                        <label for="switch-3-3"> رابط فيديو</label>
                                        
                                    <input type="text" class="form-control" name="videolink" placeholder="ضع الرابط هنا">
                            </form>
                                    
                                </div>
                                <div class="form-group">

                            <input  name="file[]"  type="file" multiple class="file-loading hh">
                        </div>

                        </div>
                        <div class="modal-footer">

                            <button type="button" data-dismiss="modal" class="btn btn-primary">ارسال</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="acceptrequest" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">قبول الطلب</h4></div>
                        <div class="modal-body">
                            <form action="#" id="acceptrequestform">
                             {{csrf_field()}}

                                <div class="form-group">
                                    <label for="mail_body_field">رسالة للعميل</label>
                                    <textarea name="msg" id="mail_body_field" cols="30" rows="5" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <div class="m-b-lg m-r-xl inline-block">
                                        <label for="switch-3-3"> إرسال رسالة هاتفية للعميل</label>
                                        <input id="switch-3-3" type="checkbox" data-switchery data-size="small" checked="checked">
                                    </div>
                                    <input type="text" class="form-control" name="number" value="{{$requests->user->phone}}" placeholder="اكتب رقم الهاتف">
                                    <input type="hidden" class="form-control" name="request_id" value="{{$requests->id}}" >
                                    <input type="hidden" class="form-control" name="status" value="2" >
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer">

                            <button type="button" data-dismiss="modal" class="btn btn-primary" onclick="javascript:acceptrequest();">ارسال</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="cancelrequest" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">الغاء الطلب</h4></div>
                        <div class="modal-body">
                            <form action="#" id="cancelrequestform">
                             {{csrf_field()}}

                                <div class="form-group">
                                    <label for="mail_body_field">رسالة للعميل</label>
                                    <textarea name="msg" id="mail_body_field" cols="30" rows="5" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <div class="m-b-lg m-r-xl inline-block">
                                        <label for="switch-3-3"> إرسال رسالة هاتفية للعميل</label>
                                        <input id="switch-3-3" type="checkbox" data-switchery data-size="small" checked="checked">
                                    </div>
                                    <input type="text" class="form-control" name="number" value="{{$requests->user->phone}}" placeholder="اكتب رقم الهاتف">
                                    <input type="hidden" class="form-control" name="request_id" value="{{$requests->id}}" >
                                    <input type="hidden" class="form-control" name="status" value="3" >
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer">

                            <button type="button" data-dismiss="modal" class="btn btn-primary" onclick="javascript:cancelrequest();">ارسال</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="holdrequest" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">تعليق الطلب</h4></div>
                        <div class="modal-body">
                            <form action="#" id="holdrequestform">
                             {{csrf_field()}}

                                <div class="form-group">
                                    <label for="mail_body_field">رسالة للعميل</label>
                                    <textarea name="msg" id="mail_body_field" cols="30" rows="5" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <div class="m-b-lg m-r-xl inline-block">
                                        <label for="switch-3-3"> إرسال رسالة هاتفية للعميل</label>
                                        <input id="switch-3-3" type="checkbox" data-switchery data-size="small" checked="checked">
                                    </div>
                                    <input type="text" class="form-control" name="number" value="{{$requests->user->phone}}" placeholder="اكتب رقم الهاتف">
                                    <input type="hidden" class="form-control" name="request_id" value="{{$requests->id}}" >
                                    <input type="hidden" class="form-control" name="status" value="3" >
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer">

                            <button type="button" data-dismiss="modal" class="btn btn-primary" onclick="javascript:acceptrequest();">ارسال</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="order_hold" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">تعليق الطلب</h4></div>
                        <div class="modal-body">
                            <form action="#">

                                <div class="form-group">
                                    <label for="mail_body_field">رسالة للعميل</label>
                                    <textarea name="mail_body_field" id="mail_body_field" cols="30" rows="5" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <div class="m-b-lg m-r-xl inline-block">
                                        <label for="switch-3-4"> إرسال رسالة هاتفية للعميل</label>
                                        <input id="switch-3-4" type="checkbox" data-switchery data-size="small" checked="checked">
                                    </div>
                                    <input type="text" class="form-control" placeholder="اكتب رقم الهاتف">
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer">

                            <button type="button" data-dismiss="modal" class="btn btn-primary">ارسال</button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="order_delete" class="modal fade" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">حذف الطلب</h4></div>
                        <div class="modal-body">
                            <h5>هل انت متأكد من حذف هذا الطلب ؟</h5></div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">حذف</button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="done" class="modal fade" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">تمت المهمة</h4></div>
                        <div class="modal-body">
                            <h5 class="btn  btn-success" id="shitl">تم التنفيذ بنجاح</h5></div>
                        <div class="modal-footer">
                            
                        </div>
                    </div>
                </div>
            </div>
            <div id="donecomplete1payment" class="modal fade" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">تمت المهمة</h4></div>
                        <div class="modal-body">
                            <h5 class="btn  btn-success" id="shitl">تم اكتمال الدفع لهذا الطلب</h5></div>
                        <div class="modal-footer">
                            
                        </div>
                    </div>
                </div>
            </div>
            <div id="donebitpayment" class="modal fade" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">تمت المهمة</h4></div>
                        <div class="modal-body">
                            <h5 class="btn  btn-success" id="shitl">تم تأكيد دفعة من مبلغ الطلب</h5></div>
                        <div class="modal-footer">
                            
                        </div>
                    </div>
                </div>
            </div>
             <div id="donepayment" class="modal fade" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">تمت المهمة</h4></div>
                        <div class="modal-body">
                            <h5 class="btn  btn-success" id="shitl">تم اشعار الادارة بدفعكم , انتظر تأكيد الإدارة</h5></div>
                        <div class="modal-footer">
                            
                        </div>
                    </div>
                </div>
            </div>
            <div id="notdonecompletepayment" class="modal fade" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">حدث خطأ</h4></div>
                        <div class="modal-body">
                            <h5 class="btn  label-danger">لم يتم ايجاد عملية دفع تطابق ما ادخلته</h5></div>
                        <div class="modal-footer">
                            
                        </div>
                    </div>
                </div>
            </div>

            <div id="notdone" class="modal fade" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">حدث خطأ</h4></div>
                        <div class="modal-body">
                            <h5 class="btn  label-danger">لم تتم المهم بنجاح</h5></div>
                        <div class="modal-footer">
                            
                        </div>
                    </div>
                </div>
            </div>
            <div id="file_upload" class="modal fade" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">ارفاق ملفات</h4></div>
                        <div class="modal-body">

                            <input  name="file"  type="file" class="file-loading ll">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">حفظ التغييرات</button>
                        </div>
                    </div>
                </div>
            </div>
    </main>
    <style type="text/css">
                                                                        video::-internal-media-controls-download-button {
    display:none;
}

video::-webkit-media-controls-enclosure {
    overflow:hidden;
}

video::-webkit-media-controls-panel {
    width: calc(100% + 30px); /* Adjust as needed */
}
                                                                    </style>
                @if(\Auth::user()->admin == 1 )

    <script type="text/javascript">
       function deleteacomment(id){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        var id = id ;
            $.ajax({
            url: "{{url('/deleteacomment')}}/"+id,
           type: 'GET',
          data: {_token: CSRF_TOKEN},
          dataType: 'JSON',
          success: function (data) {

             if(data['result']==1){
                $('.commento[data-id="'+id+'"]').remove();
                $('#done').modal('toggle');
             }
             else{
                $('#notdone').modal('toggle');
                

             }
           },
           error : function (data) {
             
                $('#notdone').modal('toggle');
              
           }
});
         }
         
         function editrequest(){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        var id = id ;
        var status = status ;
            $.ajax({
            url: "{{url('/editrequest')}}",
           type: 'POST',
          data: $("#editrequestform").serialize(),
          dataType: 'JSON',
          success: function (data) {

             if(data['result']==1){
                    $('#done').modal('toggle');

               setTimeout(
                  function() 
                  {
                    location.reload();
                  }, 5000);

                
             }
             else{
                $('#notdone').modal('toggle');
                

             }
           },
           error : function (data) {
             
                $('#notdone').modal('toggle');
              
           }
});
         }
         
                function confirmcompletepayment(){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        var id = id ;
        var status = status ;
            $.ajax({
            url: "{{url('/confirmcompletepayment')}}",
           type: 'POST',
          data: $("#confirmcompletepaymentform").serialize(),
          dataType: 'JSON',
          success: function (data) {

             if(data['result']==1){
                    $('#donecomplete1payment').modal('toggle');

               setTimeout(
                  function() 
                  {
                    location.reload();
                  }, 5000);

                
             }
             if(data['result']==2){
                $('#notdone').modal('toggle');
                

             }
             if(data['result']==3){
                $('#notdonecompletepayment').modal('toggle');
                

             }
           },
           error : function (data) {
             
                $('#notdone').modal('toggle');
              
           }
});
         }
              function holdrequest(){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        
        
            $.ajax({
            url: "{{url('/acceptrequest')}}",
           type: 'POST',
          data: $("#holdrequestform").serialize(),
          dataType: 'JSON',
          success: function (data) {

             if(data['result']==1){
                    $('#done').modal('toggle');

               setTimeout(
                  function() 
                  {
                    location.reload();
                  }, 5000);

                
             }
             else{
                $('#notdone').modal('toggle');
                

             }
           },
           error : function (data) {
             
                $('#notdone').modal('toggle');
              
           }
});
         }
         function cancelrequest(){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        
        
            $.ajax({
            url: "{{url('/acceptrequest')}}",
           type: 'POST',
          data: $("#cancelrequestform").serialize(),
          dataType: 'JSON',
          success: function (data) {

             if(data['result']==1){
                    $('#done').modal('toggle');

               setTimeout(
                  function() 
                  {
                    location.reload();
                  }, 5000);

                
             }
             else{
                $('#notdone').modal('toggle');
                

             }
           },
           error : function (data) {
             
                $('#notdone').modal('toggle');
              
           }
});
         }
          function acceptrequest(){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        
        
            $.ajax({
            url: "{{url('/acceptrequest')}}",
           type: 'POST',
          data: $("#acceptrequestform").serialize(),
          dataType: 'JSON',
          success: function (data) {

             if(data['result']==1){
                    $('#done').modal('toggle');

               setTimeout(
                  function() 
                  {
                    location.reload();
                  }, 5000);

                
             }
             else{
                $('#notdone').modal('toggle');
                

             }
           },
           error : function (data) {
             
                $('#notdone').modal('toggle');
              
           }
});
         }

                  function confirmpayment(){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        var id = id ;
        var status = status ;
            $.ajax({
            url: "{{url('/confirmpayment')}}",
           type: 'POST',
          data: $("#confirmpayment").serialize(),
          dataType: 'JSON',
          success: function (data) {

             if(data['result']==1){
                    $('#donepayment').modal('toggle');

               setTimeout(
                  function() 
                  {
                    location.reload();
                  }, 5000);
           }
               if(data['result']==2){
                $('#notdone').modal('toggle');
                

             }
             if(data['result']==3){
                $('#notdonecompletepayment').modal('toggle');
                

             }
                
             
             
           },
           error : function (data) {
             
                $('#notdone').modal('toggle');
              
           }
});
         }
         function confirmbitpayment(){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        var id = id ;
        var status = status ;
            $.ajax({
            url: "{{url('/confirmbitpayment')}}",
           type: 'POST',
          data: $("#confirmbitpaymentform").serialize(),
          dataType: 'JSON',
          success: function (data) {

             if(data['result']==1){
                    $('#donebitpayment').modal('toggle');

               setTimeout(
                  function() 
                  {
                    location.reload();
                  }, 5000);

                
             }
             else{
                $('#notdone').modal('toggle');
                

             }
           },
           error : function (data) {
             
                $('#notdone').modal('toggle');
              
           }
});
         }
    </script>
         @endif

    <script>
        $(document).ready(function() {  $("#users").select2({
    allowClear: true,
     maximumSelectionSize: 1,
});
 @php
$h = \DB::table('setting')->where('id',23)->first();
$x = $h->value;
$x = $x/100;

      @endphp
        $('#priceoo').keyup(function(e)  {
            console.log('ksmckm');
        var per =parseFloat('{{$x}}');

        var price = parseFloat($('#priceoo').val());
        var r = price - (price*per) ;
        $('#price_employee').val( r);

       
    });
        var idr = '{{$requests->id}}';
         var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $(".hh").fileinput({
        theme: "explorer",
        uploadUrl: "{{url('uploadreqfiles')}}",
        uploadExtraData : {_token: CSRF_TOKEN , request_id : idr},

    });
 });
    </script>
    <script type="text/javascript">
     
        $(document).ready(function() { 
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

       
        

        $(".ll").fileinput({
        theme: "explorer",
        uploadUrl: "{{url('uploadcommentfile')}}",
        overwriteInitial: false,
        initialPreviewAsData: true,
        uploadExtraData : {_token: CSRF_TOKEN  },
    });
       
       
 });
    

        
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        function addcomment(){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

            var request_id = '{{$requests->id}}';
            var message = $('#message').val();
            
              $.ajax({
            
            url: "{{url('/addcomment')}}",
           type: 'post',
          data: {_token: CSRF_TOKEN , request_id: request_id , message: message },
          dataType: 'JSON',
          success: function (data) {
            var x = '';
            if(data['comment']['file_id']!=null){
                x =  '<div class="attach-body">'+
                                                '<ul>'+
                                                    '<li>'+
                                                        '<a href="'+data['comment']['file']['file_name']+'">'+
                                            '<i class="zmdi zmdi-cloud-download"></i> '+data['comment']['file']['title']+''+
                                                        '</a>'+
                                                    '</li>'+
                                                '</ul>'+
                                            '</div>';
                                           
            }

             if(data['result']==1){
                $('#commentos').append('<li class="commento" data-id="'+data['comment']['id']+'">'+
                                                            '<div class="user">'+
                                                            '<a href="javascript:deleteacomment('+data['comment']['id']+');" class="label'+ 'label-danger pull-left"><i class="fa fa-times"></i></a>'+
                                                                '<div class="usr-img">'+
                                                                    '<img src="../assets/images/104.jpg">'+
                                                                '</div>'+
                                                                '<div class="usr-data">'+
                                                                    '<h3>'+
                                                                    '<a href="#">'+data['comment']['user']['full_name']+'</a>'+
                                                                '</h3>'+
                                                                    '<span>'+
                                                                    '<i class="zmdi zmdi-calendar"></i>'+
                                                                    ''+data['comment']['created_at']+''+
                                                                '</span>'+
                                                                '<span>'+
                                                                 '<p>'+data['comment']['message']+' </p>'+
                                                                    x+
                                                                    
                                                                   
                                                                '</div>'+
                                                            '</div>'+
                                                        '</li>');
                $('#done').modal('toggle');
             }
             else{
                $('#notdone').modal('toggle');
                

             }
           },
           error : function (data) {
             
                $('#notdone').modal('toggle');
              
           }
}); 
        }

                  function sendmsg(){
     
                console.log("دخل");
        var id = id ;
            $.ajax({
            url: "{{url('sendamsg')}}",
           type: 'POST',
          data: $("#smsmsg").serialize(),
          dataType: 'JSON',
          success: function (data) {
            
             if(data['result']==1){
                
             
                $('#done').modal('toggle');
             }
             else{
                $('#notdone').modal('toggle');
                

             }
           },
           error : function (data) {
             
                $('#notdone').modal('toggle');
              
           }
});
         }
         function makeinvoice(id){
     
                console.log("دخل");
        var id = id ;
            $.ajax({
            url: "{{url('makeinvoice')}}",
           type: 'get',
          data: {id : id},
          dataType: 'JSON',
          success: function (data) {
            
             if(data['result']==0){
                
             
               $('#notdone').modal('toggle');
             }
             
           },
           error : function (data) {
             
                $('#notdone').modal('toggle');
              
           }
});
         }

    </script>
    @endsection