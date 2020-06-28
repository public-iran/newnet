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
            float: right;
            padding-right: 0;
            height: 145px;
            position: relative;
            margin-right: 5px;
        }
        #levels > div img{
            width: 100%;
            height: 100%;
        }
        #levels > div audio{
            width: 100%;

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
                                                <option value="list" @if($education->list=="YES") selected @endif>لیست افراد</option>
                                                <option value="target" @if($education->target=="YES") selected @endif>لیست اهداف</option>
                                                <option value="Golden_list" style="background: #FFD700" @if($education->Golden_list=="YES") selected @endif>لیست طلایی</option>
                                            </select>
                                            <button type="button" class="btn bg-light-blue waves-effect"
                                                    onclick="add_levels(this,{{$education->surface}})">
                                                <i class="material-icons">add</i>
                                            </button>


                                        </div>
                                        <div id="levels">
                                            @if(count($photos))

                                            @foreach($photos as $image)
                                                    <div class="col-md-3 col-xs-12 col-lg-3 col-sm-6">
                                                        <span onclick="delete_edu('photo','{{$image->id}}',this)" class="remove-file" aria-hidden="true">×</span>
{{--                                                        <input type="file" name="image1[]" value="{{$photos}}" >--}}
                                                        <img style="max-width: 200px;" src="{{asset('amozesh/level'.$education->level.'/surface'.$education->surface.'/photos/'.$image->path)}}">

                                                    </div>
                                                @endforeach
                                            @endif

                                            @if(count($sounds))

                                                @foreach($sounds as $sound)
                                                    <div class="col-md-3 col-xs-12 col-lg-3 col-sm-6">
                                                        <span onclick="delete_edu('sound','{{$sound->id}}',this)" class="remove-file" aria-hidden="true">×</span>
                                                        <audio controls="">
                                                            <source
                                                                src="{{asset('amozesh/level'.$education->level.'/surface'.$education->surface.'/sound/'.$sound->path)}}"
                                                                type="audio/mp3">
                                                            مرورگر شما پشتیبانی نمیکند
                                                        </audio>
                                                    </div>

                                                @endforeach
                                            @endif


                                            @if(count($videos))

                                                @foreach($videos as $video)
                                                    <div class="col-md-3 col-xs-12 col-lg-3 col-sm-6">
                                                        <span onclick="delete_edu('video','{{$video->id}}',this)" class="remove-file" aria-hidden="true">×</span>
                                                        <?php
                                                        echo $video->path
                                                        ?>
                                                    </div>
                                                @endforeach
                                            @endif


                                            @if(count($pdfs))

                                                @foreach($pdfs as $pdf)
                                                    <div class="col-md-3 col-xs-12 col-lg-3 col-sm-6" style="height: 300px">
                                                        <span onclick="delete_edu('pdf','{{$pdf->id}}',this)" class="remove-file" aria-hidden="true">×</span>
                                                        <iframe src="https://docs.google.com/gview?url={{asset('amozesh/level'.$education->level.'/surface'.$education->surface.'/pdf/'.$pdf->path)}}&embedded=true" style="width:100%; min-height:300px;" frameborder="0"></iframe>

                                                         </div>
                                                @endforeach
                                            @endif
                                        </div>
                                        <input name="surface" type="hidden" value="{{$education->surface}}">
                                        <div class="form-group">
                                            <label style="float: right;padding: 18px 0 0;"
                                                   for="md_checkbox_288">مرحله {{$education->surface}}
                                                شامل </label>
                                            <div style="float: right;width: 200px;margin: 0 10px;" class="form-line">
                                                <input required type="text" value="{{$education->shamel}}"
                                                       name="shamel" class="form-control"/>
                                            </div>

                                            <label style="float: right;padding: 18px 0 0" for="md_checkbox_288">می باشد
                                                که در طی زمان </label>

                                            <div style="float: right;width: 200px;margin: 0 10px;" class="form-line">
                                                <input required type="text" value="{{$education->zaman}}" name="zaman"
                                                       class="form-control"/>
                                            </div>

                                            <label style="float: right;padding: 18px 0 0" for="md_checkbox_288">باید
                                                انجام شود. </label>
                                        </div>

                                        <div class="col-xs-12" style="margin: 20px 0 0;padding: 0">
                                            <input type="checkbox" name="notest" id="md_check" value="NO" class="filled-in chk-col-teal" @if($education->test=="NO") checked @endif >
                                            <label style="margin-left: 20px;" for="md_check">بدون آزمون</label>

                                            <input type="checkbox" name="test_confirm" id="md_chek" value="YES" class="filled-in chk-col-teal"   @if($education->test_confirm=="YES") checked @endif >
                                            <label for="md_chek">نیاز به تائید آزمون</label>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>


                        <div class="row align-center">
                            <button type="submit" id="submit" class="btn bg-deep-orange waves-effect">ثبت مراحل آموزش</button>
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
                '                                            <select name="File_type" style="max-width: 215px;margin-right: 5px;background: #ececec;" class="form-control show-tick">\n' +
                '                                                <option value="sound">فایل صوتی</option>\n' +
                '                                                <option value="photos">فایل تصویری</option>\n' +
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

        function delete_edu(edu,id,item) {
            Swal.fire({
                title: '  حذف شود؟',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'بله حذف شود!',
                cancelButtonText: 'لغو'
            }).then((result) => {
                if (result.value) {
                    var CSRF_TOKEN ='{{ csrf_token() }}';
                    var url='{{route('remove_educations')}}';
                    var data={_token: CSRF_TOKEN,edu:edu,id:id};
                    console.log(data);
                    $.post(url,data,function (msg) {

                        if(msg==id){

                            $(item).parent('div').remove();
                        }
                    })
                }
            })
        }
    </script>
@endsection
