@extends('admin.layout.master')
@section('style')
    <link rel="stylesheet" href="{{asset('js/persianDatepicker-master/css/persianDatepicker-default.css')}}" />

    <style>

        .btn.btn-default {
            margin-bottom: 5px;
        }

        #levels {
            float: right;
            position: relative;
            width: 100%;
        }

        .remove-file {
            position: absolute;
            right: 0;
            background: #00bcd4;
            padding: 3px 7px 0px;
            color: #fff;
            cursor: pointer;
        }

        .col-lg-6, .col-md-6 {
            float: right;
        }
        .color{
            width: 20px;
            height: 20px;
            display: block;
            background: green;
        }

        [type="checkbox"].filled-in:checked + label:before {
            right: 11px;
        }
        [type="checkbox"].filled-in:checked + label:after {

            right: 0;
        }
        [type="checkbox"] + label {
            padding-right: 26px;
            padding-left: 0;
        }
        [type="checkbox"].filled-in:not(:checked) + label:after {
            right: 0;
        }
        [type="checkbox"].filled-in:not(:checked) + label:before {
            right: 11px;
        }

        .invalid-feedback{
            color: red;
            font-size: 10px;
        }
    </style>
@endsection



@section('content')
    <div class="row clearfix main-index education">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        ایجاد جلسه

                        <a href="{{route('meetings.index')}}" style="float:left;margin-top: -10px;" type="button" class="btn btn-default btn-circle waves-effect waves-circle waves-float">
                            <i class="material-icons">reply</i>
                        </a>

                    </h2>

                </div>

                <form action="{{route('meetings.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <b>انتخاب شهر</b>
                                <select required id="ostan" name="ostan_id" class="selectpicker state form-control show-tick " data-live-search="true">
                                    <option value="">استان را انتخاب کنید</option>
                                </select>
                                @if ($errors->has('ostan'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ostan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">

                                <b>انتخاب شهر</b>


                                <select required id="city" name="city_id"  onchange="set_state_name()" class="selectpicker form-control show-tick city">
                                    <option>ابتدا استان را انتخاب کنید</option>
                                </select>
                                @if ($errors->has('city'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="form-line">
                                <input required type="text" name="title" class="form-control"
                                       placeholder="عنوان جلسه"/>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="form-line">
                                    <b>ساعت برگذاری</b>
                                    <input type="time" name="time" class="timepicker form-control" placeholder="ساعت شروع" data-dtp="dtp_kGtWx">
                                </div>
                                @if ($errors->has('time'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('time') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="form-line">
                                    <b>تاریخ برگذاری</b>
                                    <input required type="text" name="date" id="pdpSelectedBefore1" class="form-control"
                                           placeholder="تاریخ برگذاری"/>

                                </div>
                            </div>
                        </div>



                        <div class="col-md-4">
                            <div class="form-group">
                                <b>انتخاب سطح</b>
                                <select required name="level" class="form-control show-tick">
                                    <option style="" value="" disabled> انتخاب سطح</option>
                                    @foreach($levels as $level)
                                        <option value="{{$level->id}}">{{$level->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row align-center">
                            <button type="submit" class="btn bg-deep-orange waves-effect">ایجاد</button>
                        </div>
                        <input name="ostan" type="hidden" value="{{@$user_info['ostan']}}">
                        <input name="city" type="hidden" value="{{@$user_info['city']}}">

                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{asset(('js/frotel/ostan.js'))}}"></script>
    <script src="{{asset('js/frotel/city.js')}}"></script>
    <script src="{{asset('js/persianDatepicker-master/js/persianDatepicker.min.js')}}"></script>
    <script>
        $("#pdpSelectedBefore1").persianDatepicker({ selectedBefore: !0 });

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
    </script>
@endsection
