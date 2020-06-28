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
        .thumbnail img{max-width: 300px}

        .caption div{
            margin-left: 15px;
        }
        .caption div a{

        }
        .caption form{
            float: right;
            margin-left: 10px;
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
                @if(session('edit-description') and session('edit-description')=='success')
                    <div class="alert bg-green alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        توضیحات  با موفقیت ویرایش شد!
                    </div>
                @endif
                <?php
                Session::forget('insert-introducingproduct');
                Session::forget('edit-description');
                ?>
                <div class="header" style="margin-bottom: 20px">
                    <h4> معرفی محصول {{$product->name}} </h4>

                    <a href="{{route('IntroducingProducts.index')}}" style="float:left;margin-top: -10px;" type="button" class="btn btn-default btn-circle waves-effect waves-circle waves-float">
                        <i class="material-icons">reply</i>
                    </a>


                </div>
                <div class="body">

                                <div class="body">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="thumbnail">
                                                <img src="{{asset('images/introducingproduct/'.$product->image)}}">
                                                <div class="caption">
                                                    <h3>{{$product->name}}</h3>
                                                    <p>
                                                     {{$product->description}}
                                                    </p>

                                                    <div>
                                                        <a href="{{route('IntroducingProducts.edit',$product->id)}}" type="button" class="btn btn-info waves-effect">ویرایش</a>
                                                    <form method="post" action="{{route('IntroducingProducts.destroy',$product->id)}}" enctype="multipart/form-data">
                                                        @csrf
                                                        <input name="_method" type="hidden" value="DELETE">
                                                    <button href="" type="submit" class="btn bg-pink waves-effect">حذف</button>
                                                    </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
                    <h4> معرفی محصول {{$product->name}} </h4>

                    <a href="{{route('IntroducingProducts.index')}}" style="float:left;margin-top: -10px;" type="button" class="btn btn-default btn-circle waves-effect waves-circle waves-float">
                        <i class="material-icons">reply</i>
                    </a>


                </div>
                <div class="body">

                    <div class="body">
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="thumbnail">
                                    <img src="{{asset('images/introducingproduct/'.$product->image)}}">
                                    <div class="caption">
                                        <h3>{{$product->name}}</h3>
                                        <p>
                                            {{$product->description}}
                                        </p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- #END# Basic Examples -->
        <!-- Full Body Examples -->

        <!-- #END# Full Body Examples -->
    </div>
@endsection
