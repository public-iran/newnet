@extends('admin.layout.master')
@section('style')
    <style>
        .btn.btn-default {
            margin-bottom: 5px;
        }

        #levels {
            float: right;
            position: relative;
            width: 100%;
        }

        #levels > div {
            margin: 15px 0;
            max-width: 220px;
        }

        .remove-file {
            position: absolute;
            right: 0;
            background: #00bcd4;
            padding: 3px 7px 0px;
            color: #fff;
            cursor: pointer;
            z-index: 1;
        }

        .col-lg-6, .col-md-6 {
            float: right;
        }
    </style>
@endsection

<?php
$content='content';
?>
@if(Auth::user()->role==2)
    <?php
    $content='content_writer';
    ?>
@endif

@section($content)
    <div class="row clearfix main-index photos">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        ایجاد مراحل آموزشی

                        <a href="{{route('education.show',$education->level)}}" style="float:left;margin-top: -10px;" type="button"
                           class="btn btn-default btn-circle waves-effect waves-circle waves-float">
                            <i class="material-icons">reply</i>
                        </a>
                    </h2>

                </div>
                {!! Form::model($education,['method'=>'PATCH','action'=>['Admin\AdminEducationController@update',$education->id],'files'=>true]) !!}


                    <div class="body">
                        <div class="form-group">
                            <select required name="level" class="form-control show-tick">
                                <option style="" value="" disabled> انتخاب سطح</option>
                                <option @if($education->level==1) selected @endif value="1">سطح یک</option>
                                <option @if($education->level==2) selected @endif value="2">سطح دو</option>
                                <option @if($education->level==3) selected @endif value="3">سطح سه</option>
                                <option @if($education->level==4) selected @endif value="4">سطح چهار</option>
                                <option @if($education->level==5) selected @endif value="5">سطح پنج</option>
                                <option @if($education->level==6) selected @endif value="6">سطح شش</option>
                                <option @if($education->level==7) selected @endif value="7">سطح هفت</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <div class="form-line">
                                <input value="{{$education->title}}" required type="text" name="title"
                                       class="form-control"
                                       placeholder="عنوان آموزش"/>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                            </div>
                            <div class="education">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 products">
                                    <input type="hidden" name="surface[]" value="1">
                                    <div id="product">
                                        <h6>
                                            نوع فایل آموزشی (مرحله {{$education->surface}})
                                        </h6>
                                        <div class="product-item option-tutorial">




                                            <select name="File_type" class="show-tick">
                                                <option value="sound">فایل صوتی</option>
                                                <option value="image">فایل تصویری</option>
                                                <option value="video">ویدئو</option>
                                                <option value="pdf">فایل PDF</option>
                                            </select>
                                            <button type="button" class="btn bg-light-blue waves-effect"
                                                    onclick="add_levels(this,1)">
                                                <i class="material-icons">add</i>
                                            </button>


                                        </div>
                                        <div id="levels">
                                            @if($education->image)
                                                @foreach($education->image as $image)
                                                    <div>
                                                        <span class="remove-file" aria-hidden="true">×</span>
{{--                                                        <input type="file" name="image1[]" value="{{$photos}}" >--}}
                                                        <img style="max-width: 200px;" src="{{asset('amozesh/level'.$education->level.'/surface'.$education->surface.'photos'.$image)}}">
                                                    </div>
                                                @endforeach
                                            @endif

                                            @if($education->sound)
                                                @foreach($education->sound as $sound)
                                                    <div>
                                                        <span class="remove-file" aria-hidden="true">×</span>
                                                        <audio controls="">
                                                            <source
                                                                src="{{asset('amozesh/level'.$education->level.'/surface'.$education->surface.'/sound/'.$sound)}}"
                                                                type="audio/mp3">
                                                            مرورگر شما پشتیبانی نمیکند
                                                        </audio>
                                                    </div>

                                                @endforeach
                                            @endif


                                            @if($education->video)
                                                @foreach($education->video as $video)
                                                    <div>
                                                        <span class="remove-file" aria-hidden="true">×</span>
                                                            {{$video}}
                                                    </div>
                                                @endforeach
                                            @endif


                                            @if($education->pdf)
                                                @foreach($education->pdf as $pdf)
                                                    <div>
                                                        <span class="remove-file" aria-hidden="true">×</span>
                                                        <object width="100%" height="200" type=""
                                                                data="{{asset('amozesh/level'.$education->level.'/surface'.$education->surface.'/pdf/'.$pdf)}}"></object>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label style="float: right;padding: 18px 0 0;"
                                                   for="md_checkbox_288">مرحله {{$education->surface}}
                                                شامل </label>
                                            <div style="float: right;width: 200px;margin: 0 10px;" class="form-line">
                                                <input required type="text" value="{{$education->shamel}}"
                                                       name="shamel1" class="form-control"/>
                                            </div>

                                            <label style="float: right;padding: 18px 0 0" for="md_checkbox_288">می باشد
                                                که در طی زمان </label>

                                            <div style="float: right;width: 200px;margin: 0 10px;" class="form-line">
                                                <input required type="text" value="{{$education->zaman}}" name="zaman1"
                                                       class="form-control"/>
                                            </div>

                                            <label style="float: right;padding: 18px 0 0" for="md_checkbox_288">باید
                                                انجام شود. </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>


                        <div class="row align-center">
                            <button type="submit" class="btn bg-deep-orange waves-effect">ثبت مراحل آموزش</button>
                        </div>


                    </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>

        var i = 1;

        var level = 2;

        function add_levels(tag, b) {

            var File_type = $(tag).parent().find('select[name=File_type]').val();

            if (File_type == 'video') {
                $(tag).parents('#product').find('#levels').append('<div style="min-width:273px;" class="form-group"><div class="form-line"><span class="remove-file" aria-hidden="true">×</span><input required type="text" name="video' + b + '[]" class="form-control" placeholder="لینک ویدیو" /></div></div>');
                i++;
            }
            if (File_type == 'image') {
                $(tag).parents('#product').find('#levels').append('<div><span class="remove-file" aria-hidden="true">×</span><label class="btn btn-default">انتخاب فایل تصویر<input name="iphotos + b + '[]" required type="file" hidden></label></div> ');
                i++;
            }
            if (File_type == 'sound') {
                i++;
                $(tag).parents('#product').find('#levels').append('<div><span class="remove-file" aria-hidden="true">×</span><label class="btn btn-default">انتخاب فایل صوتی<input name="sound' + b + '[]" required type="file" hidden></label></div>');
            }
            if (File_type == 'pdf') {
                i++;
                $(tag).parents('#product').find('#levels').append('<div><span class="remove-file" aria-hidden="true">×</span><label class="btn btn-default">انتخاب فایل PDF<input name="pdf' + b + '[]" required type="file" hidden></label></div>');
            }


            $('.remove-file').click(function () {
                $(this).parent().remove();

            });
        }

        $('.remove-file').click(function () {
            $(this).parent().remove();

        });

        function addMore() {
//  $(".education:last").clone().insertAfter(".education:last");
            $('.education').append('<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 products">\n' +
                '                                    <input type="hidden" name="surface[]" value="' + level + '">\n' +
                '                                    <div id="product">\n' +
                '                                        <h6>\n' +
                '                                            نوع فایل آموزشی (مرحله ' + level + ')\n' +
                '                                        </h6>\n' +
                '                                        <div class="product-item option-tutorial">\n' +
                '\n' +
                '\n' +
                '                                            <!-------------------------   اسکرول به خاطره این المان هست   --------------------->\n' +
                '                                            <input type="checkbox" id="md_checkbox_' + i + '"\n' +
                '                                                   class="filled-in chk-col-light-blue">\n' +
                '                                            <label for="md_checkbox_' + i + '"></label>\n' +
                '                                            <!-------------------------   اسکرول به خاطره این المان هست   --------------------->\n' +
                '\n' +
                '\n' +
                '                                            <select name="File_type" style="max-width: 215px;margin-right: 5px;" class="form-control show-tick">\n' +
                '                                                <option value="sound">فایل صوتی</option>\n' +
                '                                                <option value="iphotos>فایل تصویری</option>\n' +
                '                                                <option value="video">ویدئو</option>\n' +
                '                                                <option value="pdf">فایل PDF</option>\n' +
                '                                            </select>\n' +
                '                                            <button type="button" class="btn bg-light-blue waves-effect"\n' +
                '                                                    onclick="add_levels(this,' + level + ')">\n' +
                '                                                <i class="material-icons">add</i>\n' +
                '                                            </button>\n' +
                '\n' +
                '\n' +
                '                                        </div>\n' +
                '                                        <div id="levels">\n' +
                '\n' +
                '                                        </div>\n' +
                '                                        <div class="form-group">\n' +
                '                                            <label style="float: right;padding: 18px 0 0;" for="md_checkbox_288">مرحله ' + level + '\n' +
                '                                                شامل </label>\n' +
                '                                            <div style="float: right;width: 200px;margin: 0 10px;" class="form-line">\n' +
                '                                                <input required type="text" name="shamel' + level + '" class="form-control"/>\n' +
                '                                            </div>\n' +
                '\n' +
                '                                            <label style="float: right;padding: 18px 0 0" for="md_checkbox_288">می باشد\n' +
                '                                                که در طی زمان </label>\n' +
                '\n' +
                '                                            <div style="float: right;width: 200px;margin: 0 10px;" class="form-line">\n' +
                '                                                <input required type="text" name="zaman' + level + '" class="form-control"/>\n' +
                '                                            </div>\n' +
                '\n' +
                '                                            <label style="float: right;padding: 18px 0 0" for="md_checkbox_288">باید\n' +
                '                                                انجام شود. </label>\n' +
                '                                        </div>\n' +
                '                                    </div>\n' +
                '                                </div>');
            i++;
            level++;
        }


        /* function addMore() {
 //  $(".education:last").clone().insertAfter(".education:last");
             $('.education').append('<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 products"><div id="product"><input type="hidden" name="surface[]" value="' + level + '"><h6> نوع فایل آموزشی (مرحله ' + level + ')</h6><div class="product-item option-tutorial"><input type="checkbox" id="md_checkbox_' + i + '" class="filled-in chk-col-light-blue"><label for="md_checkbox_' + i + '"></label><div class="btn-group bootstrap-select show-tick"><button type="button" class="btn dropdown-toggle btn-default" data-toggle="dropdown" title="فایل صوتی"><span class="filter-option pull-left">فایل صوتی</span>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu open"><ul class="dropdown-menu inner" role="menu"><li data-original-index="0" class="selected"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">فایل صوتی</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="1"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">فایل تصویری</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="2"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">ویدئو</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="3"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">فایل PDF</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li></ul></div><select name="File_type' + level + '" style="max-width: 200" class="form-control show-tick" tabindex="-98"><option value="sound">فایل صوتی</option><option value="iphotos>فایل تصویری</option><option value="video">ویدئو</option><option value="pdf">فایل PDF</option></select></div><button type="button" class="btn bg-light-blue waves-effect" onclick="add_levels(this,'+level+')"><i class="material-icons">add</i></button></div><div id="levels"></div><div class="form-group">\n' +
                 '                                            <label style="float: right;padding: 18px 0 0;" for="md_checkbox_288">مرحله ' + level + ' شامل </label>\n' +
                 '                                            <div style="float: right;width: 200px;margin: 0 10px;"  class="form-line">\n' +
                 '                                                <input required type="text" name="shamel'+level+'" class="form-control"/>\n' +
                 '                                            </div>\n' +
                 '\n' +
                 '                                            <label style="float: right;padding: 18px 0 0" for="md_checkbox_288">می باشد که در طی زمان  </label>\n' +
                 '\n' +
                 '                                            <div style="float: right;width: 200px;margin: 0 10px;"  class="form-line">\n' +
                 '                                                <input required type="text" name="zaman'+level+'" class="form-control" />\n' +
                 '                                            </div><label style="float: right;padding: 18px 0 0" for="md_checkbox_288">باید انجام شود. </label></div></div></div>');
             i++;
             level++;
         }*/

        function deleteRow() {
            $('DIV.products').each(function (index, item) {
                jQuery(':checkbox', this).each(function () {
                    if ($(this).is(':checked')) {
                        $(item).remove();
                        level = level - 1;
                    }
                });
            });
            $('.remove-file').click(function () {
                $(this).parent().remove();
                level = level - 1;
            });
        }
    </script>
@endsection
