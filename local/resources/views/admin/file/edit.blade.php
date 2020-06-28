@extends('admin.layout.master')
@section('style')
    <style>
        img {
            width: 100%;
        }

        video {
            width: 100%;
        }

        audio {
            width: 100%;
        }

        .file_edit > div {
            margin-bottom: 20px;
        }
    </style>
@endsection
@section('content')
    <div class="row">


        <div class="col m8 s12">

            <div class="col s12 m12">

                <div class="card-panel grey lighten-5 z-depth-1">
                    <h5>ویرایش فایل</h5>

                </div>


                <div class="card-panel grey lighten-5 z-depth-1">
                    <div class="row valign-wrapper">

                        {!! Form::model($file,['method'=>'PATCH','action'=>['Admin\AdminFileController@update',$file->id],'files'=>true]) !!}
                        <div class="col s12 m12">
                            <div class="input-field">
                                {!! Form::text('name', $file->name, ['class' => 'validate', 'id' => 'cashyears']) !!}
                                {!! Form::label('name', 'نام فایل را وارد کنید') !!}
                            </div>
                        </div>
                        <div class="col s12 m12">
                            <div class="input-field">
                                {!! Form::label('level', ' مرحله را انتخاب کنید') !!}
                                {!! Form::select('level',$levels, $file->level_id,['class'=>'validate']) !!}

                            </div>
                        </div>

                        <div class="col s12 m12">
                            <div class="input-field">
                                {!! Form::label('surface', ' سطح را انتخاب کنید') !!}
                                {!! Form::select('surface',$surfaces, $file->surface_id,['class'=>'validate']) !!}

                            </div>
                        </div>


                        <div class="col s12 m12">

                            <div class="col s12 m12">
                                <div class="col s3 m3">
                                    <select name="file1" class="browser-default">
                                        <option value="" disabled selected>انتخاب کنید</option>
                                        <option value="pdf">فایل PDF</option>
                                        <option value="sound">فایل صوتی</option>
                                        <option value="video">فایل ویدیویی</option>
                                        <option value="image">فایل تصویری</option>
                                        <option value="">خالی</option>
                                    </select>
                                </div>

                                <div class="col s9 m9 ">
                                    <div class="file-field input-field">


                                        <div class="btn" style="width: 123px;">
                                            <span>آپلود</span>

                                            {!! Form::file('file01',null,['class'=>'validate file-path','style'=>'float:left']) !!}
                                        </div>
                                        <div class="file-path-wrapper">
                                            <input class="file-path validate" type="text">
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col s12 m12">
                                <div class="col s3 m3">
                                    <select name="file2" class="browser-default">
                                        <option value="" disabled selected>انتخاب کنید</option>
                                        <option value="pdf">فایل PDF</option>
                                        <option value="sound">فایل صوتی</option>
                                        <option value="video">فایل ویدیویی</option>
                                        <option value="image">فایل تصویری</option>
                                        <option value="">خالی</option>
                                    </select>
                                </div>

                                <div class="col s9 m9 ">
                                    <div class="file-field input-field">
                                        <div class="btn" style="width: 123px;">
                                            <span>آپلود</span>
                                            {!! Form::file('file02',null,['class'=>'validate file-path','style'=>'float:left']) !!}

                                        </div>
                                        <div class="file-path-wrapper">
                                            <input class="file-path validate" type="text">
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col s12 m12">
                                <div class="col s3 m3">
                                    <select name="file3" class="browser-default">
                                        <option value="" disabled selected>انتخاب کنید</option>
                                        <option value="pdf">فایل PDF</option>
                                        <option value="sound">فایل صوتی</option>
                                        <option value="video">فایل ویدیویی</option>
                                        <option value="image">فایل تصویری</option>
                                        <option value="">خالی</option>
                                    </select>
                                </div>

                                <div class="col s9 m9 ">
                                    <div class="file-field input-field">
                                        <div class="btn" style="width: 123px;">
                                            <span>آپلود</span>
                                            {!! Form::file('file03',null,['class'=>'validate file-path','style'=>'float:left']) !!}

                                        </div>
                                        <div class="file-path-wrapper">
                                            <input class="file-path validate" type="text">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col s12 m12">
                                <div class="col s3 m3">
                                    <select name="file4" class="browser-default">
                                        <option value="" disabled selected>انتخاب کنید</option>
                                        <option value="pdf">فایل PDF</option>
                                        <option value="sound">فایل صوتی</option>
                                        <option value="video">فایل ویدیویی</option>
                                        <option value="image">فایل تصویری</option>
                                        <option value="">خالی</option>
                                    </select>
                                </div>

                                <div class="col s9 m9 ">
                                    <div class="file-field input-field">
                                        <div class="btn" style="width: 123px;">
                                            <span>آپلود</span>
                                            {!! Form::file('file04',null,['class'=>'validate file-path','style'=>'float:left']) !!}

                                        </div>
                                        <div class="file-path-wrapper">
                                            <input class="file-path validate" type="text">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col s12 m12">
                            <div class="input-field">
                                <button type="submit" class="waves-effect waves-light btn orange lighten-2">ثبت</button>
                                {{--                                {!! Form::submit('ثبت', ['class' => 'waves-effect waves-light btn orange lighten-2']) !!}--}}
                            </div>
                        </div>
                        {!! Form::close() !!}


                    </div>
                </div>
            </div>

        </div>


        <div class="col m4 s12">
            <div class="card-panel grey lighten-5 z-depth-1">
                <div class="row valign-wrapper">
                    <div class="col s12 m12 file_edit">


                        @if($file->file1=='pdf')
                            <div class="col s12 m12">
                                <h6>فایل PDF</h6>
                                <div class="col s12 m12">
                                    <object width="100%" height="200" type=""
                                            data="{{asset('amozesh/level'.$file->level_id.'/pdf/'.$file->path_file1)}}"></object>
                                </div>
                            </div>
                        @endif

                        @if($file->file1=='sound')
                            <div class="col s12 m12">
                                <h6>فایل صوتی</h6>
                                <audio controls="">
                                    <source src="{{asset('amozesh/level'.$file->level_id.'/sound/'.$file->path_file1)}}"
                                            type="audio/mp3">
                                    مرورگر شما پشتیبانی نمیکند
                                </audio>
                            </div>
                        @endif

                        @if($file->file1=='video')
                            <div class="col s12 m12">
                                <h6>فایل ویدیویی</h6>


                                <video controls="">
                                    <source src="{{asset('amozesh/level'.$file->level_id.'/video/'.$file->path_file1)}}"
                                            type="video/mp4">
                                    مرورگر شما پشتیبانی نمیکند
                                </video>


                            </div>
                        @endif

                        @if($file->file1=='photos')
                            <div class="col s12 m12">
                                <h6>فایل تصویری</h6>
                                <div class="col s12 m12">
                                    <img src="{{asset('amozesh/level'.$file->level_id.'photos'.$file->path_file1)}}">
                                </div>
                            </div>
                        @endif


                            @if($file->file2=='pdf')
                                <div class="col s12 m12">
                                    <h6>فایل PDF</h6>
                                    <div class="col s12 m12">
                                        <object width="100%" height="200" type=""
                                                data="{{asset('amozesh/level'.$file->level_id.'/pdf/'.$file->path_file2)}}"></object>
                                    </div>
                                </div>
                            @endif

                            @if($file->file2=='sound')
                                <div class="col s12 m12">
                                    <h6>فایل صوتی</h6>
                                    <audio controls="">
                                        <source src="{{asset('amozesh/level'.$file->level_id.'/sound/'.$file->path_file2)}}"
                                                type="audio/mp3">
                                        مرورگر شما پشتیبانی نمیکند
                                    </audio>
                                </div>
                            @endif

                            @if($file->file2=='video')
                                <div class="col s12 m12">
                                    <h6>فایل ویدیویی</h6>


                                    <video controls="">
                                        <source src="{{asset('amozesh/level'.$file->level_id.'/video/'.$file->path_file2)}}"
                                                type="video/mp4">
                                        مرورگر شما پشتیبانی نمیکند
                                    </video>


                                </div>
                            @endif

                            @if($file->file2=='photos')
                                <div class="col s12 m12">
                                    <h6>فایل تصویری</h6>
                                    <div class="col s12 m12">
                                        <img src="{{asset('amozesh/level'.$file->level_id.'photos'.$file->path_file2)}}">
                                    </div>
                                </div>
                            @endif


                            @if($file->file3=='pdf')
                                <div class="col s12 m12">
                                    <h6>فایل PDF</h6>
                                    <div class="col s12 m12">
                                        <object width="100%" height="200" type=""
                                                data="{{asset('amozesh/level'.$file->level_id.'/pdf/'.$file->path_file3)}}"></object>
                                    </div>
                                </div>
                            @endif

                            @if($file->file3=='sound')
                                <div class="col s12 m12">
                                    <h6>فایل صوتی</h6>
                                    <audio controls="">
                                        <source src="{{asset('amozesh/level'.$file->level_id.'/sound/'.$file->path_file3)}}"
                                                type="audio/mp3">
                                        مرورگر شما پشتیبانی نمیکند
                                    </audio>
                                </div>
                            @endif

                            @if($file->file3=='video')
                                <div class="col s12 m12">
                                    <h6>فایل ویدیویی</h6>


                                    <video controls="">
                                        <source src="{{asset('amozesh/level'.$file->level_id.'/video/'.$file->path_file3)}}"
                                                type="video/mp4">
                                        مرورگر شما پشتیبانی نمیکند
                                    </video>


                                </div>
                            @endif

                            @if($file->file3=='photos')
                                <div class="col s12 m12">
                                    <h6>فایل تصویری</h6>
                                    <div class="col s12 m12">
                                        <img src="{{asset('amozesh/level'.$file->level_id.'photos'.$file->path_file3)}}">
                                    </div>
                                </div>
                            @endif


                            @if($file->file4=='pdf')
                                <div class="col s12 m12">
                                    <h6>فایل PDF</h6>
                                    <div class="col s12 m12">
                                        <object width="100%" height="200" type=""
                                                data="{{asset('amozesh/level'.$file->level_id.'/pdf/'.$file->path_file4)}}"></object>
                                    </div>
                                </div>
                            @endif

                            @if($file->file4=='sound')
                                <div class="col s12 m12">
                                    <h6>فایل صوتی</h6>
                                    <audio controls="">
                                        <source src="{{asset('amozesh/level'.$file->level_id.'/sound/'.$file->path_file4)}}"
                                                type="audio/mp3">
                                        مرورگر شما پشتیبانی نمیکند
                                    </audio>
                                </div>
                            @endif

                            @if($file->file4=='video')
                                <div class="col s12 m12">
                                    <h6>فایل ویدیویی</h6>


                                    <video controls="">
                                        <source src="{{asset('amozesh/level'.$file->level_id.'/video/'.$file->path_file4)}}"
                                                type="video/mp4">
                                        مرورگر شما پشتیبانی نمیکند
                                    </video>


                                </div>
                            @endif

                            @if($file->file4=='photos')
                                <div class="col s12 m12">
                                    <h6>فایل تصویری</h6>
                                    <div class="col s12 m12">
                                        <img src="{{asset('amozesh/level'.$file->level_id.'photos'.$file->path_file4)}}">
                                    </div>
                                </div>
                            @endif

{{--                            <iframe src="https://docs.google.com/viewerng/viewer?url={{asset('amozesh/level'.$file->level_id.'/pdf/'.$file->path_file4)}}&embedded=true" frameborder="0" height="400px" width="100%">--}}
{{--                            </iframe>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
