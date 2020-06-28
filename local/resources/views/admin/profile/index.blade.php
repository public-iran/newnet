@extends('admin.layout.master')

@section('style')
    <style>
        .demo-masked-input div.col-md-3{
            float: right;
        }
        .input-group input[type="text"], .input-group .form-control {
            padding-right: 6px;
        }
        .image{
            text-align: center;
        }
        .input-group .image img{
            border-radius: 100%;
            width: 70px;
            height: 70px;
        }
        .image input{
            width: 70px;
            height: 21px;
            margin: 0 auto;
            margin-top: -43px;
            opacity: 0;
        }
        .btn-save{
            width: 100%;
            border: none;
            background: #fff;
        }
    </style>
@endsection

@section('content')
    <div class="row clearfix main-index profile">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            @if(session('update-user') and session('update-user')=='success')
                <div class="alert bg-green alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    اطلاعات کاربری با موفقیت بروزرسانی شد!
                </div>
            @endif
                <?php
                Session::forget('update-user');
                ?>
            <form method="post" action="{{route('profile.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="header">
                        <h2>
                            پروفایل
                        </h2>
{{--                        <ul class="header-dropdown m-r--5">--}}
{{--                            <li class="dropdown">--}}
{{--                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">--}}
{{--                                    <i class="material-icons">more_vert</i>--}}
{{--                                </a>--}}
{{--                                <ul class="dropdown-menu pull-right">--}}
{{--                                    <li><button type="submit" class="btn-save">ذخیره</button></li>--}}
{{--                                </ul>--}}
{{--                            </li>--}}
{{--                        </ul>--}}

                        <a href="{{route('dashboard.index')}}" style="float:left;margin-top: -30px" type="button" class="btn btn-default btn-circle waves-effect waves-circle waves-float">
                            <i class="material-icons">reply</i>
                        </a>

                    </div>
                    <div class="body">
                        <div class="demo-masked-input">
                            <div class="row clearfix">
                                <div class="col-md-12 col-xs-12">
                                    <div class="input-group">
                                        <div class="image">
                                            @if(Auth::user()->avatar=='')
                                                <img src="{{asset('images/user.png')}}" width="48" height="48" alt="User" />
                                            @else
                                                <img src="{{asset('images/user_profile/'.Auth::user()->avatar)}}" width="48" height="48" alt="User" />
                                            @endif
                                            <input type="file" name="avatar">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 col-xs-6">
                                    <b>نام کاربری</b>
                                    <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">account_box</i>
                                            </span>
                                        <div class="form-line">
                                            <input style="opacity: 0.4;" disabled type="text" value="{{$user->username}}" class="form-control date" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-xs-6">
                                    <b>کد معرف</b>
                                    <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">record_voice_over</i>
                                            </span>
                                        <div class="form-line">
                                            <input style="opacity: 0.4;" disabled type="text" value="{{$user->reference}}" class="form-control time24" placeholder="">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 col-xs-6">
                                    <b>کد بالاسری</b>
                                    <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">date_range</i>
                                            </span>
                                        <div class="form-line">
                                            <input style="opacity: 0.4;" type="text" value="{{$user->up_line_code}}" disabled class="form-control datetime" placeholder="">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 col-xs-6">
                                    <b>کد ملی</b>
                                    <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">assignment_ind</i>
                                            </span>
                                        <div class="form-line">
                                            <input style="opacity: 0.4;" type="text" disabled value="{{$user->national_code}}" class="form-control time12" placeholder="">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 col-xs-6">
                                    <b>نام و نام خانوادگی</b>
                                    <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">phone_iphone</i>
                                            </span>
                                        <div class="form-line">
                                            @if(Auth::user()->id==1)
                                            <input type="text" value="{{$user->name}}" name="name" class="form-control mobile-phone-number" placeholder="">
                                                @else
                                                <input style="opacity: 0.4;" type="text" value="{{$user->name}}" disabled class="form-control mobile-phone-number" placeholder="">
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 col-xs-6">
                                    <b>شماره موبایل</b>
                                    <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">phone_iphone</i>
                                            </span>
                                        <div class="form-line">
                                            <input type="text" value="{{$user->mobile}}" name="mobile" class="form-control mobile-phone-number" placeholder="">
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-3 col-xs-6">
                                    <b>رمز ورود</b>
                                    <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">vpn_key</i>
                                            </span>
                                        <div class="form-line">
                                            <input type="password" name="password" class="form-control time12" placeholder="در صورت تغییر وارد کنید">
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-2 col-xs-12" style="text-align: center;float:left;">
                                <button style="padding: 6px 35px;" type="submit" class="btn bg-deep-orange waves-effect">ذخیره</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection







@section('content_user')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            @if(session('update-user') and session('update-user')=='success')
                <div class="alert bg-green alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    اطلاعات کاربری با موفقیت بروزرسانی شد!
                </div>
            @endif
            <?php
            Session::forget('update-user');
            ?>
            <form method="post" action="{{route('profile.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="header">
                        <h2>
                            پروفایل
                        </h2>
                        {{--                        <ul class="header-dropdown m-r--5">--}}
                        {{--                            <li class="dropdown">--}}
                        {{--                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">--}}
                        {{--                                    <i class="material-icons">more_vert</i>--}}
                        {{--                                </a>--}}
                        {{--                                <ul class="dropdown-menu pull-right">--}}
                        {{--                                    <li><button type="submit" class="btn-save">ذخیره</button></li>--}}
                        {{--                                </ul>--}}
                        {{--                            </li>--}}
                        {{--                        </ul>--}}

                        <a href="{{route('dashboard.index')}}" style="float:left;margin-top: -30px" type="button" class="btn btn-default btn-circle waves-effect waves-circle waves-float">
                            <i class="material-icons">reply</i>
                        </a>

                    </div>
                    <div class="body">
                        <div class="demo-masked-input">
                            <div class="row clearfix">
                                <div class="col-md-12 col-xs-12">
                                    <div class="input-group">
                                        <div class="image">
                                            @if(Auth::user()->avatar=='')
                                                <img src="{{asset('images/user.png')}}" width="48" height="48" alt="User" />
                                            @else
                                                <img src="{{asset('images/user_profile/'.Auth::user()->avatar)}}" width="48" height="48" alt="User" />
                                            @endif
                                            <input type="file" name="avatar">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 col-xs-6">
                                    <b>نام کاربری</b>
                                    <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">account_box</i>
                                            </span>
                                        <div class="form-line">
                                            <input style="opacity: 0.4;" disabled type="text" value="{{$user->username}}" class="form-control date" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-xs-6">
                                    <b>کد معرف</b>
                                    <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">record_voice_over</i>
                                            </span>
                                        <div class="form-line">
                                            <input style="opacity: 0.4;" disabled type="text" value="{{$user->reference_code}}" class="form-control time24" placeholder="">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 col-xs-6">
                                    <b>کد بالاسری</b>
                                    <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">date_range</i>
                                            </span>
                                        <div class="form-line">
                                            <input style="opacity: 0.4;" type="text" value="{{$user->reference}}" disabled class="form-control datetime" placeholder="">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 col-xs-6">
                                    <b>کد ملی</b>
                                    <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">assignment_ind</i>
                                            </span>
                                        <div class="form-line">
                                            <input style="opacity: 0.4;" type="text" disabled value="{{$user->national_code}}" class="form-control time12" placeholder="">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 col-xs-6">
                                    <b>نام و نام خانوادگی</b>
                                    <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">phone_iphone</i>
                                            </span>
                                        <div class="form-line">
                                            <input type="text" value="{{$user->name}}" name="name" class="form-control mobile-phone-number" placeholder="">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 col-xs-6">
                                    <b>شماره موبایل</b>
                                    <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">phone_iphone</i>
                                            </span>
                                        <div class="form-line">
                                            <input style="opacity: 0.4;" type="text" value="{{$user->mobile}}" disabled class="form-control mobile-phone-number" placeholder="">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 col-xs-6">
                                        <b> پکیج خریداری شده</b>
                                    <select required name="buy_package"  class="form-control show-tick ">

                                        <option value="برنز 1">برنز 1</option>
                                        <option value="نقره 3">نقره 3</option>
                                        <option value="طلا 5">طلا 5</option>
                                        <option value="پلاتینیوم 7">پلاتینیوم 7</option>
                                        <option value="پلاتینیوم پلاس 8">پلاتینیوم پلاس 8</option>
                                    </select>
                                </div>

                                <div class="col-md-2 col-xs-12" style="text-align: center;float:left;">
                                    <button style="padding: 6px 35px;" type="submit" class="btn bg-deep-orange waves-effect">ذخیره</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection
