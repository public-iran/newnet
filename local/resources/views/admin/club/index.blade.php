@extends('admin.layout.master')

@section('style')
    <style>
        .nav-tabs li{
            float: right;
        }
        [type="checkbox"] + label {
            padding-left: 26px;
            height: 7px;
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
    <div class="row main-index Function">
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

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">

                            <div class="body">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs tab-nav-right" role="tablist">
                                    <li role="presentation" class="active"><a href="#home" data-toggle="tab">باشگاه مشتریان</a></li>
                                    <li role="presentation"><a href="#profile" data-toggle="tab">فراخوان</a></li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="home">
                                        <div class="body">
                                            <div class="table-responsive">
                                                <table id="mainTable" class="table table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>نام کاربری</th>
                                                        <th>نام و نام خانوادگی</th>
                                                        <th>کد کاربری</th>
                                                        <th>شماره تلفن</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($users as $user)
                                                        <tr>
                                                            <td></td>
                                                            <td>{{$user->username}}</td>
                                                            <td>{{$user->name}}</td>
                                                            <td>{{$user->reference_code}}</td>
                                                            <td>{{$user->mobile}}</td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>

                                                </table>
                                            </div>
                                            <div class="col-xs-12" style="text-align: center">
                                                {{$users->links()}}
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="profile">
                                        <form action="{{route('club.store')}}" method="post">
                                            @csrf
                                            <div class="body">



                                                <div class="row clearfix">

                                                    <div class="col-sm-3" style="float: right">
                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <input name="search" onkeyup="Call_search()" type="text" class="form-control" placeholder="جستجو">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3" style="float: right">


                                                        <select name="sms" class="form-control show-tick" required>
                                                            <option disabled >انتخاب پیام</option>
                                                            <option value="">Mustard</option>
                                                            <option value="">Ketchup</option>
                                                            <option value="">Relish</option>
                                                        </select>

                                                    </div>
                                                    <div class="col-md-3" style="float: right">
                                                    <button type="submit" class="btn btn-primary waves-effect">ارسال</button>
                                                    </div>
                                                </div>
                                                <div class="table-responsive">
                                                    <table id="mainTable" class="table table-striped">
                                                        <thead>
                                                        <tr>
                                                            <th>
                                                                <input type="checkbox" id="md_checkbox_0" class="filled-in chk-col-teal">
                                                                <label for="md_checkbox_0"></label>
                                                            </th>
                                                            <th>نام کاربری</th>
                                                            <th>نام و نام خانوادگی</th>
                                                            <th>کد کاربری</th>
                                                            <th>شماره تلفن</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody class="Function_users">
                                                        @foreach($users as $user)
                                                            <tr>
                                                                <td>
                                                                    <input name="call_user[]" value="{{$user->id}}" type="checkbox" id="md_checkbox_{{$user->id}}" class="filled-in chk-col-teal checkBox">
                                                                    <label for="md_checkbox_{{$user->id}}"></label>
                                                                </td>
                                                                <td>{{$user->username}}</td>
                                                                <td>{{$user->name}}</td>
                                                                <td>{{$user->reference_code}}</td>
                                                                <td>{{$user->mobile}}</td>


                                                            </tr>
                                                        @endforeach
                                                        </tbody>

                                                    </table>
                                                </div>
                                            </div>
                                        </form>

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

        function Call_search()
        {
        var value=$('input[name=search]').val();
            var CSRF_TOKEN ='{{ csrf_token() }}';
            var url='{{route('Call_search')}}';
            var data={_token: CSRF_TOKEN,value:value};
            $.post(url,data,function (msg) {

                $('.Function_users').empty();
                $('.Function_users').append(msg);
            })
        }

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
        });



            $('#md_checkbox_0').click(function(){
                if(this.checked){
                    $('.checkBox').each(function(){
                        this.checked = true;
                    })
                }else{
                    $('.checkBox').each(function(){
                        this.checked = false;
                    })
                }

            })


    </script>
@endsection
