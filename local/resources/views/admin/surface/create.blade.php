@extends('admin.layout.master')

@section('content')
    <div class="row">
        <div class="col m8 s12">


            <div class="col s12 m12">

                <div class="card-panel grey lighten-5 z-depth-1">
                    <h5>افزودن مراحل آموزشی</h5>
                </div>


                <div class="card-panel grey lighten-5 z-depth-1">
                    <div class="row valign-wrapper">

                        {!! Form::open(['method' => 'POST', 'action' => 'Admin\AdminSurfaceController@store','style'=>'width:100%']) !!}

                        <div class="col s12 m12 ">
                            <div class="input-field">
                                {!! Form::text('title', null, ['class' => 'validate', 'id' => 'cashyears','required']) !!}
                                {!! Form::label('title', 'عنوان مرحله را وارد کنید') !!}
                            </div>
                        </div>

                        <div class="col s12 m12">
                            <div class="input-field">
                                {!! Form::label('level', ' سطح آموزشی را انتخاب کنید') !!}
                                {!! Form::select('level',$levels,1,['class'=>'validate','required']) !!}

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
    </div>
@endsection
