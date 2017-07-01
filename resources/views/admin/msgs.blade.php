


@if(empty($msgs))

@else
@foreach($msgs as $msg)
                                    @if($msg->sender_id == \Auth::user()->id)
                                    <div class="mblm-item mblm-item-right">
                                        <div>
                                            {{$msg->message}}
                                        </div>
                                        <small>{{$msg->created_at->toDayDateTimeString()}}</small>
                                    </div>
                                    @if($msg->file)
                                    <div class="mblm-item mblm-item-right">
                                        <div>
                                            <div class="item-up">
                                                <div class="item-icon">
                                                    <i class="zmdi zmdi-file-text"></i>
                                                </div>
                                                <div class="item-data">
                                                    <h3>
                                                        <a href="{{$msg->file->file_name}}">لينك تحميل مباشر للملف</a>
                                                        
                                                    </h3>
                                                    <span>{{$msg->file->size}}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <small>{{$msg->file->created_at->toDayDateTimeString()}}</small>
                                    </div>
                                    @endif 
                                    @elseif($msg->rcv_id == \Auth::user()->id)
                                    <div class="mblm-item mblm-item-left">
                                       <div>
                                            {{$msg->message}}
                                        </div>
                                        <small>{{$msg->created_at->toDayDateTimeString()}}</small>
                                    </div>
                                  @if($msg->file)
                                    <div class="mblm-item mblm-item-left">
                                        <div>
                                            <div class="item-up">
                                                <div class="item-icon">
                                                    <i class="zmdi zmdi-file-text"></i>
                                                </div>
                                                <div class="item-data">
                                                    <h3>
                                                        <a href="{{$msg->file->file_name}}">لينك تحميل مباشر للملف</a>
                                                        
                                                    </h3>
                                                    <span>{{$msg->file->size}}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <small>{{$msg->file->created_at->toDayDateTimeString()}}</small>
                                    </div>
                                    @endif  
                                    @endif

                                    @endforeach
                                    @endif
                                    <!-- <div class="mblm-item mblm-item-right">
                                        <div>
                                            <div class="mblmi-img">
                                                <img src="../assets/images/20.jpg" alt="">
                                            </div>
                                        </div>
                                        <small>6:10 مساءاً</small>
                                    </div> -->
                                    
                                   
                                    
                                    
                                    
                                    <!-- <div class="mblm-item mblm-item-right">
                                        <div>
                                            <div class="item-up">
                                                <div class="item-icon">
                                                    <i class="zmdi zmdi-file-text"></i>
                                                </div>
                                                <div class="item-data">
                                                    <h3>
                                                        <a href="#">لينك تحميل مباشر للملف</a>
                                                        
                                                    </h3>
                                                    <span>32 كيلوبايت</span>
                                                </div>
                                            </div>
                                        </div>
                                        <small>6:15 مساءاً</small>
                                    </div> -->
                                