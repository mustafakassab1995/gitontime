
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
    <meta name="description" content="Admin, Dashboard, Bootstrap">
    <link rel="shortcut icon" sizes="196x196" href="{{asset('assets/images/logo.png')}}">
    <link rel="stylesheet" href="{{asset('assets/bower/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/bower/material-design-iconic-font/dist/css/material-design-iconic-font.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/bower/animate.css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/core.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/misc-pages.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900,300">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

</head>

<body class="simple-page">
    <div id="back-to-home"><a href="#" class="btn btn-outline btn-default"><i class="fa fa-home animated zoomIn"></i></a></div>

    <div class="simple-page-wrap">
        <div class="simple-page-logo animated swing"><a href="index.html"><span class="brand-icon"></span> <span>ONTIME</span></a></div>
        <div class="simple-page-form animated flipInY" id="signup-form">
            <h4 class="form-title m-b-xl text-center">تسجيل حساب جديد</h4>
            <form  method="POST" action="{{ route('register') }}">
            {{csrf_field()}}
            <div id="reform">
           
          
                <div class="form-group">
                    <input name="full_name" type="text" class="form-control" placeholder="الإسم كامل" required>
                </div>
                <div class="form-group">
                    <input name="email" type="email" class="form-control" placeholder="الإيميل">
                </div>
                <div class="form-group">
                    <input name="password" type="password" class="form-control" placeholder="كلمة السر" required>
                </div>
                <div class="form-group">
                    <input name="phone" type="text" class="form-control" placeholder="رقم الهاتف" required>
                </div>
             
           
</div>
                <input type="submit" class="btn btn-primary" value="سجل">
            </form>
        </div>
        <div class="simple-page-footer">
            <p><small>لديك حساب  ؟</small> <a href="{{ route('login') }}">سجل الدخول !</a></p>
        </div>
    </div>
   
</body>

</html>