

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign In | Bootstrap Based Admin Template - Material Design</title>
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
        <a href="javascript:void(0);">{{ __('فراموشی پسورد') }}<b></b></a>
    </div>
    <div class="card">
        @if(!empty(session('verifire_password')))
            <div style="text-align: right;direction: rtl" class="alert bg-red alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                {{session('verifire_password')}}
            </div>
        @endif
     @if(!empty(session('reset_password_error')))
            <div style="text-align: right;direction: rtl" class="alert bg-red alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                {{session('reset_password_error')}}
            </div>
        @endif


        <div class="body">
            <form id="sign_in" action="{{ route('verifire_password') }}" method="POST">
                @csrf
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">local_phone</i>
                        </span>
                    <div class="form-line">
                        <input required type="text" class="form-control" name="national_code"  placeholder="کد ملی خود را وارد کنید"
                               >

                    </div>
                </div>

                @if ($errors->has('national_code'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('national_code') }}</strong>
                                    </span>
                @endif
                <div class="row">
                    <div class="col-xs-8 p-t-5">
                        {{--                        <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">--}}
                        {{--                        <label for="rememberme">Remember Me</label>--}}
                    </div>
                    <div class="col-xs-12">
                        <button class="btn btn-block bg-pink waves-effect" type="submit">ارسال کد</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
<?php

Session::forget('Access');
Session::forget('verifire_notok');
Session::forget('verifire_mobile');
Session::forget('user_info_register');
Session::forget('verifire_password');
Session::forget('reset_password_error');
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
