@extends('admin.layout.master')

@section('style')
    <style>
        .clearfix .card{
            float: right;
            background-size: 100% !important;
        }
        .card .header{
            float: right;
            width: 100%;
            padding: 10px 20px 1px;
        }
        .card .header h2{
            margin-top: 5px !important;
            color: #fff;
            margin-bottom: 7px;
        }
        .card .header .image{
            float: right;
            margin-left: 5px;
            border-radius: 2px;
            overflow: hidden;
        }
        .card .body{

}
        .card .header > div {
            float: right;
            padding: 0;
            margin-bottom: 5px !important;
        }
        .clearfix .card .body{
            float: right;
            width: 100%;
            background: url({{asset('images/Front.png')}})no-repeat;
            background-size: 100% 95%;
            margin-bottom: 10px;
            padding: 10px 10px 0;
        }
        .clearfix .card .body div{
            float: right;
            color: #fff;
        }
        .clearfix .card .body div:first-child{
            padding: 0;
        }
        .clearfix .card .body div:last-child span{
            float: right;
            width: 100%;
            text-align: center;
            margin-top: 10px;
            background: #ccc;
            border-radius: 3px;
            line-height: 24px;
        }
        .clearfix .card .body div:last-child{
            float: left;
            padding: 0;
        }
        .clearfix .card .body div:last-child .image{
            width: 100%;
        }
        .clearfix .card .body div:last-child .image img{
            width: 100%;
            height: 100%;
            border-radius: 3px;
        }
        .clearfix .card .body div h6{
            float: right;
            width: 100%;
            font-size: 11pt;
        }
        .clearfix .card .body div h5{
            padding-right: 20px;
        }
    </style>
@endsection

@section('content')
    <div class="row main-index identification-card">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<?php
            $v = verta();

            $v = new Verta();
?>


            <div class="card">
                <div class="header" style="margin-bottom: 52px;">

                </div>
                <div class="body">
                    <div class="row clearfix">

                            <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12 col-md-offset-4" >
                                <div class="card" style="background: #459648">
                                    <div class="header">

                                        <div class="col-md-10 col-xs-10">
                                            <h2>
                                                وحدت رویاها
                                            </h2>
                                        </div>
                                        <div class="col-md-2 col-xs-2">

                                     {{--   <div class="photos">
                                            @if($user->avatar=='')
                                                <img src="{{asset('images/user.png')}}" width="48" height="48" alt="User" />
                                            @else
                                                <img src="{{asset('images/user_profile/'.$user->avatar)}}" width="48" height="48" alt="User" />
                                            @endif
                                        </div>--}}
                                        </div>
                                        <h6>
                                            @if($user->month==1)
                                            <span class="badge bg-cyan">فروشنده برتر ماه</span>
                                            @endif
                                                @if($user->week==1)
                                            <span class="badge bg-teal">فروشنده برتر هفته</span>
                                                @endif
                                        </h6>

                                    </div>

                                    <div class="body">
                                            <div class="col-md-8 col-xs-8">
                                                <h6>شماره ملی :
                                                    <span>{{$user->national_code}}</span>
                                                </h6>

                                                <h6>نام و نام خانوادگی :
                                                    <span>{{$user->name}}</span>
                                                </h6>

                                                <h6>تاریخ ثبت نام :
                                                    <span>{{Verta::instance($user->created_at)->format('%B %d، %Y')}}</span>
                                                </h6>

                                            </div>
                                            <div class="col-md-4 col-xs-4 ">
                                                <div class="image">
                                                    @if($user->avatar=='')
                                                        <img src="{{asset('images/user.png')}}" width="48" height="48" alt="User" />
                                                    @else
                                                        <img src="{{asset('images/user_profile/'.$user->avatar)}}" width="48" height="48" alt="User" />
                                                    @endif
                                                </div>
                                                <span style="@if(@$user->level==1)
                                                    background: url({{asset('images/background/white.svg')}}) no-repeat;
                                                @elseif(@$user->level==2)
                                                    background: url({{asset('images/background/yellow.svg')}}) no-repeat;
                                                @elseif(@$user->level==3)
                                                    background: url({{asset('images/background/green.svg')}}) no-repeat;
                                                @elseif(@$user->level==4)
                                                    background: url({{asset('images/background/blue.svg')}}) no-repeat;
                                                @elseif(@$user->level==5)
                                                    background: url({{asset('images/background/red.svg')}}) no-repeat;
                                                @elseif(@$user->level==6)
                                                    background: url({{asset('images/background/banafsh.svg')}}) no-repeat;
                                                @elseif(@$user->level==7)
                                                    background: url({{asset('images/background/black.svg')}}) no-repeat;
                                                @endif;background-size: cover;
                                                ">{{$user->reference_code}}</span>
                                            </div>
                                    </div>

                                </div>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('content_user')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <?php
            $v = verta();

            $v = new Verta();
            ?>


            <div class="card">
                <div class="header">

                </div>
                <div class="body">
                    <div class="row clearfix">

                        <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12" >
                            <div class="card" style="background: #459648">
                                <div class="header">

                                    <div class="col-md-10 col-xs-10">
                                        <h2>
                                            شرکت بازاریابی شبکه ای
                                        </h2>
                                    </div>
                                    <div class="col-md-2 col-xs-2">

                                        {{--   <div class="photos">
                                               @if($user->avatar=='')
                                                   <img src="{{asset('images/user.png')}}" width="48" height="48" alt="User" />
                                               @else
                                                   <img src="{{asset('images/user_profile/'.$user->avatar)}}" width="48" height="48" alt="User" />
                                               @endif
                                           </div>--}}
                                    </div>
                                    <h6>
                                        @if($user->month==1)
                                            <span class="badge bg-cyan">فروشنده برتر ماه</span>
                                        @endif
                                        @if($user->week==1)
                                            <span class="badge bg-teal">فروشنده برتر هفته</span>
                                        @endif
                                    </h6>

                                </div>

                                <div class="body">
                                    <div class="col-md-8 col-xs-8">
                                        <h6>شماره ملی :
                                            <span>{{$user->national_code}}</span>
                                        </h6>

                                        <h6>نام و نام خانوادگی :
                                            <span>{{$user->name}}</span>
                                        </h6>

                                        <h6>تاریخ ثبت نام :
                                            <span>{{Verta::instance($user->created_at)->format('%B %d، %Y')}}</span>
                                        </h6>

                                    </div>
                                    <div class="col-md-4 col-xs-4 ">
                                        <div class="image">
                                            @if($user->avatar=='')
                                                <img src="{{asset('images/user.png')}}" width="48" height="48" alt="User" />
                                            @else
                                                <img src="{{asset('images/user_profile/'.$user->avatar)}}" width="48" height="48" alt="User" />
                                            @endif
                                        </div>
                                        <span style="@if(@$user->level==1)
                                            background: url({{asset('images/background/white.svg')}}) no-repeat;
                                        @elseif(@$user->level==2)
                                            background: url({{asset('images/background/yellow.svg')}}) no-repeat;
                                        @elseif(@$user->level==3)
                                            background: url({{asset('images/background/green.svg')}}) no-repeat;
                                        @elseif(@$user->level==4)
                                            background: url({{asset('images/background/blue.svg')}}) no-repeat;
                                        @elseif(@$user->level==5)
                                            background: url({{asset('images/background/red.svg')}}) no-repeat;
                                        @elseif(@$user->level==6)
                                            background: url({{asset('images/background/banafsh.svg')}}) no-repeat;
                                        @elseif(@$user->level==7)
                                            background: url({{asset('images/background/black.svg')}}) no-repeat;
                                        @endif;background-size: cover;
                                            ">{{$user->reference_code}}</span>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script>
        $('.delete').click(function () {
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
                    $('form').submit();
                }
            })
        })

    </script>
@endsection
