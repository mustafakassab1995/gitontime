<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
    <meta name="description" content="Admin, Dashboard, Bootstrap">
    <link rel="shortcut icon" sizes="196x196" href="../assets/images/logo.png">
    <title>Mero Admin Panel</title>
    <link rel="stylesheet" href="../libs/bower/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../libs/bower/material-design-iconic-font/dist/css/material-design-iconic-font.css">
    <link rel="stylesheet" href="../assets/css/app.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900,300">
    <script src="../libs/bower/breakpoints.js/dist/breakpoints.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../libs/bower/switchery/dist/switchery.min.css">
    <link rel="stylesheet" type="text/css" href="../libs/bower/lightbox2/dist/css/lightbox.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/ontime.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/ontime-rtl.css">
    <script>
        Breakpoints();
    </script>
</head>

<body class="menubar-left menubar-unfold menubar-light theme-primary amir-rtl">
    <nav id="app-navbar" class="navbar navbar-inverse navbar-fixed-top primary">
        <div class="navbar-header">
            <button type="button" id="menubar-toggle-btn" class="navbar-toggle visible-xs-inline-block navbar-toggle-left hamburger hamburger--collapse js-hamburger"><span class="sr-only">Toggle navigation</span> <span class="hamburger-box"><span class="hamburger-inner"></span></span>
            </button>
            <button type="button" class="navbar-toggle navbar-toggle-right collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false"><span class="sr-only">Toggle navigation</span> <span class="zmdi zmdi-hc-lg zmdi-more"></span></button>
            <button type="button" class="navbar-toggle navbar-toggle-right collapsed" data-toggle="collapse" data-target="#navbar-search" aria-expanded="false"><span class="sr-only">Toggle navigation</span> <span class="zmdi zmdi-hc-lg zmdi-search"></span></button> <a href="#" class="navbar-brand"><span class="brand-icon"><i class="fa fa-gg"></i></span> <span class="brand-name">ONTIME</span></a></div>
        <div class="navbar-container container-fluid">
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <ul class="nav navbar-toolbar navbar-toolbar-left navbar-right">
                    <li class="hidden-float hidden-menubar-top"><a href="javascript:void(0)" role="button" id="menubar-fold-btn" class="hamburger hamburger--arrowalt is-active js-hamburger"><span class="hamburger-box"><span class="hamburger-inner"></span></span></a></li>
                    <li>
                        <h5 class="page-title hidden-menubar-top hidden-float">Dashboard</h5></li>
                </ul>
                <ul class="nav navbar-toolbar navbar-toolbar-right navbar-left">
                    <li class="nav-item dropdown hidden-float"><a href="javascript:void(0)" data-toggle="collapse" data-target="#navbar-search" aria-expanded="false"><i class="zmdi zmdi-hc-lg zmdi-search"></i></a></li>
                    <li class="dropdown"><a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="zmdi zmdi-hc-lg zmdi-notifications"></i></a>
                        <div class="media-group dropdown-menu animated flipInY">
                            <a href="javascript:void(0)" class="media-group-item">
                                <div class="media">
                                    <div class="media-left">
                                        <div class="avatar avatar-xs avatar-circle"><img src="../assets/images/221.jpg" alt=""> <i class="status status-online"></i></div>
                                    </div>
                                    <div class="media-body">
                                        <h5 class="media-heading">John Doe</h5><small class="media-meta">Active now</small></div>
                                </div>
                            </a>
                            <a href="javascript:void(0)" class="media-group-item">
                                <div class="media">
                                    <div class="media-left">
                                        <div class="avatar avatar-xs avatar-circle"><img src="../assets/images/205.jpg" alt=""> <i class="status status-offline"></i></div>
                                    </div>
                                    <div class="media-body">
                                        <h5 class="media-heading">John Doe</h5><small class="media-meta">2 hours ago</small></div>
                                </div>
                            </a>
                            <a href="javascript:void(0)" class="media-group-item">
                                <div class="media">
                                    <div class="media-left">
                                        <div class="avatar avatar-xs avatar-circle"><img src="../assets/images/207.jpg" alt=""> <i class="status status-away"></i></div>
                                    </div>
                                    <div class="media-body">
                                        <h5 class="media-heading">Sara Smith</h5><small class="media-meta">idle 5 min ago</small></div>
                                </div>
                            </a>
                            <a href="javascript:void(0)" class="media-group-item">
                                <div class="media">
                                    <div class="media-left">
                                        <div class="avatar avatar-xs avatar-circle"><img src="../assets/images/211.jpg" alt=""> <i class="status status-away"></i></div>
                                    </div>
                                    <div class="media-body">
                                        <h5 class="media-heading">Donia Dyab</h5><small class="media-meta">idle 5 min ago</small></div>
                                </div>
                            </a>
                        </div>
                    </li>
                    <li class="dropdown"><a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="zmdi zmdi-hc-lg zmdi-settings"></i></a>
                        <ul class="dropdown-menu animated flipInY">
                            <li><a href="javascript:void(0)"><i class="zmdi m-r-md zmdi-hc-lg zmdi-account-box"></i>My Profile</a></li>
                            <li><a href="javascript:void(0)"><i class="zmdi m-r-md zmdi-hc-lg zmdi-balance-wallet"></i>Balance</a></li>
                            <li><a href="javascript:void(0)"><i class="zmdi m-r-md zmdi-hc-lg zmdi-phone-msg"></i>Connection<span class="label label-primary">3</span></a></li>
                            <li><a href="javascript:void(0)"><i class="zmdi m-r-md zmdi-hc-lg zmdi-info"></i>privacy</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="javascript:void(0)" class="side-panel-toggle" data-toggle="class" data-target="#side-panel" data-class="open" role="button"><i class="zmdi zmdi-hc-lg zmdi-apps"></i></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <aside id="menubar" class="menubar light">
        <div class="app-user">
            <div class="media">
                <div class="media-left">
                    <div class="avatar avatar-md avatar-circle">
                        <a href="javascript:void(0)"><img class="img-responsive" src="../assets/images/221.jpg" alt="avatar"></a>
                    </div>
                </div>
                <div class="media-body">
                    <div class="foldable">
                        <h5><a href="javascript:void(0)" class="username">أمير ناجح</a></h5>
                        <ul>
                            <li class="dropdown"><a href="javascript:void(0)" class="dropdown-toggle usertitle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><small>مهندس برمجيات</small> <span class="caret"></span></a>
                                <ul class="dropdown-menu animated flipInY">
                                    <li><a class="text-color" href="####"><span class="m-r-xs"><i class="fa fa-home"></i></span> <span>الرئيسية</span></a></li>
                                    <li><a class="text-color" href="profile.html"><span class="m-r-xs"><i class="fa fa-user"></i></span> <span>الحساب</span></a></li>
                                    <li><a class="text-color" href="settings.html"><span class="m-r-xs"><i class="fa fa-gear"></i></span> <span>الاعدادات</span></a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a class="text-color" href="logout.html"><span class="m-r-xs"><i class="fa fa-power-off"></i></span> <span>خروج</span></a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="menubar-scroll">
            <div class="menubar-scroll-inner">
                <ul class="app-menu">
                    <li><a href="javascript:void(0)" class="submenu-toggle"><i class="menu-icon zmdi zmdi-home zmdi-hc-lg"></i> <span class="menu-text">الرئيسية</span></a>
                    </li>
                    <li class="has-submenu"><a href="javascript:void(0)" class="submenu-toggle"><i class="menu-icon zmdi zmdi-layers zmdi-hc-lg"></i> <span class="menu-text">الطلبات</span> <span class="label label-warning menu-label">6</span> <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right menu-inner-caret"></i></a>
                        <ul class="submenu">
                            <li><a href="index.html"><span class="menu-text">قيد لمراجعة</span> <span class="label label-primary menu-label">2</span></a></li>
                            <li><a href="#"><span class="menu-text">معلقة</span></a></li>
                            <li><a href="index.html"><span class="menu-text">قيد العمل عليها</span> <span class="label label-primary menu-label">2</span></a></li>
                            <li><a href="#"><span class="menu-text">تم تسليمها</span> <span class="label label-primary menu-label">2</span></a></li>
                            <li><a href="index.html"><span class="menu-text">ملغية</span></a></li>
                            <li><a href="#"><span class="menu-text">فواتير الطلبات</span></a></li>
                        </ul>
                    </li>
                    <li class="has-submenu"><a href="javascript:void(0)" class="submenu-toggle"><i class="menu-icon zmdi zmdi-accounts zmdi-hc-lg"></i> <span class="menu-text">المستخدمين</span> <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i></a>
                        <ul class="submenu">
                            <li><a href="buttons.html"><span class="menu-text">جميع المستخدمين</span></a></li>
                            <li><a href="alerts.html"><span class="menu-text">المديرين</span></a></li>
                            <li><a href="panels.html"><span class="menu-text">المشرفين</span></a></li>
                            <li><a href="lists.html"><span class="menu-text">الموظفين</span></a></li>
                            <li><a href="icons.html"><span class="menu-text">العملاء</span></a></li>
                        </ul>
                    </li>
                    <li class="has-submenu"><a href="javascript:void(0)" class="submenu-toggle"><i class="menu-icon zmdi zmdi-inbox zmdi-hc-lg"></i> <span class="menu-text">الرسائل الواردة</span> <span class="label label-warning menu-label">24</span> <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right menu-inner-caret"></i></a>
                        <ul class="submenu">
                            <li><a href="inbox.html"><span class="menu-text">جميع الرسائل</span> <span class="label label-primary menu-label">12</span></a></li>
                            <li><a href="compose.html"><span class="menu-text">رسائل الموظفين</span></a></li>
                            <li><a href="inbox.html"><span class="menu-text">رسائل العملاء</span> <span class="label label-primary menu-label">12</span></a></li>
                            <li><a href="compose.html"><span class="menu-text">رسالة جديدة</span></a></li>
                        </ul>
                    </li>
                    <li><a href="search.web.html"><i class="menu-icon zmdi zmdi-collection-text zmdi-hc-lg"></i> <span class="menu-text">مهام مجدولة</span></a></li>
                    <li class="has-submenu"><a href="javascript:void(0)" class="submenu-toggle"><i class="menu-icon zmdi zmdi-case zmdi-hc-lg"></i> <span class="menu-text">المالية</span> <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i></a>
                        <ul class="submenu">
                            <li><a href="form.layouts.html"><span class="menu-text">التحويلات البنكية للعميل</span></a></li>
                            <li><a href="form.elements.html"><span class="menu-text">التحويلات البنكية للإدارة</span></a></li>
                            <li><a href="form.custom.html"><span class="menu-text">الطلبات</span></a></li>
                            <li><a href="form.plugins.html"><span class="menu-text">الموظفين</span></a></li>
                            <li><a href="file-upload.html"><span class="menu-text">الرواتب</span></a></li>
                            <li><a href="form.datetime.html"><span class="menu-text">المديونيات</span></a></li>
                        </ul>
                    </li>
                    <li class="has-submenu"><a href="javascript:void(0)" class="submenu-toggle"><i class="menu-icon zmdi zmdi-storage zmdi-hc-lg"></i> <span class="menu-text">ملاحظات</span> <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i></a>
                        <ul class="submenu">
                            <li><a href="tables.basic.html"><span class="menu-text">جميع الملاحظات</span></a></li>
                            <li><a href="datatables.html"><span class="menu-text">إضافة ملاحظة جديدة</span></a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </aside>
    <div id="navbar-search" class="navbar-search collapse">
        <div class="navbar-search-inner">
            <form action="#"><span class="search-icon"><i class="fa fa-search"></i></span>
                <input class="search-field" type="search" placeholder="search...">
            </form>
            <button type="button" class="search-close" data-toggle="collapse" data-target="#navbar-search" aria-expanded="false"><i class="fa fa-close"></i></button>
        </div>
        <div class="navbar-search-backdrop" data-toggle="collapse" data-target="#navbar-search" aria-expanded="false"></div>
    </div>
    <main id="app-main" class="app-main">
        <div class="wrap">
            <section class="app-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="widget p-md clearfix">
                            <h1>مرحبا بك</h1>
                    </div>
                </div>
                </div>
            </section>
        </div>
        <div class="wrap p-t-0">
            <footer class="app-footer">
                <div class="clearfix">
                    <ul class="footer-menu pull-left">
                        <li><a href="javascript:void(0)">Careers</a></li>
                        <li><a href="javascript:void(0)">Privacy Policy</a></li>
                        <li><a href="javascript:void(0)">Feedback <i class="fa fa-angle-up m-l-md"></i></a></li>
                    </ul>
                    <div class="copyright pull-right">Copyright RaThemes 2016 &copy;</div>
                </div>
            </footer>
        </div>
    </main>
    <div id="app-customizer" class="app-customizer"><a href="javascript:void(0)" class="app-customizer-toggle theme-color" data-toggle="class" data-class="open" data-active="false" data-target="#app-customizer"><i class="fa fa-gear"></i></a>
        <div class="customizer-tabs">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#menubar-customizer" aria-controls="menubar-customizer" role="tab" data-toggle="tab">Menubar</a></li>
                <li role="presentation"><a href="#navbar-customizer" aria-controls="navbar-customizer" role="tab" data-toggle="tab">Navbar</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane in active fade" id="menubar-customizer">
                    <div class="hidden-menubar-top hidden-float">
                        <div class="m-b-0">
                            <label for="menubar-fold-switch">Fold Menubar</label>
                            <div class="pull-left">
                                <input id="menubar-fold-switch" type="checkbox" data-switchery data-size="small">
                            </div>
                        </div>
                        <hr class="m-h-md">
                    </div>
                    <div class="radio radio-default m-b-md">
                        <input type="radio" id="menubar-light-theme" name="menubar-theme" data-toggle="menubar-theme" data-theme="light">
                        <label for="menubar-light-theme">Light</label>
                    </div>
                    <div class="radio radio-inverse m-b-md">
                        <input type="radio" id="menubar-dark-theme" name="menubar-theme" data-toggle="menubar-theme" data-theme="dark">
                        <label for="menubar-dark-theme">Dark</label>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="navbar-customizer"></div>
            </div>
        </div>
        <hr class="m-0">
        <div class="customizer-reset">
            <button id="customizer-reset-btn" class="btn btn-block btn-outline btn-primary">Reset</button>
        </div>
    </div>
    <div id="side-panel" class="side-panel">
        <div class="panel-header">
            <h4 class="panel-title">Friends</h4></div>
        <div class="scrollable-container">
            <div class="media-group">
                <a href="javascript:void(0)" class="media-group-item">
                    <div class="media">
                        <div class="media-left">
                            <div class="avatar avatar-xs avatar-circle"><img src="../assets/images/221.jpg" alt=""> <i class="status status-online"></i></div>
                        </div>
                        <div class="media-body">
                            <h5 class="media-heading">John Doe</h5><small class="media-meta">active now</small></div>
                    </div>
                </a>
                <a href="javascript:void(0)" class="media-group-item">
                    <div class="media">
                        <div class="media-left">
                            <div class="avatar avatar-xs avatar-circle"><img src="../assets/images/205.jpg" alt=""> <i class="status status-online"></i></div>
                        </div>
                        <div class="media-body">
                            <h5 class="media-heading">John Doe</h5><small class="media-meta">active now</small></div>
                    </div>
                </a>
                <a href="javascript:void(0)" class="media-group-item">
                    <div class="media">
                        <div class="media-left">
                            <div class="avatar avatar-xs avatar-circle"><img src="../assets/images/206.jpg" alt=""> <i class="status status-online"></i></div>
                        </div>
                        <div class="media-body">
                            <h5 class="media-heading">Adam Kiti</h5><small class="media-meta">active now</small></div>
                    </div>
                </a>
                <a href="javascript:void(0)" class="media-group-item">
                    <div class="media">
                        <div class="media-left">
                            <div class="avatar avatar-xs avatar-circle"><img src="../assets/images/207.jpg" alt=""> <i class="status status-away"></i></div>
                        </div>
                        <div class="media-body">
                            <h5 class="media-heading">Jane Doe</h5><small class="media-meta">away</small></div>
                    </div>
                </a>
                <a href="javascript:void(0)" class="media-group-item">
                    <div class="media">
                        <div class="media-left">
                            <div class="avatar avatar-xs avatar-circle"><img src="../assets/images/208.jpg" alt=""> <i class="status status-away"></i></div>
                        </div>
                        <div class="media-body">
                            <h5 class="media-heading">Sara Adams</h5><small class="media-meta">away</small></div>
                    </div>
                </a>
                <a href="javascript:void(0)" class="media-group-item">
                    <div class="media">
                        <div class="media-left">
                            <div class="avatar avatar-xs avatar-circle"><img src="../assets/images/209.jpg" alt=""> <i class="status status-away"></i></div>
                        </div>
                        <div class="media-body">
                            <h5 class="media-heading">Smith Doe</h5><small class="media-meta">away</small></div>
                    </div>
                </a>
                <a href="javascript:void(0)" class="media-group-item">
                    <div class="media">
                        <div class="media-left">
                            <div class="avatar avatar-xs avatar-circle"><img src="../assets/images/219.jpg" alt=""> <i class="status status-away"></i></div>
                        </div>
                        <div class="media-body">
                            <h5 class="media-heading">Dana Dyab</h5><small class="media-meta">away</small></div>
                    </div>
                </a>
                <a href="javascript:void(0)" class="media-group-item">
                    <div class="media">
                        <div class="media-left">
                            <div class="avatar avatar-xs avatar-circle"><img src="../assets/images/210.jpg" alt=""> <i class="status status-offline"></i></div>
                        </div>
                        <div class="media-body">
                            <h5 class="media-heading">Jeffry Way</h5><small class="media-meta">2 hours ago</small></div>
                    </div>
                </a>
                <a href="javascript:void(0)" class="media-group-item">
                    <div class="media">
                        <div class="media-left">
                            <div class="avatar avatar-xs avatar-circle"><img src="../assets/images/211.jpg" alt=""> <i class="status status-offline"></i></div>
                        </div>
                        <div class="media-body">
                            <h5 class="media-heading">Jane Doe</h5><small class="media-meta">5 hours ago</small></div>
                    </div>
                </a>
                <a href="javascript:void(0)" class="media-group-item">
                    <div class="media">
                        <div class="media-left">
                            <div class="avatar avatar-xs avatar-circle"><img src="../assets/images/212.jpg" alt=""> <i class="status status-offline"></i></div>
                        </div>
                        <div class="media-body">
                            <h5 class="media-heading">Adam Khoury</h5><small class="media-meta">22 minutes ago</small></div>
                    </div>
                </a>
                <a href="javascript:void(0)" class="media-group-item">
                    <div class="media">
                        <div class="media-left">
                            <div class="avatar avatar-xs avatar-circle"><img src="../assets/images/207.jpg" alt=""> <i class="status status-offline"></i></div>
                        </div>
                        <div class="media-body">
                            <h5 class="media-heading">Sara Smith</h5><small class="media-meta">2 days ago</small></div>
                    </div>
                </a>
                <a href="javascript:void(0)" class="media-group-item">
                    <div class="media">
                        <div class="media-left">
                            <div class="avatar avatar-xs avatar-circle"><img src="../assets/images/211.jpg" alt=""> <i class="status status-offline"></i></div>
                        </div>
                        <div class="media-body">
                            <h5 class="media-heading">Donia Dyab</h5><small class="media-meta">3 days ago</small></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <script src="../assets/js/core.min.js"></script>
    <script src="../assets/js/app.min.js"></script>
    <script src="../libs/bower/moment/moment.js"></script>
    <script src="../libs/bower/fullcalendar/dist/fullcalendar.min.js"></script>
    <script src="../assets/js/fullcalendar.js"></script>
    <script src="../libs/bower/switchery/dist/switchery.min.js"></script>
    <script src="../assets/js/ontime.js"></script>
</body>

</html>