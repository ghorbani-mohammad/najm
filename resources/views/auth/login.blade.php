<!DOCTYPE html>
<html lang="fa" >
<head>
    <meta charset="UTF-8">
    <title>سامانه نجم</title>
    <link rel='stylesheet' href='{{asset('admin/vendors/bootstrap/dist/css/bootstrap.css')}}'>
    <link rel="stylesheet" href="{{asset('admin/build/css/login/style.css')}}">

</head>
<body>
<div class="login-page">
    <div class="form">
        <div class="logo-title">
            <h2 style="color: #4CAF50">سامانه نجم</h2>
        </div>
        <div  class="najm-logo">
            <img class='pulse' src='{{asset('admin/build/images/logo-resized.png')}}'>
        </div>
        <form method="post" class="login-form">
            @csrf
            <input name="username" type="text" placeholder="نام کاربری"/>
            <h6 style="color:red">
                @if($errors->has('username'))
                    {{$errors->first('username')}}
                @endif
            </h6>
            <input name="password" type="password" placeholder="رمز عبور"/>
            <h6 style="color:red">
                @if($errors->has('password'))
                    {{$errors->first('password')}}
                @endif
            </h6>
            <button>ورود</button>
        </form>
    </div>
</div>
<div id="particles-js"></div>
<!-- partial -->
<script src='{{asset('admin/vendors/bootstrap/dist/js/bootstrap.js')}}'></script>
<script src='{{asset('admin/vendors/jquery/dist/jquery.min.js')}}'></script>
<script  src="{{asset('admin/build/js/login/particles.min.js')}}"></script>
<script  src="{{asset('admin/build/js/login/script.js')}}"></script>
</body>
</html>
