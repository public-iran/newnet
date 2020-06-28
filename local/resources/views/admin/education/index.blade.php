@extends('admin.layout.master')

@section('style')
    <style>
        .header{
            float: right;
            width: 100%;

        }
        .clearfix .card .header{
            padding-bottom: 10px!important;
        }
        .header h2{
            margin-top: 5px !important;
        }
        .header > div{
            float: right;
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
        .card{
            width: 100%;
            float: right;
            box-shadow: 0 2px 22px rgba(0, 0, 0, 0.2);
        }
        .row.clearfix > div{
            float: right;
        }
        .card .header h2 small:first-child {
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
        .card .education{
            width: 150px;
            height: 150px;
            background-size: cover!important;
            line-height: 150px;
            font-size: 20pt;
        }
        .card > div.header a{
            float: left;
        }
        .card > div.header h4{
            float: right;
        }
        .educations a{
            margin-bottom: 20px;
        }
    </style>
@endsection




@section('content')

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
                <div class="header" style="margin-bottom: 20px">
                      {{--  <a href="{{route('education.create')}}" type="button" class="btn btn-primary btn-circle waves-effect waves-circle waves-float">
                            <i class="material-icons">add</i>
                        </a>--}}
                    <h4>
                        مدیریت آموزش ها
                    </h4>
                </div>
                <div class="body">
                    <div class="row clearfix educations align-center">

                        <a href="{{route('education.show',1)}}" type="button" class="btn btn-primary btn-circle waves-effect waves-circle waves-float education  waves-light" style="background: url({{asset('images/background/white.svg')}}) no-repeat;">
                            Beginner
                        </a>

                        <a href="{{route('education.show',2)}}" type="button" class="btn btn-primary btn-circle waves-effect waves-circle waves-float education  waves-light" style="background: url({{asset('images/background/yellow.svg')}}) no-repeat;">
                            Presentor
                        </a>

                        <a href="{{route('education.show',3)}}" type="button" class="btn btn-primary btn-circle waves-effect waves-circle waves-float education  waves-light" style="background: url({{asset('images/background/green.svg')}}) no-repeat;">
                            Trainer
                        </a>

                        <a href="{{route('education.show',4)}}" type="button" class="btn btn-primary btn-circle waves-effect waves-circle waves-float education  waves-light" style="background: url({{asset('images/background/blue.svg')}}) no-repeat;">
                            Adviser
                        </a>

                        <a href="{{route('education.show',5)}}" type="button" class="btn btn-primary btn-circle waves-effect waves-circle waves-float education  waves-light" style="background: url({{asset('images/background/red.svg')}}) no-repeat;">
                            Leader
                        </a>

                        <a href="{{route('education.show',6)}}" type="button" class="btn btn-primary btn-circle waves-effect waves-circle waves-float education  waves-light" style="background: url({{asset('images/background/banafsh.svg')}}) no-repeat;">
                            Top Leader
                        </a>

                        <a href="{{route('education.show',7)}}" type="button" class="btn btn-primary btn-circle waves-effect waves-circle waves-float education  waves-light" style="background: url({{asset('images/background/black.svg')}}) no-repeat;">
                            Master
                        </a>


                   {{--     @elseif($education->level==2)
                            Presenter
                        @elseif($education->level==3)
                            Trainer
                        @elseif($education->level==4)
                            Advisor
                        @elseif($education->level==5)
                            Leader
                        @elseif($education->level==6)
                            Top Leader
                        @elseif($education->level==7)
                            Masster
                        @endif--}}

                       {{-- <a href="{{route('education.show',2)}}" type="button" class="btn btn-primary btn-circle waves-effect waves-circle waves-float education  waves-light" style="@if($education->level==1)
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
                            ">
                            @if($education->level==1)
                                Beginner
                            @elseif($education->level==2)
                                Presenter
                            @elseif($education->level==3)
                                Trainer
                            @elseif($education->level==4)
                                Advisor
                            @elseif($education->level==5)
                                Leader
                            @elseif($education->level==6)
                                Top Leader
                            @elseif($education->level==7)
                                Masster
                            @endif
                        </a>
--}}
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
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'بله حذف شود!',
                cancelButtonText: 'لغو'
            }).then((result) => {
                if (result.value) {
                    var CSRF_TOKEN ='{{ csrf_token() }}';
                    var url='{{route('delete_educations')}}';
                    var data={_token: CSRF_TOKEN,id:id};
                    $.post(url,data,function (msg) {
                        if(msg=='true'){
                            $(tag).parents('.education').remove();
                        }
                    })
                }
            })
        }

        function education_search()
        {
            var value=$('input[name=search]').val();
            var CSRF_TOKEN ='{{ csrf_token() }}';
            var url='{{route('education_search')}}';
            var data={_token: CSRF_TOKEN,value:value};
            $.post(url,data,function (msg) {

                $('.educations').empty();
                $('.educations').append(msg);
            })
        }

    </script>
@endsection
