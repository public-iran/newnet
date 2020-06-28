

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>ورود به پنل آموزشی | بیزنس پنل</title>
    <!-- Favicon-->
    <link rel="icon" href="{{asset('favicon.ico')}}" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet"
          type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{asset('plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{asset('plugins/node-waves/waves.css')}}" rel="stylesheet"/>

    <!-- Animation Css -->
    <link href="{{asset('plugins/animate-css/animate.css')}}" rel="stylesheet"/>

    <!-- Custom Css -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/style-rtl.css')}}" rel="stylesheet">
</head>
<style>
    .body{
        padding: 0!important;
    }
    body,a{
        font-family: Vazir;
    }
    .input-group-addon{
        float: right;
    }
    .form-line{
        float: right;
        width: 97%!important;
        margin-right: 5px;
    }
    .form-line input{
        text-align: right;
        padding-right: 7px !important;
    }
    @media (max-width: 767px){
        .login-box{
            padding: 0 35px;
        }
        .login-page{
            background-size: 146% 185%;
            background-position: -79px -60px;
        }
        .nav-tabs li a {
            padding: 10px 39px!important;
        }
    }
    .card {
        box-shadow: 0 0 27px 0px #000;
        background: #fff;
        margin-top: 50px;
    }
    .login-page{
        background: url({{asset('images/background/login.svg')}});
        background-size: cover;
    }

    .bg-pink {
        background-color: #064c56bf!important;
    }

    .forget{
        text-align: center;
    }
    .forget div{
        float: right;
        width: 100%;
    }
    .invalid-feedback{
        color: red;
        width: 100%;
        display: block;
        text-align: center;
    }
    .nav-tabs{
        padding-left: 5px;
    }
    .nav-tabs li a{
        padding: 10px 57px;
    }
    .tab-pane{
        padding: 10px 30px 0;
    }
</style>
<?php
    if(!empty(session('user_info_register'))){
        $user_info=session('user_info_register');
    }else{
        $user_info='';
    }

?>
<body class="login-page">
<div class="login-box">
    <div class="logo">
        <a href="javascript:void(0);">{{ __('ورود') }}<b></b></a>
    </div>
    <div class="card">
        @if(session('Access') and session('Access')=='NOT')
            <div style="text-align: right;direction: rtl" class="alert bg-red alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                شما مجوز دسترسی به پنل را ندارید
            </div>
        @endif
            @if(session('reset_password') and session('reset_password')=='success')
            <div style="text-align: right;direction: rtl" class="alert bg-green alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                پسور با موفقیت ویرایش شد !
            </div>
        @endif
        <div class="body">
            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                <li role="presentation"><a href="#home" data-toggle="tab">پنل آموزشی</a></li>
                <li role="presentation" class="active"><a href="#profile" data-toggle="tab">پنل تجاری</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">


                <div role="tabpanel" class="tab-pane fade" id="home">
                    <form id="sign_in" action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                            <div class="form-line">
                                <input required type="text" class="form-control" name="username" value="{{@$user_info['username']}}" placeholder="نام کاربری"
                                       autofocus>

                            </div>
                        </div>
                        <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                            <div class="form-line">
                                <input type="password" class="form-control" name="password" value="{{@$user_info['password']}}" placeholder="رمز ورود" required>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        @if ($errors->has('username'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                        @endif
                        <div class="row">
                            <div class="col-xs-8 p-t-5">
                                {{--                        <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">--}}
                                {{--                        <label for="rememberme">Remember Me</label>--}}
                            </div>
                            <div class="col-xs-12">
                                <button class="btn btn-block bg-pink waves-effect" type="submit">ورود به پنل آموزش</button>
                            </div>
                        </div>
                        <div class="row m-t-15 m-b--20">
                            <div class="col-xs-12 forget ">
                                <div>
                                    <a href="{{route('register.index')}}">!  هنوز ثبت نام نکرده ام</a>
                                </div>
                                <div>
                                    <a href="{{route('verifire_password')}}">! فراموشی رمز</a>
                                </div>

                            </div>
                            {{--                    <div class="col-xs-6 align-right">--}}
                            {{--                        <a href="forgot-password.html">Forgot Password?</a>--}}
                            {{--                    </div>--}}
                        </div>
                    </form>
                </div>



                <div role="tabpanel" class="tab-pane fade in active" id="profile">
                    <form id="sign_in" action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                            <div class="form-line">
                                <input required type="text" class="form-control" name="username" value="{{@$user_info['username']}}" placeholder="نام کاربری"
                                       autofocus>

                                <input type="hidden" name="Business" value="yes">

                            </div>
                        </div>
                        <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                            <div class="form-line">
                                <input type="password" class="form-control" name="password" value="{{@$user_info['password']}}" placeholder="رمز ورود" required>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        @if ($errors->has('username'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                        @endif
                        <div class="row">
                            <div class="col-xs-8 p-t-5">
                                {{--                        <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">--}}
                                {{--                        <label for="rememberme">Remember Me</label>--}}
                            </div>
                            <div class="col-xs-12">
                                <button class="btn btn-block bg-pink waves-effect" type="submit">ورود به بیزنس پنل</button>
                            </div>
                        </div>
                        <div class="row m-t-15 m-b--20">
                            <div class="col-xs-12 forget ">
                                <div>
                                    <a href="{{route('register.index')}}">!  هنوز ثبت نام نکرده ام</a>
                                </div>
                                <div>
                                    <a href="{{route('verifire_password')}}">! فراموشی رمز</a>
                                </div>

                            </div>
                            {{--                    <div class="col-xs-6 align-right">--}}
                            {{--                        <a href="forgot-password.html">Forgot Password?</a>--}}
                            {{--                    </div>--}}
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>
</div>
<?php

Session::forget('Access');
Session::forget('verifire_notok');
Session::forget('verifire_mobile');
Session::forget('user_info_register');
Session::forget('reset_password');
Session::forget('verifire_code_password');

?>
<!-- Jquery Core Js -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>

<!-- Bootstrap Core Js -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.js')}}"></script>

<!-- Waves Effect Plugin Js -->
<script src="{{asset('plugins/node-waves/waves.js')}}"></script>

<!-- Validation Plugin Js -->
<script src="{{asset('plugins/jquery-validation/jquery.validate.js')}}"></script>

<!-- Custom Js -->
<script src="{{asset('js/admin.js')}}"></script>
<script src="{{asset('js/pages/examples/sign-in.js')}}"></script>
</body>

</html>
