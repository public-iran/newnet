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
    <div class="row main-index listpeople">
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

                        <a href="{{route('listpeople.index')}}" style="float:left;margin-top: -10px;" type="button" class="btn btn-default btn-circle waves-effect waves-circle waves-float">
                            <i class="material-icons">reply</i>
                        </a>

                        <h2>لیست ارسال شده توسط {{$listpeople->name}}</h2>

                </div>
                <div class="body">
                    <div class="row clearfix users">
                        <?php $i=1;
                        $listpeoples=explode('|#|',$listpeople->list);
                        ?>

                        @foreach($listpeoples as $user)


                            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4">{{$i.'-'.$user}}</div>



                    <?php $i++; ?>
                    @endforeach
                            <hr>


                </div>

                    @if($listpeople->confirmation=='NOTOK')
                        <form method="post" action="{{route('listpeople.update',$listpeople->id)}}">
                            @method('PATCH')
                            @csrf
                            <input type="hidden" name="confirmation" value="OK">
                            <button type="submit" class="btn bg-blue waves-effect" style="float: left">
                                <i class="material-icons">verified_user</i>
                                <span>تائید</span>
                            </button>

                        </form>

                        @endif

                    @if($listpeople->confirmation=='NOTOK')
                        <form method="post" action="{{route('listpeople.update',$listpeople->id)}}">
                            @method('PATCH')
                            @csrf
                            <input type="hidden" name="confirmation" value="Unconfirmed">
                            <button  class="btn bg-red waves-effect" style="float: left;margin-left: 10px">
                                <i class="material-icons">clear</i>
                                <span>عدم تائید</span>
                            </button>
                        </form>

                    @endif
            </div>
        </div>
    </div>
    </div>

@endsection


@section('content_user')
    @if ($listpeople->user_id==Auth::id())
        <div class="row main-index listpeople">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">


                <div class="card">
                    <div class="header">

                    </div>
                    <div class="body">
                        <div class="row clearfix users">
                            <?php $i=1;
                            $listpeoples=explode('|#|',$listpeople->list);
                            ?>

                            @foreach($listpeoples as $user)


                                <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4">{{$i.'-'.$user}}</div>



                                <?php $i++; ?>
                            @endforeach
                            <hr>


                        </div>


                    </div>
                </div>
            </div>
        </div>
    @endif


@endsection

