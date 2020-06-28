<?php
if (session('Business') and session('Business')=="success"){
    header("Location: " . URL::to('/adminb/dashboardb'), true);
    ?>
<script>window.location = "/adminb/dashboardb";</script>
    <?php
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Unity Dreams</title>
    <!-- Favicon-->
    <meta name="_token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{asset('icons1/icon-96x96.png')}}" type="image/x-icon">

    <!-- Google Fonts -->

    <link rel="stylesheet" type="text/css" href="{{asset('js/timer/css/flipclock.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('js/timer/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('js/timer/css/styletimer.css')}}">

    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet"
          type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{asset('plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/bootstrap/css/bootstrap-rtl.min.css')}}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{asset('plugins/node-waves/waves.css')}}" rel="stylesheet"/>

    <!-- Animation Css -->
    <link href="{{asset('plugins/animate-css/animate.css')}}" rel="stylesheet"/>

    <!-- Sweet Alert Css -->
    <link href="{{asset('plugins/sweetalert/sweetalert.css')}}" rel="stylesheet"/>

    <link href="{{asset('plugins/waitme/waitMe.css')}}" rel="stylesheet"/>

    <link href="{{asset('plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet"/>
    <link href="{{asset('plugins/light-gallery/css/lightgallery.css')}}" rel="stylesheet">
    <!-- Custom Css -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/style-rtl.css')}}" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{asset('css/themes/all-themes.css')}}" rel="stylesheet"/>
    <link href="{{asset('css/element.style.css')}}" rel="stylesheet"/>

    <link href="{{asset('js/sweetAlert2/dark.css')}}" rel="stylesheet">

    <link rel="manifest" href="{{asset('manifest.json')}}">


    <link rel="manifest" href="{{asset('manifest.json')}}">
    <meta name="apple-mobile-web-app-status-bar" content="#3d7d38">
    <meta name="theme-color" content="#3d7d38">


    <style>
        .ls-closed .bars:before {
            content: 'dashboard';
            z-index: 100;
        }


        .theme-red .sidebar .legal .copyright a {
            color: #ffffff !important;
        }

        .sidebar .legal {
            padding: 14px;
        }
    </style>
</head>
@yield('style')
<style>
    .sidebar .user-info {
        background-size: 100% 100%;
        font-family: Vazir, sans-serif;
    }

    .ls-closed .bars:after, .ls-closed .bars:before {
        right: 20px;
        margin-left: 10px;
    }

    .ls-closed .bars:before {
        content: 'dashboard';
    }

    .btn-circle i {
        right: -1px;
        top: 3px;
    }

    footer {
        position: fixed;
        bottom: 0;
        width: 100%;
        height: 54px;
        background: #f44336;
        z-index: 2;
    }

    footer section span {
        width: 70px;
        height: 70px;
        margin: 0 auto;
        background: #f44336;
        display: block;
        margin-top: -130px;
        border-radius: 100%;
        overflow: hidden;
    }

    footer section span a img {
        width: 79px;
        margin-right: -5px;
        margin-top: -3px;
    }

    .image-mobile {
        display: none;
        margin-left: 10px;
    }

    .content {
        margin-bottom: 80px !important;
    }

    @media (max-width: 767px) {
        .navbar-brand {
            display: none;
        }
        .collapse {
display: block;
            top: 10px;
            right: 55px;
        }

        .image-mobile {
            float: left;
            border-radius: 100%;
            overflow: hidden;
            display: block;
        }

        .icon-780px {
            display: none;
        }

        body {
            min-height: 600px;
        }

    }

    .icon-780px {
        border-radius: 100%;
        overflow: hidden;
    }

    .menu {
        background: url({{asset('images/background/sidebar.svg')}}) no-repeat;
        background-size: cover;
    }

    .menu .list li a span {
        color: #fff !important;
    }

    footer {
        box-shadow: 0 0 22px 4px #000;
    }

    nav {
        box-shadow: 0 0 12px 1px #000;
    }

    .menu_footer_right {
        list-style: none;
        margin-top: -22px;
        padding: 0;
        margin-right: -14px;
    }

    .menu_footer_right li {
        float: right;

        padding: 0 6px;
    }

    .menu_footer_right img {
        width: 28px;
        border-radius: 100%;
        cursor: pointer;
    }

    .menu_footer_left {
        position: absolute;
        top: 1px;
        left: 2px;
        list-style: none;
        padding: 8px 0;
        height: 100%;
        line-height: 39px;
    }

    .menu_footer_left li {
        float: right;

        padding: 0 6px;
    }

    .menu_footer_left img {
        width: 28px;
        cursor: pointer;
    }


    .menu_footer_right a {
        width: 30px;
        height: 30px;
        display: inline-block;
        background-size: cover !important;
        margin-top: -7px;
        padding: 0;
    }

    .menu_footer_right a button {
        width: 100%;
        height: 100%;
        padding: 0;
        background: #d8d8d8 !important;
    }

    .menu_footer_right a button:hover, .menu_footer_right a button:focus {
        background-color: #6d9a77 !important;
    }

    .menu_footer_right a button i {
        width: 20px;
        height: 20px;
        display: inline-block;
        background-size: cover !important;

    }

    .menu_footer_left a {
        width: 30px;
        height: 30px;
        display: inline-block;
        background-size: cover !important;
        margin-top: -1px;
        padding: 0;
    }

    .menu_footer_left a button {
        width: 100%;
        height: 100%;
        padding: 0;
        background: #d8d8d8 !important;
    }

    .menu_footer_left a button:hover, .menu_footer_right a button:focus {
        background-color: #6d9a77 !important;
    }

    .menu_footer_left a button i {
        width: 20px;
        height: 20px;
        display: inline-block;
        background-size: cover !important;

    }

    .btn-primary, .btn-primary:hover, .btn-primary:active, .btn-primary:focus {
        background-color: #38bcec !important;
    }

    .sidebar .user-info .info-container {
        cursor: default;
        display: block;
        position: relative;
        top: 10px;
        right: 8px;
    }

    body {
        @if(Auth::user()->level==1)
         background: url({{asset('images/background/white.svg')}}) no-repeat;
        @elseif(Auth::user()->level==2)
         background: url({{asset('images/background/yellow.svg')}}) no-repeat;
        @elseif(Auth::user()->level==3)
         background: url({{asset('images/background/green.svg')}}) no-repeat;
        @elseif(Auth::user()->level==4)
         background: url({{asset('images/background/blue.svg')}}) no-repeat;
        @elseif(Auth::user()->level==5)
         background: url({{asset('images/background/red.svg')}}) no-repeat;
        @elseif(Auth::user()->level==6)
         background: url({{asset('images/background/banafsh.svg')}}) no-repeat;
        @elseif(Auth::user()->level==7)
          background: url({{asset('images/background/black.svg')}}) no-repeat;
        @endif
         background-position: 0 50px;
        background-size: cover;

    }


    .timer {
        width: 100%;
        position: absolute;
        direction: ltr;
        display: none;
    }

    .navbar-header {
        width: 100%;
    }

    @media (max-width: 576px) {
        .respon1 {
            padding-top: 0;
        }
    }

    @media (max-width: 576px) {
        .flip-clock-wrapper {
            max-width: none;
            margin-right: auto;
        }
    }

    .efteta {
        width: 100%;
        text-align: center;
        float: right;
        margin-top: -15px;
        color: #fff;
        font-weight: 700;
    }
    .dropdown-menu ul.menu .menu-info {
        right: 5px;
        top: -6px;
    }
    .notification {
    font-family: Vazir;
    }
    .btn-circle-lg {
border-radius: 20%!important;
    }
    @if(Auth::user()->role==1)
    .list li {
    display: none;
    }
    .main-index{
        display: none;
    }
    @endif
    <?php
    $useraccesss=App\Accessuser::where('user_id',Auth::id())->get();
    foreach ($useraccesss as $user_access){
        if ($user_access['access'] == "all"){ ?>
           .list li{
        display: block;
    }
    .main-index{display: block}
    <?php }

  elseif (count($useraccesss)) {
        ?>
        .list li.<?= $user_access['access']?> {
        display: block;
    }
    .main-index.<?= $user_access['access']?>{
    display: block;
    }
    <?php }

    }
    ?>

.ls-closed .bars:after, .ls-closed .bars:before{
        width: 30px!important;
    }
</style>
<body class="theme-red">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="preloader">
            {{--<div class="spinner-layer pl-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>--}}

        </div>
        <img style="padding-left: 60px;" src="{{asset('icons1/icon-96x96.png')}}">
        <p>لطفا صبر کنید ...</p>
    </div>
</div>
<!-- #END# Page Loader -->
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->
<!-- Search Bar -->
{{--<div class="search-bar">--}}
{{--    <div class="search-icon">--}}
{{--        <i class="material-icons">search</i>--}}
{{--    </div>--}}
{{--    <input type="text" placeholder="START TYPING...">--}}
{{--    <div class="close-search">--}}
{{--        <i class="material-icons">close</i>--}}
{{--    </div>--}}
{{--</div>--}}
<!-- #END# Search Bar -->
<!-- Top Bar -->

<nav class="navbar" style="background: #2e8943">

    <div class="container-fluid">
        <div class="navbar-header">
            <!--            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>-->
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="">Unity Dreams</a>

            <div class="image-mobile">

                @if(Auth::user()->avatar=='')
                    <img src="{{asset('images/user.png')}}"
                         width="48" height="48" alt="User"/>
                @else
                    <img
                        src="{{asset('images/user_profile/'.Auth::user()->avatar)}}"
                        width="48" height="48" alt="User"/>
                @endif

            </div>

            <div class="flex-col-c respon1 timer">
                <div class="cd100"></div>
                <span class="efteta">تا افتتاح حضور غیاب</span>
            </div>
        </div>


        @if(Auth::user()->role==1)
            <?php
            $usersnew=App\User::where('new','YES')->get();
            $userrequest=App\Userrequest::all();
            $userlist=App\Listpeople::where('confirmation','NOTOK')->get();
            $Goldenlist=App\Goldenlistpeople::where('confirmation','NO')->get();
            $photo=App\Photo::where('status','NEW')->get();

            ?>

        <div class="collapse navbar-collapse" id="navbar-collapse" style="position: absolute">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown" title="اطلاعیه جدید">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                        <i class="material-icons">notifications</i>
                        <span class="badge bg-pink label-count">جدید</span>
                    </a>
                    <ul class="dropdown-menu" >
                        <li class="header notification">اطلاعیه جدید</li>
                        <li class="body">
                            <ul class="menu menu-notifications" style="background: #fff;">
                                @if(count($usersnew))
                                <li class="isset">
                                    <a href="{{route('users.index')}}">
                                        <div class="icon-circle bg-light-green">
                                            <i class="material-icons">person_add</i>
                                        </div>
                                        <b class="badge bg-pink" id="count-new-user" style="float: left;margin-top: 10px;">{{count($usersnew)}}</b>
                                        <div class="menu-info">
                                            <h4> کاربر جدید</h4>
                                            {{--<p>
                                                <i class="material-icons">access_time</i> 14 mins ago
                                            </p>--}}
                                        </div>
                                    </a>
                                </li>

                                @endif
                                @if(count($userrequest))
                                <li class="isset">
                                    <a href="{{route('userrequest.index')}}">
                                        <div class="icon-circle bg-light-green">
                                            <i class="material-icons">done_all</i>
                                        </div>
                                        <b class="badge bg-pink" id="count-new-user" style="float: left;margin-top: 10px;">{{count($userrequest)}}</b>
                                        <div class="menu-info">
                                            <h4>نیاز به تائید </h4>
                                            {{--<p>
                                                <i class="material-icons">access_time</i> 14 mins ago
                                            </p>--}}
                                        </div>
                                    </a>
                                </li>

                                @endif

                                    @if(count($userlist))
                                        <li class="isset">
                                            <a href="{{route('listpeople.index')}}">
                                                <div class="icon-circle bg-light-green">
                                                    <i class="material-icons">assignment</i>
                                                </div>
                                                <b class="badge bg-pink" id="count-new-user" style="float: left;margin-top: 10px;">{{count($userlist)}}</b>
                                                <div class="menu-info">
                                                    <h4> نیاز به تائید (لیست افراد) </h4>
                                                    {{--<p>
                                                        <i class="material-icons">access_time</i> 14 mins ago
                                                    </p>--}}
                                                </div>
                                            </a>
                                        </li>

                                    @endif
                                    @if(count($Goldenlist))
                                        <li class="isset">
                                            <a href="{{route('goldenlist.index')}}">
                                                <div class="icon-circle bg-light-green">
                                                    <i class="material-icons">assignment</i>
                                                </div>
                                                <b class="badge bg-pink" id="count-new-user" style="float: left;margin-top: 10px;">{{count($Goldenlist)}}</b>
                                                <div class="menu-info">
                                                    <h4> نیاز به تائید (لیست طلایی افراد) </h4>
                                                    {{--<p>
                                                        <i class="material-icons">access_time</i> 14 mins ago
                                                    </p>--}}
                                                </div>
                                            </a>
                                        </li>

                                    @endif
                                    @if(count($photo))
                                        <li class="isset">
                                            <a href="{{route('photos.index')}}">
                                                <div class="icon-circle bg-light-green">
                                                    <i class="material-icons">assignment</i>
                                                </div>
                                                <b class="badge bg-pink" id="count-new-user" style="float: left;margin-top: 10px;">{{count($photo)}}</b>
                                                <div class="menu-info">
                                                    <h4> نیاز به تائید تصاویر </h4>
                                                    {{--<p>
                                                        <i class="material-icons">access_time</i> 14 mins ago
                                                    </p>--}}
                                                </div>
                                            </a>
                                        </li>

                                    @endif
                      {{--          <li>
                                    <a href="javascript:void(0);">
                                        <div class="icon-circle bg-cyan">
                                            <i class="material-icons">add_shopping_cart</i>
                                        </div>
                                        <div class="menu-info">
                                            <h4>4 sales made</h4>
                                            <p>
                                                <i class="material-icons">access_time</i> 22 mins ago
                                            </p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <div class="icon-circle bg-red">
                                            <i class="material-icons">delete_forever</i>
                                        </div>
                                        <div class="menu-info">
                                            <h4><b>Nancy Doe</b> deleted account</h4>
                                            <p>
                                                <i class="material-icons">access_time</i> 3 hours ago
                                            </p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <div class="icon-circle bg-orange">
                                            <i class="material-icons">mode_edit</i>
                                        </div>
                                        <div class="menu-info">
                                            <h4><b>Nancy</b> changed name</h4>
                                            <p>
                                                <i class="material-icons">access_time</i> 2 hours ago
                                            </p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <div class="icon-circle bg-blue-grey">
                                            <i class="material-icons">comment</i>
                                        </div>
                                        <div class="menu-info">
                                            <h4><b>John</b> commented your post</h4>
                                            <p>
                                                <i class="material-icons">access_time</i> 4 hours ago
                                            </p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <div class="icon-circle bg-light-green">
                                            <i class="material-icons">cached</i>
                                        </div>
                                        <div class="menu-info">
                                            <h4><b>John</b> updated status</h4>
                                            <p>
                                                <i class="material-icons">access_time</i> 3 hours ago
                                            </p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <div class="icon-circle bg-purple">
                                            <i class="material-icons">settings</i>
                                        </div>
                                        <div class="menu-info">
                                            <h4>Settings updated</h4>
                                            <p>
                                                <i class="material-icons">access_time</i> Yesterday
                                            </p>
                                        </div>
                                    </a>
                                </li>--}}
                            </ul>
                        </li>
                    {{--    <li class="footer">
                            <a href="javascript:void(0);">View All Notifications</a>
                        </li>--}}
                    </ul>
                </li>
            </ul>
        </div>
         @endif
    </div>
</nav>
<!-- #Top Bar -->
<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <a href="{{route('profile.index')}}">
                <div class="image">
                    @if(Auth::user()->avatar=='')
                        <img src="{{asset('images/user.png')}}"
                             width="48" height="48" alt="User"/>
                    @else
                        <img
                            src="{{asset('images/user_profile/'.Auth::user()->avatar)}}"
                            width="48" height="48" alt="User"/>
                    @endif

                </div>

            </a>

            <div class="info-container" style="line-height: 1.7">
                <div class="name" data-toggle="dropdown"
                     aria-haspopup="true"
                     aria-expanded="false" style="font-size: 10px">رده سازمانی : @if(Auth::user()->level==1)
                        Beginner
                    @elseif(Auth::user()->level==2)
                        Presenter
                    @elseif(Auth::user()->level==3)
                        Trainer
                    @elseif(Auth::user()->level==4)
                        Advisor
                    @elseif(Auth::user()->level==5)
                        Leader
                    @elseif(Auth::user()->level==6)
                        Top Leader
                    @elseif(Auth::user()->level==7)
                        Masster
                    @endif</div>
                <div class="name" data-toggle="dropdown"
                     aria-haspopup="true"
                     aria-expanded="false" style="font-size: 10px">نام کاربری : {{Auth::user()->username}}</div>
                <div class="email">
                                                                        <span style="font-size: 10px">
                                                                        کد کاربری :
                                                                            {{Auth::user()->reference_code}}
                                                                        </span>
                </div>
                {{--  <div class="btn-group user-helper-dropdown">
                      <i class="material-icons" data-toggle="dropdown"
                         aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                      <ul class="dropdown-menu pull-right">
                          <li><a href="{{route('profile.index')}}"><i
                                      class="material-icons">person</i>پروفایل</a>
                          </li>
                          --}}{{--                        <li role="separator" class="divider"></li>--}}{{--
                          --}}{{--                        <li><a href="javascript:void(0);"><i class="material-icons">group</i>Followers</a></li>--}}{{--
                          --}}{{--                        <li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>Sales</a></li>--}}{{--
                          --}}{{--                        <li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li>--}}{{--
                          --}}{{--                        <li role="separator" class="divider"></li>--}}{{--
                          <li><a href="{{route('logout')}}"><i
                                      class="material-icons">input</i>خروج</a>
                          </li>
                      </ul>
                  </div>--}}
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">


                @if(Auth::user()->role==0)
                    <li class="karbar">
                        <a href="{{route('dashboard.index')}}">
                            <i class="material-icons">home</i>
                            <span>داشبورد</span>
                        </a>
                    </li>

                    <li class="karbar">
                        <a href="{{route('training.index')}}">
                            <i class="material-icons">insert_drive_file</i>
                            <span> آموزش ها</span>
                        </a>
                    </li>
                    {{--    <li>
                            <a href="{{route('exam.index')}}">
                                <i class="material-icons">import_contacts</i>
                                <span>آزمون</span>
                            </a>
                        </li>--}}
                    <li class="karbar">
                        <a href="{{route('IntroducingProducts.index')}}">
                            <i class="material-icons">shopping_cart</i>
                            <span> محصولات</span>
                        </a>
                    </li>

                @endif
                @if(Auth::user()->role==1)
                    <li class="dashboard active">
                        <a href="{{route('dashboard.index')}}">
                            <i class="material-icons">home</i>
                            <span>داشبورد</span>
                        </a>
                    </li>
                        <li class="dashboard">
                        <a target="_blank" href="{{route('orgchart.index')}}">
                            <i class="material-icons">device_hub</i>
                            <span>جنیالوژی</span>
                        </a>
                    </li>
                    <li class="education">
                        <a href="javascript:void(0);"
                           class="menu-toggle">
                            <i class="material-icons">dvr</i>
                            <span>مدیریت آموزش ها</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="education">
                                <a href="{{route('education.index')}}">
                                    <i class="material-icons"
                                       style="margin-top: -2px;">chrome_reader_mode</i>
                                    <span>مدیریت آموزش ها</span>
                                </a>
                            </li>
                            <li class="description">
                                <a href="{{route('description.index')}}">
                                    <i class="material-icons"
                                       style="margin-top: -2px;">library_books</i>
                                    <span>توضیحات</span>
                                </a>
                            </li>

                        </ul>
                    </li>


                    <li class="Topseller">
                        <a href="{{route('Topseller.index')}}">
                            <i class="material-icons">grade</i>
                            <span>باشگاه میلیونرها</span>
                        </a>
                    </li>




                    <li class="users">
                        <a href="javascript:void(0);"
                           class="menu-toggle">
                            <i class="material-icons">account_box</i>
                            <span>مدیریت کاربران</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="{{route('adminlist.index')}}">
                                    <i class="material-icons"
                                       style="margin-top: -2px;">account_box</i>
                                    <span>لیست مدیران</span>
                                </a>
                            </li>
                            <li class="users">
                                <a href="{{route('users.index')}}">
                                    <i class="material-icons"
                                       style="margin-top: -2px;">supervisor_account</i>
                                    <span>لیست کاربران</span>
                                </a>
                            </li>
                            <li class="club">
                                <a href="{{route('club.index')}}">
                                    <i class="material-icons"
                                       style="margin-top: -2px;">people_outline</i>
                                    <span>باشگاه مشتریان</span>
                                </a>
                            </li>
                            <li class="listpeople">
                                <a href="{{route('listpeople.index')}}">
                                    <i class="material-icons"
                                       style="margin-top: -2px;">assignment</i>
                                    <span>لیست افراد ارسال شده</span>
                                </a>
                            </li>
                            <li class="goldenlist">
                                <a href="{{route('goldenlist.index')}}">
                                    <i class="material-icons"
                                       style="margin-top: -2px;">assignment</i>
                                    <span>لیست طلایی افراد ارسال شده</span>
                                </a>
                            </li>
                            <li class="listtargets">
                                <a href="{{route('listtargets.index')}}">
                                    <i class="material-icons"
                                       style="margin-top: -2px;">flight_takeoff</i>
                                    <span>لیست اهداف ارسال شده</span>
                                </a>
                            </li>

                            <li class="userrequest">
                                <a href="{{route('userrequest.index')}}">
                                    <i class="material-icons"
                                       style="margin-top: -2px;">done_all</i>
                                    <span>لیست افراد تائید شده</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                        <li class="meetings">
                            <a href="{{route('meetings.index')}}">
                                <i class="material-icons">recent_actors</i>
                                <span>لیست جلسات</span>
                            </a>
                        </li>
                    <li class="IntroducingProducts">
                        <a href="{{route('IntroducingProducts.index')}}">
                            <i class="material-icons">shopping_cart</i>
                            <span>معرفی محصولات</span>
                        </a>
                    </li>


                @endif
                @if(Auth::user()->role==2)
                    <li class="">
                        <a href="{{route('dashboard.index')}}">
                            <i class="material-icons">home</i>
                            <span>داشبورد</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('education.index')}}">
                            <i class="material-icons">dvr</i>
                            <span>مدیریت آموزش ها</span>
                        </a>
                    </li>


                @endif
                    <li style="display: block">
                        <a href="{{route('logout')}}">
                            <i class="material-icons">exit_to_app</i>
                            <span>خروج</span>
                        </a>
                    </li>

            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal" style="background: #459648;border-top: 1px solid #3b8e3e;">
            <div class="copyright">
                <a href="javascript:void(0);">Unity Dreams</a>
            </div>
            <div class="version">

            </div>
        </div>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->
    <!-- Right Sidebar -->
    <aside id="rightsidebar" class="right-sidebar">
        <ul class="nav nav-tabs tab-nav-right" role="tablist">
            <li role="presentation" class="active"><a href="#skins"
                                                      data-toggle="tab">SKINS</a>
            </li>
            <li role="presentation"><a href="#settings"
                                       data-toggle="tab">SETTINGS</a>
            </li>
        </ul>

    </aside>
    <!-- #END# Right Sidebar -->
</section>

<section class="content">

    @if(Auth::user()->role==1)
        @yield('content')
    @elseif(Auth::user()->role==0)
        @yield('content_user')
    @elseif(Auth::user()->role==2)
        @yield('content_writer')
    @endif


    <audio id="audio"
           src="{{asset('sound/stardust_planetaryperc.mp3')}}"></audio>
    <audio id="back_audio"
           src="{{asset('sound/backsound.mp3')}}"></audio>
    <audio id="menu_audio"
           src="{{asset('sound/node43123.mp3')}}"></audio>
</section>

<footer style="background: #2e8943">
    <section class="content">

        <span>
                <a onclick="play()" href="{{route('dashboard.index')}}"><img src="{{asset('images/home.jpg')}}"></a>
        </span>
        <ul class="menu_footer_right">
            <li>
                <a {{--href="{{route('photos.index')}}"--}} class="col-xs-4 my-home-icon">
                    <button type="button" class="btn bg-cyan btn-circle-lg waves-effect waves-circle waves-float">
                        <i style="background: url({{asset('images/icon/viber.svg')}})"></i>
                    </button>
                </a>

            </li>

            <li>
                <a {{--href="{{route('photos.index')}}"--}} class="col-xs-4 my-home-icon">
                    <button type="button" class="btn bg-cyan btn-circle-lg waves-effect waves-circle waves-float">
                        <i style="background: url({{asset('images/icon/target.svg')}})"></i>
                    </button>
                </a>
            </li>

            @if(Auth::user()->role==1)
                <li>
                    <a href="{{route('rules.index')}}" class="col-xs-4 my-home-icon">
                        <button type="button" class="btn bg-cyan btn-circle-lg waves-effect waves-circle waves-float">
                            <i style="background: url({{asset('images/icon/unnamed.png')}})"></i>
                        </button>
                    </a>
                </li>
            @else
                <li>
                    <a href="{{route('rules.index_user')}}" class="col-xs-4 my-home-icon">
                        <button type="button" class="btn bg-cyan btn-circle-lg waves-effect waves-circle waves-float">
                            <i style="background: url({{asset('images/icon/law.svg')}})"></i>
                        </button>
                    </a>
                </li>
            @endif

        </ul>

        <ul class="menu_footer_left">
            <li>
                <a {{--href="{{route('photos.index')}}"--}} class="col-xs-4 my-home-icon">
                    <button type="button" class="btn bg-cyan btn-circle-lg waves-effect waves-circle waves-float">
                        <i style="background: url({{asset('images/icon/instagram.svg')}})"></i>
                    </button>
                </a>
            </li>

            <li>
                <a {{--href="{{route('photos.index')}}"--}} class="col-xs-4 my-home-icon">
                    <button type="button" class="btn bg-cyan btn-circle-lg waves-effect waves-circle waves-float">
                        <i style="background: url({{asset('images/icon/telegram.svg')}})"></i>
                    </button>
                </a>
            </li>

            <li>
                <a {{--href="{{route('photos.index')}}"--}} class="col-xs-4 my-home-icon">
                    <button type="button" class="btn bg-cyan btn-circle-lg waves-effect waves-circle waves-float">
                        <i style="background: url({{asset('images/icon/whatsapp.svg')}})"></i>
                    </button>
                </a>
            </li>
        </ul>
    </section>
</footer>

<div class="sound_all">

</div>
<!-- Jquery Core Js -->


<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap Core Js -->
<script
    src="{{asset('plugins/bootstrap/js/bootstrap.js')}}"></script>

<!-- Select Plugin Js -->
<script
    src="{{asset('plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>

<!-- Slimscroll Plugin Js -->
<script
    src="{{asset('plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>

<!-- JQuery Steps Plugin Js -->
<script
    src="{{asset('plugins/jquery-steps/jquery.steps.js')}}"></script>

<!-- Waves Effect Plugin Js -->
<script src="{{asset('plugins/node-waves/waves.js')}}"></script>

<script
    src="{{asset('plugins/light-gallery/js/lightgallery-all.js')}}"></script>

<script src="{{asset('js/sweetAlert2/cdn.jsdelivr.js')}}"></script>

<!-- Custom Js -->
<script
    src="{{asset('js/pages/medias/image-gallery.js')}}"></script>

<!-- Custom Js -->
<script src="{{asset('js/admin.js')}}"></script>

<!-- form-wizard -->
<script
    src="{{asset('js/pages/forms/basic-form-elements.js')}}"></script>

<script src="{{asset('js/pages/index.js')}}"></script>

<!-- Demo Js -->
<script src="{{asset('js/timer/demo.js')}}"></script>


@yield('script')
<script>


    $('.menu .list li').click(function () {
        $('.menu .list li').removeClass('active');
        $(this).addClass('active');
    });


    function play() {
        var audio = document.getElementById("audio");
        audio.play();
    }

    function back_audio() {
        var audio = document.getElementById("back_audio");
        audio.play();
    }

    function menu_audio() {
        var audio = document.getElementById("menu_audio");
        audio.play();
    }

    $('.clearfix button').click(function () {
        play();
    });
    $('.header a.waves-circle').click(function () {
        back_audio();
    });
    $('.list li a').click(function () {
        menu_audio();
    });


</script>

<script src="{{asset('js/timer/flipclock.min.js')}}"></script>
<script src="{{asset('js/timer/moment.min.js')}}"></script>
<script src="{{asset('js/timer/moment-timezone.min.js')}}"></script>
<script src="{{asset('js/timer/moment-timezone-with-data.min.js')}}"></script>
<script src="{{asset('js/timer/countdowntime.js')}}"></script>
<script>
    $('.cd100').countdown100({

        /*Set Endtime here*/
        /*Endtime must be > current time*/
        endtimeYear: 2020,
        endtimeMonth: 5,
        endtimeDate: 4,
        endtimeHours: 24,
        endtimeMinutes: 0,
        endtimeSeconds: 0,
        timeZone: "Asia/Tehran"
        // ex:  timeZone: "America/New_York"
        //go to " http://momentjs.com/timezone/ " to get timezone
    });

    var count_not=$('.isset').html();
    if(count_not){
        $('.label-count').show();
    }else{
        $('.label-count').hide();
        $('.notification').html('اطلاعیه جدیدی وجود ندارد')
    }

</script>

</body>

</html>
