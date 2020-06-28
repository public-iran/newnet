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

                    <a href="{{route('listtargets.index')}}" style="float:left;margin-top: -10px;" type="button" class="btn btn-default btn-circle waves-effect waves-circle waves-float">
                        <i class="material-icons">reply</i>
                    </a>

                    <h2>لیست ارسال شده توسط {{$user->name}}</h2>

                </div>
                <div class="body">
                    <div class="row clearfix users">
                        <div class="panel-body table-responsive">
                            <table class="table list-contact table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>ردیف</th>
                                    <th style="text-align: center">هدف</th>
                                    <th>دلیل من برای رسیدن به این هدف چیست؟</th>
                                    <th>مبلغ مورد نیاز</th>
                                    <th>درآمد سالیانه لازم</th>
                                    <th>تعداد جایگاه قرارداد</th>
                                    <th>تعداد تعادل</th>
                                    <th>تاریخ دستیابی</th>
                                    <th>تیک خورد</th>

                                </tr>
                                </thead>
                                <tbody>


                                @if(count($listtargets))
                                    <?php
                                    $row = 1;
                                    ?>
                                    @foreach($listtargets as $listtarget)
                                        <tr style="background: #fff">
                                            <td style="line-height: 42px;">{{$row}}</td>
                                            <td>
                                                <div class="input-group">
                                                    <div class="form-line">
                                                        <input  name="target{{$row}}"
                                                                type="text"
                                                                class="form-control date"
                                                                placeholder="هدف" value="{{$listtarget->target}}">
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group">
                                                    <div class="form-line">
                                                        <input  name="reason{{$row}}"
                                                                type="text"
                                                                class="form-control date"
                                                                placeholder="دلیل" value="{{$listtarget->reason}}">
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group">
                                                    <div class="form-line">
                                                        <input  name="price{{$row}}"
                                                                type="number"
                                                                class="form-control date"
                                                                placeholder="مبلغ" value="{{$listtarget->price}}">
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group">
                                                    <div class="form-line">
                                                        <input  name="income{{$row}}"
                                                                type="number"
                                                                class="form-control date"
                                                                placeholder="درآمد" value="{{$listtarget->income}}">
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group">
                                                    <div class="form-line">
                                                        <input  name="position{{$row}}"
                                                                type="number"
                                                                class="form-control date"
                                                                placeholder="تعداد جایگاه" value="{{$listtarget->position}}">
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group">
                                                    <div class="form-line">
                                                        <input  name="balance{{$row}}"
                                                                type="number"
                                                                class="form-control date"
                                                                placeholder="تعداد تعادل" value="{{$listtarget->balance}}">
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group date" id="bs_datepicker_component_container">
                                                    <div class="form-line">
                                                        <input id="pdpSelectedBefore-{{$row}}" name="date{{$row}}" value="{{$listtarget->date}}" class="form-control" placeholder="تاریخ دستیابی">
                                                    </div>
                                                    <span class="input-group-addon">
                                            <i class="material-icons">date_range</i>
                                        </span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group"
                                                     style="margin: 20px 0 0">

                                                    <input name="achieve{{$row}}" type="checkbox"
                                                           id="md_checkbox_{{$row}}"
                                                           class="filled-in chk-col-teal" @if($listtarget->achieve=='YES') checked @endif>
                                                    <label for="md_checkbox_{{$row}}"></label>

                                                </div>
                                            </td>

                                        </tr>
                                        <?php
                                        $row++;
                                        ?>
                                    @endforeach

                                @endif
                                </tbody>

                            </table>

                            <p style="text-align: center;font-weight: 700;">برای موفقیت در
                                نتورک باید اهدف سوزان و دلایل رسیدنتان به آنها را بشناسید و
                                برای آن ها برنامه داشته باشید</p>
                            <h4 style="text-align: center">پنج دلیل (چرایی)اصل خود برای
                                انجام این تجارت را بنویسید</h4>

                            @if(count($listtargets))
                                <?php
                                $row = 1;
                                $listTS=explode('|#|',$listtargets[0]['reason5']);

                                ?>
                                @foreach($listTS as $listT)
                                    <div class="form-group">
                                        <div class="form-line">
                                                                <textarea name="5reason[]" rows="1"
                                                                          class="form-control no-resize"
                                                                          placeholder="1.">{{$listT}}</textarea>
                                        </div>
                                    </div>
                                @endforeach

                            @endif


                        </div>

                    </div>

                    @if($listtargets[0]->confirmation=='NO')
                        <form method="post" action="{{route('listtargets.update',$user->id)}}">
                            @method('PATCH')
                            @csrf
                            <input type="hidden" name="confirmation" value="YES">
                            <button type="submit" class="btn bg-blue waves-effect" style="float: left">
                                <i class="material-icons">verified_user</i>
                                <span>تائید</span>
                            </button>
                        </form>
                    @endif
                    @if($listtargets[0]->confirmation=='NO' )
                        <form method="post" action="{{route('listtargets.update',$user->id)}}">
                            @method('PATCH')
                            @csrf
                            <input type="hidden" name="confirmation" value="Unconfirmed">
                        <button  class="btn bg-red waves-effect" style="float: left;margin-left: 10px">
                            <i class="material-icons">clear</i>
                            <span>عدم تائید</span>
                        </button>  </form>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection




