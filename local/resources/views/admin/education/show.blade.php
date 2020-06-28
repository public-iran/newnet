@extends('admin.layout.master')

@section('style')
    <style>
        .header{
            float: right;
            width: 100%;

        }
        .clearfix .card .header{
            padding-bottom: 0!important;
        }
        .header h2{
            margin-top: 5px !important;
        }
        .header > div{
            float: left;
        }
        .header > div a{
            float: left;
            margin-top: -10px;
            margin-right: 10px;
        }
        .header .col-md-2{
            padding: 0;
        }
        .header h2 span{
            font-weight: 700;
        }
        .header .image{
            float: right;
            margin-left: 5px;
            border-radius: 100%;
            overflow: hidden;
        }
        .header h4{
            float: right;
        }
        .card{
            width: 100%;
            float: right;
            box-shadow: 0 2px 22px rgba(0, 0, 0, 0.2);
        }
        .row.clearfix > div{
            float: right;
        }
        .card .header h2 small {
            border-bottom: 1px solid  #38bcec;
            padding: 3px;
        }
        .card .header .header-dropdown i {
            font-size: 20px;
            color: #38bcec;
        }

        .status-inactive{
            width: 100%;
            text-align: center;
        }
        .status-inactive i{
            margin-left: 4px;
            color: #e74747;
        }


        .form_test{
            float: right;
            width: 100%;
        }
        .form_test button{
            border: none;
            width: 100%;
            background: none;
            padding-right: 25px;
            padding-left: 76px;
        }
        .form_test button i{
            float: right;margin-left: 7px
        }
        .dropdown-menu li{
            cursor: pointer;
        }
        .card .body.b{
            float: right;
            width: 100%;
            background-size: cover!important;
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

    <div class="row main-index education">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">


            @if(session('insert-file') and session('insert-file')=='success')
                <div class="alert bg-green alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    آموزش جدید با موفقیت ثبت شد!
                </div>
            @endif

            @if(session('edit-Education') and session('edit-Education')=='success')
                    <div class="alert bg-green alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                         آموزش با موفقیت بروزرسانی شد!
                    </div>
            @endif

            @if(session('delete-Education') and session('delete-Education')=='success')
                    <div class="alert bg-green alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                         آموزش با موفقیت حذف شد!
                    </div>
            @endif
                <?php
                Session::forget('insert-Education');
                Session::forget('edit-Education');
                Session::forget('delete-Education');
                ?>

            <div class="card">
                <div class="header" style="   margin-bottom: 20px;">
                    <h4 style="margin-bottom: 16px;">
                        مدیریت آموزش سطح {{$level}}
                    </h4>
                    <div class="col-md-2">
                        <a href="{{route('education.index')}}" type="button" class="btn btn-default btn-circle waves-effect waves-circle waves-float">
                            <i class="material-icons">reply</i>
                        </a>

                        <a href="{{route('education.create')}}" type="button" class="btn btn-primary btn-circle waves-effect waves-circle waves-float">
                            <i class="material-icons">add</i>
                        </a>

                    </div>


                    <div class="col-md-3 col-xs-12">
                        <div class="form-group">
                            <div class="form-line">
                                <input name="search" onkeyup="education_search()" type="text" class="form-control" placeholder="جستجو">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="body">
                    <div class="row clearfix educations">
                        <?php $i=0;

                        ?>
                        @if($educations)
                        @foreach($educations as $education)

                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 education rem">
                                <div class="card">
                                    <div class="header">



                                            <h2>

                                                <small>عنوان آموزش : <span>{{$education->title}}</span></small>
                                                <small>سطح آموزش : <span>{{$education->level}}</span></small>
                                                <small> مرحله : <span>{{$education->surface}}</span></small>
                                                <small style="border: none;height: 51px;overflow-y: auto">توضیحات  : <span>مرحله {{$education->surface}}
                                        شامل
                                        {{$education->shamel}}
                                        می باشد که در طی زمانی
                                        {{$education->zaman}}
                                        باید انجام شود.</span></small>

                                            </h2>




                                        <ul class="header-dropdown m-r--5">
                                            <li class="dropdown">
                                                <a href="javascript:void(0);" class="dropdown-toggle"
                                                   data-toggle="dropdown" role="button" aria-haspopup="true"
                                                   aria-expanded="false">
                                                    <i class="material-icons">more_vert</i>
                                                </a>

                                                <ul class="dropdown-menu pull-right">
                                                    <li><a href="{{route('education.edit',$education->id)}}">ویرایش<i style="color: #666 !important;" class="material-icons">mode_edit</i></a></li>
                                                    <li>
                                                        {!! Form::open(['method'=>'post','class'=>'form_test','action'=>'Admin\AdminTestController@show_index','style'=>'display:inline-block']) !!}
                                                        <input type="hidden" name="level" value="{{$education->level}}">
                                                        <input type="hidden" name="surface" value="{{$education->surface}}">
                                                        <button type="submit">
                                                            <i class="material-icons">blur_linear</i>
                                                            آزمون

                                                        </button>

                                                        {!! Form::close() !!}
                                                    </li>

                                                    <li><a onclick="delete_education({{$education->id}},this)">حذف<i class="material-icons">delete</i></a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>

                                    <div style="  @if($education->level==1)
                                        background: url({{asset('images/background/white.svg')}}) no-repeat;
                                    @elseif($education->level==2)
                                        background: url({{asset('images/background/yellow.svg')}}) no-repeat;
                                    @elseif($education->level==3)
                                        background: url({{asset('images/background/green.svg')}}) no-repeat;
                                    @elseif($education->level==4)
                                        background: url({{asset('images/background/blue.svg')}}) no-repeat;
                                    @elseif($education->level==5)
                                        background: url({{asset('images/background/red.svg')}}) no-repeat;
                                    @elseif($education->level==6)
                                        background: url({{asset('images/background/banafsh.svg')}}) no-repeat;
                                    @elseif($education->level==7)
                                        background: url({{asset('images/background/black.svg')}}) no-repeat;
                                    @endif
                                        "  class="body b">

                                    </div>
                                </div>
                            </div>
                            <?php $i++; ?>
                        @endforeach
                            @else
                                <div class="card">
                                    <div class="header">

                                        <h5>آموزشی ثبت نشده است !</h5>
                                    </div>
                                </div>
                            @endif
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection


@section('script')
    <script>
        function delete_education(id,tag) {
            Swal.fire({
                title: ' سوال حذف شود',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'بله حذف شود!',
                cancelButtonText: 'لغو'
            }).then((result) => {
                if (result.value) {
                    var CSRF_TOKEN ='{{ csrf_token() }}';
                    var url='{{route('delete_educations')}}';
                    var data={_token: CSRF_TOKEN,id:id};
                    $.post(url,data,function (msg) {

                        if(msg=='true'){
                            $(tag).parents('.education.rem').remove();
                        }
                    })
                }
            })
        }

        function education_search()
        {
            var value=$('input[name=search]').val();
            var level='{{$level}}';
            var CSRF_TOKEN ='{{ csrf_token() }}';
            var url='{{route('education_search')}}';
            var data={_token: CSRF_TOKEN,value:value,level:level};
            $.post(url,data,function (msg) {

                $('.educations').empty();
                $('.educations').append(msg);
            })
        }

    </script>
@endsection
