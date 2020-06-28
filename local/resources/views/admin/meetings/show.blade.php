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
             height: 58px;
         }
        .info-box-4 img{
            border-radius: 100%;
        }
        .info-box-4 div:first-child{
            padding: 0;

        }
        .presence{
            position: absolute;
            left: 0;
            width: 25px;
            height: 50%;
        }
        .absence{
            position: absolute;
            left: 0;
            width: 25px;
            height: 50%;
            bottom: 0;
        }
        .city{
            font-size: 10px;
            font-weight: 700;
            margin-left: 10px;

        }
        a:hover, a:focus {
            color: #23527c;
            text-decoration: none;
        }
        .btn:not(.btn-link):not(.btn-circle) i {
            font-size: 15px;
            position: relative;
            top: 3px;
            left: 7px;
        }
        [type="checkbox"] + label {
            padding-left: 26px;
            height: 35%;
            top: 18px;
            left: 9px;
        }

        [type="checkbox"].filled-in:checked.chk-col-teal + label:after{
            height: 100%;
        }
        [type="checkbox"].filled-in:checked.chk-col-teal + label:after {
            border: 2px solid #40bd5d;
            background-color: #36c557;
        }
        [type="checkbox"].filled-in:not(:checked) + label:after {
            height: 100%;
        }
        [type="checkbox"].filled-in:not(:checked) + label:after {
            background-color: #4ed2c3;
            border: 2px solid #4ed2c3;
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
                Session::forget('edit-introducingproduct');
                Session::forget('delete-introducingproduct');
                ?>
                    @if(count($users))
                <div class="header" style="margin-bottom: 20px">


                    <a href="{{route('meetings.index')}}" type="button" class="btn btn-default btn-circle waves-effect waves-circle waves-float">
                        <i class="material-icons">reply</i>
                    </a>

                    <h4> لیست نفرات جلسه {{$users[0]->ostan}} سطح  @if($users[0]->level==1) Biginner @endif
                        @if($users[0]->level==2) Adviser @endif
                        @if($users[0]->level==3) Leader @endif
                        @if($users[0]->level==4) Trainer @endif
                        @if($users[0]->level==5) Presentor @endif
                        @if($users[0]->level==6) Top Leader @endif
                        @if($users[0]->level==7) Master @endif</h4>
                </div>
                <div class="body">
                    <div class="row clearfix">
                        @if(count($presences))


                                    @foreach($presences as $user)
                                        <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6 user">
                                            <div class="info-box-4" @if($user->presence=="NO") style="background: #4ed2c3;color: #fff" @else style="background: #2f8940;color: #fff" @endif>

                                                <div class="col-xs-3" style="padding:5px 7px 0 0;">
                                                    @if($user->avatar=='')
                                                        <img src="{{asset('images/user.png')}}" width="48" height="48" alt="User" />
                                                    @else
                                                        <img src="{{asset('images/user_profile/'.$user->avatar)}}" width="48" height="48" alt="User" />
                                                    @endif
                                                </div>
                                                <div class="col-xs-9" style="padding: 5px 23px 0 0;">
                                                    <div class="city">{{$user->name}}</div>
                                                    <span class="city">شهر: {{$user->city}}</span>
                                                </div>

                                            </div>


                                        </div>
                                    @endforeach



                        @else
                        <form method="post" action="{{route('presences.store')}}">
                            @csrf
                        @if($users)
                            @foreach($users as $user)
                                <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6 user">
                                        <div class="info-box-4">

                                            <div class="col-xs-3" style="padding:5px 7px 0 0;">
                                                @if($user->avatar=='')
                                                    <img src="{{asset('images/user.png')}}" width="48" height="48" alt="User" />
                                                @else
                                                    <img src="{{asset('images/user_profile/'.$user->avatar)}}" width="48" height="48" alt="User" />
                                                @endif
                                            </div>
                                            <div class="col-xs-9" style="padding: 5px 23px 0 0;">
                                                <div class="city">{{$user->name}}</div>
                                                <span class="city">شهر: {{$user->city}}</span>
                                            </div>
                                            <input type="checkbox" id="md_checkbox_{{$user->id}}" name="presence[]" value="{{$user->id}}" class="filled-in chk-col-teal" >
                                            <label for="md_checkbox_{{$user->id}}"></label>
                                        </div>


                                </div>
                            @endforeach
                        @endif
                            <input name="ostan" type="hidden" value="{{$users[0]->ostan}}">
                            <input name="city" type="hidden" value="{{$users[0]->city}}">
                            <input name="level" type="hidden" value="{{$users[0]->level}}">
                            <input name="meeting_id" type="hidden" value="{{$id}}">
                            <div class="col-xs-12">
                                <button style="float: left;margin-left: 15px;" type="submit" class="btn bg-blue waves-effect">
                                    <i class="material-icons">verified_user</i>
                                    <span>ثبت</span>
                                </button>
                            </div>

                            </form>

                        @endif
                    </div>
                </div>

                        @else
                        <div class="header" style="margin-bottom: 20px">


                            <a href="{{route('meetings.index')}}" type="button" class="btn btn-default btn-circle waves-effect waves-circle waves-float">
                                <i class="material-icons">reply</i>
                            </a>

                            <h4>هنوز کاربری در این استان به سطح مورد نظر نرسیده است</h4>
                        </div>
                        @endif

            </div>
        </div>
        <!-- #END# Basic Examples -->
        <!-- Full Body Examples -->

        <!-- #END# Full Body Examples -->
    </div>
@endsection



