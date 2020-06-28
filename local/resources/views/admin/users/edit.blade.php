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
        .demo-switch{
            margin-top: 20px;
        }
    </style>
@endsection

@section('content')
    <div class="row clearfix main-index users">
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
                {!! Form::model($user, ['method' => 'PATCH', 'action'=> ['Admin\AdminUserController@update', $user->id], 'files'=>true]) !!}


                @csrf
                <div class="card">
                    <div class="header">
                        <h2>
                            ویرایش اطلاعات کاربر
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

                        <a href="{{route('users.index')}}" style="float:left;margin-top: -30px" type="button" class="btn btn-default btn-circle waves-effect waves-circle waves-float">
                            <i class="material-icons">reply</i>
                        </a>

                    </div>
                    <div class="body">
                        <div class="demo-masked-input">
                            <div class="row clearfix">
                                <div class="col-md-12 col-xs-12">
                                    <div class="input-group">
                                        <div class="image">
                                            @if($user->avatar=='')
                                                <img src="{{asset('images/user.png')}}" width="48" height="48" alt="User" />
                                            @else
                                                <img src="{{asset('images/user_profile/'.$user->avatar)}}" width="48" height="48" alt="User" />
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
                                            <input type="text" name="national_code" value="{{$user->national_code}}" class="form-control time12" placeholder="">
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
                                            <input type="text" required value="{{$user->name}}" name="name" class="form-control mobile-phone-number" placeholder="">
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
                                    <b>شماره تلفن</b>
                                    <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">phone</i>
                                            </span>
                                        <div class="form-line">
                                            <input type="text" value="{{$user->tel}}" name="tel" class="form-control mobile-phone-number" placeholder="">
                                        </div>
                                    </div>
                                </div>
                             <div class="col-md-3 col-xs-6">
                                    <b>کد پستی</b>
                                    <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">local_post_office</i>
                                            </span>
                                        <div class="form-line">
                                            <input disabled style="opacity: 0.4;" type="text" value="{{$user->postal_code}}" name="postal_code" class="form-control money-dollar" placeholder="">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 col-xs-6">
                                    <b>سطح کاربر</b>
                                    <div class="form-group">

                                        <select required name="level" class="form-control show-tick">
                                            <option style="" value="" disabled> انتخاب سطح</option>
                                            @foreach($levels as $level)
                                                <option @if($level->id==$user->level) selected @endif value="{{$level->id}}">{{$level->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3 col-xs-6">
                                    <b>مرحله کاربر</b>
                                    <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">merge_type</i>
                                            </span>
                                        <div class="form-line">
                                            <input type="text" value="{{$user->surface}}" name="surface" class="form-control money-dollar" placeholder="">
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

                                <div class="col-md-3 col-xs-8">
                                    <b>وضعیت کاربر</b>
                                    <div class="demo-switch">
                                        <div class="switch">
                                            <label> فعال<input type="checkbox" value="ACTIVE" name="status" @if($user->status=='ACTIVE') checked @endif><span class="lever"></span>غیر فعال</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-xs-6">

                                </div><div class="col-md-3 col-xs-6">

                                </div>
                                <div class="col-md-3 col-xs-6">

                                </div>
                                <div class="col-md-2 col-xs-12" style="text-align: center;float:left;">
                                    <button style="padding: 6px 35px;" type="submit" class="btn bg-deep-orange waves-effect">ذخیره</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
           {!! Form::close() !!}

        </div>
    </div>
@endsection
