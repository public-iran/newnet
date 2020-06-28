<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>ثبت نام</title>
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
    .input-group-addon{
        float: right;
        width: 100%;
    }
    .input-group-addon i{
        float: right;
    }
    .form-line input{
        text-align: right;
        padding-right: 7px !important;
    }
    .signup-page{
        max-width: 425px;
    }
    [type="checkbox"].filled-in:not(:checked) + label:after{
        right: 0;
        left: auto;
    }
    [type="checkbox"].filled-in + label:before, [type="checkbox"].filled-in + label:after {
        right: 0;
        left: auto;
    }
    [type="checkbox"].filled-in:checked + label:before{
        right: 11px;
        left: auto;
    }
    .signup-page{
        background: url({{asset('images/background/login.svg')}});
        background-size: cover;
    }
    .bg-pink {
        background-color: #064c56bf!important;
    }
    form{
        direction: rtl;
    }
    .input-group p {
        text-align: right;
    }
    .invalid-feedback{
        color: red;
    }

</style>
<body class="signup-page">
<div class="signup-box">
    <div class="logo">
        <a href="javascript:void(0);">ثبت نام<b></b></a>
    </div>
    <div class="card" style="border-radius: 10px;">
        @if(!empty(session('not-refrence-code')))
            <div style="text-align: right;direction: rtl" class="alert bg-red alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                {{session('not-refrence-code')}}
            </div>
        @endif

            <?php

            if (!empty(session('user_info_register'))){
                $user_info=session('user_info_register');
            }else{
                $user_info='';
            }

            Session::forget('not-refrence-code');

            ?>

        <div class="body">
            <form id="sign_up" action="{{ route('register.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
{{--                <div class="msg">Register a new membership</div>--}}
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                    <div class="form-line">
                        <input type="text" class="form-control" name="name" value="{{@$user_info['name']}}" placeholder="نام و نام خانوادگی" required autofocus>
                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">assignment_ind</i>
                        </span>
                    <div class="form-line">
                        <input id="username" placeholder="نام کاربری" value="{{@$user_info['username']}}" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required>

                    @if ($errors->has('username'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="input-group">
                    <p>
                        <b>انتخاب استان</b>
                    </p>

                    <select required id="ostan" name="ostan_id" class="selectpicker state form-control show-tick " data-live-search="true">
                        <option value="">استان را انتخاب کنید</option>
                    </select>
                </div>

                <div class="input-group">
                    <p>
                        <b>انتخاب شهر</b>
                    </p>

                    <select required id="city" name="city_id"  onchange="set_state_name()" class="selectpicker form-control show-tick city">
                        <option>ابتدا استان را انتخاب کنید</option>
                    </select>

                </div>

                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">record_voice_over</i>
                        </span>
                    <div class="form-line">
                        <input type="number" class="form-control" name="reference" value="<?php if(@$_GET['ud']){echo $_GET['ud'];}else{ echo @$user_info['reference'];}?>" placeholder="کد حامی" required>
                        @if ($errors->has('reference'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('reference') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>




                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">perm_identity</i>
                        </span>
                    <div class="form-line">
                        <input type="number"  class="form-control" name="pin_code" value="{{@$user_info['pin_code']}}" placeholder="کد معرف" >

                        @if ($errors->has('pin_code'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('pin_code') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>


                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">perm_identity</i>
                        </span>
                    <div class="form-line">
                        <input type="number"  class="form-control" name="national_code" value="{{@$user_info['national_code']}}" placeholder="کد ملی" >

                        @if ($errors->has('national_code'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('national_code') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>


                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">phone_iphone</i>
                        </span>
                    <div class="form-line">
                        <input type="number" class="form-control" name="mobile" value="{{@$user_info['mobile']}}" placeholder="شماره موبایل" >

                        @if ($errors->has('mobile'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="input-group">
                <?php
                    $checked2='checked';
            if (!empty(session('user_info_register'))){
                if (@$user_info['sex']=='M'){
                    @$checkedM='checked';
                    @$checked2='';
                }elseif (@$user_info['sex']=='F'){
                    @$checkedF='checked';
                    @$checked2='checked';
                }else{
                    @$checked2='checked';
                }
            }else{
                $user_info='';
            }
            ?>
                    <h2 class="card-inside-title">جنسیت:</h2>
                    <input name="sex" value="M" type="radio" id="radio_1"  {{@$checkedM.@$checked2}}/>
                    <label for="radio_1">آقا</label>
                    <input name="sex" value="F" type="radio" id="radio_2" {{@$checkedF}}/>
                    <label for="radio_2">خانم</label>
                </div>

                <div class="input-group">
                    <p>
                        <b>انتخاب سوال امنیتی</b>
                    </p>

                    @php
                        $questions=\App\Securityquestion::all();
                        @endphp

                    <select required name="question" class=" state form-control show-tick " data-live-search="true">
                        <option value="">سوال امنیتی خود را انتخاب کنید</option>
                        @foreach($questions as $question)
                            <option @if(@$user_info['question']==$question->id)selected @endif value="{{$question->id}}">{{$question->question}}</option>
                            @endforeach
                    </select>
                    @if ($errors->has('question'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ @$errors->first('question') }}</strong>
                                    </span>
                    @endif
                </div>

                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">question_answer</i>
                        </span>
                    <div class="form-line">
                        <input required type="text" class="form-control" name="answer" value="{{@$user_info['answer']}}" placeholder="پاسخ سوال" >

                        @if ($errors->has('answer'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('answer') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>


                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                            <input name="ostan" type="hidden" value="{{@$user_info['ostan']}}">
                            <input name="city" type="hidden" value="{{@$user_info['city']}}">
                        </span>
                    <div class="form-line">
                        <input type="password" class="form-control" name="password" minlength="6" placeholder="پسورد" required>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                    <div class="form-line">
                        <input type="password" class="form-control" name="password_confirmation" minlength="6" placeholder="تکرار پسورد" required>
                    </div>
                </div>



                <b style="float: right">تصویر پروفایل</b>
                <div class="input-group">
                    <div class="form-line">
{{--                        <lable class="btn btn-blue" for="upl">انتخاب تصویر</lable>--}}
                        <input id="upl"  name="avatar" type="file" class="form-control ip">
                    </div>
                </div>
                <div class="form-group">
                    <input required type="checkbox" name="terms" id="terms" class="filled-in chk-col-pink">
                    <label style="float: right;padding-right: 30px;" for="terms">من <a href="javascript:void(0);"> قوانین سایت  </a> را خوانده و موافقم </label>
                </div>

                <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">ثبت نام</button>

                <div class="m-t-25 m-b--5 align-center">
                    <a href="{{route('login')}}">شما قبلا ثبت نام کرده اید ؟</a>
                </div>
            </form>
        </div>
    </div>
</div>

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
<script src="{{asset(('js/frotel/ostan.js'))}}"></script>
<script src="{{asset('js/frotel/city.js')}}"></script>
<script>

    loadOstan('ostan');

    $("#ostan").change(function(){
        var i=$(this).find('option:selected').val();
        ldMenu(i,'city');
        $('.selectpicker').selectpicker('refresh');
    });
    function set_state_name() {
        var ostan_name=$('#ostan option:selected').text();
        var city_name=$('#city option:selected').text();
        $('input[name=city]').val(city_name);
        $('input[name=ostan]').val(ostan_name);
    }

    $('#ostan option').each(function (index) {

        var value_ostan = $(this).val();
        var state = '{{@$user_info['ostan_id']}}';
        if (value_ostan == state) {
            $(this).attr('selected', 'selected');
            ldMenu(value_ostan, 'city');

        }


    });

    $('.city option').each(function (index) {
        var city ='{{@$user_info['city_id']}}';
        var city_value = $(this).val();
        if (city_value == city) {
            $(this).attr('selected','selected');
            $('.selectpicker').selectpicker('refresh');
        }
    });
/*
    function sendstate() {
        $("#city").html('');
        var area = $('#state').val();
        var CSRF_TOKEN ='{{ csrf_token() }}';
        var url='getcity';
        var data={_token: CSRF_TOKEN,area:area};
        $.post(url,data,function (getcity) {
            console.log(getcity)
        })
    }
*/

</script>
</body>

</html>
<?php
Session::forget('user_info_register');
Session::forget('verifire_notok');
Session::forget('verifire_mobile');
?>
{{--

@extends('layouts.app')


@section('content')
    <div class="container" style="direction: rtl">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('ثبت نام') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('نام و نام خانوادگی') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('نام کاربری') }}</label>

                                <div class="col-md-6">
                                    <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required>

                                    @if ($errors->has('username'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('کد معرف') }}</label>

                                <div class="col-md-6">
                                    <input id="username" type="text" class="form-control{{ $errors->has('reference_code') ? ' is-invalid' : '' }}" name="reference_code" value="{{ old('reference_code') }}" required>

                                    @if ($errors->has('reference_code'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('reference_code') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('کد آپلاین') }}</label>

                                <div class="col-md-6">
                                    <input id="username" type="text" class="form-control{{ $errors->has('up_line_code') ? ' is-invalid' : '' }}" name="up_line_code" value="{{ old('up_line_code') }}" required>

                                    @if ($errors->has('up_line_code'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('up_line_code') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('کد ملی') }}</label>

                                <div class="col-md-6">
                                    <input id="username" type="text" class="form-control{{ $errors->has('national_code') ? ' is-invalid' : '' }}" name="national_code" value="{{ old('national_code') }}" required>

                                    @if ($errors->has('national_code'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('national_code') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('شماره موبایل') }}</label>

                                <div class="col-md-6">
                                    <input id="username" type="text" class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}" name="mobile" value="{{ old('mobile') }}" required>

                                    @if ($errors->has('mobile'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('تلفن ثابت') }}</label>

                                <div class="col-md-6">
                                    <input id="username" type="text" class="form-control{{ $errors->has('tel') ? ' is-invalid' : '' }}" name="tel" value="{{ old('tel') }}" required>

                                    @if ($errors->has('tel'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tel') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('کد پستی') }}</label>

                                <div class="col-md-6">
                                    <input id="username" type="text" class="form-control{{ $errors->has('postal_code') ? ' is-invalid' : '' }}" name="postal_code" value="{{ old('postal_code') }}" required>

                                    @if ($errors->has('postal_code'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('postal_code') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('پسورد') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('تکرار پسورد') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('تصویر کارت ملی') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="file" class="form-control" name="img_meli" required>
                                    @if ($errors->has('img_meli'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('img_meli') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('ثبت نام') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
--}}


