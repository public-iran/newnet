@extends('adminbizness.layout.master')

@section('Admin_content')
    <link href="{{asset('js/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css')}}" rel="stylesheet">
    <script src="{{asset('js/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script>

    <link href="{{asset('themes/explorer-fas/theme.css')}}" media="all" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/fileinput.css')}}" media="all" rel="stylesheet" type="text/css"/>
    {{--    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">--}}

    <!-- PersianDateTimePicker Css-->
    <link href="{{asset('js/plugins/jalali-date/jquery.Bootstrap-PersianDateTimePicker.css')}}" media="all"
          rel="stylesheet" type="text/css"/>

    @include('adminbizness.partial.error')
    <form action="{{route('services.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">

            <div class="col-lg-12 col-xs-12 col-sm-12 ali-flex">

                <div class="col-lg-8 col-xs-12 col-sm-12 ali-margin-0" style="margin-left: 8px;display: inline-table">
                    <div class="row">
                        <div class="col-xs-12 col-lg-12 " style="background: white;padding-top: 20px">
                            <div class="header ali-border-b">
                                <h5>
                                    ایجاد سرویس
                                </h5>
                            </div>
                            <div class="body">
                                <div class="col-xs-12 col-lg-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" id="title" name="title"
                                                   class="form-control" value="{{old('title')}}">
                                            <label class="form-label"> عنوان : </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-lg-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" id="slug" name="slug"
                                                   class="form-control" value="{{old('slug')}}">
                                            <label class="form-label"> نامک : </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xs-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                        <textarea type="text" id="shortContent" name="shortContent" rows="4"
                                                  class="form-control">{{old('shortContent')}}</textarea>
                                            <label class="form-label"> خلاصه سرویس : </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-lg-12">
                                    <div class="form-group form-float">
                                        <label class="form-label"> توضیحات : </label>
                                        <div class="form-line">
                                        <textarea id="content" name="content"
                                                  class="form-control">{{old('content')}}</textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 8px">
                        <div class="col-xs-12 col-lg-12 " style="background: white;padding-top: 20px">
                            <div class="header ali-border-b"
                                 style="display: flex;justify-content: space-between;padding: 8px">
                                <h5>
                                    سئو
                                </h5>
                            </div>
                            <div class="body">

                                <div class="col-lg-12 col-xs-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" id="seoTitle" name="seoTitle"
                                                   class="form-control" value="{{old('seoTitle')}}">
                                            <label class="form-label"> عنوان سئو : </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xs-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                        <textarea type="text" id="seoContent" name="seoContent" rows="4"
                                                  class="form-control">{{old('seoContent')}}</textarea>
                                            <label class="form-label"> توضیحات سئو : </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-xs-12">
                                    <div class="form-group form-float">
                                        <label class="form-label"> برچسب ها : </label>
                                        <div class="form-line">
                                            <input type="text" id="tags" name="tags" data-role="tagsinput"
                                                   class="form-control" value="{{old('tags')}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row" style="margin-top: 8px">
                        <div class="col-xs-12 col-lg-12 ali-m-bottom-6" style="background: white;padding-top: 20px">
                            <div class="header ali-border-b"
                                 style="display: flex;justify-content: space-between;padding: 8px">
                                <h5>
                                    گالری
                                </h5>
                            </div>
                            <div class="body">

                                <div class="row" style="padding: 8px">
                                    <input type="file" id="photos" name="photo[]" class="form-control file"
                                           data-overwrite-initial="false" multiple data-theme="fas">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 col-xs-12 col-sm-12" style="margin-right: 0">
                    <div class="row">
                        <div class="col-xs-12 col-lg-12 ali-m-bottom-6" style="background: white;padding-top: 20px">
                            <div class="header ali-border-b">
                                <h5>
                                    وضعیت
                                </h5>
                            </div>
                            <div class="body">
                                <div class="form-group form-float">
                                    <select required id="status" name="status"
                                            class="selectpicker form-control ">
                                        <option value="0">پیش نویس</option>
                                        <option value="1">انتشار</option>
                                        <option value="2">پیشنهاد ما</option>
                                        <option value="3">ویژه</option>
                                    </select>
                                </div>

                                <div class="col-lg-12" style="display: grid">
                                    <input type="submit" value="ثبت سرویس"
                                           style="padding: 5px;border-radius: 0;margin-bottom: 14px"
                                           class="btn btn-success waves-effect"/>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-lg-12 ali-m-bottom-6 "
                             style="background: white;padding-top: 20px;margin-bottom: 14px">
                            <div class="header ali-border-b">
                                <h5>
                                    عکس
                                </h5>
                            </div>
                            <div class="body">
                                <div class="form-group form-float">
                                    <div class="col-lg-12">
                                        <center>
                                            <label class="lbl-cursor" for="imgFile"
                                                   style="display: block;background: #6184e4;color: white;padding: 5px;border-radius: 0;margin-bottom: 14px">انتخاب
                                                عکس</label>
                                        </center>
                                        <input id="imgFile" name="imgFile" accept="image/*" type="file"
                                               style="display: none">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-lg-12 ali-m-bottom-6" style="background: white;padding-top: 20px">
                            <div class="header ali-border-b">
                                <h5>
                                    آدرس و تلفن
                                </h5>
                            </div>
                            <div class="body">
                                <div class="row clearfix">
                                    <div class="col-sm-12 col-xs-12">
                                        <div class="form-group form-float show-tick ">
                                            <select required id="state" name="state"
                                                    onchange="stateFill()"
                                                    class="selectpicker state form-control"
                                                   >
                                                <option>استان را انتخاب کنید</option>
                                            </select>
                                            <input type="text" id="stateName" name="stateName" hidden>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-xs-12">
                                        <div class="form-group form-float">
                                            <select required id="city" name="city"
                                                    onchange="cityFill()"
                                                    class="selectpicker form-control city">
                                                <option>ابتدا استان را انتخاب کنید</option>
                                            </select>
                                            <input type="text" id="cityName" name="cityName" hidden>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-xs-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" id="address" name="address"
                                                       class="form-control" value="{{old('address')}}">
                                                <label class="form-label"> آدرس : </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-xs-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="number" id="phone" name="phone"
                                                       class="form-control" value="{{old('phone')}}">
                                                <label class="form-label"> تلفن : </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-xs-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="number" id="mobile" name="mobile"
                                                       class="form-control" value="{{old('mobile')}}">
                                                <label class="form-label"> همراه : </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-lg-12 ali-m-bottom-6" style="background: white;padding-top: 20px">
                            <div class="header ali-border-b">
                                <h5>
                                    مالی
                                </h5>
                            </div>
                            <div class="body">
                                <div class="col-xs-12 col-lg-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" id="offPercent" name="offPercent"
                                                   class="form-control" value="{{old('offPercent')}}">
                                            <label class="form-label"> درصد تخفیف : </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-lg-12">
                                    <div class="form-group form-float">
                                        <div class="row">
                                            <div class="ali-flex" data-mddatetimepicker="true" data-trigger="click"
                                                 data-targetselector="#endDate" data-enabletimepicker="false"
                                                 data-placement="bottom" data-fromdate="true"
                                                 data-mdformat="yyyy/MM/dd dddd"
                                                 data-disablebeforetoday="true">
                                                <div class="col-sm-1">
                                                    <i class="material-icons">date_range</i>
                                                </div>
                                                <div class="col-sm-11">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input type="text" id="endDate" name="endDate"
                                                                   class="datetimepicker form-control"
                                                                   placeholder="تاریخ اتمام تخفیف">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-lg-12 ali-m-bottom-6" style="background: white;padding-top: 20px">
                            <div class="header ali-border-b">
                                <h5>
                                    دسته بندی
                                </h5>
                            </div>
                            <div class="body scroll">
                                <div class="form-group form-float">
                                    <div class="col-lg-12">
                                        <input type="checkbox" id="basic_checkbox_1" name="checkbox[]" value="امداد">
                                        <label for="basic_checkbox_1">امداد</label>
                                    </div>

                                    <div class="col-lg-12">
                                        <input type="checkbox" id="basic_checkbox_6" name="checkbox[]" value="اموزش">
                                        <label for="basic_checkbox_6">اموزش</label>
                                    </div>

                                    <div class="col-lg-12">
                                        <input type="checkbox" id="basic_checkbox_7" name="checkbox[]" value="فروش">
                                        <label for="basic_checkbox_7">فروش</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-lg-12 ali-m-bottom-6"
                             style="background: white;padding-top: 20px;padding-bottom: 20px;margin-bottom: 70px">
                            <div class="header ali-border-b">
                                <h5>
                                    ساعات کاری
                                </h5>
                            </div>
                            <div class="items body">
                                <div class="product-item">
                                    <h6>ساعت شروع شیفت صبح</h6>
                                    <select required id="timeStartA" name="timeStartA"
                                            class="selectpicker form-control ">
                                        <option value="-1">ساعت شروع کار</option>
                                        @for ($i = 7; $i < 23; $i++)
                                            <option value="{{$i}}">{{$i}}</option>
                                        @endfor
                                    </select>
                                    <h6>ساعت پایان شیفت صبح</h6>
                                    <select required id="timeEndA" name="timeEndA"
                                            class="selectpicker form-control  ">
                                        <option value="-1">ساعت پایان کار</option>
                                        @for ($i = 7; $i < 23; $i++)
                                            <option value="{{$i}}">{{$i}}</option>
                                        @endfor
                                    </select>
                                    <br>
                                    <br>
                                    <h6>ساعت شروع شیفت ظهر</h6>
                                    <select required id="timeStartB" name="timeStartB"
                                            class="selectpicker form-control ">
                                        <option value="-1">ساعت شروع کار</option>
                                        @for ($i = 7; $i < 23; $i++)
                                            <option value="{{$i}}">{{$i}}</option>
                                        @endfor
                                    </select>
                                    <h6>ساعت پایان شیفت ظهر</h6>
                                    <select required id="timeEndB" name="timeEndB"
                                            class="selectpicker form-control  ">
                                        <option value="-1">ساعت پایان کار</option>
                                        @for ($i = 7; $i < 23; $i++)
                                            <option value="{{$i}}">{{$i}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </form>

    <script src="{{asset('js/plugins/piexif.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/plugins/sortable.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/fileinput.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/locales/fa.js')}}" type="text/javascript"></script>
    <script src="{{asset('themes/fas/theme.js')}}" type="text/javascript"></script>
    <script src="{{asset('themes/explorer-fas/theme.js')}}" type="text/javascript"></script>

    <script>
        $("#photos").fileinput({

            showUpload: false,
            required: false,
            theme: 'fas',
            language: 'fa',
            showBrowse: false,
            browseOnZoneClick: true,
            request: true,
            {{--uploadUrl: "{{route('photos.store')}}",--}}
            uploadExtraData: function () {
                return {
                    _token: $("input[name='_token']").val()
                };
            },
            allowedFileExtensions: ['jpg', 'png'],
            overwriteInitial: false,
            maxFileSize: 1000,
            slugCallback: function (filename) {
                return filename.replace('(', '_').replace(']', '_');
            }

        }).on('filepreupload', function (event, data, previewId, index) {
            console.log(data);
        });
    </script>

    <script>

        function deleteRow() {
            $("DIV.product-item").each(function (index, item) {
                jQuery(':checkbox', this).each(function () {
                    if ($(this).is(':checked')) {
                        $(item).remove();
                    }
                })
            })
        }

    </script>

    <script type="text/javascript" src="{{asset('js/frotel/ostan.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/frotel/city.js')}}"></script>

    <script>

        loadOstan('state');
        $("#state").change(function () {
            var i = $(this).find('option:selected').val();
            ldMenu(i, 'city');
            $('.selectpicker').selectpicker('refresh');
        });

        function stateFill() {
            document.getElementById("stateName").value = $("select[name='state'] option:selected").text();
        }

        function cityFill() {
            document.getElementById("cityName").value = $("select[name='city'] option:selected").text();
        }


        $('#state option').each(function (index) {

            var value_state = $(this).val();
            var state = $('input[name=stateId]').val();
            if (value_state === state) {
                $(this).attr('selected', 'selected');
                ldMenu(value_state, 'city');
            }
        });

        $('.city option').each(function (index) {
            var city = $('input[name=cityId]').val();
            var city_value = $(this).val();
            if (city_value === city) {
                $(this).attr('selected', 'selected');
                $('.selectpicker').selectpicker('refresh');
            }
        });


    </script>

@endsection
