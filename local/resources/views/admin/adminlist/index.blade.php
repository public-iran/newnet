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
        .writer i{
            position: absolute;
            top: -15px;
            right: -15px;
            font-size: 17px;
            color: #38bcec;
        }
        .dropdown-menu a {
            font-size: 10pt !important;

        }
        .card .body{
            float: right;
            width: 100%;
            background-size: cover!important;
        }
        .header .col-md-10{
            margin-bottom: 3px !important;
        }
        .header .col-md-10 h2 small:last-child{
            border-bottom: none;
        }
    </style>
@endsection
@section('content')
    <div class="row main-index">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

            @if(session('access-user') and session('access-user')=='success')
                <div class="alert bg-green alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    دسترسی های جدید با موفقیت ثبت شد!
                </div>
            @endif

            @if(session('edit-users') and session('edit-users')=='success')
                <div class="alert bg-green alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    کاربر با موفقیت بروزرسانی شد!
                </div>
            @endif

            @if(session('delete-users') and session('delete-users')=='success')
                <div class="alert bg-green alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    کاربر با موفقیت حذف شد!
                </div>
            @endif
            <?php
            Session::forget('access-user');
            Session::forget('edit-users');
            Session::forget('delete-users');
            ?>

            <div class="card">

                <div class="body">
                    <div class="row clearfix users">
                        <?php $i=0; ?>
                        @foreach($users as $user)
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 user">
                                <div class="card">
                                    <div class="header">
                                        <div class="col-md-2">
                                            <div class="writer">
                                                @if($user->role==2)
                                                <i class="material-icons ">create</i>
                                                @endif
                                            </div>

                                            <div class="image">
                                                @if($user->avatar=='')
                                                    <img src="{{asset('images/user.png')}}" width="48" height="48" alt="User" />
                                                @else
                                                    <img src="{{asset('images/user_profile/'.$user->avatar)}}" width="48" height="48" alt="User" />
                                                @endif

                                            </div>
                                            @if($user->status=='INACTIVE')
                                                <div class="status-inactive">
                                                    <i class="material-icons">do_not_disturb_on</i>
                                                </div>

                                            @endif

                                        </div>

                                        <div class="col-md-10">
                                            <h2>

                                                <small>نام و نام خانوادگی : <span>{{$user->name}}</span></small>
                                                <small>نام کاربری : <span>{{$user->username}}</span></small>
                                                <small>کد کاربری : <span>{{$user->reference_code}}</span></small>
                                                <small>موبایل  : <span>{{$user->mobile}}</span></small>
                                                <small>استان  : <span>{{$user->ostan}}</span></small>
                                                <small>زمان ثبت نام  : <span>{{\Hekmatinasser\Verta\Verta::instance($user->created_at)->format('H:i_Y/m/d ')}}</span></small>

                                            </h2>
                                        </div>



                                        <ul class="header-dropdown m-r--5">
                                            <li class="dropdown">
                                                <a href="javascript:void(0);" class="dropdown-toggle"
                                                   data-toggle="dropdown" role="button" aria-haspopup="true"
                                                   aria-expanded="false">
                                                    <i class="material-icons">more_vert</i>
                                                </a>
                                                <ul class="dropdown-menu pull-right">
                                                    <li><a href="{{route('adminlist.edit',$user->id)}}">ویرایش<i style="color: #666 !important;" class="material-icons">mode_edit</i></a></li>
                                                    <li><a href="{{route('adminlist.show',$user->id)}}">دسترسی ها<i style="color: #666 !important;" class="material-icons">https</i></a></li>
                                                    <li class="a_writer"><a onclick="user('{{$user->id}}',this,0)">تبدیل به کاربر<i class="material-icons ">person</i></a></li>

                                                </ul>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="body"  style="@if($user->level==1)
                                        background: url({{asset('images/background/white.svg')}}) no-repeat;
                                    @elseif($user->level==2)
                                        background: url({{asset('images/background/yellow.svg')}}) no-repeat;
                                    @elseif($user->level==3)
                                        background: url({{asset('images/background/green.svg')}}) no-repeat;
                                    @elseif($user->level==4)
                                        background: url({{asset('images/background/blue.svg')}}) no-repeat;
                                    @elseif($user->level==5)
                                        background: url({{asset('images/background/red.svg')}}) no-repeat;
                                    @elseif($user->level==6)
                                        background: url({{asset('images/background/banafsh.svg')}}) no-repeat;
                                    @elseif($user->level==7)
                                        background: url({{asset('images/background/black.svg')}}) no-repeat;
                                    @endif
                                        ">

                                    </div>
                                </div>
                            </div>
                            <?php $i++; ?>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script>


        function delete_users(id,tag) {
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
                    var url='{{route('delete_users')}}';
                    var data={_token: CSRF_TOKEN,id:id};
                    $.post(url,data,function (msg) {
                        if(msg=='true'){
                            $(tag).parents('.user').remove();
                        }
                    })
                }
            })
        }

        function users_search()
        {
            var value=$('input[name=search]').val();
            var CSRF_TOKEN ='{{ csrf_token() }}';
            var url='{{route('users_search')}}';
            var data={_token: CSRF_TOKEN,value:value};
            $.post(url,data,function (msg) {

                $('.users').empty();
                $('.users').append(msg);
            })
        }

        function writer(id,tag,val) {
            Swal.fire({
                title: 'آیا اطمینان دارید؟',
                icon: 'warning',
                showCancelButton: true,
                cconfirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'بله !',
                cancelButtonText: 'خیر'
            }).then((result) => {
                if (result.value) {
                    var CSRF_TOKEN ='{{ csrf_token() }}';
                    var url='{{route('writer_users')}}';
                    var data={_token: CSRF_TOKEN,id:id,val:val};
                    $.post(url,data,function (msg) {
                        if(msg=='writer'){
                            $(tag).parents('.user').find('.writer').append('<i class="material-icons ">create</i>');

                            $('.a_writer').empty();
                            $('.a_writer').append('<a onclick="user('+id+',this,0)">تبدیل به کاربر<i class="material-icons ">person</i></a>');

                        }
                    })
                }
            })
        }

        function user(id,tag,val) {
            Swal.fire({
                title: 'آیا اطمینان دارید؟',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'بله !',
                cancelButtonText: 'خیر'
            }).then((result) => {
                if (result.value) {
                    var CSRF_TOKEN ='{{ csrf_token() }}';
                    var url='{{route('writer_users')}}';
                    var data={_token: CSRF_TOKEN,id:id,val:val};
                    $.post(url,data,function (msg) {
                        if(msg=='user') {
                            $(tag).parents('.user').remove();
                        }
                    })
                }
            })
        }
    </script>
@endsection
