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

        .custom-file span{
            float: right;
            margin-left: 20px;
        }
        .custom-file input{
            float: right;
        }
        form{
            padding: 0 30px;
        }
        .btn{
            float: left;
        }
    </style>
@endsection

@section('content')
    <div class="row clearfix main-index IntroducingProducts">
        <!-- Basic Examples -->
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

            <div class="card">
                @if(session('insert-description') and session('insert-description')=='success')
                    <div class="alert bg-green alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        توضیحات جدید با موفقیت ثبت شد!
                    </div>
                @endif
                @if(session('edit-description') and session('edit-description')=='success')
                    <div class="alert bg-green alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        توضیحات  با موفقیت ویرایش شد!
                    </div>
                @endif
                <?php
                Session::forget('insert-description');
                Session::forget('edit-description');
                ?>
                <div class="header" style="margin-bottom: 20px">
                    <h4>افزودن معرفی محصولات</h4>

                    <a href="{{route('IntroducingProducts.index')}}" style="float:left;margin-top: -10px;" type="button" class="btn btn-default btn-circle waves-effect waves-circle waves-float">
                        <i class="material-icons">reply</i>
                    </a>
                </div>
                <div class="body">
                    <div class="row clearfix">
                        <form method="post" action="{{route('IntroducingProducts.update',$product->id)}}" enctype="multipart/form-data">
                            @csrf
                            <input name="_method" type="hidden" value="PATCH">

                            <div class="form-group">
                                <div class="form-line">
                                    <input required type="text" name="name" class="form-control" value="{{$product->name}}"
                                           placeholder="عنوان محصول"/>
                                </div>
                            </div>


                            <div class="input-group mb-3">
                                <img style=" max-width: 150px;margin-bottom: 10px;" src="{{asset('images/introducingproduct/'.$product->image)}}">
                                <div class="custom-file">
                                    <span class="input-group-text">تصویر</span>
                                    <input type="file" name="image" class="custom-file-input" id="inputGroupFile01">
                                </div>
                            </div>


                            <div class="form-group form-float">
                                <div class="form-line">
                                    <textarea name="description" cols="30" rows="5" class="form-control no-resize" required="" aria-required="true">{{$product->description}}</textarea>
                                    <label class="form-label">توضیحات</label>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success waves-effect">ذخیره</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Basic Examples -->
        <!-- Full Body Examples -->

        <!-- #END# Full Body Examples -->
    </div>
@endsection


