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
       <div class="simple-page-logo animated swing"><a href="#"><span class="brand-icon"></span> <span>ONTIME</span></a></div>
        @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
        <div class="simple-page-form animated flipInY" id="reset-password-form">
            <h4 class="form-title m-b-xl text-center">أدخل الرمز الخاص بالتفعيل</h4>
            <form  role="form" method="POST" action="{{url('ve')}} ">
                        {{ csrf_field() }}
                <div class="form-group">
<input type="hidden" name="id" value="{{$id}}">

                    <input id="reset-password-email" type="text" name="code" class="form-control" placeholder="الرمز">
                     @if (!empty($error))
                                    <span class="help-block">
                                        <strong>{{ $error }}</strong>
                                    </span>
                                @endif
                </div>
                <input type="submit" class="btn btn-primary" value="التحقق من الرمز">
            </form>
        </div>
    </div>
</body>

</html>
