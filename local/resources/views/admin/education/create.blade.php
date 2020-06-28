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
    <div class="row clearfix main-index education">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        ایجاد مراحل آموزشی

                        <a href="{{route('education.index')}}" style="float:left;margin-top: -10px;" type="button" class="btn btn-default btn-circle waves-effect waves-circle waves-float">
                            <i class="material-icons">reply</i>
                        </a>

                    </h2>

                </div>

                <form action="{{route('education.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="body">
                        <div class="form-group">
                            <select required name="level" class="form-control show-tick">
                                <option style="" value="" disabled> انتخاب سطح</option>
                                @foreach($levels as $level)
                                <option value="{{$level->id}}">{{$level->title}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <div class="form-line">
                                <input required type="text" name="title" class="form-control"
                                       placeholder="عنوان آموزش"/>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <button type="button" name="add_item" class="btn bg-light-green waves-effect"
                                            onClick="addMore();">مرحله جدید
                                    </button>
                                    <button type="button" name="del_item" class="btn bg-pink waves-effect"
                                            onClick="deleteRow();">حذف مرحله انتخابی
                                    </button>
                                </div>
                            </div>
                            <div class="education edu">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 products">
                                    <input type="hidden" name="surface[]" value="1">
                                    <div id="product">
                                        <h6>
                                            نوع فایل آموزشی (مرحله 1)
                                        </h6>
                                        <div class="product-item option-tutorial">


                                            <!-------------------------   اسکرول به خاطره این المان هست   --------------------->
                                            <input type="checkbox" id="md_checkbox_21"
                                                   class="filled-in chk-col-light-blue">
                                            <label for="md_checkbox_288"></label>
                                            <!-------------------------   اسکرول به خاطره این المان هست   --------------------->


                                            <select style="background: #ececec;" name="File_type" class="">
                                                <option value="sound">فایل صوتی</option>
                                                <option value="image">فایل تصویری</option>
                                                <option value="video">ویدئو</option>
                                                <option value="pdf">فایل PDF</option>
                                                <option value="list">لیست افراد</option>
                                                <option value="target">لیست اهداف</option>
                                                <option value="Golden_list" style="background: #FFD700">لیست طلایی</option>

                                            </select>
                                            <button style="padding: 4px 7px;margin-right: 5px;" type="button" class="btn bg-light-blue waves-effect"
                                                    onclick="add_levels(this,1)">
                                                <i class="material-icons">add</i>
                                            </button>


                                        </div>
                                        <div id="levels">

                                        </div>
                                        <div class="form-group">
                                            <label style="float: right;padding: 18px 0 0;" for="md_checkbox_288">مرحله 1
                                                شامل </label>
                                            <div style="float: right;width: 200px;margin: 0 10px;" class="form-line">
                                                <input required type="text" name="shamel1" class="form-control"/>
                                            </div>

                                            <label style="float: right;padding: 18px 0 0" for="md_checkbox_288">می باشد
                                                که در طی زمان </label>

                                            <div style="float: right;width: 200px;margin: 0 10px;" class="form-line">
                                                <input required type="text" name="zaman1" class="form-control"/>
                                            </div>

                                            <label style="float: right;padding: 18px 0 0" for="md_checkbox_288">باید
                                                انجام شود. </label>
                                        </div>

                                        <div class="col-xs-12" style="margin: 20px 0 0;padding: 0">
                                        <input type="checkbox" name="notest" id="md_check" value="NO" class="filled-in chk-col-teal"  >
                                        <label style="margin-left: 20px;" for="md_check">بدون آزمون</label>

                                            <input type="checkbox" name="test_confirm" id="md_chek" value="YES" class="filled-in chk-col-teal"  >
                                            <label for="md_chek">نیاز به تائید آزمون</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>


                        <div class="row align-center">
                            <button type="submit" class="btn bg-deep-orange waves-effect">ثبت مراحل آموزش</button>
                        </div>


                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>

        var i = 1;

        var level = 2;

        function add_levels(tag,b) {

            var File_type = $(tag).parent().find('select[name=File_type]').val();

            if (File_type == 'video') {
                $(tag).parents('#product').find('#levels').append('<div style="min-width:273px;" class="form-group"><div class="form-line"><span class="remove-file" aria-hidden="true">×</span><input required type="text" name="video'+b+'[]" class="form-control" placeholder="لینک ویدیو" /></div></div>');
                i++;
            }
            if (File_type == 'image') {
                $(tag).parents('#product').find('#levels').append('<div><span class="remove-file" aria-hidden="true">×</span><label class="btn btn-default">انتخاب فایل تصویر<input name="photos'+b+'[]" required type="file" hidden></label></div> ');
                i++;
            }
            if (File_type == 'sound') {
                i++;
                $(tag).parents('#product').find('#levels').append('<div><span class="remove-file" aria-hidden="true">×</span><label class="btn btn-default">انتخاب فایل صوتی<input name="sound'+b+'[]" required type="file" hidden></label></div>');
            }
            if (File_type == 'pdf') {
                i++;
                $(tag).parents('#product').find('#levels').append('<div><span class="remove-file" aria-hidden="true">×</span><label class="btn btn-default">انتخاب فایل PDF<input name="pdf'+b+'[]" required type="file" hidden></label></div>');
            }


            $('.remove-file').click(function () {
                $(this).parent().remove();

            });
        }

        function addMore() {
//  $(".education:last").clone().insertAfter(".education:last");
            $('.education.edu').append('<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 products">\n' +
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
                '                                            <select name="File_type" style="max-width: 215px;margin-right: 5px;background: #ececec;" class="form-control show-tick">\n' +
                '                                                <option value="sound">فایل صوتی</option>\n' +
                '                                                <option value="image">فایل تصویری</option>\n' +
                '                                                <option value="video">ویدئو</option>\n' +
                '                                                <option value="pdf">فایل PDF</option>\n' +

                '                                            </select>\n' +
                '                                            <button style="    padding: 4px 7px;margin-right: 5px;" type="button" class="btn bg-light-blue waves-effect"\n' +
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
            $('.education').append('<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 products"><div id="product"><input type="hidden" name="surface[]" value="' + level + '"><h6> نوع فایل آموزشی (مرحله ' + level + ')</h6><div class="product-item option-tutorial"><input type="checkbox" id="md_checkbox_' + i + '" class="filled-in chk-col-light-blue"><label for="md_checkbox_' + i + '"></label><div class="btn-group bootstrap-select show-tick"><button type="button" class="btn dropdown-toggle btn-default" data-toggle="dropdown" title="فایل صوتی"><span class="filter-option pull-left">فایل صوتی</span>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu open"><ul class="dropdown-menu inner" role="menu"><li data-original-index="0" class="selected"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">فایل صوتی</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="1"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">فایل تصویری</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="2"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">ویدئو</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="3"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">فایل PDF</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li></ul></div><select name="File_type' + level + '" style="max-width: 200" class="form-control show-tick" tabindex="-98"><option value="sound">فایل صوتی</option><option value="photos">فایل تصویری</option><option value="video">ویدئو</option><option value="pdf">فایل PDF</option></select></div><button type="button" class="btn bg-light-blue waves-effect" onclick="add_levels(this,'+level+')"><i class="material-icons">add</i></button></div><div id="levels"></div><div class="form-group">\n' +
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
