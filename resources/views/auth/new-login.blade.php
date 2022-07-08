<!DOCTYPE html>
<!-- saved from url=(0050)https://colorlib.com/polygon/gentelella/login.html -->
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ورود</title>

    <link href="{{asset('admin/vendors/bootstrap/dist/css/bootstrap.css')}}" rel="stylesheet">

    <link href="{{asset('admin/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">

    <link href="{{asset('admin/vendors/nprogress/nprogress.css')}}" rel="stylesheet">

    <link href="./new-login.blade_files/animate.min.css" rel="stylesheet">

    <link href="{{asset('admin/build/css/custom.css')}}" rel="stylesheet">
    <meta name="robots" content="noindex, follow">
</head>
<style>
    {{--.bg {--}}
    {{--    background-image: url("{{asset('admin/build/images/background.jpg')}}")!important ;--}}
    {{--    /* Full height */--}}
    {{--    height: 100%;--}}

    {{--    /* Center and scale the image nicely */--}}
    {{--    background-position: center;--}}
    {{--    background-repeat: no-repeat;--}}
    {{--    background-size: cover;--}}
    {{--    -webkit-background-size: cover;--}}
    {{--    -moz-background-size: cover;--}}
    {{--    -o-background-size: cover;--}}
    {{--    background-size: cover;--}}
    {{--}--}}
    .login_content {
    }

</style>
<body class="bg" data-new-gr-c-s-check-loaded="14.1028.0" data-gr-ext-installed="">
<div>
    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <form method="post">
                    @csrf
                    <div>
                        <input type="text" class="form-control" name="email" placeholder="email" required="">
                        <h4 style="color:red">
                            @if($errors->has('email'))
                                {{$errors->first('email')}}
                            @endif
                        </h4>
                    </div>
                    <div>
                        <input type="password" class="form-control" name="password" placeholder="Password" required="">
                        <h4 style="color:red">
                            @if($errors->has('password'))
                                {{$errors->first('password')}}
                            @endif
                        </h4>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-default submit">ورود</button>
                    </div>
                    <div class="clearfix"></div>
                </form>
            </section>
        </div>
    </div>
</div>


</body>
</html>
