@extends('admin.layout.master')

@section('style')
    <style>
        .input-field span {
            font-size: 8pt;
        }

        select {
            margin-top: 19px;
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col m8 s12">

            <div class="col s12 m12">

                <div class="card-panel grey lighten-5 z-depth-1">
                    <h5>افزودن فایل</h5>
                </div>

                <div class="card-panel grey lighten-5 z-depth-1">
                    <div class="row valign-wrapper">

                        {!! Form::open(['method'=>'post','action'=>'Admin\AdminFileController@store','files'=>true]) !!}
                        <div class="col s12 m12">
                            <div class="input-field">
                                {!! Form::text('name', null, ['class' => 'validate', 'id' => 'cashyears','required']) !!}
                                {!! Form::label('name', 'نام فایل را وارد کنید') !!}
                            </div>
                        </div>
                        <div class="col s12 m12">
                            <div class="input-field">
                                {!! Form::label('level', 'سطح آموزشی را انتخاب کنید') !!}
                                {!! Form::select('level',$levels,1,['class'=>'validate']) !!}

                            </div>
                        </div>

                        <div class="col s12 m12">
                            <div class="input-field">
                                {!! Form::label('surface', ' مرحله آموزش را انتخاب کنید') !!}
                                {!! Form::select('surface',$surfaces,1,['class'=>'validate']) !!}

                            </div>
                        </div>


                        <div class="col s12 m12">

                            <div class="col s12 m12">
                                <div class="col s3 m3">
                                    <select required name="file1" class="browser-default">
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
                                    <select required name="file2" class="browser-default">
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
                                    <select required name="file3" class="browser-default">
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
                                    <select required name="file4" class="browser-default">
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


                    </div>
                    <div class="">
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

    </div>


@endsection
