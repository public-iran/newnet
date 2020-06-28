@extends('adminbizness.layout.master')

@section('style_link')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"/>
@endsection

@section('style')
<style>
    .table th{
        text-align: center;
    }
    .nav-tabs > li{
        float: right;
    }
    .bootstrap-select:not([class*="col-"]):not([class*="form-control"]):not(.input-group-btn) {
        width: 60px;
    }
</style>
@endsection

@section('Admin_content')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 80px">
        <div class="card" style="box-shadow: none">
            <div class="body">
                <!-- Nav tabs -->
                <a href="/adminb/calculation" type="submit" style="float:left;" class="btn btn-success">دستور محاسبه </a>
                <ul class="nav nav-tabs tab-nav-right" role="tablist">
                    <li role="presentation" class="active"><a href="#home" data-toggle="tab">دارای پکیج</a></li>
                    <li role="presentation"><a href="#profile" data-toggle="tab">بدون پکیج</a></li>
                    {{--<li role="presentation"><a href="#messages" data-toggle="tab">MESSAGES</a></li>
                    <li role="presentation"><a href="#settings" data-toggle="tab">SETTINGS</a></li>--}}
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="home">
                        <div class="body" style="padding: 0 0 25px;">
                            <div class="box box-primary">

                                <div class="box-body">
                                    <br>
                                    <div class="container-fluid table-responsive">

                                        <table class="table table-bordered text-center table-striped" id="myTable"
                                               style="width: 100%;font-size: 13px">
                                            <thead class="bg-blue-gradient">
                                            <tr id="">
                                                <th>#</th>
                                                <th>نام و نام خانوادگی</th>
                                                <th>نام کاربری</th>
                                                <th>کد معرف</th>
                                                <th>کد بالاسری</th>
                                                <th>موبایل</th>
                                                <th>استان</th>
                                                <th>شهر</th>
                                                <th>تاریخ ثبت نام</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php $i=1; @endphp
                                            @foreach($users as $user)
                                                @if($user->reference_code!="")
                                                <tr>
                                                    <th scope="row">{{$i++}}</th>
                                                    <td><a href="{{route('users.edit',$user->id)}}">{{$user->name}}</a></td>
                                                    <td>{{$user->username}}</td>
                                                    <td>{{$user->reference_code}}</td>
                                                    <td>{{$user->reference}}</td>
                                                    <td>{{$user->mobile}}</td>
                                                    <td>{{$user->ostan}}</td>
                                                    <td>{{$user->city}}</td>
                                                    <td>{{Verta::instance($user->created_at)->format('%d %B %Y | H:i:s')}}</td>

                                                </tr>
                                                @endif
                                            @endforeach

                                            </tbody>
                                        </table>

                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="profile">
                        <div class="body" style="padding: 0 0 25px;">
                            <div class="box box-primary">

                                <div class="box-body">
                                    <br>
                                    <div class="container-fluid table-responsive">

                                        <table class="table table-bordered text-center table-striped" id="myTable2"
                                               style="width: 100%;font-size: 13px">
                                            <thead class="bg-blue-gradient">
                                            <tr id="">
                                                <th>#</th>
                                                <th>نام و نام خانوادگی</th>
                                                <th>کد معرف</th>
                                                <th>کد بالاسری</th>
                                                <th>موبایل</th>
                                                <th>استان</th>
                                                <th>شهر</th>
                                                <th>تاریخ ثبت نام</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php $i=1; @endphp
                                            @foreach($users as $user)
                                                @if($user->reference_code=="")
                                                <tr>
                                                    <th scope="row">{{$i++}}</th>
                                                    <td><a href="{{route('users.edit',$user->id)}}">{{$user->name}}</a></td>
                                                    <td>{{$user->reference_code}}</td>
                                                    <td>{{$user->reference}}</td>
                                                    <td>{{$user->mobile}}</td>
                                                    <td>{{$user->ostan}}</td>
                                                    <td>{{$user->city}}</td>
                                                    <td>{{Verta::instance($user->created_at)->format('%d %B %Y | H:i:s')}}</td>

                                                </tr>
                                                @endif
                                            @endforeach

                                            </tbody>
                                        </table>

                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
            {{--        <div role="tabpanel" class="tab-pane fade" id="messages">
                        <b>Message Content</b>
                        <p>
                            Lorem ipsum dolor sit amet, ut duo atqui exerci dicunt, ius impedit mediocritatem an. Pri ut tation electram moderatius.
                            Per te suavitate democritum. Duis nemore probatus ne quo, ad liber essent aliquid
                            pro. Et eos nusquam accumsan, vide mentitum fabellas ne est, eu munere gubergren
                            sadipscing mel.
                        </p>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="settings">
                        <b>Settings Content</b>
                        <p>
                            Lorem ipsum dolor sit amet, ut duo atqui exerci dicunt, ius impedit mediocritatem an. Pri ut tation electram moderatius.
                            Per te suavitate democritum. Duis nemore probatus ne quo, ad liber essent aliquid
                            pro. Et eos nusquam accumsan, vide mentitum fabellas ne est, eu munere gubergren
                            sadipscing mel.
                        </p>
                    </div>--}}
                </div>
            </div>

        </div>
    </div>


</div>
    @endsection

@section('script_link')
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    @endsection


@section('script')
    <script>


        $('#myTable').DataTable({
            "lengthMenu": [
                [20, 30, 40],
                [20, 30, 40],
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

        $('#myTable2').DataTable({
            "lengthMenu": [
                [20, 30, 40],
                [20, 30, 40],
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
    @endsection
