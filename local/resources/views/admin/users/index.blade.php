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
        .new-user{
            position: absolute;
            top: -18px;
            right: -18px;
            color: #527d7d;
            cursor: pointer;
        }
        .pagination li{
            float: right;
        }
        .pagination>li>a {
            background: #fff !important;
            color: #949494 !important;
        }

        .pagination>.disabled>span{
            background: #dcdcdc !important;
            color: #949494 !important;
        }

        .pagination>.active>span{
            background-color: #00A6C7 !important;
            border-color: #dddddd !important;
        }
        .pagination .page-link{
            border: 1px solid #ccc;
        }
        .pagination > li > a, .pagination > li > span{
            padding: 5.1px 12px;
        }
        .pagination > .active > a, .pagination > .active > span, .pagination > .active > a:hover, .pagination > .active > span:hover, .pagination > .active > a:focus, .pagination > .active > span:focus{
            border: none;
            padding: 6px 12px;
        }
    </style>
@endsection
@section('content')
    <div class="row main-index users">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

            @if(session('insert-file') and session('insert-file')=='success')
                <div class="alert bg-green alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    آموزش جدید با موفقیت ثبت شد!
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
            Session::forget('insert-Education');
            Session::forget('edit-users');
            Session::forget('delete-users');
            ?>

            <div class="card">
                <div class="header">
                    <div class="col-md-1">
                        <a href="{{route('education.create')}}" type="button" class="btn btn-primary btn-circle waves-effect waves-circle waves-float">
                            <i class="material-icons">add</i>
                        </a>
                    </div>


                    <div class="col-md-3">
                        <div class="form-group">
                            <div class="form-line">
                                <input name="search" onkeyup="users_search()" type="text" class="form-control" placeholder="جستجو">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="body">
                    <div class="row clearfix userss">
                        <?php $i=0; ?>
                        @foreach($users as $user)
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 user">
                                <div class="card">
                                    <div class="header">
                                        <div class="col-md-2">
                                            <div class="writer">

                                            </div>
                                            @if($user->new=='YES')
                                            <i onclick="new_user('{{$user->id}}',this)" class="material-icons new-user" title="کاربر جدید">new_releases</i>
                                            @endif
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

                                                <small style="height: 37px">نام و نام خانوادگی : <span>{{$user->name}}</span></small>
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
                                                    <li><a href="{{route('users.edit',$user->id)}}">ویرایش<i style="color: #666 !important;" class="material-icons">mode_edit</i></a></li>
                                                    <li><a onclick="delete_users('{{$user->id}}',this)">حذف<i class="material-icons">delete</i></a></li>
                                                        @if(Auth::id()==1)
                                                    <li class="a_writer"><a class="a_writer" onclick="writer('{{$user->id}}',this,1)">تبدیل به مدیر<i class="material-icons ">person</i></a></li>
                                                    @endif
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
                <div class="col-xs-12" style="text-align: center">
                    {{$users->links()}}
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

                $('.userss').empty();
                $('.userss').append(msg);
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
                        if(msg=='user'){
                            $(tag).parents('.user').remove();
                        }
                    })
                }
            })
        }


        function new_user(user_id,tag) {
            var count=$('#count-new-user').html();
            count=parseInt(count)-1;

            var CSRF_TOKEN ='{{ csrf_token() }}';
            var url='{{route('status_new_user')}}';
            var data={_token: CSRF_TOKEN,user_id:user_id};
            $.post(url,data,function (msg) {
                if(msg=='ok'){
                    $(tag).parent('.col-md-2').find('.status-inactive i').remove();
                    $('#count-new-user').html(count);
                    $(tag).remove();

                }
            })
        }


    </script>
@endsection
