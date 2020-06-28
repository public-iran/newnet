@extends('admin.layout.master')
@section('style')
    <style>
        .header{
            float: right;
            width: 100%;
            margin-bottom: 20px;
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

        .table-striped > tbody > tr:nth-of-type(odd) {
            background-color: #d3e2d5;
        }
    </style>
@endsection

@section('content')
    <div class="row clearfix main-index description">
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
                <div class="header">
                    <h4>توضیحات دوره آموزشی </h4>

                    <a href="{{route('description.create')}}" type="button" class="btn btn-primary btn-circle waves-effect waves-circle waves-float">
                        <i class="material-icons">add</i>
                    </a>


                </div>
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-xs-12 ol-sm-12 col-md-12 col-lg-12">
                            <b></b>
                            <div class="panel-group" id="accordion_1" role="tablist" aria-multiselectable="true">
                                @foreach($descriptions as $description)


                                    <div class="panel panel-primary rules">
                                        <div class="panel-heading" role="tab" id="headingTwo_{{$description->id}}">
                                            <h4 class="panel-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_{{$description->id}}" href="#collapseTwo_{{$description->id}}" aria-expanded="false"
                                                   aria-controls="collapseTwo_{{$description->id}}">
                                                    @if($description->level==1)
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
                                                </a>
                                                <ul class="header-dropdown m-r--5">
                                                    <li class="dropdown">
                                                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                            <i class="material-icons">more_vert</i>
                                                        </a>
                                                        <ul class="dropdown-menu pull-right">
                                                            <li><a href="{{route('description.edit',$description->id)}}">ویرایش<i style="color: #666 !important;" class="material-icons">mode_edit</i></a></li>
                                                            <li><a onclick="delete_rule('{{$description->id}}',this)">حذف<i class="material-icons">delete</i></a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </h4>
                                        </div>
                                        <div id="collapseTwo_{{$description->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo_{{$description->id}}">
                                            <div class="panel-body">

                                                    <table class="table table-striped">
                                                        <thead>
                                                        <tr>
                                                            <th style="width: 20px">ردیف</th>
                                                            <th style="text-align: center">چارت آموزشی دوره  </th>

                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                            $i=1;
                                                        $descriptions=explode('@#',$description->description);
                                                        ?>
                                                        @foreach($descriptions as $des)
                                                            <?php
                                                            $enters=$des;
                                                            $brs=explode('$$',$enters);

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
                                @endforeach
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



@section('script')
    <script>


        var i=1;
        function add_levels(tag,b) {

            $('#levels').append('<div class="form-group form-float rules"> <button type="button" class="btn bg-pink waves-effect del-rules">حذف</button><div class="form-line">\n' +
                '<textarea name="rules[]" cols="30" rows="5" class="form-control no-resize" required="" placeholder="قوانین خود را وارد کنید..." aria-required="true"></textarea>\n' +
                '                                                </div>\n' +
                '                                            </div>');
            i++;
            $('.del-rules').click(function () {
                $(this).parent('.rules').remove();
            })
        }

        function delete_rule(id,tag) {
            Swal.fire({
                title: ' سوال حذف شود',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'بله حذف شود!',
                cancelButtonText: 'لغو'
            }).then((result) => {
                if (result.value) {
                    var CSRF_TOKEN ='{{ csrf_token() }}';
                    var url='{{route('delete_description')}}';
                    var data={_token: CSRF_TOKEN,id:id};
                    $.post(url,data,function (msg) {
                        if(msg=='true'){
                            $(tag).parents('.rules').remove();
                        }
                    })
                }
            })
        }

    </script>
@endsection


