@extends('admin.layout.master')
@section('style')
    <style>
        .header{
            float: right;
            width: 100%;
        }
        .clearfix .card .header{
            padding-bottom: 10px!important;
        }
        .header h2{
            margin-top: 5px !important;
        }
        .header > a{
            float: left;
        }
        .header > h4{
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


        .form_test{
            float: right;
            width: 100%;
        }
        .form_test button{
            border: none;
            width: 100%;
            background: none;
            padding-right: 25px;
            padding-left: 76px;
        }
        .form_test button i{
            float: right;margin-left: 7px
        }
        .dropdown-menu li{
            cursor: pointer;
        }

        .panel-title{
            position: relative;
        }
        .panel-title ul{
            float: left;
            position: absolute;
            left: -15px;
            top: 0;
            list-style: none;
        }
        .panel-title > ul  .dropdown-toggle i{
            color: #fff;
        }
        .dropdown-menu.pull-right {
            right: auto;
            left: 19px;
            top: 38px;
        }
        .panel-group .panel-primary .panel-title {
            background-color: #2f8940;
        }
        .panel-group .panel-primary {
            border: 1px solid #2e8943;
        }





        .clearfix > div{
            margin-bottom: 0 !important;
        }
        .col-md-5 img{
            width: 100%;
            height: 100%;
        }
        .info-box-4 div{
            margin-bottom: 0!important;
            padding-top: 5px;

        }.info-box-4{
            border-radius: 3px;
            overflow: hidden;
            cursor: pointer;
                 }
        .info-box-4 div:first-child{
            padding: 0;

        }
    </style>
@endsection

@section('content')
    <div class="row clearfix main-index IntroducingProducts">
        <!-- Basic Examples -->
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

            <div class="card">
                @if(session('insert-introducingproduct') and session('insert-introducingproduct')=='success')
                    <div class="alert bg-green alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        محصول جدید با موفقیت ثبت شد!
                    </div>
                @endif
                @if(session('edit-introducingproduct') and session('edit-introducingproduct')=='success')
                    <div class="alert bg-green alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        محصول  با موفقیت ویرایش شد!
                    </div>
                @endif
                    @if(session('delete-introducingproduct') and session('delete-introducingproduct')=='success')
                    <div class="alert bg-green alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        محصول  با موفقیت حذف شد!
                    </div>
                @endif
                <?php
                Session::forget('insert-introducingproduct');
                Session::forget('edit-introducingproduct');
                Session::forget('delete-introducingproduct');
                ?>
                <div class="header" style="margin-bottom: 20px">
                    <h4>معرفی محصولات</h4>

                    <a href="{{route('IntroducingProducts.create')}}" type="button" class="btn btn-primary btn-circle waves-effect waves-circle waves-float">
                        <i class="material-icons">add</i>
                    </a>


                </div>
                <div class="body">
                    <div class="row clearfix">
                        @if($products)
                            @foreach($products as $product)
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a href="{{route('IntroducingProducts.show',$product->id)}}">
                                <div class="info-box-4">
                                    <div class="col-md-5 col-xs-4">
                                        <img src="{{asset('images/introducingproduct/'.$product->image)}}">
                                    </div>
                                    <div class="col-md-7 col-xs-8">
                                        <div class="text">{{$product->name}}</div>
                                        <div class="number count-to" data-from="0" data-to="125" data-speed="1000" data-fresh-interval="20">125</div>
                                    </div>
                                </div>
                            </a>

                        </div>
                            @endforeach
                            @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Basic Examples -->
        <!-- Full Body Examples -->

        <!-- #END# Full Body Examples -->
    </div>
@endsection

@section('content_user')
    <div class="row clearfix">
        <!-- Basic Examples -->
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

            <div class="card">

                <div class="header" style="margin-bottom: 20px">
                    <h4>معرفی محصولات</h4>


                </div>
                <div class="body">
                    <div class="row clearfix">
                        @if($products)
                            @foreach($products as $product)
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <a href="{{route('IntroducingProducts.show',$product->id)}}">
                                        <div class="info-box-4">
                                            <div class="col-md-5 col-xs-4">
                                                <img src="{{asset('images/introducingproduct/'.$product->image)}}">
                                            </div>
                                            <div class="col-md-7 col-xs-8">
                                                <div class="text">{{$product->name}}</div>
                                                <div class="number count-to" data-from="0" data-to="125" data-speed="1000" data-fresh-interval="20">125</div>
                                            </div>
                                        </div>
                                    </a>

                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Basic Examples -->
        <!-- Full Body Examples -->

        <!-- #END# Full Body Examples -->
    </div>
@endsection
