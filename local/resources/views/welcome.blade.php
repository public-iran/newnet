@extends('layouts.master')
@section('content')
    <style>
        .flip-card {
            background-color: transparent;
            width: 100%;
            height: 28rem;
            perspective: 1000px;
            margin-bottom: 16px;
        }
        .new-product-area{
            padding: 10px !important;
        }
    </style>
    <main>
{{--        <div class="container">--}}
        <!--? slider Area Start -->
{{--        <div class="row">--}}
{{--            <div class="col-xl-12 col-xs-12 col-md-12 col-sm-12">--}}
                <div dir="ltr" class="slider-area ">
                    <div class="smoothslides" id="myslideshow1">
                        <img src="{{asset('img/8-steps-to-dreams-come-true.png')}}"/>
                        <img src="{{asset('img/shoping.jpg')}}"/>
                    </div>
                </div>
{{--            </div>--}}
{{--        </div>--}}
{{--        </div>--}}
        <!-- slider Area End-->

        <!-- ? New Product Start -->
        <section class="new-product-area" style="padding: 80px">
            <div class="container">
                <!-- Section tittle -->
                <div class="row">
                    <div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
                        <div class="section-tittle mb-70 text-center">
                            <h2>خدمات ما</h2>
                            <p>باشگاه مشتریان وحدت رویاها</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-xl-4 col-lg-4 col-md-6 col-sm-6">
                        <div class="flip-card">
                            <div class="flip-card-inner">
                                <div class="flip-card-front" style="display: flex;flex-direction: column;align-items: center">
                                    <img src="{{asset('front/assets/img/feature-box-bg.jpg')}}" alt="Avatar" style="width:300px;height:300px;">
                                    <span>کارت آتیه طلایی</span>
                                </div>
                                <div class="flip-card-back">
                                    <span class="lineme"></span>
                                    <h3>کارت آتیه طلایی</h3>
                                    <p>
                                        کارت بانکی عضو شتاب با قابلیت پس انداز همانند کارت طلایی و بیمه عمر، آتیه و بازنشستگی
                                    </p>
                                    <span class="lineme"></span>
                                    <div>
                                        <a href="#" class="genric-btn default circle" style="background: #61c579;color: #fff">ادامه مطلب ...</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-xl-4 col-lg-4 col-md-6 col-sm-6">
                        <div class="flip-card">
                            <div class="flip-card-inner">
                                <div class="flip-card-front" style="display: flex;flex-direction: column;align-items: center">
                                    <img src="{{asset('front/assets/img/shop.jpg')}}" alt="Avatar" style="width:300px;height:300px;">
                                    <span>طرف قرارداد ها</span>
                                </div>
                                <div class="flip-card-back">
                                    <span class="lineme"></span>
                                    <h3>کارت آتیه طلایی</h3>
                                    <p>
                                        کارت بانکی عضو شتاب با قابلیت پس انداز همانند کارت طلایی و بیمه عمر، آتیه و بازنشستگی
                                    </p>
                                    <span class="lineme"></span>
                                    <div>
                                        <a href="#" class="genric-btn default circle" style="background: #61c579;color: #fff">ادامه مطلب ...</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-xl-4 col-lg-4 col-md-6 col-sm-6">
                        <div class="flip-card">
                            <div class="flip-card-inner">
                                <div class="flip-card-front" style="display: flex;flex-direction: column;align-items: center">
                                    <img src="{{asset('front/assets/img/feature-box-bg-2.jpg')}}" alt="Avatar" style="width:300px;height:300px;">
                                    <span>کارت طلایی پس انداز</span>
                                </div>
                                <div class="flip-card-back">
                                    <span class="lineme"></span>

                                    <h3>کارت آتیه طلایی</h3>
                                    <p>
                                        کارت بانکی عضو شتاب با قابلیت پس انداز همانند کارت طلایی و بیمه عمر، آتیه و بازنشستگی
                                    </p>
                                    <span class="lineme"></span>
                                    <div>
                                        <a href="#" class="genric-btn default circle" style="background: #61c579;color: #fff">ادامه مطلب ...</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--  New Product End -->


    <!--? Popular Items Start -->
    <div class="popular-items ">
        <div class="container">
            <!-- Section tittle -->
{{--            <div class="row justify-content-center">--}}
{{--                <div class="col-xl-7 col-lg-8 col-md-10">--}}
{{--                    <div class="section-tittle mb-70 text-center">--}}
{{--                        <h2>کارت های طلایی پس انداز</h2>--}}
{{--                        <p>مراکز طرف قرارداد باشگاه مشتریان وحدت رویاها</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="row">
                <div class="col-xs-12 col-lg-4 col-md-6 col-sm-12">
                    <div class="single-popular-items mb-50 text-center">
                        <div class="popular-img">
                            <img src="{{asset('front/assets/img/13762.jpg')}}" alt="">
                            <div class="img-cap">
                                <span>اضافه به سبد خرید</span>
                            </div>
                            <div class="favorit-items">
                                <span class="flaticon-heart"></span>
                            </div>
                        </div>
                        <div class="popular-caption">
                            <h3><a href="product_details.html">کالای خواب دریا</a></h3>
                            <span>مرکز تجاری مروارید</span>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-lg-4 col-md-6 col-sm-12">
                    <div class="single-popular-items mb-50 text-center">
                        <div class="popular-img">
                            <img src="{{asset('front/assets/img/28421.jpg')}}" alt="">
                            <div class="img-cap">
                                <span>اضافه به سبد خرید</span>
                            </div>
                            <div class="favorit-items">
                                <span class="flaticon-heart"></span>
                            </div>
                        </div>
                        <div class="popular-caption">
                            <h3><a href="product_details.html">فسفود ماه پیشونی</a></h3>
                            <span>سعادت آباد(شهرک غرب)</span>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-lg-4 col-md-6 col-sm-12">
                    <div class="single-popular-items mb-50 text-center">
                        <div class="popular-img">
                            <img src="{{asset('front/assets/img/165761.jpg')}}" alt="">
                            <div class="img-cap">
                                <span>اضافه به سبد خرید</span>
                            </div>
                            <div class="favorit-items">
                                <span class="flaticon-heart"></span>
                            </div>
                        </div>
                        <div class="popular-caption">
                            <h3><a href="product_details.html">میوه فروشی مرادی</a></h3>
                            <span>خیابان ولیعصر</span>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-lg-4 col-md-6 col-sm-12">
                    <div class="single-popular-items mb-50 text-center">
                        <div class="popular-img">
                            <img src="{{asset('front/assets/img/26187.jpg')}}" alt="">
                            <div class="img-cap">
                                <span>اضافه به سبد خرید</span>
                            </div>
                            <div class="favorit-items">
                                <span class="flaticon-heart"></span>
                            </div>
                        </div>
                        <div class="popular-caption">
                            <h3><a href="product_details.html">فست فود باران</a></h3>
                            <span>منظریه شعبه 2</span>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-lg-4 col-md-6 col-sm-12">
                    <div class="single-popular-items mb-50 text-center">
                        <div class="popular-img">
                            <img src="{{asset('front/assets/img/21712.jpg')}}" alt="">
                            <div class="img-cap">
                                <span>اضافه به سبد خرید</span>
                            </div>
                            <div class="favorit-items">
                                <span class="flaticon-heart"></span>
                            </div>
                        </div>
                        <div class="popular-caption">
                            <h3><a href="product_details.html">هتل آپارتمان دیانا</a></h3>
                            <span>مشهد</span>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-lg-4 col-md-6 col-sm-12">
                    <div class="single-popular-items mb-50 text-center">
                        <div class="popular-img">
                            <img src="{{asset('front/assets/img/16576.jpg')}}" alt="">
                            <div class="img-cap">
                                <span>اضافه به سبد خرید</span>
                            </div>
                            <div class="favorit-items">
                                <span class="flaticon-heart"></span>
                            </div>
                        </div>
                        <div class="popular-caption">
                            <h3><a href="product_details.html">فست فود تچرا</a></h3>
                            <span>بولوار سرباز</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Button -->
            <div class="row justify-content-center">
                <div class="room-btn">
                    <a href="catagori.html" class="btn view-btn1">مشاهده همه مراکز و خدمات طرف قرارداد</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Popular Items End -->



    <!--? Watch Choice  Start-->
    {{--    <div class="watch-area " style="padding: 80px">--}}
    {{--        <div class="container">--}}
    {{--            <div class="row align-items-center justify-content-between padding-130">--}}
    {{--                <div class="col-lg-5 col-md-6">--}}
    {{--                    <div class="watch-details mb-40">--}}
    {{--                        <h2>Watch of Choice</h2>--}}
    {{--                        <p>Enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse.</p>--}}
    {{--                        <a href="shop.html" class="btn">Show Watches</a>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <div class="col-lg-6 col-md-6 col-sm-10">--}}
    {{--                    <div class="choice-watch-img mb-40">--}}
    {{--                        <img src="{{asset('front/assets/img/gallery/choce_watch1.png')}}" alt="">--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--            <div class="row align-items-center justify-content-between">--}}
    {{--                <div class="col-lg-6 col-md-6 col-sm-10">--}}
    {{--                    <div class="choice-watch-img mb-40">--}}
    {{--                        <img src="{{asset('front/assets/img/gallery/choce_watch2.png')}}" alt="">--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <div class="col-lg-5 col-md-6">--}}
    {{--                    <div class="watch-details mb-40">--}}
    {{--                        <h2>Watch of Choice</h2>--}}
    {{--                        <p>Enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse.</p>--}}
    {{--                        <a href="shop.html" class="btn">Show Watches</a>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    <!-- Watch Choice  End-->


        <!--? Watch Choice  Start-->
        <div class="watch-area " style="padding: 140px 0">
            <div class="container margin-bottom-35">
                <div class="content-md" style="display: flex;align-items: center">
                    <div class="col-md-12">
                        <div class="row" style="display: flex;flex-direction: column;align-items: center">
                            <div class="section-tittle mb-70 text-center">
                                <h2>قدم به قدم تا کسب درآمد</h2>
                            </div>

                            <div class="col-md-12" align="center">
                                <div class="row">
                                    <div class="col-md-3 col-xs-6 no-padding col-steps-shop">
                                        <div class=" col-steps-shop">
                                            <a class="fancybox" data-rel="fancybox-button" title="راه‌اندازی کسب‌وکار شخصی" href="/blog/post/309001">
                                                <img src="{{asset('img/pisc-1-1.png')}}" alt="برای بازاریابی شبکه ای چکاری باید انجام دهم؟" width="135" height="120" style="margin: auto; display: block" data-lazy-loaded="true">
                                                <div class="caption">
                                                    <h5><span>راه‌اندازی کسب‌وکار شخصی</span></h5>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-3  col-xs-6 no-padding col-steps-shop">
                                        <div class="col-steps-shop">
                                            <a class="fancybox" data-rel="fancybox-button" title="قوانین بازاریابی شبکه ای" href="/blog/post/59001">
                                                <img src="{{asset('img/pisc-2-1.png')}}" alt="معتبر ترین و قانونمند ترین شرکت بازاریابی شبکه ای در ایران" width="135" height="120" style="margin: auto; display: block" data-lazy-loaded="true">
                                                <div class="caption">
                                                    <h5><span>قوانین بازاریابی شبکه ای</span></h5>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-xs-6 no-padding col-steps-shop">
                                        <div class="col-steps-shop">
                                            <a class="fancybox" data-rel="fancybox-button" title="طرح درآمدی PISC" href="/blog/post/57001">
                                                <img src="{{asset('img/pisc-3-1.png')}}" alt="درآمد بازاریابی شبکه ای و طرح درآمدی شرکت بازاریابی" width="135" height="120" style="margin: auto; display: block" data-lazy-loaded="true">
                                                <div class="caption">
                                                    <h5><span>طرح درآمدی PISC</span></h5>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-xs-6 no-padding col-steps-shop">
                                        <div class="col-steps-shop">
                                            <a class="fancybox" data-rel="fancybox-button" title="قوانین و مقررات PISC" href="/blog/post/58001">
                                                <img src="{{asset('img/pisc-4-1.png')}}" alt="قوانین بازاریابی شبکه ای پنبه ریز" width="135" height="120" style="margin: auto; display: block" data-lazy-loaded="true">
                                                <div class="caption">
                                                    <h5><span>قوانین و مقررات PISC</span></h5>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-xs-6  no-padding col-steps-shop">
                                        <div class="col-steps-shop">
                                            <a class="fancybox" data-rel="fancybox-button" title="راه اندازی دفتر کار" href="/blog/post/310001">
                                                <img src="{{asset('img/pisc-5-1.png')}}" alt="تاسیس دفتر بازاریابی شبکه ای آنلاین" width="135" height="120" style="margin: auto; display: block" data-lazy-loaded="true">
                                                <div class="caption">
                                                    <h5><span>راه اندازی دفتر کار</span></h5>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-xs-6  no-padding col-steps-shop">
                                        <div class="col-steps-shop">
                                            <a class="fancybox" data-rel="fancybox-button" title="رسانه" href="/Home/Resane">
                                                <img src="{{asset('img/pisc-6-1.png')}}" alt="آموزش بازاریابی شبکه ای" width="135" height="120" style="margin: auto; display: block" data-lazy-loaded="true">
                                                <div class="caption">
                                                    <h5><span>رسانه</span></h5>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-xs-6  no-padding col-steps-shop">
                                        <div class="col-steps-shop">
                                            <a class="fancybox" data-rel="fancybox-button" title="مجوزها" href="/about/license">
                                                <img src="{{asset('img/pisc-7-1.png')}}" alt="مجوز های بازاریابی شبکه ای" width="135" height="120" style="margin: auto; display: block" data-lazy-loaded="true">
                                                <div class="caption">
                                                    <h5><span>مجوزها</span></h5>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-xs-6  no-padding col-steps-shop">
                                        <div class="col-steps-shop">
                                            <a class="fancybox" data-rel="fancybox-button" title="کسب مهارت" href="/blog/post/311001">
                                                <img src="{{asset('img/pisc-8-1.png')}}" alt="مهارت در بازاریابی و نتورک مارکتینگ" width="135" height="120" style="margin: auto; display: block" data-lazy-loaded="true">
                                                <div class="caption">
                                                    <h5><span>کسب مهارت</span></h5>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <style>

                    .col-steps-shop {
                        padding: 6px 6px;
                        margin: 0 0;
                    }
                    @media (min-width:1200px) {
                        .info-container::after {
                            border: solid;
                            border-color: #aaa;
                            position: absolute;
                            left: 8%;
                            border-style: solid;
                            display: inline-block;
                            content: '';
                            height: 408px;
                            top: -50px;
                            width: 3px;
                            border-left: none;
                            border-bottom: none;
                            border-top: none;
                            border-right-width: thin;
                        }
                    }
                    @media (max-width:480px) {
                        .col-12 {
                            max-width: 100%;
                            display: block;
                            float: none;
                            text-align: center;
                            margin: auto;
                        }

                        .info-container {
                            min-height: initial;
                        }
                    }

                    .blog-image, .info-container a {
                        filter: grayscale(300%) brightness(1) contrast(50%);
                    }
                    .blog-image:hover, .info-container a:hover {
                        filter: grayscale(0%)!important;
                        color: #138a47;
                    }
                    .info-container li{
                        margin-bottom: 25px;
                    }
                    .info-container img{
                        margin-left: 24px;
                    }
                    .info-container a{
                        padding-right: 20px;
                    }


                </style>
            </div>
        </div>
        <!-- Watch Choice  End-->

    </main>
@endsection
