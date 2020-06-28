@extends('layouts.master')
@section('content')

    <main>


        <!--? Popular Items Start -->
        <div class="popular-items ">
            <div class="container">
                <!-- Section tittle -->
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-8 col-md-10">
                        <div class="section-tittle mb-70 text-center">
                            <h2>خدمات</h2>
                            <p>آخرین خدمات ارائه شده توسط ما</p>
                        </div>
                    </div>
                </div>
                <div class="row">

                    @foreach($serviceItems as $item)
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <div class="single-popular-items mb-50 text-center">
                                <div class="popular-img">
                                    <img src="{{asset($item->imgPath)}}" alt="">
                                    <p>%{{$item->offPercent}} تخفیف</p>
                                    <div class="img-cap">
                                       <span><a href="{{route('service.show',$item->slug)}}">مشاهده جزئیات</a></span>
                                    </div>
                                    <div class="favorit-items">
                                        <span class="flaticon-heart"></span>
                                    </div>
                                </div>
                                <div class="popular-caption">
                                    <h3><a href="{{route('service.show',$item->slug)}}">{{$item->title}}</a></h3>
                                    <p> تاریخ اتمام:  {{$item->endDate}} </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Popular Items End -->
    </main>

@endsection
