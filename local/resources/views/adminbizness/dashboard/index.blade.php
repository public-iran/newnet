@extends('adminbizness.layout.master')


@section('content')

    <style>
        .btn-circle-lg {
            border: none;
            outline: none !important;
            overflow: hidden;
            width: 70px;
            height: 70px;
            -webkit-border-radius: 50% !important;
            -moz-border-radius: 50% !important;
            -ms-border-radius: 50% !important;
            border-radius: 50% !important;
        }
        .btn-f{
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .btn-f>span{
            margin-top: 10px;
        }
        .btn:not(.btn-link):not(.btn-circle) {
            box-shadow: 0 2px 16px 3px rgba(175, 175, 175, 0.29), 0 2px 0px 0px rgba(144, 144, 144, 0.12);
        }
    </style>
    @if(session('buy_package'))
    <div class="alert bg-green alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        {{session('buy_package')}}
    </div>

    @endif
    @if(session('Commission'))
    <div class="alert bg-green alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        {{session('Commission')}}
    </div>

    @endif
    @if(session('buy_package_danger'))
        <div class="alert bg-red alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            {{session('buy_package_danger')}}
        </div>
    @endif
    @php
        Session::forget('buy_package');
        Session::forget('Commission');
Session::forget('buy_package_danger');
    @endphp


    <div class="row" align="center" style="margin-bottom: 20px">
        <div class="col-xs-4 btn-f">
            <button type="button" class="btn btn-default btn-circle-lg waves-effect waves-circle waves-float">
                <img width="35px" src="{{asset('images/simcard.svg')}}" alt="">
            </button>
            <span>خرید شارژ و اینترنت همراه</span>
        </div>
        <div class="col-xs-4 btn-f">
            <button type="button" class="btn btn-default btn-circle-lg waves-effect waves-circle waves-float">
                <img width="35px" src="{{asset('images/customer.svg')}}" alt="">
            </button>
            <span>باشگاه مشتریان</span>
        </div>
        <div class="col-xs-4 btn-f">
            <button type="button" class="btn btn-default btn-circle-lg waves-effect waves-circle waves-float">
                <img width="35px" src="{{asset('images/message.svg')}}" alt="">
            </button>
            <span>پنل اختصاصی ارسال پیامک</span>
        </div>
    </div>
    <div class="row" align="center" style="margin-bottom: 20px">
        <div class="col-xs-4 btn-f">
            <button type="button" class="btn btn-default btn-circle-lg waves-effect waves-circle waves-float">
                <img width="35px" src="{{asset('images/hr.svg')}}" alt="">
            </button>
            <span>روانشناسی آنلاین</span>
        </div>
        <div class="col-xs-4 btn-f">
            <button type="button" class="btn btn-default btn-circle-lg waves-effect waves-circle waves-float">
                <img width="35px" src="{{asset('images/text.svg')}}" alt="">
            </button>
            <span>کارت ویزیت الکترونیکی</span>
        </div>
        <div class="col-xs-4 btn-f">
            <button type="button" class="btn btn-default btn-circle-lg waves-effect waves-circle waves-float">
                <img width="35px" src="{{asset('images/bill.svg')}}" alt="">
            </button>
            <span>پرداخت قبض</span>
        </div>
    </div>
    <div class="row" align="center" style="margin-bottom: 20px">
        <div class="col-xs-4 btn-f">
            <button type="button" class="btn btn-default btn-circle-lg waves-effect waves-circle waves-float">
                <img width="35px" src="{{asset('images/plak.png')}}" alt="">
            </button>
            <span>پلاک</span>
        </div>
        <div class="col-xs-4 btn-f">
            <button type="button" class="btn btn-default btn-circle-lg waves-effect waves-circle waves-float">
                <img width="35px" src="{{asset('images/filimo.png')}}" alt="">
            </button>
            <span>فیلیمو</span>
        </div>
        <div class="col-xs-4 btn-f">
            <button type="button" class="btn btn-default btn-circle-lg waves-effect waves-circle waves-float">
                <img width="35px" src="{{asset('images/airplane.svg')}}" alt="">
            </button>
            <span>پرشین فلایت</span>
        </div>
    </div>
    <div class="row" align="center" style="margin-bottom: 20px">
        <div class="col-xs-4 btn-f">
            <button type="button" class="btn btn-default btn-circle-lg waves-effect waves-circle waves-float">
                <img width="40px" src="{{asset('images/appetizer.png')}}" alt="">
            </button>
            <span>اپتایزر</span>
        </div>
        <div class="col-xs-4 btn-f">
            <button type="button" class="btn btn-default btn-circle-lg waves-effect waves-circle waves-float">
                <img width="40px" src="{{asset('images/otaghak.jpg')}}" alt="">
            </button>
            <span>اتاقک</span>
        </div>
        <div class="col-xs-4 btn-f">
            <button type="button" class="btn btn-default btn-circle-lg waves-effect waves-circle waves-float">
                <img width="45px" src="{{asset('images/navar.png')}}" alt="">
            </button>
            <span>کد تخفیف نوار</span>
        </div>
    </div>

@endsection

