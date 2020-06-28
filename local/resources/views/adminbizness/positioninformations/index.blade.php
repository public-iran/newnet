@extends('adminbizness.layout.master')


@section('content')
    <style>
        .info-box-4 .icon {
            left: 10px;
            right: unset;
        }

        .info-box-4 .content {
            line-height: 2;
        }

        .info-box-4 {
            box-shadow: unset;
        }

        .panel-group .panel .panel-title .material-icons {
            float: left;
        }

        .panel {
            box-shadow: unset !important;
        }

        .panel-group .panel + .panel {
            margin-top: unset;
        }

        .panel-group .panel-col-white {
            border: 1px solid #f7f7f7;
        }

        .w-spp {
            display: flex;
            justify-content: right;
            margin-bottom: 4px;
            border: 1px solid #61c579;
            border-radius: 6px;
            padding: 6px;
        }

        .spp {
            color: #61c579;
            border: 1px solid #61c579;
            background: #eefff2;
            padding: 2px 10px 2px 10px;
            border-radius: 6px
        }

        .lf {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .lf > span {
            margin: 0 4px 0;
        }

        .w-total {
            display: flex;
            justify-content: space-between;
            flex-direction: row-reverse;
        }

        @media only screen and (max-width: 768px) {
            .w-spp {
                flex-direction: column;
            }

            .w-spp > span {
                margin-bottom: 20px;
            }

            .w-total {
                flex-direction: column;
                align-items: center;
                margin-bottom: 12px;
            }
            .w-total>div>div{
                margin: 2px;
            }
        }

        @media only screen and (min-width: 600px) {
            .w-spp {
                /*flex-direction: row;*/
            }
        }
        .btn:not(.btn-link):not(.btn-circle) {
            box-shadow: unset;
        }
    </style>

{{--
    <div class="row">
        <div class="col-lg-12">
            <div class="w-total">
                <div style="width: 100%;margin: 2px" class="">
                    <div class="info-box-4 hover-zoom-effect">
                        <div class="icon">
                            <i style="font-size: 38px;line-height: 2;color: #61c579" class="material-icons">monetization_on</i>
                        </div>
                        <div class="content">

                            @if(@$user_pos->left_total_sell > @$user_pos->right_total_sell)
                                <div style="font-size: 11px" class="text">ذخیره پویا</div>
                            @elseif(@$user_pos->left_total_sell < @$user_pos->right_total_sell)
                                <div style="font-size: 11px" class="text">ذخیره پیمان</div>
                            @else
                                <div style="font-size: 11px" class="text">ذخیره آرتیمان</div>
                            @endif

                            @if(!empty(@$user_pos->left_total_sell))
                                <div style="font-size: 10px;border: 1px dashed #61c579; border-radius: 10px; padding: 0 6px 0 6px;" class="">{{number_format($user_pos->left_total_sell)}} تومان</div>
                            @endif

                        </div>
                    </div>
                </div>
                <div style="width: 100%;margin: 2px" class="">
                    <div class="info-box-4 hover-zoom-effect">
                        <div class="icon">
                            <i style="font-size: 38px;line-height: 2;color: #61c579" class="material-icons">timeline</i>
                        </div>
                        <div class="content">
                            @if(@$user_pos->left_count > @$user_pos->right_count)
                                <div style="font-size: 11px" class="text">پویا</div>
                            @elseif(@$user_pos->left_count < @$user_pos->right_count)
                                <div style="font-size: 11px" class="text">پویا</div>
                            @else
                                <div style="font-size: 11px" class="text">آرتیمان</div>
                            @endif

                            @if(!empty(@$user_pos->left_count))
                                <div style="font-size: 10px;border: 1px dashed#61c579; border-radius: 10px; padding: 0 6px 0 6px;" class="">{{number_format(@$user_pos->left_count)}} </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div style="width: 100%;margin: 2px" class="">
                    <div class="info-box-4 hover-zoom-effect">
                        <div class="icon">
                            <i style="font-size: 38px;line-height: 2;color: #61c579" class="material-icons">monetization_on</i>
                        </div>
                        <div class="content">

                            @if(@$user_pos->left_total_sell < @$user_pos->right_total_sell)
                                <div style="font-size: 11px" class="text">ذخیره پویا</div>
                            @elseif(@$user_pos->left_total_sell > @$user_pos->right_total_sell)
                                <div style="font-size: 11px" class="text">ذخیره پیمان</div>
                            @else
                                <div style="font-size: 11px" class="text">ذخیره آرتیمان</div>
                            @endif


                            @if(!empty(@$user_pos->right_total_sell))
                                <div style="font-size: 10px;border: 1px dashed#61c579; border-radius: 10px; padding: 0 6px 0 6px;" class="">{{@$user_pos->right_total_sell}} تومان</div>
                            @endif
                        </div>
                    </div>
                </div>
                <div style="width: 100%;margin: 2px" class="">
                    <div class="info-box-4 hover-zoom-effect">
                        <div class="icon">
                            <i style="font-size: 38px;line-height: 2;color: #61c579" class="material-icons">timeline</i>
                        </div>
                        <div class="content">

                            @if(@$user_pos->left_count < @$user_pos->right_count)
                                <div style="font-size: 11px" class="text">پویا</div>
                            @elseif(@$user_pos->left_count > @$user_pos->right_count)
                                <div style="font-size: 11px" class="text">پیمان</div>
                            @else
                                <div style="font-size: 11px" class="text">آرتیمان</div>
                            @endif

                            @if(!empty(@$user_pos->right_count))
                                <div style="font-size: 10px;border: 1px dashed#61c579; border-radius: 10px; padding: 0 6px 0 6px;" class="">{{@$user_pos->right_count}} </div>
                            @endif
                        </div>
                    </div>
                </div>
               --}}
{{-- <div style="width: 100%;margin: 2px" class="">
                    <div class="info-box-4 hover-zoom-effect">
                        <div class="icon">
                            <i style="font-size: 38px;line-height: 2;color: #61c579" class="material-icons">timeline</i>
                        </div>
                        <div class="content">
                            <div style="font-size: 11px" class="text">زیر مجموعه های R</div>
                            @if(!empty(@$user_pos->right_count))
                                <div style="font-size: 10px" class="">{{@$user_pos->right_count}} </div>
                            @endif
                        </div>
                    </div>
                </div>--}}{{--

            </div>
        </div>
    </div>

--}}

    <div class="row clearfix" style="font-size: 11px">
        <div class="col-xs-12 ol-sm-12 col-md-12 col-lg-12">
            <div class="panel-group" id="accordion_1" role="tablist" aria-multiselectable="true">
                <?php $i = 0; ?>
                @foreach($positions as $position)
                    <?php
                    $i++;
                    $info_position = \App\Tree::where('reference_code', $position->reference_code)->first();
                    ?>
                    <div class="panel panel-col-white">
                        <div class="panel-heading" role="tab" id="headingOne_{{$i}}">
                            <h4 class="panel-title">
                                <a style="color: #666" role="button" data-toggle="collapse"
                                   data-parent="#accordion_{{$i}}" href="#collapseOne_{{$i}}" aria-expanded="true"
                                   aria-controls="collapseOne_{{$i}}">
                                    <i class="material-icons">keyboard_arrow_down</i>
                                    جایگاه {{$i}}
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne_{{$i}}" class="panel-collapse collapse " role="tabpanel"
                             aria-labelledby="headingOne_{{$i}}">
                            <div class="panel-body" style="display: flex;flex-direction: column">

                                <div class="w-spp">

                                    <span class="lf">
                                            <span>کد جایگاه : </span>
                                            <span style="color: #03A9F4; border: 1px solid #03a9f4; background: rgba(33, 150, 243, 0.09); }" class="spp">{{$info_position->reference_code}}</span>
                                    </span>

                                    <span class="lf">
                                            <span>L : </span>
                                            <span class="spp">{{$info_position->left_hand}}</span>
                                        </span>

                                    <span class="lf">
                                            <span>R : </span>
                                            <span class="spp">{{$info_position->right_hand}}</span>
                                        </span>

                                    <span class="lf">
                                        @if($info_position->left_count > $info_position->right_count)
                                            <span style="color: #e35007">پویا : </span>
                                        @elseif($info_position->left_count < $info_position->right_count)
                                            <span>پیمان : </span>
                                        @else
                                            <span>آرتیمان : </span>
                                        @endif
                                            <span class="spp">{{$info_position->left_count}} </span>
                                        </span>

                                    <span class="lf">
                                        @if($info_position->left_count < $info_position->right_count)
                                            <span style="color: #e35007">پویا : </span>
                                        @elseif($info_position->left_count > $info_position->right_count)
                                            <span>پیمان : </span>
                                        @else
                                            <span>آرتیمان : </span>
                                        @endif
                                            <span class="spp">{{$info_position->right_count}} </span>
                                        </span>

                                    <span class="lf">
                                        @if($info_position->left_price > $info_position->right_price)
                                            <span style="color: #cc41e3">ذخیره پویا : </span>
                                        @elseif($info_position->left_price < $info_position->right_price)
                                            <span>ذخیره پیمان : </span>
                                        @else
                                            <span>ذخیره آرتیمان : </span>
                                        @endif
                                            <span class="spp">{{number_format($info_position->left_price)}} تومان</span>
                                        </span>

                                    <span class="lf">
                                        @if($info_position->left_price < $info_position->right_price)
                                            <span style="color: #cc41e3">ذخیره پویا : </span>
                                        @elseif($info_position->left_price > $info_position->right_price)
                                            <span>ذخیره پیمان : </span>
                                        @else
                                            <span>ذخیره آرتیمان : </span>
                                        @endif
                                            <span
                                                class="spp">{{number_format($info_position->right_price)}} تومان</span>
                                        </span>

                                </div>
                                <?php
                                $submultiple=0;
                                $refral_codes = App\Tree::where('reference_code', $position->reference_code)->where('right_total_sell', '>=', 2000000)->where('left_total_sell', '>=', 2000000)->first();
                                if (!empty($refral_codes)){
                                $right_pricr = $refral_codes->right_total_sell;
                                $left_price = $refral_codes->left_total_sell;


                                if ($right_pricr < $left_price) {
                                    $submultiple = (int)($right_pricr / 2000000);
                                } elseif ($right_pricr > $left_price) {
                                    $submultiple = (int)($left_price / 2000000);
                                }else{
                                    $submultiple = (int)($right_pricr / 2000000);
                                }

                                }
                                ?>

                                <div class="w-spp">

                                    <span class="lf">
                                            <span>تعادل : </span>
                                            <span class="spp">{{@$submultiple}}</span>
                                        </span>

                                    <span class="lf">
                                            <span>پورسانت مستقیم : </span>
                                            <span class="spp">{{number_format($info_position->direct_selling_save)}} تومان</span>
                                        </span>

                                  {{--  <span class="lf">
                                            <span>پورسانت فروش : </span>
                                            <span class="spp">647</span>
                                        </span>--}}

                                    <span class="lf">
                                            <span>امکان توسعه : </span>
                                            @if($info_position->right_hand == '')
                                            <span class="spp">بلی</span>
                                        @else
                                            <span class="spp" style="color: #c56161; border: 1px solid #c56161; background: #ffeeee;">خیر</span>
                                        @endif
                                        </span>
                                    <span class="lf">
                                            <span>تعداد توسعه : </span>
                                            @if($info_position->left_hand == '')
                                            <span class="spp">2</span>
                                        @elseif($info_position->right_hand == '')
                                            <span class="spp">1</span>
                                        @else
                                            <span class="spp">0</span>
                                        @endif
                                        </span>
                                </div>

                                @if($info_position->left_hand == '')
                                    <div style="text-align: center">
                                        <a href="/register?ud={{$info_position->reference_code}}" class="btn bg-blue waves-effect btn-block">
                                            <i class="material-icons">share</i>
                                            <span>اشتراک گذاری</span>
                                        </a>
                                    </div>
                                @elseif($info_position->right_hand == '')
                                    <div style="text-align: center">
                                        <a href="/register?ud={{$info_position->reference_code}}" class="btn bg-blue waves-effect btn-block">
                                            <i class="material-icons">share</i>
                                            <span>اشتراک گذاری</span>
                                        </a>
                                    </div>
                                @endif



                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>



@endsection

