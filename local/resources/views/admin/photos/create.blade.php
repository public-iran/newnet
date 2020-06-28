@extends('admin.layout.master')
@section('style')
    <link href="{{asset('themes/explorer-fas/theme.css')}}" media="all" rel="stylesheet" type="text/css"/>

    <link href="{{asset('css/fileinput.css')}}" media="all" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
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
        .krajee-default .file-thumb-progress .progress, .krajee-default .file-thumb-progress .progress-bar {
            height: 11px;
            font-family: Vazir, Helvetica, sans-serif;
            font-size: 9px;
            line-height: 12px;
        }

        .selected > div{
            float: right;
        }
        .selected > div p{
            text-align: right;
        }
        .invalid-feedback{
            color: red;
            width: 100%;
            display: block;
            text-align: center;
        }
    </style>
@endsection


@section('content')


    <div class="row clearfix main-index photos">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                       افزودن عکس

                        <a href="{{route('photos.index')}}" style="float:left;margin-top: -10px;" type="button" class="btn btn-default btn-circle waves-effect waves-circle waves-float">
                            <i class="material-icons">reply</i>
                        </a>

                    </h2>

                </div>

                <form action="{{route('photos.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="body">
                        <div class="row clearfix selected">
                            <div class="col-md-3">
                                <p>
                                    <b>استان</b>
                                </p>
                                <select required id="ostan" name="ostan_id" class="selectpicker state form-control show-tick " data-live-search="true">
                                    <option value="">استان را انتخاب کنید</option>
                                </select>
                                @if ($errors->has('ostan'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ostan') }}</strong>
                                    </span>
                                @endif
                            </div>


                            <div class="col-md-3">
                                <p>
                                    <b>شهر</b>
                                </p>
                                <select required id="city" name="city_id"  onchange="set_state_name()" class="selectpicker form-control show-tick city">
                                    <option>ابتدا استان را انتخاب کنید</option>
                                </select>
                                @if ($errors->has('city'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                                <input name="ostan" type="hidden" value="{{@$user_info['ostan']}}">
                                <input name="city" type="hidden" value="{{@$user_info['city']}}">
                            </div>


                            <div class="col-md-3">
                                <p>
                                    <b>دسته بندی</b>
                                </p>
                                <select class="form-control show-tick" name="category">

                                    <option value="کمپ آموزشی">کمپ آموزشی</option>
                                    <option value="هفتگی">هفتگی</option>
                                    <option value="فان">فان</option>
                                    <option value="پات لاگ">پات لاگ</option>
                                </select>
                                @if ($errors->has('category'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="row clearfix">
                        <input type="file" id="photos" name="photo[]" class="form-control file" data-overwrite-initial="false" multiple data-theme="fas">
                        </div>

                     {{--   <button type="submit" class="btn bg-blue waves-effect">
                            <i class="material-icons">crop_original</i>
                            <span>ثبت تصاویر</span>
                        </button>--}}
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection

@section('content_user')


    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        افزودن عکس

                        <a href="{{route('photos.index')}}" style="float:left;margin-top: -10px;" type="button" class="btn btn-default btn-circle waves-effect waves-circle waves-float">
                            <i class="material-icons">reply</i>
                        </a>

                    </h2>

                </div>

                <form action="{{route('photos.store')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="body">
                        <div class="row clearfix selected">
                            <div class="col-md-3">
                                <p>
                                    <b>استان</b>
                                </p>
                                <select required id="ostan" name="ostan_id" class="selectpicker state form-control show-tick " data-live-search="true">
                                    <option value="">استان را انتخاب کنید</option>
                                </select>
                                @if ($errors->has('ostan'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ostan') }}</strong>
                                    </span>
                                @endif
                            </div>


                            <div class="col-md-3">
                                <p>
                                    <b>شهر</b>
                                </p>
                                <select required id="city" name="city_id"  onchange="set_state_name()" class="selectpicker form-control show-tick city">
                                    <option>ابتدا استان را انتخاب کنید</option>
                                </select>
                                @if ($errors->has('city'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                                <input name="ostan" type="hidden" value="{{@$user_info['ostan']}}">
                                <input name="city" type="hidden" value="{{@$user_info['city']}}">
                            </div>


                            <div class="col-md-3">
                                <p>
                                    <b>دسته بندی</b>
                                </p>
                                <select class="form-control show-tick" name="category">

                                    <option value="کمپ آموزشی">کمپ آموزشی</option>
                                    <option value="هفتگی">هفتگی</option>
                                    <option value="فان">فان</option>
                                    <option value="پات لاگ">پات لاگ</option>
                                </select>
                                @if ($errors->has('category'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="row clearfix">
                            <input type="file" id="photos" name="photo[]" class="form-control file" data-overwrite-initial="false" multiple data-theme="fas">
                        </div>

                        {{--   <button type="submit" class="btn bg-blue waves-effect">
                               <i class="material-icons">crop_original</i>
                               <span>ثبت تصاویر</span>
                           </button>--}}
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection
@section('script')


    <script src="{{asset('js/plugins/piexif.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/plugins/sortable.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/fileinput.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/locales/fa.js')}}" type="text/javascript"></script>
    <script src="{{asset('themes/fas/theme.js')}}" type="text/javascript"></script>
    <script src="{{asset('themes/explorer-fas/theme.js')}}" type="text/javascript"></script>

    <script src="{{asset(('js/frotel/ostan.js'))}}"></script>
    <script src="{{asset('js/frotel/city.js')}}"></script>
    <script>

        $("#photos").fileinput({

            theme: 'fas',
            language: 'fa',
            showBrowse:true,
            browseOnZoneClick:true,
            request:true,
            {{--uploadUrl: "{{route('photos.store')}}",--}}
            uploadExtraData:function () {
                return {
                    _token:$("input[name='_token']").val()
                };
            },
            allowedFileExtensions:['jpg', 'png'],
            overwriteInitial: false,
            maxFileSize:1000,
            slugCallback: function (filename) {
                return filename.replace('(', '_').replace(']', '_');
            }

        }).on('filepreupload', function(event, data, previewId, index) {
             // alert('The description entered is:\n\n' + ($('#description').val() || ' NULL'));
            console.log(data);
            // if(data){
            //     alert('gdfdfd');
            // }
        });
        // $(".btn-warning").on('click', function () {
        //     var $el = $("#file-4");
        //     if ($el.attr('disabled')) {
        //         $el.fileinput('enable');
        //     } else {
        //         $el.fileinput('disable');
        //     }
        // });
        // $(".btn-info").on('click', function () {
        //     $("#file-4").fileinput('refresh', {previewClass: 'bg-info'});
        // });
        // /*
        //  $('#file-4').on('fileselectnone', function() {
        //  alert('Huh! You selected no files.');
        //  });
        //  $('#file-4').on('filebrowse', function() {
        //  alert('File browse clicked for #file-4');
        //  });
        //  */
        // $(document).ready(function () {
        //     $("#test-upload").fileinput({
        //         'theme': 'fas',
        //         'showPreview': false,
        //         'allowedFileExtensions': ['jpg', 'png', 'gif'],
        //         'elErrorContainer': '#errorBlock'
        //     });
        //     $("#kv-explorer").fileinput({
        //         'theme': 'explorer-fas',
        //         'uploadUrl': '#',
        //         overwriteInitial: false,
        //         initialPreviewAsData: true,
        //         initialPreview: [
        //             "http://lorempixel.com/1920/1080/nature/1",
        //             "http://lorempixel.com/1920/1080/nature/2",
        //             "http://lorempixel.com/1920/1080/nature/3"
        //         ],
        //         initialPreviewConfig: [
        //             {caption: "nature-1.jpg", size: 329892, width: "120px", url: "{$url}", key: 1},
        //             {caption: "nature-2.jpg", size: 872378, width: "120px", url: "{$url}", key: 2},
        //             {caption: "nature-3.jpg", size: 632762, width: "120px", url: "{$url}", key: 3}
        //         ]
        //     });
        //     /*
        //      $("#test-upload").on('fileloaded', function(event, file, previewId, index) {
        //      alert('i = ' + index + ', id = ' + previewId + ', file = ' + file.name);
        //      });
        //      */
        // });
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
