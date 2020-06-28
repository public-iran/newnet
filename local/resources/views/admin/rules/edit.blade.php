@extends('admin.layout.master')
@section('style')
    <style>
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

        .color {
            width: 20px;
            height: 20px;
            display: block;
            background: green;
        }

        .rules {
            margin-top: 5px;
            box-shadow: 1px 0px 6px 0px #ccc;
            padding: 10px 10px 0 0;
        }

        .del-rules {
            margin-bottom: 15px;
        }
    </style>
@endsection

@section('content')
    <div class="row clearfix main-index rules">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        ویرایش قوانین

                        <a href="{{route('rules.index')}}" style="float:left;margin-top: -10px;" type="button"
                           class="btn btn-default btn-circle waves-effect waves-circle waves-float">
                            <i class="material-icons">reply</i>
                        </a>
                    </h2>

                </div>

               {!! Form::model($rule,['method'=>'PATCH','action'=>['Admin\AdminRulesController@update',$rule->id]]) !!}


{{--
                <form action="{{route('rules.update',$rule->id)}}" method="post" enctype="multipart/form-data">
                   @csrf
--}}

                    <div class="body">
                        <div class="form-group">
                            <select required name="level" class="form-control show-tick">
                                <option style="" value="" disabled> انتخاب سطح</option>
                                @foreach($levels as $level)
                                    <option @if($rule->level==$level->id) selected
                                            @endif value="{{$level->id}}">{{$level->title}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="row">

                            <div class="education">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 products">
                                    <input type="hidden" name="surface[]" value="1">
                                    <div id="product">

                                        <div class="product-item option-tutorial">


                                            {{--                                        <select style="background: #ececec;" name="File_type" class="">--}}
                                            {{--                                            <option value="text">فایل متنی</option>--}}
                                            {{--                                        </select>--}}
                                            <button style="padding: 4px 7px;margin-right: 5px;" type="button"
                                                    class="btn bg-light-blue waves-effect"
                                                    onclick="add_levels(this,1)">

                                                اضافه کردن ماده
                                            </button>


                                        </div>
                                        <div id="levels">

                                            {{--                                                <button type="button" class="btn bg-pink waves-effect del-rules">حذف</button>--}}


                                            <?php
                                            $i=1;
                                            $rules = explode('@#', $rule->rules);
                                            foreach ($rules as $rule){?>
                                            <div class="form-group form-float rules">
                                                @if($i>1)<button type="button" class="btn bg-pink waves-effect del-rules">حذف</button> @endif
                                                <div class="form-line">
                                                    <textarea name="rules[]" cols="30" rows="5"
                                                              placeholder="قوانین خود را وارد کنید..."
                                                              class="form-control no-resize" required=""
                                                              aria-required="true">{{$rule}}</textarea>
                                                </div>

                                            </div>
                                            <?php $i++;}
                                            ?>


                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>


                        <div class="row align-center">
                            <button type="submit" class="btn bg-deep-orange waves-effect">ثبت مراحل آموزش</button>
                        </div>


                    </div>
                {{--</form>--}}
{!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>


        var i = 1;

        function add_levels(tag, b) {

            $('#levels').append('<div class="form-group form-float rules"> <button type="button" class="btn bg-pink waves-effect del-rules">حذف</button><div class="form-line">\n' +
                '<textarea name="rules[]" cols="30" rows="5" class="form-control no-resize" required="" placeholder="قوانین خود را وارد کنید..." aria-required="true"></textarea>\n' +
                '                                                </div>\n' +
                '                                            </div>');
            i++;
            $('.del-rules').click(function () {
                $(this).parent('.rules').remove();
            })
        }
        $('.del-rules').click(function () {
            $(this).parent('.rules').remove();
        })

    </script>
@endsection
