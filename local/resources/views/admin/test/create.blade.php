@extends('admin.layout.master')

@section('style')
    <style>
        .block-header{
            padding: 8px 0;
        }
        .answer label {
            margin-top: 31px;
            float: right;
        }

        .body ul {
            padding-right: 5px;
        }

        .body ul li {
            list-style: none;
        }

        [type="radio"]:not(:checked) + label, [type="radio"]:checked + label {
            padding-right: 0;
            margin-top: 3px;
            float: right;
        }

        .form-group .form-control {
            padding-right: 6px;
            width: 85%;
        }

        [type="radio"]:not(:checked), [type="radio"]:checked {
            left: 0;
        }
    </style>
@endsection
<?php
$content='content';
?>
@if(Auth::user()->role==2)
    <?php
    $content='content_writer';
    ?>
@endif

@section($content)
    <div class="container-fluid main-index Test">
        <div class="block-header">
            <h2> افزودن سوال جدید</h2>
            <a href="{{route('education.index')}}" style="float:left;margin-top: -26px" type="button" class="btn btn-default btn-circle waves-effect waves-circle waves-float">
                <i class="material-icons">reply</i>
            </a>
        </div>
        <!-- Basic Example -->
        <div class="row clearfix">
            <form action="{{route('test.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div style="float: right" class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <div class="form-group" style="width: 96%">
                                <div class="form-line">
                                    <textarea required name="question" rows="1" class="form-control no-resize auto-growth"
                                              placeholder="سوال را وارد کنید !"
                                              style="overflow: hidden; overflow-wrap: break-word; height: 60px;"></textarea>
                                </div>
                            </div>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"
                                       role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><button style="width: 100%;box-shadow: none;" type="submit" class="btn btn-default waves-effect">ذخیره</button></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <ul>
                                <li>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input required name="answer" value="1" type="radio" id="radio_16" class="radio-col-green">
                                            <label for="radio_16">
                                                <input required type="hidden" name="level" value="{{$level_id}}">
                                                <input required type="hidden" name="surface" value="{{$surface_id}}">
                                            </label>
                                            <input required type="text" name="answer1" class="form-control" placeholder="جواب اول">

                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input required name="answer" value="2" type="radio" id="radio_17" class="radio-col-green">
                                            <label for="radio_17"></label>
                                            <input required type="text" name="answer2" class="form-control" placeholder="جواب دوم">
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input required name="answer" value="3" type="radio" id="radio_18" class="radio-col-green">
                                            <label for="radio_18"></label>
                                            <input required type="text" name="answer3" class="form-control" placeholder="جواب سوم">
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input required name="answer" value="4" type="radio" id="radio_19" class="radio-col-green">
                                            <label for="radio_19"></label>
                                            <input required type="text" name="answer4" class="form-control" placeholder="جواب چهارم">
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection


