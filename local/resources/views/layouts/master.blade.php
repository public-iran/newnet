<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>وحدت رویاها</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/logo1.png')}}">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset('front/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/slicknav.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/rtl.css')}}">
    <link rel="stylesheet" href="{{asset('css/smoothslides.theme.css')}}">

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <style>
        .caption>h5>span{
            font-size: 14px !important;
        }

    </style>

</head>

<body>
<!--? Preloader Start -->
<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="preloader-circle"></div>
            <div class="preloader-img pere-text">
                <img src="{{asset('images/logo1.png')}}" alt="">
            </div>
        </div>
    </div>
</div>
<!-- Preloader Start -->
<header>
    <!-- Header Start -->
    <div class="header-area bg-white" >
        <div class="main-header header-sticky">
            <div class="container-fluid">
                <div class="menu-wrapper">
                    <!-- Logo -->
                    <div class="logo">
                        <a href="{{url('/')}}"><img width="100px" src="{{asset('images/logo1.png')}}" alt=""></a>
                    </div>
                    <!-- Main-menu -->
                    <div class="main-menu d-none d-lg-block">
                        <nav>
                            <ul id="navigation">
                                <li><a href="{{url('/')}}">خانه</a></li>
{{--                                <li><a href="{{route('product.show','امداد-خودرو')}}">فروشگاه</a></li>--}}
                                <li><a href="{{route('product.index')}}">فروشگاه</a></li>
                                <li><a href="{{route('service.index')}}">خدمات</a></li>
                                <li><a href="درباره ما.html">درباره ما</a></li>
                                <li><a href="#">آخرین ها</a>
                                    <ul class="submenu">
                                        <li><a href="#"> لیست محصول</a></li>
                                        <li><a href="#"> جزئیات محصول</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">1بلاگ</a>
                                    <ul class="submenu">
                                        <li><a href="blog.html">بلاگ</a></li>
                                        <li><a href="blog-details.html">جزئیات بلاگ</a></li>
                                    </ul>
                                </li>
                                @if(Auth::check())
                                    <li>
                                        <a href="#">
                                            ورود به پنل درآمدی
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            ورود به پنل آموزشی
                                        </a>
                                    </li>
                                @endif
                                {{--                                <li>--}}
                                {{--                                    <a href="#">صفحات</a>--}}
                                {{--                                    <ul class="submenu">--}}
                                {{--                                        <li><a href="login.html">لاگین</a></li>--}}
                                {{--                                        <li><a href="cart.html">کارت</a></li>--}}
                                {{--                                        <li><a href="elements.html">المان ها</a></li>--}}
                                {{--                                        <li><a href="confirmation.html">تایدیه ها</a></li>--}}
                                {{--                                        <li><a href="checkout.html">سبد خرید</a></li>--}}
                                {{--                                    </ul>--}}
                                {{--                                </li>--}}
                            </ul>
                        </nav>
                    </div>
                    <!-- Header Right -->
                    <div class="header-right">
                        <ul>
                            <li>
                                <div class="nav-search search-switch">
                                    <span class="flaticon-search"></span>
                                </div>
                            </li>
                            <li> <a href="/login"><span class="flaticon-user"></span></a></li>
                            <li><a href="{{route('basket.index')}}"><span class="flaticon-shopping-cart"></span></a> </li>
                        </ul>
                    </div>
                </div>
                <!-- Mobile Menu -->
                <div class="col-12">
                    <div class="mobile_menu d-block d-lg-none"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>

@yield('content')


<footer>
    <!-- Footer Start-->

    <div class="footer-area">
        <div class="container">
            <div class="row d-flex justify-content-between">
                <div class="col-xl-3 col-lg-3 col-md-5 col-sm-6">
                    <div class="single-footer-caption mb-50">
                        <div class="single-footer-caption mb-30">
                            <!-- logo -->
                            <div class="footer-logo">
                                <a href="index.html"><img width="100px" src="{{asset('images/logo1.png')}}" alt=""></a>
                            </div>
                            <div class="footer-tittle">
                                <div class="footer-pera">
                                    <p>Unity Dreams خانواده ای با هدف تعالی و تجلی رویاها و متحد کردن رویاهای همه برای رسیدن به اهداف مشترک خانواده ای که با اتحاد و همدلی برای اهداف هم در تلاش اند و صمیمانه برای رشد و پیشرفت هم‌می کوشند.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-3 col-sm-5">
                    <div class="single-footer-caption mb-50">
                        <div class="footer-tittle">
                            <h4>مجوزها</h4>
                            <ul>
                                <li>................</li>
                                <li>................</li>
                                <li>................</li>
                                <li>................</li>
                                <li>................</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-7">
                    <div class="single-footer-caption mb-50">
                        <div class="footer-tittle">
                            <h4>جدیدترین محصولات</h4>
                            <ul>
                                <li>محصول یک</li>
                                <li>محصول یک</li>
                                <li>محصول یک</li>
                                <li>محصول یک</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-5 col-sm-7">
                    <div class="single-footer-caption mb-50">
                        <div class="footer-tittle">
                            <h4>ارتباط با ما</h4>
                            <ul>
                                <li>شماره تماس : 0213348596</li>
                                <li>فکس : 0213348596</li>
                                <li>پشتیبانی : 0213348596</li>
                                <li>مشاوره : 0213348596</li>
                                <li>ایمیل : info@vahdataroyaha.com</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer bottom -->
            <div class="row align-items-center" style="display: flex;justify-content: space-between">
                <div class="">
                    <div class="footer-copy-right">
                        <p style="font-size: 14px"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> تمامی حقوق سایت برای شرکت خرید اینترنتی وحدت رویاها محفوظ می باشد.

                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    </div>
                </div>
                <div class="">
                    <div class="footer-copy-right f-right">
                        <!-- social -->
                        <div class="footer-social">
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="https://www.facebook.com/sai4ull"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-behance"></i></a>
                            <a href="#"><i class="fas fa-globe"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End-->
</footer>
<!--? Search model Begin -->
<div class="search-model-box">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-btn">+</div>
        <form class="search-model-form">
            <input type="text" id="search-input" placeholder="عبارت مورد نظر خود را وارد کنید ...">
        </form>
    </div>
</div>
<!-- Search model end -->

<!-- JS here -->

<script src="{{asset('front/assets/js/vendor/modernizr-3.5.0.min.js')}}"></script>
<!-- Jquery, Popper, Bootstrap -->
<script src="{{asset('front/assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
<script src="{{asset('front/assets/js/popper.min.js')}}"></script>
<script src="{{asset('front/assets/js/bootstrap.min.js')}}"></script>

<!-- Jquery Mobile Menu -->
<script src="{{asset('front/assets/js/jquery.slicknav.min.js')}}"></script>

<!-- Jquery Slick , Owl-Carousel Plugins -->
<script src="{{asset('front/assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('front/assets/js/slick.min.js')}}"></script>

<!-- One Page, Animated-HeadLin -->
<script src="{{asset('front/assets/js/wow.min.js')}}"></script>
<script src="{{asset('front/assets/js/animated.headline.js')}}"></script>
<script src="{{asset('front/assets/js/jquery.magnific-popup.js')}}"></script>

<!-- Scrollup, nice-select, sticky -->
<script src="{{asset('front/assets/js/jquery.scrollUp.min.js')}}"></script>
<script src="{{asset('front/assets/js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('front/assets/js/jquery.sticky.js')}}"></script>

<!-- contact js -->
<script src="{{asset('front/assets/js/contact.js')}}"></script>
<script src="{{asset('front/assets/js/jquery.form.js')}}"></script>
<script src="{{asset('front/assets/js/jquery.validate.min.js')}}"></script>
<script src="{{asset('front/assets/js/mail-script.js')}}"></script>
<script src="{{asset('front/assets/js/jquery.ajaxchimp.min.js')}}"></script>

<!-- Jquery Plugins, main Jquery -->
<script src="{{asset('front/assets/js/plugins.js')}}"></script>
<script src="{{asset('front/assets/js/main.js')}}"></script>

<script src="{{asset('js/smoothslides-2.2.1.min.js')}}"></script>
<script type="text/javascript">
    $(window).load( function() {
        $('#myslideshow1').smoothSlides({
            matchImageSize : false,
            effect: 'zoomOut'

        });
    });
</script>

</body>
</html>
