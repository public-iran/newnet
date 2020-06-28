@extends('adminbizness.layout.master')

@section('style_link')

@endsection

@section('style')
    <style>
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
        .card{
            box-shadow: unset;
        }
        .profile-card .profile-body .content-area p:last-child {
            color: #61c579;
            border: 1px dashed #61c579;
            margin: 0 16px;
            padding: 6px;
            border-radius: 10px;
        }
        .waitMe_container .waitMe{
            border-radius: 100%;
        }
    </style>
@endsection

@section('content')
    <div class="row clearfix" style="direction: rtl">
        <div class="col-xs-12 col-sm-3">
            <div class="card profile-card">
                <div class="profile-header" style="background-color: #61c579;">&nbsp;</div>
                <div class="profile-body">
                    <div class="image-area">
                        @if($profile->avatar!="")
                            <label class="wimgpf" for="image_profile" style="cursor: pointer">
                                <img id="imgpf" src="{{asset($profile->avatar)}}" alt="{{$profile->name}}" style="width: 135px;height: 135px;border: 2px solid #61c579;" />
                            </label>
                        @else
                            <label class="wimgpf" for="image_profile" style="cursor: pointer">
                                <img id="imgpf" style="width: 135px;height: 135px;border: 2px solid #61c579;" src="{{asset('images/profile.jpg')}}" alt="عکس پروفایل" />
                            </label>
                        @endif
                    </div>
                    <div class="content-area">
                        <h3 style="font-weight: unset;font-size: 20px;">{{$profile->name}}</h3>
                        <p></p>
                        <p>{{$profile->username}}</p>
                    </div>
                </div>
                <div class="profile-footer" style="direction: rtl;display: inline-block;">
                    <ul>
                        <li>
                            <span>کد کاربر:</span>
                            <span>{{$profile->reference_code}}</span>
                        </li>
                        <li>
                            <span>کد بالاسری:</span>
                            <span>{{$profile->reference}}</span>
                        </li>
                        <li>
                            <span>کد معرف:</span>
                            <span>{{$profile->pin_code}}</span>
                        </li>
                        <li>
                            <span> پکیج :</span>
                            @if($profile->package!="")
                                <span>{{$profile->package}}</span>
                            @else
                                <span style="color: #ad1455;">بدون پکیج</span>
                            @endif
                        </li>
                        <li style="margin-bottom: unset">
                            <span style="margin-bottom: 10px;">تاریخ ثبت نام :</span>
                            <span>{{Verta::instance($profile->created_at)->format('%d %B %Y | H:i:s')}}</span>
                        </li>
                    </ul>
                </div>
            </div>


        </div>
        <div class="col-xs-12 col-sm-9">

            <div class="card">
                <div class="body">
                    <div style="display: none;background: rgb(236, 76, 76);padding: 6px 12px" id="error_user">
                        <div id="error_item">

                        </div>
                    </div>

                    <div>
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#profile_settings" aria-controls="settings" role="tab" data-toggle="tab">تنظیمات پروفایل</a></li>
                            <li role="presentation"><a href="#change_password_settings" aria-controls="settings" role="tab" data-toggle="tab">تغییر رمز عبور</a></li>
                        </ul>

                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="profile_settings">
                                <div class="form-horizontal">
                                    <div class="form-group">
                                        <label for="name" class="col-sm-3 control-label">نام و نام خانوادگی</label>
                                        <div class="col-sm-9">
                                            <div class="form-line">
                                                <input type="text" class="form-control" id="name" name="name" placeholder="نام و نام خانوادگی را وارد کنید" value="{{$profile->name}}" required>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="national_code" class="col-sm-3 control-label">کد ملی</label>
                                        <div class="col-sm-9">
                                            <div class="form-line">
                                                <input style="opacity: 0.5;" disabled type="text" class="form-control" id="melicode" name="melicode" placeholder="کد ملی را وارد کنید" value="{{$profile->national_code}}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="mobile" class="col-sm-3 control-label">شماره موبایل</label>
                                        <div class="col-sm-9">
                                            <div class="form-line">
                                                <input style="opacity: 0.5;" disabled type="text" class="form-control" id="mobile" name="mobile" placeholder="شماره موبایل را وارد کنید" value="{{$profile->mobile}}" required>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <label for="sex" class="col-sm-3 control-label">جنسیت</label>
                                        <div class="col-sm-9">
                                            <div class="form-line">
                                                <input name="sex" value="M" type="radio" id="radio_1" @if($profile->sex=="M")checked @endif/>
                                                <label for="radio_1">آقا</label>
                                                <input name="sex" value="F" type="radio" id="radio_2"@if($profile->sex=="F")checked @endif/>
                                                <label for="radio_2">خانم</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="ostan_id" class="col-sm-3 control-label">استان</label>
                                        <div class="col-sm-9">
                                            <select required id="ostan" name="ostan_id" class="selectpicker state form-control show-tick " data-live-search="true">
                                                <option value="">استان را انتخاب کنید</option>
                                            </select>
                                        </div>
                                        <input type="hidden" name="ostan" value="{{$profile->ostan}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="city_id" class="col-sm-3 control-label">شهر</label>
                                        <div class="col-sm-9">
                                            <select required id="city" name="city_id"  onchange="set_state_name()" class="selectpicker form-control show-tick city">
                                                <option>ابتدا استان را انتخاب کنید</option>
                                            </select>
                                        </div>
                                        <input type="hidden" name="city" value="{{$profile->city}}">
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-12" style="margin-bottom: unset">
                                            <button onclick="updateuser()" style="float:left;" class="btn btn-success">ذخیره تغییرات</button>
                                        </div>
                                    </div>

                                    <input onchange="uploadimageprofile()" style="display: none" type="file" name="image_profile" id="image_profile">

                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade in" id="change_password_settings">
                                <form class="form-horizontal">
                                    <div class="form-group">
                                        <label for="OldPassword" class="col-sm-3 control-label">رمز عبور قبلی</label>
                                        <div class="col-sm-9">
                                            <div class="form-line">
                                                <input type="password" class="form-control" id="OldPassword" name="OldPassword" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="NewPassword" class="col-sm-3 control-label">رمز عبور جدید</label>
                                        <div class="col-sm-9">
                                            <div class="form-line">
                                                <input type="password" class="form-control" id="NewPassword" name="NewPassword" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="NewPasswordConfirm" class="col-sm-3 control-label">تکرار دوباره رمز عبور</label>
                                        <div class="col-sm-9">
                                            <div class="form-line">
                                                <input type="password" class="form-control" id="NewPasswordConfirm" name="NewPasswordConfirm" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-12" style="margin-bottom: unset">
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
    <script src="{{asset('js/OrgChart.js')}}"></script>
@endsection

@section('script')
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
            var state = '{{$profile->ostan_id}}';
            if (value_ostan == state) {
                $(this).attr('selected', 'selected');
                ldMenu(value_ostan, 'city');
            }
        });

        $('.city option').each(function (index) {
            var city ='{{$profile->city_id}}';
            var city_value = $(this).val();
            if (city_value == city) {
                $(this).attr('selected','selected');
                $('.selectpicker').selectpicker('refresh');
            }
        });
    </script>

    <script>
        function updateuser() {
            $('#error_user').slideUp(100);
            $('#error_item').html('');
            var name = $("input[name=name]").val();
            var sex = $("input[name=sex]:checked").val();
            // var mobile = $("input[name=mobile]").val();
            // var melicode = $("input[name=melicode]").val();
            var ostan = $("input[name=ostan]").val();
            var ostan_id = $("select[name=ostan_id]").val();
            var city = $("input[name=city]").val();
            var city_id = $("select[name=city_id]").val();

            $.ajax({
                type: "post",
                url: "{{route('selfupdateuser')}}",
                data: {
                    name: name,
                    sex: sex,
                    // mobile: mobile,
                    // melicode: melicode,
                    ostan: ostan,
                    ostan_id: ostan_id,
                    city: city,
                    city_id: city_id,
                    _token: '{{csrf_token()}}',
                },
                dataType: 'json',
                success: function (data) {
                    $.notify({
                        // options
                        message: 'با موفقیت ذخیره شد'
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



        function uploadimageprofile() {
            // $('.wimgpf').hide();
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
