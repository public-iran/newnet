@extends('adminbizness.layout.master')

@section('Admin_content')
    <link href="{{asset('js/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css')}}" rel="stylesheet">
    <script src="{{asset('js/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script>

    <link href="{{asset('themes/explorer-fas/theme.css')}}" media="all" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/fileinput.css')}}" media="all" rel="stylesheet" type="text/css"/>
{{--    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">--}}

    @include('adminbizness.partial.error')
    <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">

            <div class="col-lg-12 col-xs-12 col-sm-12 ali-flex" >

                <div class="col-lg-8 col-xs-12 col-sm-12 ali-margin-0" style="margin-left: 8px;display: inline-table">
                    <div class="row">
                        <div class="col-xs-12 col-lg-12 " style="background: white;padding-top: 20px">
                            <div class="header ali-border-b">
                                <h5>
                                    ایجاد محصول
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
                                            <label class="form-label"> خلاصه محصول : </label>
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
                                            <input type="text" id="tags" name="tags"   data-role="tagsinput"
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
                                    <input type="file" id="photos" name="photo[]" class="form-control file" data-overwrite-initial="false" multiple data-theme="fas">
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
                                            class="selectpicker form-control show-tick">
                                        <option value="0">پیش نویس</option>
                                        <option value="1">انتشار</option>
                                    </select>
                                </div>

                                <div class="col-lg-12" style="display: grid">
                                    <input type="submit" value="ثبت محصول"
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
                                        <input id="imgFile" name="imgFile" accept="image/*" type="file" style="display: none">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-lg-12 ali-m-bottom-6" style="background: white;padding-top: 20px">
                            <div class="header ali-border-b">
                                <h5>
                                    ویدئو
                                </h5>
                            </div>
                            <div class="body">
                                <div class="form-group form-float">
                                    <div class="col-lg-12">
                                        <center>
                                            <label class="lbl-cursor" for="vidFile"
                                                   style="display: block;background: #6184e4;color: white;padding: 5px;border-radius: 0;margin-bottom: 14px">انتخاب
                                                ویدئو</label>
                                        </center>
                                        <input id="vidFile" name="vidFile" accept="video/*" type="file" style="display: none">
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
                                            <input type="text" id="mainPrice" name="mainPrice"
                                                   class="form-control" value="{{old('title')}}">
                                            <label class="form-label"> قیمت اصلی : </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-lg-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" id="offPrice" name="offPrice"
                                                   class="form-control" value="{{old('title')}}">
                                            <label class="form-label"> قیمت حراجی : </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-lg-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" id="lucre" name="lucre"
                                                   class="form-control" value="{{old('title')}}">
                                            <label class="form-label"> حاشیه سود : </label>
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
                                    مشخصات فنی
                                </h5>
                            </div>
                            <div class="items body">
                                <div class="product-item">
                                    <div class="col-xs-12 col-lg-12">
                                        <div class="form-group form-float">
                                            <div class="form-line" style="padding:0 !important;">
                                                <input type="checkbox" id="check" name="item_index[]">
                                                <label for="check"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-lg-12">
                                        <div class="form-group form-float">
                                            <div class="form-line" style="padding:0 !important;">

                                                <input type="text" id="feature" name="feature[]"
                                                       class="form-control" value="{{old('feature[]')}}">
                                                <label class="form-label"> خصوصیت : </label>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-lg-12">
                                        <div class="form-group form-float">
                                            <div class="form-line" style="padding:0 !important;">
                                                <input type="text" id="featureValue" name="featureValue[]"
                                                       class="form-control" value="{{old('featureValue[]')}}">
                                                <label class="form-label">مقدار خصوصیت : </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" align="center">
                                {!! Form::button('افزودن',['onclick'=>'addMore()','class' =>'btn btn-success waves-effect','style'=>'width: 150px;margin-top: 20px']) !!}

                                {!! Form::button('حذف',['onclick'=>'deleteRow()','class' =>'btn btn-danger waves-effect','style'=>'width: 150px;margin-top: 20px']) !!}
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </form>
{{--    <script src="{{asset('js/ckeditor.js')}}"></script>--}}

{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.14.1/lang/fa.min.js"></script>--}}
{{--    <script>--}}
{{--        // CKEDITOR.replace( 'content' ,{--}}
{{--        //     language: 'fa'--}}
{{--        // } );--}}

{{--        CKEDITOR.replace( 'editor1' );--}}
{{--    </script>--}}

    <script src="{{asset('js/plugins/piexif.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/plugins/sortable.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/fileinput.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/locales/fa.js')}}" type="text/javascript"></script>
    <script src="{{asset('themes/fas/theme.js')}}" type="text/javascript"></script>
    <script src="{{asset('themes/explorer-fas/theme.js')}}" type="text/javascript"></script>

    <script>
        $("#photos").fileinput({

            showUpload:false,
            required:false,
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
            console.log(data);
        });
    </script>

    <script>
        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        //     }
        // });
        var i = 0;

        function addMore() {
            // $(".product-item:last").clone().insertAfter(".product-item:last");
            $(".items").append("                                <div class=\"product-item\">\n" +
                "                                    <div class=\"col-xs-12 col-lg-12\">\n" +
                "                                        <div class=\"form-group form-float\">\n" +
                "                                            <div class=\"form-line\" style=\"padding:0 !important;\">\n" +
                "                                                <input type=\"checkbox\" id=\"check"+i+"\" name=\"item_index[]\">\n" +
                "                                                <label for=\"check"+i+"\"></label>\n" +
                "                                            </div>\n" +
                "                                        </div>\n" +
                "                                    </div>\n" +
                "                                    <div class=\"col-xs-12 col-lg-12\">\n" +
                "                                        <div class=\"form-group form-float\">\n" +
                "                                            <div class=\"form-line\" style=\"padding:0 !important;\">\n" +
                "\n" +
                "                                                <input type=\"text\" id=\"feature\" name=\"feature[]\"\n" +
                "                                                       class=\"form-control\" >\n" +
                "                                                <label class=\"form-label\"> خصوصیت : </label>\n" +
                "\n" +
                "                                            </div>\n" +
                "                                        </div>\n" +
                "                                    </div>\n" +
                "                                    <div class=\"col-xs-12 col-lg-12\">\n" +
                "                                        <div class=\"form-group form-float\">\n" +
                "                                            <div class=\"form-line\" style=\"padding:0 !important;\">\n" +
                "                                                <input type=\"text\" id=\"featureValue\" name=\"featureValue[]\"\n" +
                "                                                       class=\"form-control\" >\n" +
                "                                                <label class=\"form-label\">مقدار خصوصیت : </label>\n" +
                "                                            </div>\n" +
                "                                        </div>\n" +
                "                                    </div>\n" +
                "                                </div>\n");
            i++;
        }

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



@endsection
