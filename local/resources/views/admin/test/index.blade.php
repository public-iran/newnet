@extends('admin.layout.master')

@section('style')
    <style>
        form {

            width: unset !important;
            margin-right: 9px;
        }

        .row .col > i {
            float: right;
            line-height: 3.3rem;
        }

        .row .col p {
            float: right;
            max-width: 93%;
        }

        .row {
            margin-bottom: 0;
        }


        .collection-header {
            height: 67px;
            overflow-y: auto;
        }

        h6, p {
            font-size: 11pt;
        }

        .report {
            display: inline-block;
            margin: 0;
        }

        .report li {
            float: right;
            margin: 10px 20px 0;
        }
        .inactive{
            opacity: 0.5;
        }
        .ul-scroll {
            max-height: 290px;
            overflow-y: auto;
        }
        .body ul{
            padding-right:5px;
        }
        .body ul li{
            list-style: persian;
        }
        .dropdown-menu li i{
            margin: 0 0 0 5px !important;
        }
        .question{
            height: 265px;
            margin-bottom: 55px;
        }
        .question .card .body{
            height: 210px;
            overflow-y: auto;
        }
        .question .card .header{
            height: 90px;
            overflow-y: auto;
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
    <div class="row main-index Test">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">



            @if(session('insert-test') and session('insert-test')=='success')
                <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    سوال جدید با موفقیت <strong>ثبت شد!</strong>
                </div>
            @endif

            @if(session('edit-test') and session('edit-test')=='success')
                <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    سوال با موفقیت <strong>ویرایش شد!</strong>
                </div>
            @endif

            @if(session('delete-test') and session('delete-test')=='success')
                <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    سوال با موفقیت <strong>ویرایش شد!</strong>
                </div>
            @endif

            <?php
            Session::forget('insert-test');
            Session::forget('edit-test');
            Session::forget('delete-test');
            ?>

            <div class="card">
                <div class="header" style="">
                    <a href="{{route('education.show',$level_id)}}" style="float:left;margin-top: -2px" type="button" class="btn btn-default btn-circle waves-effect waves-circle waves-float">
                        <i class="material-icons">reply</i>
                    </a>
                    {!! Form::open(['method'=>'post','action'=>'Admin\AdminTestController@create_test','style'=>'display:inline-block']) !!}
                    <input type="hidden" name="level" value="{{$level_id}}">
                    <input type="hidden" name="surface" value="{{$surface_id}}">
                    <button style="float: right" type="submit" class="btn btn-primary btn-circle waves-effect waves-circle waves-float">
                        <i class="material-icons">add</i>
                    </button>
                    {!! Form::close() !!}

{{--                    <ul class="report">--}}
{{--                        <li>--}}
{{--                            تعداد سوالات : {{$tests->count()}}--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            جمع نمرات : {{$tests->count()*2}}--}}
{{--                        </li>--}}
{{--                    </ul>--}}
                </div>

                    <div class="container-fluid">
                        <div class="block-header">
                            <h2> </h2>
                        </div>
                        <!-- Basic Example -->
                        <div class="row clearfix">
                            @foreach($tests as $test)
                            <div class="question col-lg-4 col-md-4 col-sm-6 col-xs-12 @if($test->status=='INACTIVE') inactive @endif">
                                <div class="card">
                                    <div class="header bg-red">
                                        <h2>
                                           <small>{{$test->question}}</small>
                                        </h2>
                                        <ul class="header-dropdown m-r--5">
                                            <li class="dropdown">
                                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                    <i class="material-icons">more_vert</i>
                                                </a>
                                                <ul class="dropdown-menu pull-right">
                                                    <li class="status">@if($test->status=='INACTIVE') <a onclick="ACTIVE({{$test->id}},this)" href="javascript:void(0);"><i style="color: #666 !important;" class="material-icons">radio_button_checked</i> فعال</a> @else <a onclick="INACTIVE({{$test->id}},this)" href="javascript:void(0);">غیر فعال<i style="color: #666 !important;" class="material-icons">radio_button_unchecked</i> </a>@endif</li>
                                                    <li><a href="{{route('test.edit',$test->id)}}"><i style="color: #666 !important;" class="material-icons">mode_edit</i> ویرایش</a></li>

                                                    <li>
                                                        <a onclick="delete_test({{$test->id}},this)" href="javascript:void(0);"><i style="color: #666 !important;" class="material-icons">delete</i> حذف</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="body">
                                        <ul>
                                            <li style="@if($test->answer==1)color: #2ba723;@endif">{{$test->answer1}}</li>
                                            <li style="@if($test->answer==2)color: #2ba723;@endif">{{$test->answer2}}</li>
                                            <li style="@if($test->answer==3)color: #2ba723;@endif">{{$test->answer3}}</li>
                                            <li style="@if($test->answer==4)color: #2ba723;@endif">{{$test->answer4}}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>

            </div>
        </div>
    </div>

@endsection
@section('script')
    <script>
        function delete_test(id,tag){
            Swal.fire({
                title: ' سوال حذف شود',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'بله حذف شود!',
                cancelButtonText: 'لغو'
            }).then((result) => {
                if (result.value) {
                    var CSRF_TOKEN ='{{ csrf_token() }}';
                    var url='{{route('delete_test')}}';
                    var data={_token: CSRF_TOKEN,id:id};
                    $.post(url,data,function (msg) {
                        if(msg=='true'){
                            $(tag).parents('.question').remove();
                        }
                    })
                }
            })
        }



        function INACTIVE(id,tag)
        {
            var value='INACTIVE';
            var CSRF_TOKEN ='{{ csrf_token() }}';
            $.ajax({
                url: '{{route('test_status')}}',
                type: 'POST',
                data: {_token: CSRF_TOKEN, value:value,id:id},
                dataType: 'JSON',
                success: function (data) {
                    if (data=='true'){
                        $(tag).parents('.question').toggleClass('inactive')
                        $('.status').empty();
                        $('.status').append(' <a onclick="ACTIVE('+id+',this)" href="javascript:void(0);"><i style="color: #666 !important;" class="material-icons">radio_button_checked</i> فعال</a> ');
                    }
                }
            });
        }

        function ACTIVE(id,tag)
        {
            var value='ACTIVE';
            var CSRF_TOKEN ='{{ csrf_token() }}';
            $.ajax({
                url: '{{route('test_status')}}',
                type: 'POST',
                data: {_token: CSRF_TOKEN, value:value,id:id},
                dataType: 'JSON',
                success: function (data) {
                    if (data=='true'){
                        $(tag).parents('.question').toggleClass('inactive');
                        $(tag).empty();
                        $(tag).append('<a onclick="INACTIVE('+id+',this)" href="javascript:void(0);"><i style="color: #666 !important;" class="material-icons">radio_button_unchecked</i> غیر فعال</a>');
                    }
                }
            });
        }

        $('.Change').click(function () {
            var id=$(this).val();
            var value='';
            var tag=this;
            if (this.checked) {
                value='ACTIVE';
            } else {
                value='INACTIVE';
            }
                {{--var url='{{route('getmsg')}}';--}}
                {{--var data={value:value};--}}
                {{--$.post(url,data,function (msg) {--}}
                {{--    alert(msg)--}}
                {{--})--}}
            var CSRF_TOKEN ='{{ csrf_token() }}';
            $.ajax({
                url: '{{route('test_status')}}',
                type: 'POST',
                data: {_token: CSRF_TOKEN, value:value,id:id},
                dataType: 'JSON',
                success: function (data) {
                    if (data=='true'){
                        $(tag).parents('.question').toggleClass('inactive')
                    }
                }
            });
        })
    </script>
@endsection


{{--@section('content')--}}
{{--    <div class="row">--}}
{{--        <div class="col m12 s12">--}}


{{--            <div class="col s12 m12">--}}

{{--                <div class="card-panel grey lighten-5 z-depth-1">--}}
{{--                    <a href="{{route('test.create')}}" class="waves-effect waves-light  btn"><i--}}
{{--                            class="material-icons right">note_add</i> افزودن سوال جدید</a>--}}

{{--                    <ul class="report">--}}
{{--                        <li>--}}
{{--                            تعداد سوالات : {{$tests->count()}}--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            جمع نمرات : {{$tests->count()*2}}--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}


{{--                @foreach($tests as $test)--}}
{{--                    <div class="col s12 m6 question @if($test->status=='INACTIVE') inactive @endif" >--}}
{{--                        <ul id="projects-collection" class="collection z-depth-1">--}}
{{--                            <li class="collection-item avatar">--}}
{{--                                <i class="material-icons cyan circle">sms_failed</i>--}}
{{--                                <h6 class="collection-header m-0">{{$test->question}}</h6>--}}
{{--                            </li>--}}

{{--                            <ul class="ul-scroll">--}}
{{--                                <li class="collection-item">--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="col s11">--}}
{{--                                            <i class="material-icons ">priority_high</i>--}}
{{--                                            <p class="collections-title">{{$test->answer1}}</p>--}}
{{--                                        </div>--}}
{{--                                        @if($test->answer==1)--}}
{{--                                            <div class="col s1">--}}
{{--                                                <span class="task-cat green">جواب</span>--}}
{{--                                            </div>--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
{{--                                </li>--}}


{{--                                <li class="collection-item">--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="col s11">--}}
{{--                                            <i class="material-icons ">priority_high</i>--}}
{{--                                            <p class="collections-title">{{$test->answer2}}</p>--}}
{{--                                        </div>--}}
{{--                                        @if($test->answer==2)--}}
{{--                                            <div class="col s1">--}}
{{--                                                <span class="task-cat green">جواب</span>--}}
{{--                                            </div>--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
{{--                                </li>--}}

{{--                                <li class="collection-item">--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="col s11">--}}
{{--                                            <i class="material-icons ">priority_high</i>--}}
{{--                                            <p class="collections-title">{{$test->answer3}}</p>--}}
{{--                                        </div>--}}
{{--                                        @if($test->answer==3)--}}
{{--                                            <div class="col s1">--}}
{{--                                                <span class="task-cat green">جواب</span>--}}
{{--                                            </div>--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
{{--                                </li>--}}

{{--                                <li class="collection-item">--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="col s11">--}}
{{--                                            <i class="material-icons ">priority_high</i>--}}
{{--                                            <p class="collections-title">{{$test->answer4}}</p>--}}
{{--                                        </div>--}}
{{--                                        @if($test->answer==4)--}}
{{--                                            <div class="col s1">--}}
{{--                                                <span class="task-cat green">جواب</span>--}}
{{--                                            </div>--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                            </ul>--}}



{{--                            <li class="collection-item">--}}

{{--                                {!! Form::open(['method' => 'DELETE', 'action' => ['Admin\AdminTestController@destroy',$test->id]]) !!}--}}
{{--                                <a class="delete btn-floating waves-effect waves-light red " type="submit"><i--}}
{{--                                        class="material-icons left">delete</i></a>--}}
{{--                                {{Form::close()}}--}}
{{--                                <a href="{{route('test.edit',$test->id)}}" style="float: left"--}}
{{--                                   class="btn-floating waves-effect waves-light amber" type="submit"><i--}}
{{--                                        class="material-icons left">mode_edit</i></a>--}}

{{--                                <div class="switch" style="margin-top: 10px">--}}
{{--                                    <label>--}}
{{--                                        فعال--}}
{{--                                        <input value="{{$test->id}}" @if($test->status=='ACTIVE') checked @endif type="checkbox"--}}
{{--                                               class="Change">--}}
{{--                                        <span class="lever"></span>--}}
{{--                                        غیرفعال--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                            </li>--}}

{{--                        </ul>--}}
{{--                    </div>--}}


{{--                @endforeach--}}



{{--                {{$tests->links()}}--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </div>--}}

{{--@endsection--}}
{{--@section('script')--}}
{{--    <script>--}}
{{--        $('.delete').click(function () {--}}
{{--            Swal.fire({--}}
{{--                title: ' سوال حذف شود',--}}
{{--                icon: 'warning',--}}
{{--                showCancelButton: true,--}}
{{--                confirmButtonColor: '#3085d6',--}}
{{--                cancelButtonColor: '#d33',--}}
{{--                confirmButtonText: 'بله حذف شود!',--}}
{{--                cancelButtonText: 'لغو'--}}
{{--            }).then((result) => {--}}
{{--                if (result.value) {--}}
{{--                    $('form').submit();--}}
{{--                }--}}
{{--            })--}}
{{--        });--}}


{{--        $('.Change').click(function () {--}}
{{--            var id=$(this).val();--}}
{{--            var value='';--}}
{{--            var tag=this;--}}
{{--            if (this.checked) {--}}
{{--                    value='ACTIVE';--}}
{{--            } else {--}}
{{--                value='INACTIVE';--}}
{{--            }--}}
{{--            --}}{{--var url='{{route('getmsg')}}';--}}
{{--            --}}{{--var data={value:value};--}}
{{--            --}}{{--$.post(url,data,function (msg) {--}}
{{--            --}}{{--    alert(msg)--}}
{{--            --}}{{--})--}}
{{--            var CSRF_TOKEN ='{{ csrf_token() }}';--}}
{{--            $.ajax({--}}
{{--                url: '{{route('test_status')}}',--}}
{{--                type: 'POST',--}}
{{--                data: {_token: CSRF_TOKEN, value:value,id:id},--}}
{{--                dataType: 'JSON',--}}
{{--                success: function (data) {--}}
{{--                    if (data=='true'){--}}
{{--                        $(tag).parents('.question').toggleClass('inactive')--}}
{{--                    }--}}
{{--                }--}}
{{--            });--}}
{{--        })--}}
{{--    </script>--}}
{{--@endsection--}}
