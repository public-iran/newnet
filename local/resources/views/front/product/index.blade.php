@extends('layouts.master')
@section('content')
{{--    @dd($productItems)--}}
    <main>
        <!--? Popular Items Start -->
        <div class="popular-items ">
            <div class="container">
                <!-- Section tittle -->
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-8 col-md-10">
                        <div class="section-tittle mb-70 text-center">
                            <h2>فروشگاه</h2>
                            <p>آخرین محصولات فروشگاه های ما</p>
                        </div>
                    </div>
                </div>
                <div class="row">

                    @foreach($productItems as $item)
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <div class="single-popular-items mb-50 text-center">
                            <div class="popular-img">
                                <img src="{{asset($item->imgPath)}}" alt="">
                                <div class="img-cap">
                                    <span onclick="addToBasket({{$item->id}})">اضافه به سبد خرید</span>
                                </div>
                                <div class="favorit-items">
                                    <span class="flaticon-heart"></span>
                                </div>
                            </div>
                            <div class="popular-caption">
                                <h3><a href="{{route('product.show',$item->slug)}}">{{$item->title}}</a></h3>
                                <del>{{$item->mainPrice}}</del>
                                <span>{{$item->offPrice}}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Popular Items End -->
    </main>

<script>
    function addToBasket(id) {
        $.ajax({
            url: '{{route('basket.store')}}',
            method: "POST",
            // type: "post",
            cache: false,
            data: {
                "_token": "{{ csrf_token() }}",
                item: id,
                // _method:"POST",
            },
            success: function () {
                console.log('success')
            },
            error: function () {
                // alert('محصول حذف نشد');
                console.log('error')
            }
        })
    }
</script>
@endsection
