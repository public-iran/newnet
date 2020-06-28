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

        [type="checkbox"].filled-in:checked + label:before {
            right: 11px;
        }
        [type="checkbox"].filled-in:checked + label:after {

            right: 0;
        }
        [type="checkbox"] + label {
            padding-right: 26px;
            padding-left: 0;
        }
        [type="checkbox"].filled-in:not(:checked) + label:after {
            right: 0;
        }
        [type="checkbox"].filled-in:not(:checked) + label:before {
            right: 11px;
        }
    </style>
@endsection
@section('content')
    <div class="row">
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

                        <a href="{{route('adminlist.index')}}" style="float:left;margin-top: -10px" type="button" class="btn btn-default btn-circle waves-effect waves-circle waves-float">
                            <i class="material-icons">reply</i>
                        </a>


                </div>
                <div class="body">
                    <form method="post" action="{{route('adminlist.store')}}">
                    <div class="row clearfix users">

                            @csrf

                            <input type="hidden" value="{{$id}}" name="id">
                        <?php $i=1; ?>
                        @foreach($accessusers as $access)
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <input type="checkbox" name="access[]" id="md_checkbox_{{$i}}" value="{{$access->name}}" class="filled-in chk-col-teal" @if(@$id=='1')checked @elseif(@$access->user_id==$id) checked @endif >
                                <label for="md_checkbox_{{$i}}">{{$access->title}}</label>
                            </div>

                            <?php $i++; ?>
                        @endforeach
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-info waves-effect" style="float: left">
                                    <i class="material-icons">lock</i>
                                    <span>ثبت</span>
                                </button>
                            </div>

                    </div>
                    </form>
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
                        if(msg=='user'){
                            $(tag).parents('.user').remove();
                        }
                    })
                }
            })
        }

    </script>
@endsection
