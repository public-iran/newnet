@extends('admin.layout.master')

@section('style')
    <link rel="stylesheet" href="{{asset('js/persianDatepicker-master/css/persianDatepicker-default.css')}}" />

    <style>
        .clearfix img {
            width: 100%;
            height: 170px;
        }

        .pagination li.active {
            background-color: #ee6e73;
            font-size: 1.2rem;
            padding: 2px 10px;
            height: 27px;
        }

        .page-item.disabled {
            font-size: 15pt;
            padding: 0 10px;
        }

        .panel-group .panel-col-pink .panel-title {
            background: #2E8943 !important;
        }

        .panel-group .panel-col-pink {
            border: 1px solid #2E8943;
        }

        .table-striped > tbody > tr:nth-of-type(odd) {
            background-color: #2e89433b;
        }


        .list-contact {
            height: 400px;
            display: block;
            overflow-y: auto;
        }

        .table-bordered tbody tr td, .table-bordered tbody tr th {
            padding: 0px 8px;
        }
    </style>
@endsection

@section('content_user')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

            @if(session('insert-file') and session('insert-file')=='success')
                <div class="alert bg-green alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                    آموزش جدید با موفقیت ثبت شد!
                </div>
            @endif

            @if(session('edit-Education') and session('edit-Education')=='success')
                <div class="alert bg-green alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                    آموزش با موفقیت بروزرسانی شد!
                </div>
            @endif

            @if(session('delete-Education') and session('delete-Education')=='success')
                <div class="alert bg-green alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                    آموزش جدید با موفقیت حذف شد!
                </div>
            @endif
            <?php
            Session::forget('insert-Education');
            Session::forget('edit-Education');
            Session::forget('delete-Education');

            ?>

            @if($description)
                <div class="panel-group" id="accordion_17" role="tablist" aria-multiselectable="true"
                     style="border-radius: 3px;overflow:hidden;">
                    <div class="panel panel-col-pink">
                        <div class="panel-heading" role="tab" id="headingOne_1">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion_17"
                                   href="#collapseOne_1" aria-expanded="true" aria-controls="collapseOne_1">
                                    <i class="material-icons">list</i>
                                    چارت آموزشی @if($description->level==1)
                                        Beginner
                                    @elseif($description->level==2)
                                        Presenter
                                    @elseif($description->level==3)
                                        Trainer
                                    @elseif($description->level==4)
                                        Advisor
                                    @elseif($description->level==5)
                                        Leader
                                    @elseif($description->level==6)
                                        Top Leader
                                    @elseif($description->level==7)
                                        Masster
                                    @endif
                                    <i style="float: left;" class="material-icons">arrow_drop_down_circle</i>

                                </a>

                            </h4>
                        </div>
                        <div id="collapseOne_1" class="panel-collapse collapse" role="tabpanel"
                             aria-labelledby="headingOne_1">
                            <div class="panel-body">
                                <div class="body">
                                    <div id="aniimated-thumbnials" class="list-unstyled row clearfix">
                                        <div class="card">


                                            <table class="table table-striped">
                                                <thead>
                                                <tr>
                                                    <th>ردیف</th>
                                                    <th style="text-align: center">شرح</th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php

                                                $i = 1;
                                                @$descriptions = explode('@#', $description->description);

                                                ?>
                                                @foreach($descriptions as $des)
                                                    <?php
                                                    $enters = $des;
                                                    $brs = explode('$$', $enters);

                                                    ?>
                                                    <tr>
                                                        <td>{{$i}}</td>
                                                        <td>
                                                            @foreach($brs as $br)
                                                                {{$br}}<br>
                                                            @endforeach
                                                        </td>

                                                    </tr>
                                                    <?php
                                                    $i++;
                                                    ?>
                                                @endforeach
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if($oldeducations)
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                    @if(count($oldphotos))
                        <div class="panel panel-col-pink">
                            <div class="panel-heading" role="tab" id="headingOne_171">
                                <h4 class="panel-title" style="background: #90AC97 !important">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion_171"
                                       href="#collapseOne_171" aria-expanded="true"
                                       aria-controls="collapseOne_171">
                                        <i class="material-icons">image</i>
                                        آموزش تصویری مرحله های قبل
                                        <i style="float: left;" class="material-icons">arrow_drop_down_circle</i>

                                    </a>

                                </h4>
                            </div>
                            <div id="collapseOne_171" class="panel-collapse collapse" role="tabpanel"
                                 aria-labelledby="headingOne_171">
                                <div class="panel-body">
                                    <div class="body">
                                        <div id="aniimated-thumbnials"
                                             class="list-unstyled row clearfix">


                                            @foreach($oldphotos as $image)
                                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                                    <a href="{{asset('amozesh/level'.$image->level.'/surface'.$image->surface.'/photos/'.$image->path)}}"
                                                       data-sub-html="Demo Description">
                                                        <img class="img-responsive thumbnail"
                                                             src="{{asset('amozesh/level'.$image->level.'/surface'.$image->surface.'/photos/'.$image->path)}}">
                                                    </a>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endif

                    @if(count($oldvideos))
                        <div class="panel panel-col-pink">
                            <div class="panel-heading" role="tab" id="headingTwo_172">
                                <h4 class="panel-title" style="background: #90AC97 !important">
                                    <a class="collapsed" role="button" data-toggle="collapse"
                                       data-parent="#accordion_172" href="#collapseTwo_172"
                                       aria-expanded="false"
                                       aria-controls="collapseTwo_172">
                                        <i class="material-icons">cloud_download</i>آموزش ویدیویی مرحله های قبل
                                        <i style="float: left;" class="material-icons">arrow_drop_down_circle</i>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo_172" class="panel-collapse collapse" role="tabpanel"
                                 aria-labelledby="headingTwo_172">
                                <div class="panel-body">
                                    <?php

                                    foreach ($oldvideos as $video) {
                                        echo $video->path;
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if(count($oldsounds))
                        <div class="panel panel-col-pink">
                            <div class="panel-heading" role="tab" id="headingThree_173">
                                <h4 class="panel-title" style="background: #90AC97 !important">
                                    <a class="collapsed" role="button" data-toggle="collapse"
                                       data-parent="#accordion_173" href="#collapseThree_173"
                                       aria-expanded="false"
                                       aria-controls="collapseThree_173">
                                        <i class="material-icons">volume_up</i>آموزش پادکست مرحله های قبل
                                        <i style="float: left;" class="material-icons">arrow_drop_down_circle</i>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseThree_173" class="panel-collapse collapse" role="tabpanel"
                                 aria-labelledby="headingThree_173">
                                <div class="panel-body">

                                    @foreach($oldsounds as $sound)
                                        <audio controls="" style="width: 100%">
                                            <source
                                                src="{{asset('amozesh/level'.$sound->level.'/surface'.$sound->surface.'/sound/'.$sound->path)}}"
                                                type="audio/mp3">
                                            مرورگر شما پشتیبانی نمیکند
                                        </audio>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif

                    @if(count($oldpdfs))
                        <div class="panel panel-col-pink">
                            <div class="panel-heading" role="tab" id="headingFour_174">
                                <h4 class="panel-title" style="background: #90AC97 !important">
                                    <a class="collapsed" role="button" data-toggle="collapse"
                                       data-parent="#accordion_174" href="#collapseFour_174"
                                       aria-expanded="false"
                                       aria-controls="collapseFour_174">
                                        <i class="material-icons">textsms</i>آموزش مرحله های قبل pdf
                                        <i style="float: left;" class="material-icons">arrow_drop_down_circle</i>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseFour_174" class="panel-collapse collapse" role="tabpanel"
                                 aria-labelledby="headingFour_174">
                                <div class="panel-body">

                                    @foreach($oldpdfs as $pdf)

                                        {{--                                                    <iframe src="https://docs.google.com/gview?url={{asset('amozesh/level'.$educations->level.'/surface'.$educations->surface.'/pdf/'.$pdf)}}&embedded=true" style="width:600px; height:500px;" frameborder="0"></iframe>--}}
                                        <iframe
                                            src="https://docs.google.com/gview?url={{asset('amozesh/level'.$pdf->level.'/surface'.$pdf->surface.'/pdf/'.$pdf->path)}}&embedded=true"
                                            style="width:100%; min-height:300px;"
                                            frameborder="0"></iframe>

                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif


                </div>
            @endif

            @if($educations)
                <div class="card">
                    <div class="header">
                        <h5>سطح {{@$educations->level}} ، مرحله {{@$educations->surface}} شامل {{@$educations->shamel}}
                            می باشد که در طی زمان {{@$educations->zaman}} باید انجام شود. </h5>

                        {{--          <ul class="header-dropdown m-r--5">
                                      <li class="dropdown">
                                          <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                              <i class="material-icons">more_vert</i>
                                          </a>
                                          <ul class="dropdown-menu pull-right">
                                              <li><a href="javascript:void(0);">Action</a></li>
                                              <li><a href="javascript:void(0);">Another action</a></li>
                                              <li><a href="javascript:void(0);">Something else here</a></li>
                                          </ul>
                                      </li>
                                  </ul>--}}
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-xs-12 ol-sm-12 col-md-12 col-lg-12">
                                <div class="panel-group" id="accordion_17" role="tablist" aria-multiselectable="true">

                                    @if(count($photos))
                                        <div class="panel panel-col-pink">
                                            <div class="panel-heading" role="tab" id="headingOne_17">
                                                <h4 class="panel-title">
                                                    <a role="button" data-toggle="collapse" data-parent="#accordion_17"
                                                       href="#collapseOne_17" aria-expanded="true"
                                                       aria-controls="collapseOne_17">
                                                        <i class="material-icons">image</i>
                                                        آموزش تصویری
                                                        <i style="float: left;" class="material-icons">arrow_drop_down_circle</i>

                                                    </a>

                                                </h4>
                                            </div>
                                            <div id="collapseOne_17" class="panel-collapse collapse" role="tabpanel"
                                                 aria-labelledby="headingOne_17">
                                                <div class="panel-body">
                                                    <div class="body">
                                                        <div id="aniimated-thumbnials"
                                                             class="list-unstyled row clearfix">


                                                            @foreach($photos as $image)
                                                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                                                    <a href="{{asset('amozesh/level'.$image->level.'/surface'.$image->surface.'/photos/'.$image->path)}}"
                                                                       data-sub-html="Demo Description">
                                                                        <img class="img-responsive thumbnail"
                                                                             src="{{asset('amozesh/level'.$image->level.'/surface'.$image->surface.'/photos/'.$image->path)}}">
                                                                    </a>
                                                                </div>
                                                            @endforeach

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if(count($videos))
                                        <div class="panel panel-col-pink">
                                            <div class="panel-heading" role="tab" id="headingTwo_17">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse"
                                                       data-parent="#accordion_17" href="#collapseTwo_17"
                                                       aria-expanded="false"
                                                       aria-controls="collapseTwo_17">
                                                        <i class="material-icons">cloud_download</i>آموزش ویدیویی
                                                        <i style="float: left;" class="material-icons">arrow_drop_down_circle</i>
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseTwo_17" class="panel-collapse collapse" role="tabpanel"
                                                 aria-labelledby="headingTwo_17">
                                                <div class="panel-body">
                                                    <?php

                                                    foreach ($videos as $video) {
                                                        echo $video->path;
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if(count($sounds))
                                        <div class="panel panel-col-pink">
                                            <div class="panel-heading" role="tab" id="headingThree_17">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse"
                                                       data-parent="#accordion_17" href="#collapseThree_17"
                                                       aria-expanded="false"
                                                       aria-controls="collapseThree_17">
                                                        <i class="material-icons">volume_up</i>آموزش پادکست
                                                        <i style="float: left;" class="material-icons">arrow_drop_down_circle</i>
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseThree_17" class="panel-collapse collapse" role="tabpanel"
                                                 aria-labelledby="headingThree_17">
                                                <div class="panel-body">

                                                    @foreach($sounds as $sound)
                                                        <audio controls="" style="width: 100%">
                                                            <source
                                                                src="{{asset('amozesh/level'.$sound->level.'/surface'.$sound->surface.'/sound/'.$sound->path)}}"
                                                                type="audio/mp3">
                                                            مرورگر شما پشتیبانی نمیکند
                                                        </audio>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if(count($pdfs))
                                        <div class="panel panel-col-pink">
                                            <div class="panel-heading" role="tab" id="headingFour_17">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse"
                                                       data-parent="#accordion_17" href="#collapseFour_17"
                                                       aria-expanded="false"
                                                       aria-controls="collapseFour_17">
                                                        <i class="material-icons">textsms</i>آموزش pdf
                                                        <i style="float: left;" class="material-icons">arrow_drop_down_circle</i>
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseFour_17" class="panel-collapse collapse" role="tabpanel"
                                                 aria-labelledby="headingFour_17">
                                                <div class="panel-body">

                                                    @foreach($pdfs as $pdf2)



                                                        <iframe
                                                            src="https://docs.google.com/gview?url={{asset('amozesh/level'.$pdf2->level.'/surface'.$pdf2->surface.'/pdf/'.$pdf2->path)}}&embedded=true"
                                                            style="width:100%; min-height:300px;"
                                                            frameborder="0"></iframe>

                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if($educations->list=='YES' and Auth::user()->listpeople=='NO')
                                            @if(@$list_people->confirmation=="Unconfirmed")
                                                <div class="alert bg-red alert-dismissible" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                                            aria-hidden="true">×</span></button>
                                                    لیست افراد شما رد شده است، لفطا برسی کنید و لیست افراد خود را دوباره ارسال کنید
                                                </div>
                                            @endif
                                            @if(@$list_people->confirmation=="OK")
                                                <div class="alert bg-green alert-dismissible" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                                            aria-hidden="true">×</span></button>
                                                    لیست افراد شما تائید شد.
                                                </div>
                                            @endif
                                        <div class="panel panel-col-pink">
                                            <div class="panel-heading" role="tab" id="headingThree_17">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse"
                                                       data-parent="#accordion_17" href="#collapseThree_17"
                                                       aria-expanded="false"
                                                       aria-controls="collapseThree_17">
                                                        <i class="material-icons">assignment</i>لیست افراد
                                                        <i style="float: left;" class="material-icons">arrow_drop_down_circle</i>
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseThree_17" class="panel-collapse collapse" role="tabpanel"
                                                 aria-labelledby="headingThree_17">
                                                <form method="post" action="{{route('training.store')}}">
                                                    @csrf
                                                    <div class="panel-body">
                                                        <table class="table list-contact table-striped">
                                                            <thead>
                                                            <tr>
                                                                <th>ردیف</th>
                                                                <th style="text-align: center">نام</th>

                                                            </tr>
                                                            </thead>
                                                            @if ($list_people)
                                                                <tbody>
                                                                <?php
                                                                $row=1;
                                                                $listpeoples=explode('|#|',$list_people->list);
                                                                foreach ($listpeoples as $list){?>
                                                                <tr style="background: #fff">
                                                                    <td style="line-height: 42px;">{{$row}}</td>
                                                                    <td>
                                                                        <div class="input-group">
                                                                                 <span class="input-group-addon">
                                                                                      <i class="material-icons">person</i>
                                                                                         </span>
                                                                            <div class="form-line">
                                                                                <input required name="name[]"
                                                                                       type="text"
                                                                                       class="form-control date"
                                                                                       placeholder="نام" value="{{$list}}">
                                                                            </div>
                                                                        </div>
                                                                    </td>

                                                                </tr>
                                                                <?php
                                                                $row++;
                                                                }
                                                                ?>

                                                                </tbody>
                                                                @else


                                                                <tbody>

                                                                <?php
                                                                $row = 1;
                                                                ?>
                                                                @for($i=1;$i<=500;$i++)
                                                                    <tr style="background: #fff">
                                                                        <td style="line-height: 42px;">{{$row}}</td>
                                                                        <td>
                                                                            <div class="input-group">
                                                                                 <span class="input-group-addon">
                                                                                      <i class="material-icons">person</i>
                                                                                         </span>
                                                                                <div class="form-line">
                                                                                    <input required name="name[]"
                                                                                           type="text"
                                                                                           class="form-control date"
                                                                                           placeholder="نام">
                                                                                </div>
                                                                            </div>
                                                                        </td>

                                                                    </tr>
                                                                    <?php
                                                                    $row++;
                                                                    ?>
                                                                @endfor
                                                                </tbody>
                                                            @endif


                                                            <button type="submit" class="btn bg-blue waves-effect">
                                                                <i class="material-icons">verified_user</i>
                                                                <span>ارسال</span>
                                                            </button>
                                                        </table>
                                                    </div>
                                                </form>


                                            </div>
                                        </div>

                                    @endif

                                    @if($educations->target=='YES')
                                        @if(@$listtargets[0]->confirmation=="Unconfirmed")
                                            <div class="alert bg-red alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                                        aria-hidden="true">×</span></button>
لیست اهداف شما رد شده است، لفطا برسی کنید و لیست اهداف خود را دوباره ارسال کنید
                                            </div>
                                        @endif
                                            @if(@$listtargets[0]->confirmation=="YES")
                                                <div class="alert bg-green alert-dismissible" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                                            aria-hidden="true">×</span></button>
                                                    لیست افراد شما تائید شد.
                                                </div>
                                            @endif
                                        <div class="panel panel-col-pink">
                                            <div class="panel-heading" role="tab" id="headingThree_17">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse"
                                                       data-parent="#accordion_17" href="#collapseThree_17"
                                                       aria-expanded="false"
                                                       aria-controls="collapseThree_17">
                                                        <i class="material-icons">assignment</i>لیست اهداف
                                                        <i style="float: left;" class="material-icons">arrow_drop_down_circle</i>
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseThree_17" class="panel-collapse collapse" role="tabpanel"
                                                 aria-labelledby="headingThree_17">
                                                <form method="post" action="{{route('training.insert_listtargets')}}">
                                                    @csrf
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
                                                                                    <input id="pdpSelectedBefore-{{$row}}" value="{{$listtarget->date}}" name="date{{$row}}" class="form-control" placeholder="تاریخ دستیابی">
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
                                                                                       class="filled-in chk-col-teal" value="YES" @if($listtarget->achieve) checked @endif>
                                                                                <label for="md_checkbox_{{$row}}"></label>

                                                                            </div>
                                                                        </td>

                                                                    </tr>
                                                                    <?php
                                                                    $row++;
                                                                    ?>
                                                                @endforeach
                                                            @else
                                                                @for($i=1;$i<=10;$i++)
                                                                    <tr style="background: #fff">
                                                                        <td style="line-height: 42px;">{{$i}}</td>
                                                                        <td>
                                                                            <div class="input-group">
                                                                                <div class="form-line">
                                                                                    <input  name="target{{$i}}"
                                                                                            type="text"
                                                                                            class="form-control date"
                                                                                            placeholder="هدف">
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="input-group">
                                                                                <div class="form-line">
                                                                                    <input  name="reason{{$i}}"
                                                                                            type="text"
                                                                                            class="form-control date"
                                                                                            placeholder="دلیل">
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="input-group">
                                                                                <div class="form-line">
                                                                                    <input  name="price{{$i}}"
                                                                                            type="number"
                                                                                            class="form-control date"
                                                                                            placeholder="مبلغ">
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="input-group">
                                                                                <div class="form-line">
                                                                                    <input  name="income{{$i}}"
                                                                                            type="number"
                                                                                            class="form-control date"
                                                                                            placeholder="درآمد">
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="input-group">
                                                                                <div class="form-line">
                                                                                    <input  name="position{{$i}}"
                                                                                            type="number"
                                                                                            class="form-control date"
                                                                                            placeholder="تعداد جایگاه">
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="input-group">
                                                                                <div class="form-line">
                                                                                    <input  name="balance{{$i}}"
                                                                                            type="number"
                                                                                            class="form-control date"
                                                                                            placeholder="تعداد تعادل">
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="input-group date" id="bs_datepicker_component_container">
                                                                                <div class="form-line">
                                                                                    <input id="pdpSelectedBefore-{{$i}}" name="date{{$i}}" class="form-control" placeholder="تاریخ دستیابی">
                                                                                </div>
                                                                                <span class="input-group-addon">
                                            <i class="material-icons">date_range</i>
                                        </span>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="input-group"
                                                                                 style="margin: 20px 0 0">

                                                                                <input name="achieve{{$i}}" type="checkbox"
                                                                                       id="md_checkbox_{{$i}}"
                                                                                       class="filled-in chk-col-teal" value="YES">
                                                                                <label for="md_checkbox_{{$i}}"></label>

                                                                            </div>
                                                                        </td>

                                                                    </tr>
                                                                @endfor
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
                                                        @else

                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                <textarea name="5reason[]" rows="1"
                                                                          class="form-control no-resize"
                                                                          placeholder="1."></textarea>
                                                                </div>
                                                                <div class="form-line">
                                                                <textarea name="5reason[]" rows="1"
                                                                          class="form-control no-resize"
                                                                          placeholder="2."></textarea>
                                                                </div>
                                                                <div class="form-line">
                                                                <textarea name="5reason[]" rows="1"
                                                                          class="form-control no-resize"
                                                                          placeholder="3."></textarea>
                                                                </div>
                                                                <div class="form-line">
                                                                <textarea name="5reason[]" rows="1"
                                                                          class="form-control no-resize"
                                                                          placeholder="4."></textarea>
                                                                </div>
                                                                <div class="form-line">
                                                                <textarea name="5reason[]" rows="1"
                                                                          class="form-control no-resize"
                                                                          placeholder="5."></textarea>
                                                                </div>
                                                            </div>
                                                        @endif

                                                        <button type="submit" style="float: left"
                                                                class="btn bg-blue waves-effect">
                                                            <i class="material-icons">verified_user</i>
                                                            <span>ارسال</span>
                                                        </button>

                                                    </div>

                                                </form>



                                            </div>
                                        </div>

                                    @endif

                                    @if($educations->Golden_list=='YES' and Auth::user()->Golden_listpeople=='NO')
                                            @if(@$golden_list->confirmation=="Unconfirmed")
                                                <div class="alert bg-red alert-dismissible" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                                            aria-hidden="true">×</span></button>
                                                    لیست افراد شما رد شده است، لفطا برسی کنید و لیست  خود را دوباره ارسال کنید
                                                </div>
                                            @endif
                                            @if(@$golden_list->confirmation=="YES")
                                                <div class="alert bg-green alert-dismissible" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                                            aria-hidden="true">×</span></button>
                                                    لیست افراد شما تائید شد.
                                                </div>
                                            @endif
                                            <div class="panel panel-col-pink" style="border: 1px solid #FFD700;">
                                                <div class="panel-heading" role="tab" id="headingThree_17">
                                                    <h4 class="panel-title" style="background: #FFD700 !important;">
                                                        <a class="collapsed" role="button" data-toggle="collapse"
                                                           data-parent="#accordion_17" href="#collapseThree_17"
                                                           aria-expanded="false"
                                                           aria-controls="collapseThree_17">
                                                            <i class="material-icons">assignment</i>لیست طلایی افراد
                                                            <i style="float: left;" class="material-icons">arrow_drop_down_circle</i>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapseThree_17" class="panel-collapse collapse" role="tabpanel"
                                                     aria-labelledby="headingThree_17">
                                                    <form method="post" action="{{route('training.insert_goldenlistpeoples')}}">
                                                        @csrf
                                                        <div class="panel-body">
                                                            <table class="table list-contact table-striped">
                                                                <thead>
                                                                <tr>
                                                                    <th>ردیف</th>
                                                                    <th style="text-align: center">نام</th>

                                                                </tr>
                                                                </thead>
                                                                <tbody>

                                                                @if (@$golden_list)
                                                                    <?php
                                                                    $row = 1;
                                                                    $inputs=explode('|#|',$golden_list->list);
                                                                    foreach ($inputs as $input){?>
                                                                    <tr style="background: #fff">
                                                                        <td style="line-height: 42px;">{{$row}}</td>
                                                                        <td>
                                                                            <div class="input-group">
                                                                                 <span class="input-group-addon">
                                                                                      <i class="material-icons">person</i>
                                                                                         </span>
                                                                                <div class="form-line">
                                                                                    <input required name="name[]"
                                                                                           type="text"
                                                                                           class="form-control date"
                                                                                           placeholder="نام" value="{{$input}}">
                                                                                </div>
                                                                            </div>
                                                                        </td>

                                                                    </tr>
                                                                    <?php
                                                                    $row++;}
                                                                        ?>




                                                                    @else




                                                                    <?php
                                                                    $row = 1;
                                                                    ?>
                                                                    @for($i=1;$i<=20;$i++)
                                                                        <tr style="background: #fff">
                                                                            <td style="line-height: 42px;">{{$row}}</td>
                                                                            <td>
                                                                                <div class="input-group">
                                                                                 <span class="input-group-addon">
                                                                                      <i class="material-icons">person</i>
                                                                                         </span>
                                                                                    <div class="form-line">
                                                                                        <input required name="name[]"
                                                                                               type="text"
                                                                                               class="form-control date"
                                                                                               placeholder="نام">
                                                                                    </div>
                                                                                </div>
                                                                            </td>

                                                                        </tr>
                                                                        <?php
                                                                        $row++;
                                                                        ?>
                                                                    @endfor
                                                                @endif

                                                                </tbody>
                                                                <button type="submit" class="btn bg-blue waves-effect">
                                                                    <i class="material-icons">verified_user</i>
                                                                    <span>ارسال</span>
                                                                </button>
                                                            </table>
                                                        </div>
                                                    </form>


                                                </div>
                                            </div>

                                        @endif
                                </div>

                                @if($educations->test_confirm=='NO' and $educations->test=='YES' )
                                    <a href="{{route('exam.index')}}" style="float:left;" type="button"
                                       class="btn btn-info waves-effect ">رفتن به بخش آزمون</a>

                                @endif

                                @if($educations->test_confirm=='YES' and $educations->test=='YES' and @$userrequest_Exam->Exam=="YES")
                                    <a href="{{route('exam.index')}}" style="float:left;" type="button"
                                       class="btn btn-info waves-effect ">رفتن به بخش آزمون</a>

                                @endif

                                @if($educations->list!='YES' and $educations->test=='NO' and $userrequest_Next_surface=="")
                                    <a onclick="ok('Next-surface',this)" style="float:left;" type="button"
                                       class="btn btn-info waves-effect ">انجام شد</a>

                                @endif

                                @if($educations->test_confirm=='YES' and $educations->test=='YES' and $userrequest_Exam=="")
                                    <a onclick="ok('Exam',this)" style="float:left;" type="button"
                                       class="btn btn-info waves-effect ">انجام شد</a>

                                @endif
                            </div>


                        </div>
                    </div>
                </div>
            @else
                <div class="card">
                    <div class="header">

                        <h5>آموزشی ثبت نشده است !</h5>
                    </div>
                </div>
            @endif
        </div>
    </div>

@endsection

@section('script')
    <script src="{{asset('js/lightgallery-all.min.js')}}"></script>
    <script src="{{asset('js/persianDatepicker-master/js/persianDatepicker.min.js')}}"></script>
    <script>
        $("#pdpSelectedBefore-2").persianDatepicker({ selectedBefore: !0 });
        for (var i=1;i<=10;i++){

            $("#pdpSelectedBefore-"+i).persianDatepicker({ selectedBefore: !0 });

        }

    </script>

    <script>
        function ok(request, tag) {
            var CSRF_TOKEN = '{{ csrf_token() }}';
            var url = '{{route('user_request_user')}}';
            var data = {_token: CSRF_TOKEN, request: request, user_id: '{{Auth::id()}}'};
            $.post(url, data, function (msg) {
                if (msg == 'ok') {
                    if (request == "Exam") {
                        let timerInterval
                        Swal.fire({
                            title: 'درخواست شما فرستاده شد و پس از برسی آزمون شما فعال خواهد شد',
                            timer: 3000,
                            onBeforeOpen: () => {
                                Swal.showLoading()
                                timerInterval = setInterval(() => {
                                    const content = Swal.getContent()
                                    if (content) {
                                        const b = content.querySelector('b')
                                        if (b) {
                                            b.textContent = Swal.getTimerLeft()
                                        }

                                    }
                                }, 100)
                            },
                            onClose: () => {
                                $(tag).remove();
                                clearInterval(timerInterval)

                            }
                        }).then((result) => {
                            /* Read more about handling dismissals below */
                            if (result.dismiss === Swal.DismissReason.timer) {
                                console.log('I was closed by the timer')
                            }
                        })
                    } else {
                        let timerInterval
                        Swal.fire({
                            title: 'درخواست شما فرستاده شد و پس از برسی شما به مرحله بعد ارتقا پیدا می کنید',
                            timer: 3000,
                            onBeforeOpen: () => {
                                Swal.showLoading()
                                timerInterval = setInterval(() => {
                                    const content = Swal.getContent()
                                    if (content) {
                                        const b = content.querySelector('b')
                                        if (b) {
                                            b.textContent = Swal.getTimerLeft()
                                        }

                                    }
                                }, 100)
                            },
                            onClose: () => {
                                $(tag).remove();
                                clearInterval(timerInterval)

                            }
                        }).then((result) => {
                            /* Read more about handling dismissals below */
                            if (result.dismiss === Swal.DismissReason.timer) {
                                console.log('I was closed by the timer')
                            }
                        })
                    }
                }
            })
        }
    </script>


@endsection


