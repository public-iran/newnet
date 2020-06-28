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
        .header > a{
            float: left;
        }
        .header > h4{
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

        .panel-title{
            position: relative;
        }
        .panel-title ul{
            float: left;
            position: absolute;
            left: -15px;
            top: 0;
            list-style: none;
        }
        .panel-title > ul  .dropdown-toggle i{
            color: #fff;
        }
        .dropdown-menu.pull-right {
            right: auto;
            left: 19px;
            top: 38px;
        }
        .panel-group .panel-primary .panel-title {
            background-color: #2f8940;
        }
        .panel-group .panel-primary {
            border: 1px solid #2e8943;
        }





        .clearfix > div{
            margin-bottom: 0 !important;
        }
        .col-md-5 img{
            width: 100%;
            height: 100%;
        }
        .info-box-4 div{
            margin-bottom: 0!important;
            padding-top: 5px;


        }.info-box-4{
             border-radius: 10px;
             overflow: hidden;
             cursor: pointer;
                     height: 120px;
         }
        .info-box-4 div:first-child{
            padding: 0;

        }
        .city{
            font-size: 12px;
            font-weight: 700;
            margin-left: 25px;

        }
        a:hover, a:focus {
            color: #23527c;
            text-decoration: none;
        }
    </style>
@endsection

@section('content')
    <div class="row clearfix main-index IntroducingProducts">
        <!-- Basic Examples -->
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

            <div class="card">
                @if(session('insert-Meeting') and session('insert-Meeting')=='success')
                    <div class="alert bg-green alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        جلسه جدید با موفقیت ثبت شد!
                    </div>
                @endif
                    @if(session('insert-presence') and session('insert-presence')=='success')
                    <div class="alert bg-green alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        حضور غیاب شما با موفقیت ثبت شد!
                    </div>
                @endif
                @if(session('edit-introducingproduct') and session('edit-introducingproduct')=='success')
                    <div class="alert bg-green alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        محصول  با موفقیت ویرایش شد!
                    </div>
                @endif
                @if(session('delete-introducingproduct') and session('delete-introducingproduct')=='success')
                    <div class="alert bg-green alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        محصول  با موفقیت حذف شد!
                    </div>
                @endif
                <?php
                Session::forget('insert-Meeting');
                Session::forget('insert-presence');
                Session::forget('edit-introducingproduct');
                Session::forget('delete-introducingproduct');
                ?>
                <div class="header" style="margin-bottom: 20px">
                    <h4>لیست جلسات</h4>

                    <a href="{{route('meetings.create')}}" type="button" class="btn btn-primary btn-circle waves-effect waves-circle waves-float">
                        <i class="material-icons">add</i>
                    </a>


                </div>
                <div class="body">
                    <div class="row clearfix">
                        @if($Meetings)

                            @foreach($Meetings as $meeting)
                              
                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 Meeting">

                                        <div class="info-box-4">

                                            <button style="position: absolute;left: 0;padding: 2px 5px;z-index: 200" onclick="delete_meeting('{{$meeting->id}}',this)" type="button" class="btn btn-danger waves-effect comfirm">
                                                <i class="material-icons">delete_forever</i>
                                            </button>
                                            <a href="{{route('meetings.show',$meeting->id)}}">
                                            <div class="col-xs-12" style="padding: 12px 20px;">
                                                <div class="city">{{$meeting->title}}</div>
                                                <span class="city">استان: {{$meeting->ostan}}</span>
                                                <span class="city">شهر: {{$meeting->city}}</span>
                                                <div class="city">سطح:
                                                @if($meeting->level==1) Biginner @endif
                                                @if($meeting->level==2) Adviser @endif
                                                @if($meeting->level==3) Leader @endif
                                                @if($meeting->level==4) Trainer @endif
                                                @if($meeting->level==5) Presentor @endif
                                                @if($meeting->level==6) Top Leader @endif
                                                @if($meeting->level==7) Master @endif
                                                </div>
                                                <div class="city">تاریخ برگذاری: {{$meeting->date}}</div>
                                                <div class="city">ساعت شروع : {{$meeting->time}}</div>
                                            </div>
                                    </a>
                                        </div>


                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Basic Examples -->
        <!-- Full Body Examples -->

        <!-- #END# Full Body Examples -->
    </div>
@endsection

@section('script')
    <script>
        function delete_meeting(meeting_id,item) {


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
                    var url='{{route('delete_meeting')}}';
                    var data={_token: CSRF_TOKEN,meeting_id:meeting_id};
                    $.post(url,data,function (msg) {
                        if(msg=="ok"){
                            $(item).parents('.Meeting').remove();
                        }
                    })
                }
            })
        }
    </script>
@endsection

