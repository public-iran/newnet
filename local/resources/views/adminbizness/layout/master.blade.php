<?php
if (!session('Business') and session('Business') != "success"){
header("Location: " . URL::to('/admin/dashboard'), true);
?>
{{--<script>window.location = "/admin/dashboard";</script>--}}
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
    <link href="{{asset('css/newcss/style.css')}}" rel="stylesheet">
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

    <!-- PersianDateTimePicker Css-->
{{--    <link href="{{asset('js/plugins/jalali-date/jquery.Bootstrap-PersianDateTimePicker.css')}}" media="all" rel="stylesheet" type="text/css" />--}}


    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
{{--    <script src="{{asset('js/plugins/jalali-date/jquery-1.12.js')}}"></script>--}}{{--  یادم باشه حذف کنم--}}


    <link href="{{asset('css/myStyle.css')}}" rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.14.1/plugins/codesnippet/lib/highlight/styles/atelier-dune.light.min.css"
          integrity="sha256-kVA59VvsK3cgJIpBJMuglsRvdPwmX7unAp+OUuGNHVc=" crossorigin="anonymous"/>


    @yield('style_link')
    <style>
        .waitMe_container .waitMe * {
            font-family: Vazir !important;
            font-size: 10px;
        }

        .ls-closed .bars:before {
            content: 'dashboard';
            z-index: 100;
        }


        .theme-red .sidebar .legal .copyright a {
            color: #fff !important;
        }

        .sidebar .legal {
            padding: 14px;
        }

        .theme-red .bars {
            color: #000;
        }

        .ls-closed .bars:before {
            content: 'menu' !important;
        }

        .theme-red .bars {
            color: #9a9a9a;
        }

        .pagination > .active > a, .pagination > .active > span, .pagination > .active > a:hover, .pagination > .active > span:hover, .pagination > .active > a:focus, .pagination > .active > span:focus {
            background-color: #61c579;
            border-color: #61c579;
        }
    </style>
    @yield('style')
</head>

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

    .btnf {
        height: 54px;
        line-height: 2;
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        color: #777;
        border: none !important;
        box-shadow: unset !important;
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

    .w-footer {
        padding-right: 300px;
    }

    @media (max-width: 767px) {
        .w-footer {
            padding-right: 0px;
        }

        .navbar-brand {
            display: none;
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
        background: #fff;
    }


    .menu .list li a span {
        color: #666 !important;
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
        border-radius: 20% !important;
    }


    .ls-closed .bars:after, .ls-closed .bars:before {
        width: 30px !important;
    }

    .sidebar .user-info .info-container .name {
        color: #ffffff;
        background: #61c579;
        padding: 6px 12px 6px 6px;
        border-radius: 6px;
        margin-bottom: 2px;
    }

    .theme-red .sidebar .menu .list li.active > :first-child i {
        color: #61c579;
    }

    .sidebar .menu .list a {
        color: #61c579;
    }

    .bff {
        color: #61c579;
    }

    .sidebar .user-info {
        background: url('{{asset('images/user-img-background1.jpg')}}') no-repeat no-repeat;
        background-size: cover;
    }

    body {
        background: #ececec !important;
    }

    .navbar-brand {
        padding: 0px 15px;
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

<nav class="navbar" style="background: #ffffff;">
    <div class="container-fluid">
        <div class="navbar-header">
            <!--            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>-->
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="">
                <img width="50px" src="{{asset('images/logo1.png')}}" alt="">
            </a>

            <div class="image-mobile">

                <img src="{{asset('images/logo1.png')}}"
                     width="48" height="48" alt="User"/>

            </div>
        </div>
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
                    <img style="border: 1px solid #61c579;" src="{{asset('images/user1.jpg')}}"
                         width="48" height="48" alt="User"/>
                </div>

            </a>

            <div class="info-container" style="line-height: 1.7">

                <div class="name" data-toggle="dropdown"
                     aria-haspopup="true"
                     aria-expanded="false" style="font-size: 10px">نام کاربری : {{Auth::user()->username}}</div>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">

                <li class="dashboard active">
                    <a href="{{route('dashboardb.index')}}">
                        <i class="material-icons">av_timer</i>
                        <span>داشبورد</span>
                    </a>
                </li>

                <li class="dashboard">
                    <a href="{{route('positioninformations.index')}}">
                        <i class="material-icons">dns</i>
                        <span>اطلاعات دفتر کار</span>
                    </a>
                </li>

                <li class="dashboard">
                    <a href="{{route('showpositions.index')}}">
                        <i class="material-icons">people</i>
                        <span>شرکای تجاری</span>
                    </a>
                </li>
                @if(Auth::user()->role==1)
                <li class="dashboard">
                    <a href="{{route('products.index')}}">
                        <i class="material-icons">shopping_cart</i>
                        <span>محصولات</span>
                    </a>
                </li>
                    <li class="dashboard">
                        <a href="{{route('services.index')}}">
                            <i class="material-icons">all_inclusive</i>
                            <span>خدمات</span>
                        </a>
                    </li>
                @endif
                <li class="dashboard">
                    <a href="{{route('wallet.index')}}">
                        <i class="material-icons">credit_card</i>
                        <span>کیف پول</span>
                    </a>
                </li>

                @if(Auth::user()->role==1)
                <li class="dashboard">
                    <a href="{{route('users.index')}}">
                        <i class="material-icons">people_outline</i>
                        <span>لیست کاربران</span>
                    </a>
                </li>
                @endif
                {{--                <li class="education">--}}
                {{--                    <a href="javascript:void(0);"--}}
                {{--                       class="menu-toggle">--}}
                {{--                        <i class="material-icons">dvr</i>--}}
                {{--                        <span>مدیریت آموزش ها</span>--}}
                {{--                    </a>--}}
                {{--                    <ul class="ml-menu">--}}
                {{--                        <li class="education">--}}
                {{--                            <a href="{{route('education.index')}}">--}}
                {{--                                <i class="material-icons"--}}
                {{--                                   style="margin-top: -2px;">chrome_reader_mode</i>--}}
                {{--                                <span>مدیریت آموزش ها</span>--}}
                {{--                            </a>--}}
                {{--                        </li>--}}
                {{--                        <li class="description">--}}
                {{--                            <a href="{{route('description.index')}}">--}}
                {{--                                <i class="material-icons"--}}
                {{--                                   style="margin-top: -2px;">library_books</i>--}}
                {{--                                <span>توضیحات</span>--}}
                {{--                            </a>--}}
                {{--                        </li>--}}

                {{--                    </ul>--}}
                {{--                </li>--}}

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
        <div class="legal" style="background: #61c579;">
            <div class="copyright" align="center">
                <a href="javascript:void(0);">وحدت رویاها | پنل کسب درآمد</a>
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

    @if(Auth::user()->buy_package=="NO")
        <div class="alert bg-red">
            شما هنوز پکیجی خریداری نکرده اید برای خرید پکیج
            <a href="{{route('buy-package.index')}}" class="alert-link">کلیک کنید</a>.
        </div>
        @if(session('buy_package_danger'))
            <div class="alert bg-red alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
                {{session('buy_package_danger')}}
            </div>
        @endif
        @if(session('buy_package_d'))
            <div class="alert bg-red alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
                {{session('buy_package_d')}}
            </div>

        @endif
        @if(session('PAY_Account_charging_d'))
            <div class="alert bg-red alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
                {{session('PAY_Account_charging_d')}}
            </div>

        @endif
        @if(session('PAY_Account_charging_s'))
            <div class="alert bg-green alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
                {{session('PAY_Account_charging_s')}}
            </div>
        @endif
        @php
            Session::forget('buy_package_d');
            Session::forget('PAY_Account_charging_s');
            Session::forget('PAY_Account_charging_d');
            Session::forget('buy_package_danger');
        @endphp

        @yield('content_buy_package')
    @else
        @if(Auth::user()->role==1)
            @yield('Admin_content')
            @yield('content')
        @else
            @yield('content')
        @endif
    @endif


    {{--    <audio id="audio"--}}
    {{--           src="{{asset('sound/stardust_planetaryperc.mp3')}}"></audio>--}}
    {{--    <audio id="back_audio"--}}
    {{--           src="{{asset('sound/backsound.mp3')}}"></audio>--}}
    {{--    <audio id="menu_audio"--}}
    {{--           src="{{asset('sound/node43123.mp3')}}"></audio>--}}
</section>

<footer style="background: #ffffff">
    <div class="w-footer" style="display: flex;justify-content: space-between">
        <a href="{{route('profile.index')}}" type="button" class="btn btn-default waves-effect waves-green btnf"><i
                class="material-icons bff">person</i><span>پروفایل</span></a>
        <a href="{{route('wallet.index')}}" type="button" class="btn btn-default waves-effect waves-green btnf"><i
                class="material-icons bff">credit_card</i><span>کیف پول</span></a>
        <a href="{{route('products.index')}}" type="button" class="btn btn-default waves-effect waves-green btnf"><i
                class="material-icons bff">shopping_cart</i><span>فروشگاه</span></a>
        <a type="button" class="btn btn-default waves-effect waves-green btnf"><i
                class="material-icons bff">view_quilt</i><span>سرویس ها</span></a>

    </div>


</footer>

<div class="sound_all">

</div>
<!-- Jquery Core Js -->
@if(@$jquery_min)
    <?= $jquery_min ?>
@else
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
@endif

<!-- Autosize Plugin Js -->
<script src="{{asset('js/plugins/autosize/autosize.js')}}"></script>

<script type="text/javascript" src="{{asset('js/plugins/jalali-date/jalaali.js')}}"></script>
<script type="text/javascript" src="{{asset('js/plugins/jalali-date/jquery.Bootstrap-PersianDateTimePicker.js')}}"></script>

<!-- Bootstrap Core Js -->
<script src="{{asset('js/pages/ui/notifications.js')}}"></script>

<script src="{{asset('plugins/bootstrap-notify/bootstrap-notify.js')}}"></script>
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
<script src="{{asset('js/demo.js')}}"></script>

<script src="{{asset('plugins/waitme/waitMe.js')}}"></script>


@yield('script_link')

{{--<script src="{{asset('js/ckeditor.js')}}"></script>--}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.14.1/ckeditor.js"></script>
<script>
    CKEDITOR.replace('content', {
        language: 'fa'
    });

    // CKEDITOR.replace( 'editor1' );
</script>
@yield('script')


</body>

</html>
