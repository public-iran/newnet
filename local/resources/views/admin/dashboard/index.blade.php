@extends('admin.layout.master')

@section('style')
    <style>
        .clearfix > a {
            float: right;
        }

        .my-home-icon span {
            color: #fff;
        }

        .img_back {
            width: 100%;
            position: fixed;
            margin-top: -100px;
            margin-right: -15px;
            height: 100%;
        }

        .clearfix i {
            width: 35px;
            height: 35px;
            display: inline-block;
            background-size: cover !important;
            margin-top: -3px;

        }

        .btn {
            padding: 5px 6px;
        }

        .btn-circle-lg {
            border-radius: 20% !important;
        }

        .clearfix button {
            background: #d8d8d8 !important;
        }

        .clearfix button:hover, .clearfix button:focus {
            background-color: #6d9a77 !important;
        }

        a:hover, a:focus {

            text-decoration: none;
        }
        {{--.theme-red > section.content{--}}
        {{--     background: url({{asset('images/77799.jpg')}})no-repeat;--}}
        {{-- }--}}
        @if(Auth::user()->role==1)
          .row.clearfix > a {
            display: none;
        }
        @endif
        <?php
    $useraccesss=App\Accessuser::where('user_id',Auth::id())->get();
    foreach ($useraccesss as $user_access){
        if ($user_access['access'] == "all"){ ?>
           .row.clearfix > a{
            display: flex;
        }
        <?php }

  elseif (count($useraccesss)) {


        ?>
        .row.clearfix > a.<?= $user_access['access']?> {
            display: flex;
        }

        <?php }

        }
        ?>
    </style>
@endsection

@section('content_user')
    <style>
        .clearfix a {
            opacity: 0.3;
        }
    </style>

    @if(session('insert-Exam') and session('insert-Exam')=='Accept')
        <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            تبریک،شما <strong>قبول شدید!</strong>
        </div>
    @endif

    @if(session('next-level') and session('next-level')=='success')
        <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            تبریک،شما <strong>سطح بعد ارتقا یافتید!</strong>
        </div>
    @endif

    @if(session('add-listpeople') and session('add-listpeople')=='success')
        <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            لیست افراد شما  <strong> ارسال شد! </strong>
        </div>
    @endif

    @if(session('add-listtargets') and session('add-listtargets')=='success')
        <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            لیست اهداف شما  <strong> ثبت شد! </strong>
        </div>
    @endif

    @if(session('insert-Exam') and session('insert-Exam')=='Reject')
        <div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            متاسفانه شما در آزمون <strong>قبول نشدید!</strong>
        </div>
    @endif

    @if(session('edit-test') and session('edit-test')=='success')
        <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            سوال با موفقیت <strong>ویرایش شد!</strong>
        </div>
    @endif

    @if(session('delete-test') and session('delete-test')=='success')
        <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            سوال با موفقیت <strong>ویرایش شد!</strong>
        </div>
    @endif

    <?php
    Session::forget('insert-Exam');
    Session::forget('edit-test');
    Session::forget('delete-test');
    Session::forget('test-alert');
    Session::forget('add-listpeople');
    Session::forget('add-listtargets');
    Session::forget('next-level');


    ?>

    <div class="row clearfix align-center" style="margin: 20px 0">
        <a href="{{route('profile.index')}}" class="col-xs-4 my-home-icon profile" style="opacity: 1;">
            <button type="button" class="btn btn-danger btn-circle-lg waves-effect waves-circle waves-float">
                <i style="background: url({{asset('images/icon/profile.svg')}})"></i>
            </button>
            <span>پروفایل</span>
        </a>
        <a href="{{route('card.index')}}" class="col-xs-4 my-home-icon identification-card" style="opacity: 1;">
            <button type="button" class="btn btn-info btn-circle-lg waves-effect waves-circle waves-float">
                <i style="background: url({{asset('images/icon/business-card.svg')}})"></i>
            </button>
            <span>کارت شناسایی</span>
        </a>
        <a class="col-xs-4 my-home-icon Function" title="این قسمت برای شما غیر فعال می باشد">
            <button type="button" class="btn bg-light-green btn-circle-lg waves-effect waves-circle waves-float">
                <i style="background: url({{asset('images/icon/report.svg')}})"></i>
            </button>
            <span>عملکرد</span>
        </a>
    </div>
    <div class="row clearfix align-center" style="margin: 20px 0">
        <a href="{{route('training.index')}}" class="col-xs-4 my-home-icon" style="opacity: 1;">
            <button type="button" class="btn bg-amber btn-circle-lg waves-effect waves-circle waves-float">
                <i style="background: url({{asset('images/icon/teacher.svg')}})"></i>
            </button>
            <span>آموزش</span>
        </a>
        {{-- <a href="{{route('exam.index')}}" class="col-xs-4 my-home-icon">
             <button type="button" class="btn bg-light-blue btn-circle-lg waves-effect waves-circle waves-float">
                 <i class="material-icons">import_contacts</i>
             </button>
             <span>آزمون</span>
         </a>--}}
        <a href="{{route('photos.index')}}" class="col-xs-4 my-home-icon"
           title="این قسمت برای شما غیر فعال می باشد" style="opacity: 1;">
            <button type="button" class="btn bg-cyan btn-circle-lg waves-effect waves-circle waves-float">
                <i style="background: url({{asset('images/icon/gallery1.svg')}})"></i>
            </button>
            <span>گالری</span>
        </a>
        <a class="col-xs-4 my-home-icon" title="این قسمت برای شما غیر فعال می باشد">
            <button type="button" class="btn bg-deep-purple btn-circle-lg waves-effect waves-circle waves-float">
                <i style="background: url({{asset('images/icon/trigonometry.svg')}})"></i>
            </button>
            <span>گزارش کار</span>
        </a>
    </div>
    <div class="row clearfix align-center" style="margin: 20px 0">
        <a class="col-xs-4 my-home-icon" title="این قسمت برای شما غیر فعال می باشد">
            <button type="button" class="btn bg-cyan btn-circle-lg waves-effect waves-circle waves-float">
{{--                <i style="background: url({{asset('images/icon/shopping-cart.svg')}})"></i>--}}
                <i style="background: url({{asset('images/icon/grapht.svg')}})"></i>
            </button>
{{--            <span>فروشگاه</span>--}}
            <span>چارت آموزشی</span>
        </a>
        <a {{--href="{{route('Topseller.index')}}"--}} class="col-xs-4 my-home-icon"
           title="این قسمت برای شما غیر فعال می باشد">
            <button type="button" class="btn bg-blue-grey btn-circle-lg waves-effect waves-circle waves-float">
                <i style="background: url({{asset('images/icon/millionaire.svg')}})"></i>
            </button>
            <span>باشگاه میلیونرها</span>
        </a>
        <a class="col-xs-4 my-home-icon" title="این قسمت برای شما غیر فعال می باشد">
            <button type="button" class="btn bg-deep-orange btn-circle-lg waves-effect waves-circle waves-float">
{{--                <i style="background: url({{asset('images/icon/company.svg')}})"></i>--}}
                <i style="background: url({{asset('images/icon/unnamed.png')}})"></i>
            </button>
            <span>مراکز طرف قرار داد</span>
        </a>
    </div>

    <div class="row clearfix align-center" style="margin: 20px 0">
        <a class="col-xs-4 my-home-icon" title="این قسمت برای شما غیر فعال می باشد">
            <button type="button" class="btn bg-cyan btn-circle-lg waves-effect waves-circle waves-float">
                <i style="background: url({{asset('images/icon/result.svg')}})"></i>
            </button>
            <span>تیکت</span>
        </a>
        <a class="col-xs-4 my-home-icon" title="این قسمت برای شما غیر فعال می باشد">
            <button type="button" class="btn bg-blue-grey btn-circle-lg waves-effect waves-circle waves-float">
                <i style="background: url({{asset('images/icon/leadership.svg')}})"></i>
            </button>
            <span>لیدر شیپ</span>
        </a>
        <a class="col-xs-4 my-home-icon" title="این قسمت برای شما غیر فعال می باشد">
            <button type="button" class="btn bg-deep-orange btn-circle-lg waves-effect waves-circle waves-float">
                <i style="background: url({{asset('images/icon/assistance.svg')}})"></i>
            </button>
            <span>شکایات</span>
        </a>
    </div>

    <div class="row clearfix align-center" style="margin: 20px 0">


        <a class="col-xs-4 my-home-icon" title="این قسمت برای شما غیر فعال می باشد">
            <button type="button" class="btn bg-cyan btn-circle-lg waves-effect waves-circle waves-float">
                <i style="background: url({{asset('images/icon/hr.svg')}})"></i>
            </button>
            <span>پرزنت</span>
        </a>


        <a {{--href="{{route('rules.index_user')}}"--}} class="col-xs-4 my-home-icon"
           title="این قسمت برای شما غیر فعال می باشد">
            <button type="button" class="btn bg-cyan btn-circle-lg waves-effect waves-circle waves-float">
                <i style="background: url({{asset('images/icon/law.svg')}})"></i>
            </button>
            <span>قوانین</span>
        </a>

        <a {{--href="{{route('photos.index')}}"--}} class="col-xs-4 my-home-icon"
           title="این قسمت برای شما غیر فعال می باشد">
            <button type="button" class="btn bg-cyan btn-circle-lg waves-effect waves-circle waves-float">
                <i style="background: url({{asset('images/icon/target.svg')}})"></i>
            </button>
            <span>کارگاه آموزشی</span>
        </a>
    </div>
    <div class="row clearfix align-center" style="margin: 20px 0">

        <a {{--href="{{route('photos.index')}}" --}}class="col-xs-4 my-home-icon"
           title="این قسمت برای شما غیر فعال می باشد">
            <button type="button" class="btn bg-cyan btn-circle-lg waves-effect waves-circle waves-float">
                <i style="background: url({{asset('images/icon/introduction.svg')}})"></i>
            </button>
            <span>معرف شرکت</span>
        </a>
        <a @if (Auth::user()->listpeople=="YES") href="{{route('listpeople.show',$id_listpeople->id)}}" @endif class="col-xs-4 my-home-icon" @if (Auth::user()->listpeople=="YES") style="opacity: 1;" @endif>
            <button type="button" class="btn bg-cyan btn-circle-lg waves-effect waves-circle waves-float">
                <i class="material-icons" style="margin-top: -2px;">assignment</i>
            </button>
            <span>لیست افراد</span>
        </a>
        <a @if (Auth::user()->Golden_listpeople=="YES") href="{{route('goldenlist.show',$id_Goldenlistpeople->id)}}" @endif class="col-xs-4 my-home-icon" @if (Auth::user()->Golden_listpeople=="YES") style="opacity: 1;" @endif >
            <button type="button" class="btn bg-cyan btn-circle-lg waves-effect waves-circle waves-float">
                <i class="material-icons" style="margin-top: -2px;color: gold">assignment</i>
            </button>
            <span>لیست طلایی افراد</span>
        </a>
    </div>

@endsection



@section('content')
    @if(session('update-user') and session('update-user')=='success')
        <div class="alert bg-green alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">×</span></button>
            اطلاعات کاربری با موفقیت بروزرسانی شد!
        </div>
    @endif
    <?php
    Session::forget('update-user');
    ?>
    <div class="row clearfix align-center" style="margin: 20px 0">
        <a href="{{route('profile.index')}}" class="col-xs-4 my-home-icon profile">
            <button type="button" class="btn btn-danger btn-circle-lg waves-effect waves-circle waves-float ">
                <i style="background: url({{asset('images/icon/profile.svg')}})"></i>
            </button>
            <span>پروفایل</span>
        </a>
        <a href="{{route('card.index')}}" class="col-xs-4 my-home-icon identification-card">
            <button type="button" class="btn btn-info btn-circle-lg waves-effect waves-circle waves-float">
                <i style="background: url({{asset('images/icon/business-card.svg')}})"></i>
            </button>
            <span>کارت شناسایی</span>
        </a>
        <a class="col-xs-4 my-home-icon Function">
            <button type="button" class="btn bg-light-green btn-circle-lg waves-effect waves-circle waves-float ">
                <i style="background: url({{asset('images/icon/report.svg')}})"></i>
            </button>
            <span>عملکرد</span>
        </a>
    </div>
    <div class="row clearfix align-center" style="margin: 20px 0">
        <a href="{{route('education.index')}}" class="col-xs-4 my-home-icon education">
            <button type="button" class="btn bg-amber btn-circle-lg waves-effect waves-circle waves-float">
                <i style="background: url({{asset('images/icon/teacher.svg')}})"></i>
            </button>
            <span>آموزش</span>
        </a>

        <a href="{{route('club.index')}}" class="col-xs-4 my-home-icon club">
            <button type="button" class="btn bg-cyan btn-circle-lg waves-effect waves-circle waves-float">
                <i style="background: url({{asset('images/icon/relationship.svg')}})"></i>
            </button>
            <span>باشگاه مشتریان</span>
        </a>
        <a class="col-xs-4 my-home-icon work-report">
            <button type="button" class="btn bg-deep-purple btn-circle-lg waves-effect waves-circle waves-float">
                <i style="background: url({{asset('images/icon/trigonometry.svg')}})"></i>
            </button>
            <span>گزارش کار</span>
        </a>
    </div>
    <div class="row clearfix align-center" style="margin: 20px 0">
        <a class="col-xs-4 my-home-icon ecomm">
            <button type="button" class="btn bg-cyan btn-circle-lg waves-effect waves-circle waves-float">
{{--                <i style="background: url({{asset('images/icon/shopping-cart.svg')}})"></i>--}}
                <i style="background: url({{asset('images/icon/graph.svg')}})"></i>
            </button>
{{--            <span>فروشگاه</span>--}}
            <span>چارت آموزشی</span>
        </a>
        <a href="{{route('Topseller.index')}}" class="col-xs-4 my-home-icon Topseller">
            <button type="button" class="btn bg-blue-grey btn-circle-lg waves-effect waves-circle waves-float">
                <i style="background: url({{asset('images/icon/millionaire.svg')}})"></i>
            </button>
            <span>باشگاه میلیونرها</span>
        </a>
        <a class="col-xs-4 my-home-icon party-contract">
            <button type="button" class="btn bg-deep-orange btn-circle-lg waves-effect waves-circle waves-float">
{{--                <i style="background: url({{asset('images/icon/company.svg')}})"></i>--}}
                <i style="background: url({{asset('images/icon/unnamed.png')}})"></i>
            </button>
            <span>مراکز طرف قرار داد</span>
        </a>
    </div>

    <div class="row clearfix align-center " style="margin: 20px 0">
        <a class="col-xs-4 my-home-icon ticket">
            <button type="button" class="btn bg-cyan btn-circle-lg waves-effect waves-circle waves-float">
                <i style="background: url({{asset('images/icon/result.svg')}})"></i>
            </button>
            <span>تیکت</span>
        </a>
        <a class="col-xs-4 my-home-icon Ship-Leader">
            <button type="button" class="btn bg-blue-grey btn-circle-lg waves-effect waves-circle waves-float">
                <i style="background: url({{asset('images/icon/leaderships.svg')}})"></i>
            </button>
            <span>لیدر شیپ</span>
        </a>
        <a class="col-xs-4 my-home-icon Complaints">
            <button type="button" class="btn bg-deep-orange btn-circle-lg waves-effect waves-circle waves-float">
                <i style="background: url({{asset('images/icon/assistance.svg')}})"></i>
            </button>
            <span>شکایات</span>
        </a>
    </div>

    <div class="row clearfix align-center" style="margin: 20px 0">
        <a href="{{route('photos.index')}}" class="col-xs-4 my-home-icon photos">
            <button type="button" class="btn bg-cyan btn-circle-lg waves-effect waves-circle waves-float">
                <i style="background: url({{asset('images/icon/gallery1.svg')}})"></i>
            </button>
            <span>گالری</span>
        </a>

        <a href="{{route('videos.index')}}" class="col-xs-4 my-home-icon videos">
            <button type="button" class="btn bg-cyan btn-circle-lg waves-effect waves-circle waves-float">
                <i style="background: url({{asset('images/icon/youtube.svg')}})"></i>
            </button>
            <span>ویدیو</span>
        </a>

        <a href="{{route('sounds.index')}}" class="col-xs-4 my-home-icon sounds">
            <button type="button" class="btn bg-cyan btn-circle-lg waves-effect waves-circle waves-float">
                <i style="background: url({{asset('images/icon/microphone.svg')}})"></i>
            </button>
            <span>پادکست</span>
        </a>
    </div>
    <div class="row clearfix align-center" style="margin: 20px 0">
        <a href="{{route('photos.index')}}" class="col-xs-4 my-home-icon Chart">
            <button type="button" class="btn bg-cyan btn-circle-lg waves-effect waves-circle waves-float">
                <i style="background: url({{asset('images/icon/graph.svg')}})"></i>
            </button>
            <span>چارت سازمانی</span>
        </a>

        <a href="{{route('photos.index')}}" class="col-xs-4 my-home-icon Company-representative">
            <button type="button" class="btn bg-cyan btn-circle-lg waves-effect waves-circle waves-float">
                <i style="background: url({{asset('images/icon/introduction.svg')}})"></i>
            </button>
            <span>معرف شرکت</span>
        </a>


        <a href="{{route('photos.index')}}" class="col-xs-4 my-home-icon Workshop">
            <button type="button" class="btn bg-cyan btn-circle-lg waves-effect waves-circle waves-float">
                <i style="background: url({{asset('images/icon/target.svg')}})"></i>
            </button>
            <span>کارگاه آموزشی</span>
        </a>
    </div>
    <div class="row clearfix align-center" style="margin: 20px 0">
        <a  target="_blank" href="{{route('orgchart.index')}}" class="col-xs-4 my-home-icon Chart">
            <button type="button" class="btn bg-cyan btn-circle-lg waves-effect waves-circle waves-float">
                <i style="background: url({{asset('images/icon/network.svg')}})"></i>
            </button>
            <span>جنیالوژی</span>
        </a>
    </div>
@endsection
