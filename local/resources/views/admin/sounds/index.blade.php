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

        .list-unstyled > div img{
            height: 100%;
            width: 100%;
        }

        .admin-clearfix > div{
            height: auto;

        }
        .admin-clearfix .main{
            border: 1px solid rgba(0,0,0,0.2);
            box-shadow: 0 0 10px 0 rgba(0,0,0,0.2);
        }
        .admin-clearfix .main .file-footer-buttons{
            padding: 0 5px 5px;
        }
        .admin-clearfix img{
            border: none;
        }
        .admin-clearfix a{
            height: 180px;
            display: inline-block;
        }
        .admin-clearfix small{
            text-align: center;
            display: block;
            height: 70px;
            overflow: hidden;
        }
        .photo ul{
            font-size: 8pt;
            padding-right: 10px;
        }
        .photo-user img{
            border: none;
            margin-bottom: 0;
        }
        .photo-user ul{
            font-size: 11px;
            padding: 4px 11px;
        }
        .photo-user a{
            box-shadow: 0 0 7px 2px #ccc;

            display: block;
        }
        .photo-user> div img{
            height: 223px;
            width: 100%;
        }
        a:hover, a:focus {

            color: #23527c;
            text-decoration: none;

        }
        .sound{
            box-shadow: 0 0 7px 2px #ccc;
            padding-top: 15px;
        }
    </style>
@endsection

@section('content_user')

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">


            @if(session('insert-video') and session('insert-video')=='success')
                <div class="alert bg-green alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    پادکست شما با موفقیت آپلود شد و بعد از تایید مدیر در سایت نمایش داده می شود.
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

            <div class="card">
                <div class="header" style="margin-bottom: 20px">
                    <a href="{{route('sounds.create')}}" type="button" class="btn btn-primary btn-circle waves-effect waves-circle waves-float">
                        <i class="material-icons">add</i>
                    </a>
                    <h4>
                         پادکست
                    </h4>
                </div>
                <div class="body">
                    <div class="container-fluid">
                        <!-- Image Gallery -->
                        <div class="block-header">

                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">


                                <div class="body" style="width: 100%">
                                    <div id="aniimated-thumbnials" class="list-unstyled row clearfix photo-user">
                                        @foreach($sounds as $sound)

                                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 sound">
                                                <audio controls="" style="width: 100%">
                                                    <source
                                                        src="{{asset('sounds/'.$sound->path)}}" type="audio/mp3">
                                                    مرورگر شما پشتیبانی نمیکند
                                                </audio>
                                                    <ul>
                                                        <li>استان : {{$sound->ostan}}</li>
                                                        <li>شهر : {{$sound->city}}</li>
                                                        <li>نوع : {{$sound->category}}</li>
                                                        <li>تاریخ بارگزاری : {{Verta::instance($sound->create_at)->format('Y/n/j')}}</li>
                                                    </ul>


                                            </div>
                                        @endforeach
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

@section('content')

    <div class="row main-index sounds">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">


            @if(session('insert-video') and session('insert-video')=='success')
                <div class="alert bg-green alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    پادکست شما با موفقیت آپلود شد.
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


            <div class="card">
                <div class="header" style="margin-bottom: 20px">
                        <a href="{{route('sounds.create')}}" type="button" class="btn btn-primary btn-circle waves-effect waves-circle waves-float">
                            <i class="material-icons">add</i>
                        </a>
                    <h4>
                        مدیریت پادکست
                    </h4>
                </div>
                <div class="body">
                    <div class="container-fluid">
                        <!-- Image Gallery -->
                        <div class="block-header">

                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">


                                    <div class="body">
                                        <div id="aniimated-thumbnials" class="list-unstyled row clearfix admin-clearfix">
                                            @foreach($sounds as $sound)

                                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 photo">
                                                <div class="main">
                                                    <audio controls="" style="width: 100%">
                                                        <source
                                                            src="{{asset('sounds/'.$sound->path)}}" type="audio/mp3">
                                                        مرورگر شما پشتیبانی نمیکند
                                                    </audio>
                                                    <small>{{$sound->name}}</small>
                                                    <ul>
                                                        <li>استان : {{$sound->ostan}}</li>
                                                        <li>شهر : {{$sound->city}}</li>
                                                        <li>نوع : {{$sound->category}}</li>
                                                        <li>تاریخ بارگزاری : {{Verta::instance($sound->create_at)->format('Y/n/j')}}</li>
                                                    </ul>
                                                    <div class="file-footer-buttons">
                                                        <button onclick="delete_photo('{{$sound->id}}','DELETE',this)" type="button" class="kv-file-remove btn btn-sm btn-kv btn-default btn-outline-secondary" title="حذف تصویر"><i class="material-icons">delete_forever</i></button>
                                                    @if($sound->status=='UNSEEN')
                                                        <button id="SEEN" onclick="status_photo('{{$sound->id}}','SEEN',this)" type="button" class="kv-file-upload btn btn-sm btn-kv btn-default btn-outline-secondary" title="نمایش"><i class="material-icons">visibility</i></button>
                                                        @else
                                                        <button id="UNSEEN" onclick="status_photo('{{$sound->id}}','UNSEEN',this)" type="button" class="kv-file-zoom btn btn-sm btn-kv btn-default btn-outline-secondary" title="عدم نمایش"><i class="material-icons">visibility_off</i></button>
                                                        @endif

                                                    </div>
                                                </div>

                                            </div>
                                                @endforeach
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

<?php
Session::forget('insert-photo');
Session::forget('edit-Education');
Session::forget('delete-Education');
?>

@section('script')
    <script>
        function delete_photo(id,status,tag) {
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
                    var url='{{route('status_sound')}}';
                    var data={_token: CSRF_TOKEN,id:id,status:status};
                    $.post(url,data,function (msg) {
                        if(msg=='true'){
                            $(tag).parents('.photo').remove();
                        }
                    })
                }
            })
        }

        function status_photo(id,status,tag) {
            var CSRF_TOKEN ='{{ csrf_token() }}';
            var url='{{route('status_sound')}}';
            var data={_token: CSRF_TOKEN,id:id,status:status};
            $.post(url,data,function (msg) {
                if(msg=='true'){
                    if(status=='SEEN'){
                        var UNSEEN="'UNSEEN'";
                        $(tag).parent().append('<button id="UNSEEN" onclick="status_photo('+id+','+UNSEEN+',this)" type="button" class="kv-file-zoom btn btn-sm btn-kv btn-default btn-outline-secondary" title="عدم نمایش"><i class="material-icons">visibility_off</i></button>');

                        $(tag).remove();
                    }
                    if(status=='UNSEEN'){
                        var SEEN="'SEEN'";
                        $(tag).parent().append('<button id="SEEN" onclick="status_photo('+id+','+SEEN+',this)" type="button" class="kv-file-upload btn btn-sm btn-kv btn-default btn-outline-secondary" title="نمایش"><i class="material-icons">visibility</i></button>')

                        $(tag).remove();
                    }
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
