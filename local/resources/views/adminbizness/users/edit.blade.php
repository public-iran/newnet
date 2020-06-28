@extends('adminbizness.layout.master')

@section('style_link')

@endsection

@section('style')
    <style xmlns="">
        .card{
            box-shadow: none;
        }
        .clearfix > div{
            float: right;
        }
        .nav-tabs > li{
            float: right;
        }
        .profile-footer li{
            width: 100%;
            float: right;
                 }
        .profile-footer li > span{
            float: right;
            margin-left: 5px;
        }
        .form-group > label{
            float: right;
        }
        [type="radio"]:not(:checked), [type="radio"]:checked {
            left: 0;
        }
        .profile-card .profile-body .content-area p:last-child {
            color: #61c579;
            border: 1px dashed #61c579;
            margin: 0 16px;
            padding: 6px;
            border-radius: 10px;
        }
        .invalid-feedback strong{
            COLOR: RED;
            FONT-SIZE: 11PX;
        }
        .waitMe_container .waitMe{
            border-radius: 100%;
        }
    </style>
@endsection

@section('Admin_content')
    @if(session('user_chagne'))
        <div class="alert bg-green alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            {{session('user_chagne')}}
        </div>
    @endif
    @if(session('user_chagne_city'))
        <div class="alert bg-red alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            {{session('user_chagne_city')}}
        </div>
    @endif
    @php
        Session::forget('user_chagne');
         session::forget('tab_pass');
         session::forget('user_chagne_city');
    @endphp
    <div class="row clearfix" style="direction: rtl">

        <div class="col-xs-12 col-sm-3">
            <div class="card profile-card">

                <div class="profile-header" style="background-color: #61c579;">&nbsp;</div>
                <div class="profile-body">
                    <div class="image-area">
                        @if($user->avatar!="")
                            <label class="wimgpf" for="image_profile" style="cursor: pointer">
                                <img id="imgpf" src="{{asset($user->avatar)}}" alt="{{$user->name}}" style="width: 135px;height: 135px;border: 2px solid #61c579;" />
                            </label>
                        @else
                            <label class="wimgpf" for="image_profile" style="cursor: pointer">
                                <img id="imgpf" style="width: 135px;height: 135px;border: 2px solid #61c579;" src="{{asset('images/profile.jpg')}}" alt="عکس پروفایل" />
                            </label>
                        @endif
                    </div>
                    <div class="content-area">
                        <h3 style="font-size: 20px;font-weight: unset">{{$user->name}}</h3>
                        <p></p>
                        <p>{{$user->username}}</p>
                    </div>
                </div>
                <div class="profile-footer" style="direction: rtl;display: inline-block;">
                    <ul>
                        <li>
                            <span>کد کاربر:</span>
                            <span>{{$user->reference_code}}</span>
                        </li>
                        <li>
                            <span>کد بالاسری:</span>
                            <span>{{$user->reference}}</span>
                        </li>
                        <li>
                            <span>کد معرف:</span>
                            <span>{{$user->pin_code}}</span>
                        </li>
                        <li>
                            <span> پکیج :</span>
                            @if($user->package!="")
                            <span>{{$user->package}}</span>
                                @else
                                <span style="color: #ad1455;">بدون پکیج</span>
                                @endif
                        </li>
                        <li>
                            <span>تاریخ ثبت نام :</span>
                            <span>{{Verta::instance($user->created_at)->format('%d %B %Y | H:i:s')}}</span>
                        </li>
                        <li style="margin-bottom: 0">
                            <span style="margin-bottom: 10px">وضعیت کاربر : </span>
                            <div class="switch" align="center">
                                <label><span style="float: left">غیر فعال</span><input id="active_user" type="checkbox" @if($user->status=="ACTIVE")checked @endif><span class="lever switch-col-green"></span><span>فعال</span></label>
                            </div>

                        </li>
                    </ul>
                   {{-- <a href="" target="_blank" class="btn btn-primary btn-lg waves-effect btn-block" style="background-color: #8b9ae2!important;">جنیالوژی کاربر</a>--}}
                </div>
            </div>


        </div>
        <div class="col-xs-12 col-sm-9">
            <div class="card">
                <a href="/adminb/users" style="float:left;font-size: 10px;padding: 2px;margin: 10px;background-color: #61c579 !important;" type="button" class="btn bg-green waves-effect">
                    <span>برگشت</span>
                    <i style="font-size: 16px" class="material-icons">arrow_back</i>
                </a>
                <div class="body">

                    <div>
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" @if(!session('tab_pass'))class="active" @endif ><a href="#profile_settings" aria-controls="settings" role="tab" data-toggle="tab">تنظیمات پروفایل</a></li>
                            <li role="presentation" @if(session('tab_pass'))class="active" @endif><a href="#change_password_settings" aria-controls="settings" role="tab" data-toggle="tab">تغییر رمز عبور</a></li>
                        </ul>

                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in @if(!session('tab_pass'))active @endif" id="profile_settings">
                                <form class="form-horizontal" method="post" action="{{route('users.update',$user->id)}}" enctype="multipart/form-data">
                                    @csrf
                                    {{ @method_field('PATCH') }}
                                    <div class="form-group">
                                        <label for="NameSurname" class="col-sm-3 control-label">نام و نام خانوادگی</label>
                                        <div class="col-sm-9">
                                            <div class="form-line">
                                                <input type="text" class="form-control" id="NameSurname" name="name" placeholder="نام و نام خانوادگی را وارد کنید" value="{{$user->name}}" required>
                                            </div>
                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                 </span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="national_code" class="col-sm-3 control-label">کد ملی</label>
                                        <div class="col-sm-9">
                                            <div class="form-line">
                                                <input type="text" class="form-control" id="national_code" name="national_code" placeholder="کد ملی را وارد کنید" value="{{$user->national_code}}" required>
                                            </div>
                                            @if ($errors->has('national_code'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('national_code') }}</strong>
                                                 </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="mobile" class="col-sm-3 control-label">شماره موبایل</label>
                                        <div class="col-sm-9">
                                            <div class="form-line">
                                                <input type="text" class="form-control" id="mobile" name="mobile" placeholder="شماره موبایل را وارد کنید" value="{{$user->mobile}}" required>
                                            </div>
                                            @if ($errors->has('mobile'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('mobile') }}</strong>
                                                 </span>
                                            @endif
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <label for="sex" class="col-sm-3 control-label">جنسیت</label>
                                        <div class="col-sm-9">
                                            <div class="form-line">
                                                <input name="sex" value="M" class="radio-col-green" type="radio" id="radio_1" @if($user->sex=="M")checked @endif/>
                                                <label for="radio_1">آقا</label>
                                                <input name="sex" value="F" class="radio-col-green" type="radio" id="radio_2"@if($user->sex=="F")checked @endif/>
                                                <label for="radio_2">خانم</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="ostan_id" class="col-sm-3 control-label">استان</label>
                                        <div class="col-sm-9">
                                        <select required id="ostan" name="ostan_id" class="selectpicker state form-control show-tick " data-live-search="true">
                                            <option>استان را انتخاب کنید</option>
                                        </select>
                                            @if ($errors->has('ostan_id'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('ostan_id') }}</strong>
                                                 </span>
                                            @endif
                                        </div>
                                        <input name="ostan" type="hidden" value="{{$user->ostan}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="city_id" class="col-sm-3 control-label">شهر</label>
                                        <div class="col-sm-9">
                                        <select required id="city" name="city_id"  onchange="set_state_name()" class="selectpicker form-control show-tick city">
                                            <option>ابتدا استان را انتخاب کنید</option>
                                        </select>
                                            @if ($errors->has('city_id'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('city_id') }}</strong>
                                                 </span>
                                            @endif
                                        </div>
                                        <input name="city" type="hidden" value="{{$user->city}}">
                                    </div>

                                    <input onchange="uploadimageprofile()" style="display: none" type="file" name="image_profile" id="image_profile">
                                    <div class="form-group">
                                        <div class="col-sm-12" style="margin-bottom: 0">
                                            <button type="submit" style="float:left;" class="btn btn-success">ذخیره تغییرات</button>
                                        </div>
                                    </div>

                                </form>
                            </div>




                            <div role="tabpanel" class="tab-pane fade in @if(session('tab_pass'))active @endif" id="change_password_settings">
                                <form class="form-horizontal" method="post" action="{{route('users.update',$user->id)}}">
                                    @csrf
                                    {{ @method_field('PATCH') }}

                                    <div class="form-group">
                                        <label for="NewPassword" class="col-sm-3 control-label">پسورد جدید</label>
                                        <div class="col-sm-9">
                                            <div class="form-line">
                                                <input type="hidden" name="type" value="pass">
                                                <input type="password" class="form-control" id="NewPassword" name="password" placeholder="پسورد جدید را وارد کنید" required>
                                            </div>
                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="NewPasswordConfirm" class="col-sm-3 control-label">تکرار پسورد جدید</label>
                                        <div class="col-sm-9">
                                            <div class="form-line">
                                                <input type="password" class="form-control" id="NewPasswordConfirm" name="password_confirmation" placeholder="تکرار پسورد جدید را وارد کنید" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button type="submit" style="float:left;" class="btn btn-success">تغییر رمز عبور</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script_link')
    <script src="{{asset(('js/frotel/ostan.js'))}}"></script>
    <script src="{{asset('js/frotel/city.js')}}"></script>
@endsection

@section('script')
    <script>
        $('#active_user').on('change', function() {

            var status="INACTIVE";
            if ($(this).is(':checked')) {
                status="ACTIVE";
            }
            var CSRF_TOKEN ='{{ csrf_token() }}';
            var url='{{route('Change_status_user')}}';
            var data={_token: CSRF_TOKEN,status:status,user_id:'{{$user->id}}'};
            $.post(url,data,function (msg) {
                if(msg=="ACTIVE"){
                    $.notify({
                        // options
                        message: 'با موفقیت فعال شد'
                    }, {
                        // settings
                        type: 'success',
                        placement: {
                            from: "bottom",
                            align: "right"
                        },
                        animate: {
                            enter: 'animated bounceIn',
                            exit: 'animated bounceOut'
                        }
                    });
                }else{
                    $.notify({
                        // options
                        message: 'با موفقیت غیر فعال شد'
                    }, {
                        // settings
                        type: 'success',
                        placement: {
                            from: "bottom",
                            align: "right"
                        },
                        animate: {
                            enter: 'animated bounceIn',
                            exit: 'animated bounceOut'
                        }
                    });
                }
            });
        });
    </script>
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
        var state = '{{$user->ostan_id}}';
        if (value_ostan == state) {
            $(this).attr('selected', 'selected');
            ldMenu(value_ostan, 'city');

        }


    });

    $('.city option').each(function (index) {
        var city ='{{$user->city_id}}';
        var city_value = $(this).val();
        if (city_value == city) {
            $(this).attr('selected','selected');
            $('.selectpicker').selectpicker('refresh');
        }
    });


    function uploadimageprofile() {
        $('.wimgpf').waitMe({
            effect : 'pulse',
            text : 'در حال بارگذاری ...',
            maxSize : '',
            waitTime : 1,
            textPos : 'vertical',
            fontSize : '10',
            source : '',
        });
        var formData = new FormData();
        formData.append("file",$('#image_profile')[0].files[0]);
        formData.append("id",'{{$user->id}}');
        $.ajax({
            type: "post",
            url: "{{route('uploadimageprofile')}}",
            headers: {
                'X-CSRF-TOKEN': '{{csrf_token()}}'
            },
            data: formData,
            contentType: false,
            processData: false,
            success: function (data) {
                $('.wimgpf').slideDown(300);
                $('.waitMe').fadeOut();
                $('#imgpf').attr('src', data.status);
            },
            error: function (err) {
                if (err.status == 422) {
                    $('#error_user').slideDown(150);
                    $.each(err.responseJSON.errors, function (i, error) {
                        $('#error_item').append($('<span style="color: #fff;font-size: 12px">' + error[
                                0] +
                            '</span><br>'));
                    });
                }
            }
        });

    }
</script>
@endsection
