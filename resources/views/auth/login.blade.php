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
</head>

<body class="simple-page">
    <div id="back-to-home"><a href="index.html" class="btn btn-outline btn-default"><i class="fa fa-home animated zoomIn"></i></a></div>
    <div class="simple-page-wrap">
        <div class="simple-page-logo animated swing"><a href="index.html"><span class="brand-icon"></span> <span>ONTIME</span></a></div>
        <div class="simple-page-form animated flipInY" id="login-form">
            <h4 class="form-title m-b-xl text-center">تسجيل الدخول لحسابك</h4>
            <form  role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}
                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                    <input id="sign-in-email" name="username" type="text" class="form-control" placeholder="رقم الجوال">
                    @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input id="sign-in-password" name="password" type="password" class="form-control" placeholder="كلمة السر ">
                    @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                </div>
                <div class="form-group m-b-xl">
                    <div class="checkbox checkbox-primary">
                        <input type="checkbox" id="keep_me_logged_in"  name="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label for="keep_me_logged_in">تذكرني</label>
                    </div>
                </div>
                <input type="submit" class="btn btn-primary" value="تسجيل الدخول">
            </form>
        </div>
        <div class="simple-page-footer">
            <p><a href="{{ route('password.request') }}">هل نسيت كلمة السر ؟</a></p>
            <p><small>ليس لديك حساب ؟</small> <a href="{{ route('register') }}">سجل الان !</a></p>
        </div>
    </div>
</body>
</html>