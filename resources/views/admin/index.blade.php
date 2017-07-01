@extends('layouts.main')
@section('content')
    <main id="app-main" class="app-main">
        <div class="wrap">
            <section class="app-content">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 pull-right">
                        <div class="widget p-md clearfix">
                            <div class="pull-right welcome-msg">
                                <h3 class="widget-title">{{\Auth::user()->full_name}}</h3>
                                <small class="text-color">اخر ظهور لك منذ 15 دقيقة</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="widget stats-widget">
                            <div class="widget-body clearfix">
                                <div class="pull-right">
                                    <h3 class="widget-title text-primary"><span class="counter" data-plugin="counterUp">15</span></h3><small class="text-color">عدد المستخدمين</small></div><span class="pull-left big-icon watermark"><i class="fa fa-group"></i></span></div>
                            <footer class="widget-footer bg-primary"><small>
                                    <a href="#">رؤية جميع الموظفين</a>
                                </small></footer>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="widget stats-widget">
                            <div class="widget-body clearfix">
                                <div class="pull-right">
                                    <h3 class="widget-title text-danger"><span class="counter" data-plugin="counterUp">250</span></h3><small class="text-color">الرسائل الواردة</small></div><span class="pull-left big-icon watermark"><i class="fa fa-envelope"></i></span></div>
                            <footer class="widget-footer bg-danger"><small><a href="#">رؤية جميع الرسائل</a></small></footer>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="widget stats-widget">
                            <div class="widget-body clearfix">
                                <div class="pull-right">
                                    <h3 class="widget-title text-success"><span class="counter" data-plugin="counterUp">32</span></h3><small class="text-color">الطلبات</small></div><span class="pull-left big-icon watermark"><i class="menu-icon zmdi zmdi-layers zmdi-hc-lg"></i></span></div>
                            <footer class="widget-footer bg-success"><small><a href="#">رؤية جميع الطلبات</a></small></footer>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="widget stats-widget">
                            <div class="widget-body clearfix">
                                <div class="pull-right">
                                    <h3 class="widget-title text-warning"><span class="counter" data-plugin="counterUp">300</span></h3><small class="text-color">التنبيهات</small></div><span class="pull-left big-icon watermark"><i class="fa fa-bell"></i></span></div>
                            <footer class="widget-footer bg-warning"><small><a href="#">رؤية جميع التنبيهات</a></small></footer>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="widget row no-gutter p-lg">
                            <div class="col-md-5 col-sm-5 pull-right sales">
                                <div>
                                    <h3 class="widget-title fz-lg text-primary m-b-lg">المبيعات ف عام 2017</h3>
                                    <p class="m-b-lg">مثال خط عرب مكتوب مثال خط عرب مكتوب مثال خط عرب مكتوب مثال خط عرب مكتوب مثال خط عرب مكتوب مثال خط عرب مكتوب مثال خط عرب مكتوب مثال خط عرب مكتوب </p>
                                    <p class="m-b-lg">مثال خط عرب مكتوب مثال خط عرب مكتوب مثال خط عرب مكتوب مثال خط عرب مكتوب مثال خط عرب مكتوب مثال خط عرب مكتوب مثال خط عرب مكتوب مثال خط عرب مكتوب مثال خط عرب مكتوب </p>
                                </div>
                            </div>
                            <div class="col-md-7 col-sm-7 pull-left">
                                <div>
                                    <div id="lineChart" data-plugin="plot" data-options="
								[
									{
										data: [[1,3.6],[2,3.5],[3,6],[4,4],[5,4.3],[6,3.5],[7,3.6]],
										color: '#ffa000',
										lines: { show: true, lineWidth: 6 },
										curvedLines: { apply: true }
									},
									{
										data: [[1,3.6],[2,3.5],[3,6],[4,4],[5,4.3],[6,3.5],[7,3.6]],
										color: '#ffa000',
										points: {show: true}
									}
								],
								{
									series: {
										curvedLines: { active: true }
									},
									xaxis: {
										show: true,
										font: { size: 12, lineHeight: 10, style: 'normal', weight: '100',family: 'lato', variant: 'small-caps', color: '#a2a0a0' }
									},
									yaxis: {
										show: true,
										font: { size: 12, lineHeight: 10, style: 'normal', weight: '100',family: 'lato', variant: 'small-caps', color: '#a2a0a0' }
									},
									grid: { color: '#a2a0a0', hoverable: true, margin: 8, labelMargin: 8, borderWidth: 0, backgroundColor: '#fff' },
									tooltip: true,
									tooltipOpts: { content: 'X: %x.0, Y: %y.2',  defaultTheme: false, shifts: { x: 0, y: -40 } },
									legend: { show: false }
								}" style="width: 100%; height: 230px"></div>
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