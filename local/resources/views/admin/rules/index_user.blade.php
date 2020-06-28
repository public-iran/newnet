@extends('admin.layout.master')
@section('style')
    <style>
        .panel-group .panel-primary .panel-title {
            background-color: #2f8940;
        }
        .panel-group .panel-primary {
            border: 1px solid #2e8943;
        }
    </style>
    @endsection
@section('content_user')
    <div class="row clearfix">
        <!-- Basic Examples -->
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

            <div class="card">

                <div class="header">
                    <h4>قوانین سایت</h4>

                </div>
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-xs-12 ol-sm-12 col-md-12 col-lg-12">
                            <b></b>
                            @if($rule_user)
                            <div class="panel-group" id="accordion_1" role="tablist" aria-multiselectable="true">
                                <?php
                                $rules=explode('@#',$rule_user['rules']);
                                $i=1;

                                ?>
                                @foreach($rules as $rule)


                                    <div class="panel panel-primary rules">
                                        <div class="panel-heading" role="tab" id="headingTwo_{{$rule_user->id.$i}}">
                                            <h4 class="panel-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_{{$rule_user->id.$i}}" href="#collapseTwo_{{$rule_user->id.$i}}" aria-expanded="false"
                                                   aria-controls="collapseTwo_{{$rule_user->id.$i}}">
                                                    قوانین
                                                    <i class="material-icons">add_box</i>
                                                </a>

                                            </h4>
                                        </div>
                                        <div id="collapseTwo_{{$rule_user->id.$i}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo_{{$rule_user->id.$i}}">
                                            <div class="panel-body">
                                                {{$rule}}
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    $i++;
                                    ?>
                                @endforeach
                            </div>
                            @else

                                        <h5>قوانینی ثبت نشده است !</h5>

                            @endif
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
