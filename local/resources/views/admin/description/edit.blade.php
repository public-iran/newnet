@extends('admin.layout.master')
@section('style')
    <style>
        .header.h{
            padding-bottom: 40px;
        }
        .header.h h2{
            float: right;
        }
        .btn.btn-default {
            margin-bottom: 5px;
        }

        #levels {
            float: right;
            position: relative;
            width: 100%;
        }

        .remove-file {
            position: absolute;
            right: 0;
            background: #00bcd4;
            padding: 3px 7px 0px;
            color: #fff;
            cursor: pointer;
        }

        .col-lg-6, .col-md-6 {
            float: right;
        }
        .color{
            width: 20px;
            height: 20px;
            display: block;
            background: green;
        }
        .rules{
            margin-top: 5px;
            box-shadow: 1px 0px 6px 0px #ccc;
            padding: 10px 10px 0 0;
        }
        .del-rules{
            margin-bottom: 15px;
        }

        @media only screen and (max-width: 768px) {
            #btnb {
                position: fixed;
                left: 15px;
                z-index: 50;
                bottom: 70px;
            }
        }
        @media only screen and (min-width: 768px) {
            #btnb {
                position: fixed;
                left: 50px;
                z-index: 50;
                bottom: 200px;
            }
        }
        .row{
            direction: rtl;
        }
    </style>
@endsection

@section('content')
    <div class="row clearfix main-index description">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            @if(session('insert-rules') and session('insert-rules')=='success')
                <div class="alert bg-green alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    توضیحات با موفقیت ثبت شد!
                </div>
            @endif
            <?php
            Session::forget('insert-rules');
            ?>

            <div class="card">
                <div class="header h">
                    <h2>افزودن توضیحات دوره آموزشی</h2>
                    <a href="{{route('description.index')}}" style="float:left;margin-top: -10px;" type="button"
                       class="btn btn-default btn-circle waves-effect waves-circle waves-float">
                        <i class="material-icons">reply</i>
                    </a>
                </div>
                {!! Form::model($description,['method'=>'PATCH','action'=>['Admin\AdminDescriptionsController@update',$description->id]]) !!}

                    @csrf
                    <div class="body">
                        <div class="form-group">
                            <select required name="level" class="form-control show-tick">
                                <option style="" value="" disabled> انتخاب سطح</option>
                                @foreach($levels as $level)
                                    <option @if($description->level==$level->id) selected @endif value="{{$level->id}}">{{$level->title}}</option>
                                @endforeach
                            </select>
                        </div>



                        <div class="row">

                            <div class="education">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 products">
                                    <input type="hidden" name="surface[]" value="1">
                                    <div id="product">

                                        <div class="product-item option-tutorial">




                                            <button id="btnb" style="padding: 4px 7px;margin-right: 5px;" type="button" class="btn bg-light-blue waves-effect"
                                                    onclick="add_levels(this,1)">
                                                گزینه جدید
                                            </button>


                                        </div>
                                        <div id="levels">
                                            <?php
                                            $descriptions=explode('@#',$description->description);
                                            $i=1;
                                            ?>
                                            @foreach($descriptions as $description)
                                            <div class="form-group form-float rules">
                                                @if($i>1)
                                                <button type="button" class="btn bg-pink waves-effect del-rules">حذف</button>
                                                @endif
                                                <div class="form-line">

                                                    <textarea id="textarea{{$i}}" name="description[]" cols="30" rows="5" placeholder="قوانین خود را وارد کنید..." class="form-control no-resize" required="" aria-required="true">{{$description}}</textarea>

                                                </div>
                                            </div>
                                                <?php
                                                $i++;
                                                ?>
                                                @endforeach
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>


                        <div class="row align-center">
                            <button type="submit" class="btn bg-deep-orange waves-effect">ثبت توضیحات</button>
                        </div>


                    </div>
              {!! Form::close() !!}

            </div>
        </div>
    </div>

@endsection

@section('script')

    <script>


        var i=1;
        function add_levels(tag,b) {

            $('#levels').append('<div class="form-group form-float rules"> <button type="button" class="btn bg-pink waves-effect del-rules">حذف</button><div class="form-line">\n' +
                '<textarea name="description[]" cols="30" rows="5" class="form-control no-resize" required="" placeholder="قوانین خود را وارد کنید..." aria-required="true"></textarea>\n' +
                '                                                </div>\n' +
                '                                            </div>');

            $('.del-rules').click(function () {
                $(this).parent('.rules').remove();
            })

            i++;
        }


        $('.del-rules').click(function () {
            $(this).parent('.rules').remove();
        })
    </script>

@endsection
