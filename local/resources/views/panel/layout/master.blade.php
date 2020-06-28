<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <link rel="stylesheet" href="{{asset('css/materialize-rtl.css')}}">
    <link rel="stylesheet" href="{{asset('css/micon.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
{{--    <link rel="stylesheet" href="/learning/css/materialize-rtl.css">--}}
{{--    <link rel="stylesheet" href="/learning/css/micon.css">--}}
{{--    <link rel="stylesheet" href="/learning/css/style.css">--}}

</head>
<body class="rtl">

<!--<div class="preloader">-->

<!--  <div class="preloader-wrapper big active cc">-->
<!--    <div class="spinner-layer spinner-blue">-->
<!--      <div class="circle-clipper left">-->
<!--        <div class="circle"></div>-->
<!--      </div><div class="gap-patch">-->
<!--      <div class="circle"></div>-->
<!--    </div><div class="circle-clipper right">-->
<!--      <div class="circle"></div>-->
<!--    </div>-->
<!--    </div>-->

<!--    <div class="spinner-layer spinner-red">-->
<!--      <div class="circle-clipper left">-->
<!--        <div class="circle"></div>-->
<!--      </div><div class="gap-patch">-->
<!--      <div class="circle"></div>-->
<!--    </div><div class="circle-clipper right">-->
<!--      <div class="circle"></div>-->
<!--    </div>-->
<!--    </div>-->

<!--    <div class="spinner-layer spinner-yellow">-->
<!--      <div class="circle-clipper left">-->
<!--        <div class="circle"></div>-->
<!--      </div><div class="gap-patch">-->
<!--      <div class="circle"></div>-->
<!--    </div><div class="circle-clipper right">-->
<!--      <div class="circle"></div>-->
<!--    </div>-->
<!--    </div>-->

<!--    <div class="spinner-layer spinner-green">-->
<!--      <div class="circle-clipper left">-->
<!--        <div class="circle"></div>-->
<!--      </div><div class="gap-patch">-->
<!--      <div class="circle"></div>-->
<!--    </div><div class="circle-clipper right">-->
<!--      <div class="circle"></div>-->
<!--    </div>-->
<!--    </div>-->
<!--  </div>-->

<!--</div>-->


<header>

    <!--  <ul id="dropdown1" class="dropdown-content">-->
    <!--    <li><a href="#!" class="red-text darken-1"><i class="material-icons rtl_icon">view_module</i>محصولات آموزشی</a></li>-->
    <!--    <li><a href="#!" class="red-text darken-1"><i class="material-icons rtl_icon">cloud</i>پکیج های پروژه محور</a></li>-->
    <!--    <li class="divider"></li>-->
    <!--    <li><a href="#!" class="red-text darken-1">سفارش</a></li>-->
    <!--  </ul>-->

    <nav class="blue">
        <div class="nav-wrapper">
            <a href="#!" class="brand-logo left">Logo</a>
            <ul>
                <li><a href="#" data-target="mymenu" class="sidenav-trigger"><i class="material-icons">menu</i></a></li>
            </ul>
        </div>
    </nav>

</header>

<main>
    <div class="warapper">

        @yield('content')

    </div>
</main>


<footer class="page-footer blue">
    <div class="footer-copyright blue">
        © طراحی و توسعه با شرکت IMTIT
    </div>
</footer>


<ul id="mymenu" class="sidenav sidenav-fixed">
    <li><div class="user-view">
            <div class="background">
                <img width="100%" src="{{asset('img/mb1.jpg')}}">
            </div>
            <a href="#user"><img class="circle" src="{{asset('img/boy.jpg')}}"></a>
            <a href="#name"><span class="white-text name">احسان باوقار</span></a>
            <a href="#email"><span class="white-text email">ehsan.bavaghar1989@gmail.com</span></a>
        </div></li>
    <li class="">
        <a href="" class="waves-effect waves-cyan">
            <i class="material-icons rtl_icon">pie_chart_outlined</i>
            <span class="nav-text">میز کار</span>
        </a>
    </li>
    <li class="">
        <a href="" class="waves-effect waves-cyan">
            <i class="material-icons rtl_icon">cast</i>
            <span class="nav-text">ثبت ملک جدید</span>
        </a>
    </li>
    <li><div class="divider"></div></li>
    <li class="">
        <a href="" class="waves-effect waves-cyan">
            <i class="material-icons rtl_icon">insert_link</i>
            <span class="nav-text">ویرایش ملک</span>
        </a>
    </li>
    <li class="">
        <a href="" class="waves-effect waves-cyan">
            <i class="material-icons rtl_icon">format_color_text</i>
            <span class="nav-text">بایگانی</span>
        </a>
    </li>
    <li class="">
        <a href="" class="waves-effect waves-cyan">
            <i class="material-icons rtl_icon">format_size</i>
            <span class="nav-text">سفارش شده</span>
        </a>
    </li>
    <li class="">
        <a href="" class="waves-effect waves-cyan">
            <i class="material-icons rtl_icon">invert_colors</i>
            <span class="nav-text">درخواستی</span>
        </a>
    </li>
    <li class="">
        <a href="" class="waves-effect waves-cyan">
            <i class="material-icons rtl_icon">border_all</i>
            <span class="nav-text">انجام شده توسط من</span>
        </a>
    </li>

</ul>









<script src="http://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
{{--<script src="/learning/js/script.js"></script>--}}
<script src="{{asset('js/script.js')}}"></script>

</body>
</html>
