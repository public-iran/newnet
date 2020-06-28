@extends('admin.layout.master')

@section('style')
    <style>

        ul {
            padding-right: 0;
        }

        li {
            list-style: none;
        }

        [type="radio"].filled-in + label:before, [type="radio"].filled-in + label:after {
            left: auto;
            right: 0;
        }

        [type="radio"].filled-in:checked + label:before {
            top: 0;
            right: 10px;
        }

        [type="radio"] + label {
            padding-right: 26px;
        }

        [type="radio"]:not(:checked), [type="radio"]:checked {
            position: absolute;
            left: 0;
            opacity: 0;
        }

        .sabt{
            padding: 20px;
            background: #fff;
            border-radius: 2px;
        }
        .card .header h2 small {
            display: block;
            font-size: 12px;
            margin-top: 5px;
            color: #999;
            line-height: 15px;
            height: 65px;
            overflow-y: auto;
        }
        .card .body{
            height: 240px;
            overflow-y: auto;
        }

        .get-time{
            width: 85px;
            padding: 10px 10px 5px;
            box-shadow: 0 0 5px 2px #ccc;
            border-radius: 5px;
            line-height: 27px;
        }
        .get-time i{
            float: right !important;
            margin-left: 5px;
        }
        .bootstrap-select:not([class*="col-"]):not([class*="form-control"]):not(.input-group-btn) {
            display: none;
        }
    </style>
@endsection
@section('content_user')

    @if($educations->test=='YES')
    @if(Auth::user()->test_confirm=="NO")
    <?php

    //        session()->forget('timeNow');

    $selectedTime = date('Y-m-d H:i:s');
    $rem1 = strtotime("+5 minutes", strtotime($selectedTime));


    $rem2 = date('Y-m-d H:i:s');

    $rem2 = strtotime($rem2);

    /************ NOW TIME **********/
    if(!session()->get('timeNow')){
        session()->put('timeNow', $rem2);
    }
    if(session()->get('timeNow')){
        $rem3 = session()->get('timeNow');
    }
    /************ NOW TIME **********/

    $rem = abs($rem1 - $rem2);

    if($rem == 0){
        session()->forget('timeNow');
    }
    ?>



    {!! Form::open(['method'=>'post','action'=>'Admin\AdminExamController@store']) !!}

    <div class="row">
        <div class="col m12 s12">

            <div style="padding: 0 15px;" class="message">


                @if(session('insert-Exam') and session('insert-Exam')=='Accept')
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        تبریک،شما <strong>قبول شدید!</strong>
                    </div>
                @endif

                @if(session('insert-Exam') and session('insert-Exam')=='Reject')
                    <div class="alert alert-danger alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        متاسفانه شما در آزمون <strong>قبول نشدید!</strong>
                    </div>
                @endif

                @if(session('edit-test') and session('edit-test')=='success')
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        سوال با موفقیت <strong>ویرایش شد!</strong>
                    </div>
                @endif

                @if(session('delete-test') and session('delete-test')=='success')
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        سوال با موفقیت <strong>ویرایش شد!</strong>
                    </div>
                @endif

                <?php
                Session::forget('insert-Exam');
                Session::forget('edit-test');
                Session::forget('delete-test');
                Session::forget('test-alert');


                ?>

            </div>


                <div class="container-fluid">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 sabt" style="margin-bottom: 10px">
                        <div class="card-panel grey lighten-5 z-depth-1 ">
                            <div class="get-time">
                                <i class="material-icons">access_time</i>
                                <span class="end-timer" id="countdown"><?php echo $rem ?></span>
                            </div>
                        </div>
                    </div>
                    <!-- Basic Card -->
                    <div class="row clearfix">

                        <?php
                        $i=0;
                        ?>
                        @foreach($exams as $exam)

                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="card">
                                    <div class="header">
                                        <h2>
                                            <small>{{$exam->question}}</small>
                                        </h2>

                                    </div>
                                    <div class="body">
                                        <ul>
                                            <li>
                                                <input required name="{{$exam->id}}" value="1" type="radio"
                                                       id="basic_checkbox_1{{$exam->id}}" class="filled-in">
                                                <label for="basic_checkbox_1{{$exam->id}}">{{$exam->answer1}}

                                                </label>
                                            </li>

                                            <li>
                                                <input required name="{{$exam->id}}" value="2" type="radio"
                                                       id="basic_checkbox_2{{$exam->id}}" class="filled-in">
                                                <label for="basic_checkbox_2{{$exam->id}}">{{$exam->answer2}}</label>
                                            </li>

                                            <li>
                                                <input required name="{{$exam->id}}" value="3" type="radio"
                                                       id="basic_checkbox_3{{$exam->id}}" class="filled-in">
                                                <label for="basic_checkbox_3{{$exam->id}}">{{$exam->answer3}}</label>
                                            </li>

                                            <li>
                                                <input required name="{{$exam->id}}" value="4" type="radio"
                                                       id="basic_checkbox_4{{$exam->id}}" class="filled-in">
                                                <label for="basic_checkbox_4{{$exam->id}}">{{$exam->answer4}}</label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $i++;
                            ?>
                        @endforeach
                    </div>

                    @if($i!=0)
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 sabt">



                        <div class="card-panel grey lighten-5 z-depth-1 ">
                            <button href="{{route('test.create')}}" class="waves-effect waves-light  btn"><i
                                    class="material-icons right">assignment_turned_in</i>ثبت (نتیجه آزمون)
                            </button>
                        </div>

                    </div>
                    @else
                    <div class="card">
                        <div class="header">

                            <h5>آزمونی ثبت نشده است !</h5>
                        </div>
                    </div>
                    @endif
                </div>


        </div>
    </div>



    {!! Form::close() !!}

    @else
        <div class="card">
            <div class="header">

                <h5>شما به آزمون دسترسی ندارید!</h5>
            </div>
        </div>

    @endif

    @else
        <div class="card">
            <div class="header">

                <h5>این مرحله بدون آزمون است!</h5>
            </div>
        </div>
    @endif

@endsection
@section('script')
    <script>



        var seconds = $('.end-timer').html();
        function secondPassed() {
            var minutes = Math.round((seconds - 30)/60);
            var remainingSeconds = seconds % 60;
            if (remainingSeconds < 10) {
                remainingSeconds = "0" + remainingSeconds;
            }
            document.getElementById('countdown').innerHTML = minutes + ":" + remainingSeconds;
            if (seconds == 0) {
                clearInterval(countdownTimer);

                let timerInterval
                Swal.fire({
                    title: 'زمان شما به پایان رسید!',
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

                        clearInterval(timerInterval)
                        window.location = '{{route('exam.index')}}';
                    }
                }).then((result) => {
                    /* Read more about handling dismissals below */
                    if (result.dismiss === Swal.DismissReason.timer) {
                        console.log('I was closed by the timer')
                    }
                })

            } else {
                seconds--;
            }
        }
        var countdownTimer = setInterval('secondPassed()', 1000);
    </script>

@endsection
