@extends('adminbizness.layout.master')

@section('style')
    <link href="{{asset('css/multi-step-form.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.7.1/clipboard.min.js"></script>

    <style>
        .body .container-fluid .row div .info-box-4 {
            cursor: pointer;
        }

        .bg-grey {
            background-color: #8be2a0 !important;
        }

        .container-fluid > div {
            float: right;
        }

        .price {
            color: #61c579 !important;
            font-weight: 700;
            font-size: 15px !important;
        }

        .info-box {
            box-shadow: none;
        }

        .wallets {
            width: 100%;
        }

        .wallets > div {
            float: right;
        }

        .list-group button {
            text-align: right;
        }

        .dataTables_length {
            display: none;
        }

        #myTable2_wrapper {
            width: 100%;
        }
        #myTable3_wrapper {
            width: 100%;
        }
        .alert-success{
            width: 20% !important;
            text-align: center;
        }
        @media only screen and (max-width: 600px) {
            .alert-success{
                width: 50% !important;
                text-align: center;
            }

        }


        .table-bordered tr th{
            text-align: center;
        }
        .token{
            margin-bottom: 0 !important;
        }
        .list-group button{
            font-size: 85%;
        }
        button{
            box-shadow: none !important;
        }
        .title-titr{
            background: none !important;
            border-right: 4px solid #61c579;
        }
    </style>

@endsection
@section('content')
    @if(session('PAY_Account_charging_d'))
        <div class="alert bg-red alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            {{session('PAY_Account_charging_d')}}
        </div>

    @endif
    @if(session('PAY_Account_charging_s'))
        <div class="alert bg-green alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            {{session('PAY_Account_charging_s')}}
        </div>
    @endif
    @if(session('send_price_wallet_success'))
        <div class="alert bg-green alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            {{session('send_price_wallet_success')}}
        </div>
    @endif
    @php
        Session::forget('PAY_Account_charging_s');
        Session::forget('PAY_Account_charging_d');
        Session::forget('send_price_wallet_success');
    @endphp
    <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
        <div class="alert bg-white" style="color: #666666!important;display: inline-block;width: 100%;">

            <div class="col-md-6">توکن کیف پول شما : <span onclick="clipboard()" id="token" data-clipboard-target="#token"
                                                       style="cursor: pointer">{{$wallet->token}}</span></div>
            <div class="col-md-6" title="شامل پورسانت فروش ،بودجه آموزش یار و بودجه آموزش یار می شود">مجموع درآمدهای شما: <span class="total_price">{{number_format($wallet->total_price)}} تومان </span></div>
        </div>
    </div>


    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <div class="info-box" style="position: relative">
            <div class="icon bg-grey">
                <img style="width: 60px;margin-top: 9px" src="{{asset('images/percent.svg')}}">
            </div>
            <div class="content">
                <div class="text">پورسانت فروش</div>
                <div class="text price">0 تومان</div>
            </div>
            <button class="btn" style="background: #8b9ae2;position: absolute;left: 0;height: 100%;"><i
                    class="material-icons">file_download</i></button>
        </div>
    </div>



    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <div class="info-box" style="position: relative">
            <div class="icon bg-grey">
                <img style="width: 60px;margin-top: 9px" src="{{asset('images/tadol.svg')}}">
            </div>
            <div class="content">
                <div class="text">بودجه آموزشی</div>
                <div class="text price balance-selling">{{number_format(@$balanceprice->price)}} تومان</div>
            </div>
            <button onclick="Money_transfer('balance')" class="btn" style="background: #8b9ae2;position: absolute;left: 0;height: 100%;"><i
                    class="material-icons ">file_download</i></button>
        </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <div class="info-box" style="position: relative">
            <div class="icon bg-grey">
                <img style="width: 60px;margin-top: 9px" src="{{asset('images/direct.svg')}}">
            </div>
            <div class="content">
                <div class="text">بودجه آموزش یار</div>
                <div class="text price direct-selling">{{number_format(@$directselling->price)}} تومان</div>
            </div>
            <button onclick="Money_transfer('direct')" class="btn" style="background: #8b9ae2;position: absolute;left: 0;height: 100%;"><i
                    class="material-icons">file_download</i></button>
        </div>
    </div>



    <div style="padding: 0;float: right" class="col-lg-6 col-md-6 col-sm-12 col-xs-12">


        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="alert bg-white title-titr" style="color: #666666!important;height: 45px;margin-bottom: 8px;">
                کیف پول شما
                <button class="btn btn-success btn-lg btn-block waves-effect"  data-toggle="modal" data-target="#smallModal" type="button" style="padding: 5px 8px;;float: left;margin-top: -6px;background-color: #8bc34a !important;width: auto">شارژ کیف پول </button>

            </div>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card" style="box-shadow: none">

                <div class="body" style="padding-bottom: 0;">
                    <div class="list-group">

                        <button type="button" class="list-group-item">زمان آخرین واریزی
                            : {{Verta::instance($wallet->updated_at)}}</button>
                        <button type="button"  class="list-group-item total-price" style="width: 50%;float: right">جمع کل
                            : {{number_format($wallet->price)}} تومان
                        </button>
                        <button type="button"  class="list-group-item store-price" style="width: 50%;float: right;color: #8b9ae2;font-weight: 700;">حمایت فروشگاهی
                            : {{number_format($wallet->store_sponsor)}} تومان
                        </button>

                    </div>
                    @if($wallet->store_sponsor<2000000)
                    <button style="margin: 13px 0;background-color: #61c579 !important;" type="button" class="btn btn-success waves-effect btn-block">درخواست واریز وجه</button>
                        @else
                        <button style="margin: 13px 0;background-color: #61c579 !important;" disabled type="button" class="btn btn-success waves-effect btn-block">درخواست واریز وجه</button>
                        @endif
                </div>
            </div>
        </div>

    </div>

    <div style="padding: 0;float: right" class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="alert bg-white title-titr" style="color: #666666!important;height: 45px;margin-bottom: 8px;">
                انتقال پول
            </div>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card" style="box-shadow: none">
                <div class="body">
                    <div class="row clearfix token-main">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin: 0 auto;float: unset;">
                            <div class="col-sm-12 token">
                                به زودی...
                               {{-- <small>توکن کیف پول</small>
                                <div class="form-group" style="    margin-bottom: 56px;">
                                    <div class="form-line">
                                        <input onkeyup="check_token()" onchange="check_token()" type="text" name="token" class="form-control"
                                               placeholder="توکن کیف پول را وارد کنید">
                                    </div>
                                </div>--}}
                                {{--<button onclick="check_token()" type="button" class="btn bg-blue waves-effect">
                                    ثبت
                                </button>--}}


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="alert bg-white title-titr" style="color: #666666!important;height: 45px;margin-bottom: 8px;">
            گزارش کیف پول
        </div>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 80px">
        <div class="card" style="box-shadow: none">

            <div class="body" style="padding: 0 0 25px;">
                <div class="box box-primary">

                    <div class="box-body">
                        <br>
                        <div class="container-fluid table-responsive">

                            <table class="table table-bordered text-center table-striped" id="myTable2"
                                   style="font-size: 13px;width: 100%">
                                <thead class="bg-blue-gradient">
                                <tr id="">
                                    <th scope="col">#</th>
                                    <th scope="col">ورودی درآمد</th>
                                    <th scope="col">مبلغ</th>
                                    <th scope="col">وضعیت</th>
                                    <th scope="col">تاریخ عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 0; ?>
                                @foreach ($walletsreports as $report)
                                    <?php
                                    $i++;
                                    ?>
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$report->description}}</td>
                                        <td>{{number_format($report->price)}} تومان </td>
                                        <td>@if($report->status=="PAY") <span style="color: #61c579;">موفق</span> @else <span style="color: #ea7841;">ناموفق</span> @endif</td>
                                        <td>{{Verta($report->created_at)}}</td>
                                    </tr>


                                @endforeach

                                </tbody>
                            </table>

                        </div>
                    </div>
                    <div class="modal fade" id="smallModal" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-sm" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="smallModalLabel"> شارژ کیف پول</h4>
                                </div>
                                <div class="modal-body">
                                    <small>مقدار (براساس تومان)</small>
                                    <form method="post" id="Account_charging" action="{{route('Account_charging_wallet')}}">
                                        @csrf
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="number" name="price" onkeyup="number_format()" class="form-control" placeholder="مقدار را وارد کنید">
                                            </div>
                                        </div>
                                    </form>

                                    <span class="price_name"></span>


                                </div>
                                <div class="modal-footer">
                                    <button type="button" onclick="pay()" class="btn btn-link waves-effect" style="border: 1px dashed #ccc;">پرداخت</button>
                                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">انصراف</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="box-footer">
                        <div class="" align="center">
                            {{$smsreports->links()}}
                </div>
            </div> --}}

                </div>
            </div>
        </div>
    </div>





    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="alert bg-white title-titr" style="color: #666666!important;height: 45px;margin-bottom: 8px;">
            گزارش
        </div>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 80px">
        <div class="card" style="box-shadow: none">

            <div class="body" style="padding: 0 0 25px;">
                <div class="box box-primary">

                    <div class="box-body">
                        <br>
                        <div class="container-fluid table-responsive">

                            <table class="table table-bordered text-center table-striped" id="myTable3"
                                   style="font-size: 13px;width: 100%">
                                <thead class="bg-blue-gradient">
                                <tr id="">
                                    <th scope="col">#</th>
                                    <th scope="col">ورودی درآمد</th>
                                    <th scope="col">مبلغ</th>
                                    <th scope="col">افزایش L</th>
                                    <th scope="col">افزایش R</th>
                                    <th scope="col">TL</th>
                                    <th scope="col">TR</th>
                                    <th scope="col">فروش مستقیم</th>
                                    <th scope="col">تاریخ عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 0; ?>
                                @foreach ($reports as $report)
                                    <?php
                                    $i++;
                                    ?>
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$report->description}}</td>
                                        <td>{{number_format($report->total_price)}} تومان</td>
                                        <td>{{number_format($report->left_price)}} تومان</td>
                                        <td>{{number_format($report->right_price)}} تومان</td>
                                        <td>{{$report->left_count}}</td>
                                        <td>{{$report->right_count}}</td>
                                        <td>{{number_format($report->direct_selling)}} تومان</td>
                                        <td>{{Verta($report->created_at)}}</td>
                                    </tr>


                                @endforeach

                                </tbody>
                            </table>

                        </div>
                    </div>
                    <div class="modal fade" id="smallModal" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-sm" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="smallModalLabel"> شارژ کیف پول</h4>
                                </div>
                                <div class="modal-body">
                                    <small>مقدار (براساس تومان)</small>
                                    <form method="post" id="Account_charging" action="{{route('Account_charging_wallet')}}">
                                        @csrf
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="number" name="price" onkeyup="number_format()" class="form-control" placeholder="مقدار را وارد کنید">
                                            </div>
                                        </div>
                                    </form>

                                    <span class="price_name"></span>


                                </div>
                                <div class="modal-footer">
                                    <button type="button" onclick="pay()" class="btn btn-link waves-effect" style="border: 1px dashed #ccc;">پرداخت</button>
                                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">انصراف</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="box-footer">
                        <div class="" align="center">
                            {{$smsreports->links()}}
                </div>
            </div> --}}

                </div>
            </div>
        </div>
    </div>






        @endsection


        @section('script')
            <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
            <script>
                function clipboard() {
                    var clipboard = new Clipboard('#token');
                    $.notify({
                        // options
                        message: 'کپی شد'
                    },{
                        // settings
                        type: 'success',
                        placement: {
                            from: "bottom",
                            align: "center"
                        },
                        animate: {
                            enter: "animated fadeInUp",
                            exit: "animated fadeOutDown"
                        },
                        offset: {
                            x: 500,
                            y: 10
                        }
                    });
                }

            </script>

            <script>
                $(document).ready(function () {
                    $('#myTable2').DataTable();

                });
                function number_format() {
                    var price=$('input[name=price]').val();
                    if ((price)>=1000){
                        var CSRF_TOKEN = '{{ csrf_token() }}';
                        var url = '{{route('number_format_price')}}';
                        var data = {_token: CSRF_TOKEN, price: price};
                        $.post(url, data, function (msg) {
                            $('.price_name').css('display','inline-block');
                            $('.price_name').html(msg + ' تومان ')
                        });
                    }else{
                        $('.price_name').css('display','inline-block');
                        $('.price_name').html('حداقل مبلغ، 1000 تومان می باشد.')
                    }

                }
                function pay() {

                    var price=$('input[name=price]').val();
                    if ((price)>=1000){
                        $('#Account_charging').submit();
                        $('.waitMe').fadeOut();
                    }else{
                        $('.price_name').html('حداقل مبلغ، 1000 تومان می باشد.');
                        $('.price_name').css('display','inline-block');
                        $('.waitMe').fadeOut();
                    }
                }
            </script>
            <script>


                $('#myTable2').DataTable({
                    "searching": false,
                    "lengthMenu": [
                        [10, 20, 30],
                        [10, 20, 30],
                    ],
                    "language": {
                        "sEmptyTable": "هیچ داده‌ای در جدول وجود ندارد",
                        "sInfo": "نمایش _START_ تا _END_ از _TOTAL_ ردیف",
                        "sInfoEmpty": "نمایش 0 تا 0 از 0 ردیف",
                        "sInfoFiltered": "(فیلتر شده از _MAX_ ردیف)",
                        "sInfoPostFix": "",
                        "sInfoThousands": ",",
                        "sLengthMenu": "نمایش _MENU_ ردیف",
                        "sLoadingRecords": "در حال بارگزاری...",
                        "sProcessing": "در حال پردازش...",
                        "sSearch": "جستجو:",
                        "sZeroRecords": "رکوردی با این مشخصات پیدا نشد",
                        "oPaginate": {
                            "sFirst": "برگه‌ی نخست",
                            "sLast": "برگه‌ی آخر",
                            "sNext": "بعدی",
                            "sPrevious": "قبلی"
                        },
                        "oAria": {
                            "sSortAscending": ": فعال سازی نمایش به صورت صعودی",
                            "sSortDescending": ": فعال سازی نمایش به صورت نزولی"
                        }
                    }
                });

                $('#myTable3').DataTable({
                    "searching": false,
                    "lengthMenu": [
                        [10, 20, 30],
                        [10, 20, 30],
                    ],
                    "language": {
                        "sEmptyTable": "هیچ داده‌ای در جدول وجود ندارد",
                        "sInfo": "نمایش _START_ تا _END_ از _TOTAL_ ردیف",
                        "sInfoEmpty": "نمایش 0 تا 0 از 0 ردیف",
                        "sInfoFiltered": "(فیلتر شده از _MAX_ ردیف)",
                        "sInfoPostFix": "",
                        "sInfoThousands": ",",
                        "sLengthMenu": "نمایش _MENU_ ردیف",
                        "sLoadingRecords": "در حال بارگزاری...",
                        "sProcessing": "در حال پردازش...",
                        "sSearch": "جستجو:",
                        "sZeroRecords": "رکوردی با این مشخصات پیدا نشد",
                        "oPaginate": {
                            "sFirst": "برگه‌ی نخست",
                            "sLast": "برگه‌ی آخر",
                            "sNext": "بعدی",
                            "sPrevious": "قبلی"
                        },
                        "oAria": {
                            "sSortAscending": ": فعال سازی نمایش به صورت صعودی",
                            "sSortDescending": ": فعال سازی نمایش به صورت نزولی"
                        }
                    }
                });
                $('.dataTables_length select').addClass('tbl_data');

            </script>

            <script>
                function check_token() {

                    var token = $('input[name=token]').val();
                    if (token.length>20){
                        if (token != '') {
                            $('.token').waitMe({
                                effect: 'pulse',
                                text: 'در حال پردازش ...',
                                maxSize: '',
                                waitTime: 1,
                                textPos: 'vertical',
                                fontSize: '10',
                                source: '',
                            });
                            var CSRF_TOKEN = '{{ csrf_token() }}';
                            var url = '{{route('check_token_wallet')}}';
                            var data = {_token: CSRF_TOKEN, token: token};
                            $.post(url, data, function (msg) {
                                if (msg == 'notok') {
                                    $('.waitMe').fadeOut();
                                    $.notify({
                                        // options
                                        message: 'توکن وارد شده اشتباه است'
                                    }, {
                                        // settings
                                        type: 'danger',
                                        placement: {
                                            from: "bottom",
                                            align: "right"
                                        },
                                        animate: {
                                            enter: 'animated bounceIn',
                                            exit: 'animated bounceOut'
                                        }
                                    });
                                } else {
                                    $('.token').empty();
                                    $('.token').html('<div class="form-group"><div style="height: 56px;">شما در حال انتقال پول به <h5 style="display: inline-block">' + msg.name + '</h5> هستید آیا اطمینان دارید.</div><button onclick="itsok()" type="button" class="btn bg-blue waves-effect">بله اطمینان دارم</button></div>');
                                    $('.waitMe').fadeOut();
                                }
                            });
                        }
                    }


                }

                function itsok() {

                    $('.token-main').empty();
                    $('.token-main').html('<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin: 0 auto;float: unset;"><small>پسورد</small><div class="col-sm-12 token"><div class="form-group"><div class="form-line"><input type="password" name="password" class="form-control" placeholder="پسورد را وارد کنید"></div></div><button type="button" class="btn bg-blue check-pass waves-effect">ثبت</button></div>');
                    $('.check-pass').click(function () {
                        $('.token').waitMe({
                            effect: 'pulse',
                            text: 'در حال پردازش ...',
                            maxSize: '',
                            waitTime: 1,
                            textPos: 'vertical',
                            fontSize: '10',
                            source: '',
                        });
                        var password = $('input[name=password]').val();
                        var CSRF_TOKEN = '{{ csrf_token() }}';
                        var url = '{{route('check_pass_wallet')}}';
                        var data = {_token: CSRF_TOKEN, password: password};
                        $.post(url, data, function (msg) {
                            if (msg == 'notok') {
                                $('.waitMe').fadeOut();
                                $.notify({
                                    // options
                                    message: 'پسورد وارد شده اشتباه است'
                                }, {
                                    // settings
                                    type: 'danger',
                                    placement: {
                                        from: "bottom",
                                        align: "right"
                                    },
                                    animate: {
                                        enter: 'animated bounceIn',
                                        exit: 'animated bounceOut'
                                    }
                                });
                            } else if (msg == 'ok') {
                                $('.waitMe').fadeOut();
                                $('.token-main').empty();
                                $('.token-main').html('<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin: 0 auto;float: unset;"><small>شماره موبایل</small><div class="col-sm-12 token"><div class="form-group"><div class="form-line"><input type="number" name="mobile" class="form-control" placeholder="شماره موبایل را وارد کنید"></div></div><div style="display: none" class="form-group check-code-div"><div class="form-line"><input type="number" name="code" onkeyup="check_code()" onfocus="check_code()" class="form-control" placeholder="کد تایید را وارد کنید"></div></div><button type="button" class="btn bg-blue check-mobile waves-effect">ارسال کد</button><small style="cursor: pointer;display: none;color: #217179;" class="return_code" onclick="return_code()">ارسال مجدد کد</small></div>');

                                $('.check-mobile').click(function () {

                                    var mobile = $('input[name=mobile]').val();
                                    if (mobile != '') {
                                        $('.token').waitMe({
                                            effect: 'pulse',
                                            text: 'در حال پردازش ...',
                                            maxSize: '',
                                            waitTime: 1,
                                            textPos: 'vertical',
                                            fontSize: '10',
                                            source: '',
                                        });

                                        var CSRF_TOKEN = '{{ csrf_token() }}';
                                        var url = '{{route('check_mobile_wallet')}}';
                                        var data = {_token: CSRF_TOKEN, mobile: mobile};
                                        $.post(url, data, function (msg) {
                                            if (msg == 'no-mobil') {
                                                $('.waitMe').fadeOut();
                                                $.notify({
                                                    // options
                                                    message: 'شماره وارد شده اشتباه است'
                                                }, {
                                                    // settings
                                                    type: 'danger',
                                                    placement: {
                                                        from: "bottom",
                                                        align: "right"
                                                    },
                                                    animate: {
                                                        enter: 'animated bounceIn',
                                                        exit: 'animated bounceOut'
                                                    }
                                                });


                                            } else {
                                                $('.check-code-div').slideDown();
                                                $('.return_code').show();
                                                $('.check-mobile').remove();
                                                $('.waitMe').fadeOut();
                                            }


                                        });
                                    }
                                });

                            }
                        })
                    });
                }


                function check_code() {

                    var code = $('input[name=code]').val();
                    if (code!=''){
                        if (code.length==6){
                            $('.token').waitMe({
                                effect: 'pulse',
                                text: 'در حال پردازش ...',
                                maxSize: '',
                                waitTime: 1,
                                textPos: 'vertical',
                                fontSize: '10',
                                source: '',
                            });
                            var CSRF_TOKEN = '{{ csrf_token() }}';
                            var url = '{{route('check_code_wallet')}}';
                            var data = {_token: CSRF_TOKEN, code: code};
                            $.post(url, data, function (msg) {
                                if (msg=='notok'){
                                    $('.waitMe').fadeOut();
                                    $.notify({
                                        // options
                                        message: 'کد تائید اشتباه است'
                                    }, {
                                        // settings
                                        type: 'danger',
                                        placement: {
                                            from: "bottom",
                                            align: "right"
                                        },
                                        animate: {
                                            enter: 'animated bounceIn',
                                            exit: 'animated bounceOut'
                                        }
                                    });



                                }else{
                                    $('.waitMe').fadeOut();
                                    $('.token-main').empty();
                                    $('.token-main').html('<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin: 0 auto;float: unset;"><small>جواب سوال امنیتی</small><div class="col-sm-12 token"><div class="form-group"><div class="form-line"><input type="text" name="answer" class="form-control" placeholder="جواب سوال امنیتی که وارد کردید را وارد کنید"></div></div><div class="form-group check-code-div"></div><button type="button" class="btn bg-blue check-answer waves-effect">تائید</button></div>');

                                    $('.check-answer').click(function () {
                                        var answer = $('input[name=answer]').val();
                                        if(answer!=""){
                                            var CSRF_TOKEN = '{{ csrf_token() }}';
                                            var url = '{{route('check_answer_wallet')}}';
                                            var data = {_token: CSRF_TOKEN, answer: answer};
                                            $.post(url, data, function (msg) {
                                                if (msg=='notok'){
                                                    $('.waitMe').fadeOut();
                                                    $.notify({
                                                        // options
                                                        message: 'جواب وارد شده نادرست است'
                                                    }, {
                                                        // settings
                                                        type: 'danger',
                                                        placement: {
                                                            from: "bottom",
                                                            align: "right"
                                                        },
                                                        animate: {
                                                            enter: 'animated bounceIn',
                                                            exit: 'animated bounceOut'
                                                        }
                                                    });
                                                }



                                                else if(msg=='ok'){
                                                    $('.waitMe').fadeOut();
                                                    $('.token-main').empty();
                                                    $('.token-main').html('<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin: 0 auto;float: unset;"><small>مبلغ</small><div class="col-sm-12 token"><div class="form-group"><div class="form-line"><input type="number" onkeyup="number_format()" name="price" class="form-control" placeholder="مقدار مبلغی که میخواهید انتقال دهید را وارد کنید"></div> <span class="price_name"></span></div><div class="form-group check-code-div"></div><button type="button" class="btn bg-blue send-price waves-effect">انتقال</button></div>');
                                                    $('.send-price').click(function () {
                                                        $('.token').waitMe({
                                                            effect: 'pulse',
                                                            text: 'در حال پردازش ...',
                                                            maxSize: '',
                                                            waitTime: 1,
                                                            textPos: 'vertical',
                                                            fontSize: '10',
                                                            source: '',
                                                        });

                                                        var price = $('input[name=price]').val();
                                                        if(price!=''){
                                                            var CSRF_TOKEN = '{{ csrf_token() }}';
                                                            var url = '{{route('send_price_wallet')}}';
                                                            var data = {_token: CSRF_TOKEN, price: price};
                                                            $.post(url, data, function (msg) {
                                                                if (msg=='notok'){
                                                                    $('.waitMe').fadeOut();
                                                                    $.notify({
                                                                        // options
                                                                        message: 'مشکلی در انتقال رخ داده است لطفا دوباره تلاش کنید'
                                                                    }, {
                                                                        // settings
                                                                        type: 'danger',
                                                                        placement: {
                                                                            from: "bottom",
                                                                            align: "right"
                                                                        },
                                                                        animate: {
                                                                            enter: 'animated bounceIn',
                                                                            exit: 'animated bounceOut'
                                                                        }
                                                                    });
                                                                }

                                                                else if (msg=='nomony'){
                                                                    $('.waitMe').fadeOut();
                                                                    $.notify({
                                                                        // options
                                                                        message: 'موجودی کافی نیست'
                                                                    }, {
                                                                        // settings
                                                                        type: 'danger',
                                                                        placement: {
                                                                            from: "bottom",
                                                                            align: "right"
                                                                        },
                                                                        animate: {
                                                                            enter: 'animated bounceIn',
                                                                            exit: 'animated bounceOut'
                                                                        }
                                                                    });
                                                                }
                                                                else if (msg=="minimum"){
                                                                    $('.waitMe').fadeOut();
                                                                    $.notify({
                                                                        // options
                                                                        message: 'حداقل مقدار انتقال 1،000 تومان می باشد'
                                                                    }, {
                                                                        // settings
                                                                        type: 'danger',
                                                                        placement: {
                                                                            from: "bottom",
                                                                            align: "right"
                                                                        },
                                                                        animate: {
                                                                            enter: 'animated bounceIn',
                                                                            exit: 'animated bounceOut'
                                                                        }
                                                                    });
                                                                }else if (msg=="maximum"){
                                                                    $('.waitMe').fadeOut();
                                                                    $.notify({
                                                                        // options
                                                                        message: 'حداکثر مقدار انتقال 5،000،000 تومان می باشد'
                                                                    }, {
                                                                        // settings
                                                                        type: 'danger',
                                                                        placement: {
                                                                            from: "bottom",
                                                                            align: "right"
                                                                        },
                                                                        animate: {
                                                                            enter: 'animated bounceIn',
                                                                            exit: 'animated bounceOut'
                                                                        }
                                                                    });
                                                                }else if (msg=="/adminb/wallet"){
                                                                    window.location.replace(msg);
                                                                }
                                                            })
                                                        }

                                                    })
                                                }
                                            });
                                        }
                                    })
                                }



                            });
                        }
                    }

                }


                function return_code() {
                    $('.token').waitMe({
                        effect: 'pulse',
                        text: 'در حال پردازش ...',
                        maxSize: '',
                        waitTime: 1,
                        textPos: 'vertical',
                        fontSize: '10',
                        source: '',
                    });
                    var mobile = $('input[name=mobile]').val();
                    var CSRF_TOKEN = '{{ csrf_token() }}';
                    var url = '{{route('check_mobile_wallet')}}';
                    var data = {_token: CSRF_TOKEN, mobile: mobile};
                    $.post(url, data, function (msg) {
                        $('.waitMe').fadeOut();
                    });
                }
            </script>

            <script>
                function Money_transfer(status) {
                    var CSRF_TOKEN = '{{ csrf_token() }}';
                    var url = '{{route('Money_transfer_wallet')}}';
                    var data = {_token: CSRF_TOKEN, status: status};
                    $.post(url, data, function (msg) {

                        if(msg.pay=="yes"){
                            $.notify({
                                // options
                                message: 'با موفقیت به کیف پول انتقال داده شد'
                            }, {
                                // settings
                                type: 'success',
                                placement: {
                                    from: "bottom",
                                    align: "right"
                                },
                                animate: {
                                    enter: 'animated bounceIn',
                                    exit: 'animated bounceOut'
                                }
                            });
                            if (status=="direct"){
                                $('.direct-selling').html('0 تومان');

                            }else if(status=="balance"){
                                $('.balance-selling').html('0 تومان');
                            }

                            $('.total-price').html('جمع کل : '+msg.price+' تومان ');
                            $('.total_price').html(msg.total_price+' تومان ');
                        }

                    });
                }


            </script>
@endsection

