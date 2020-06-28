@extends('layouts.master')
@section('content')

{{--    @dd($flag)--}}
    <?php
    $totalPrice = 0;
    ?>
    {{--    @dd(session()->all())--}}
{{--        @dd($productItem)--}}
    <div class="container">
        <div class="row" style="margin-top: 50px;margin-bottom: 30px">
            <div class="col-lg-8">
                <div class="card shadow-16dp ali-padding-15">
                    <div style="padding: 15px" >
                    <h4 class="basket-title">سبد خرید شما</h4>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <tbody>
                            @if(isset($flag))
                                <tr>
                                    سبد خرید شما خالی است.
                                </tr>
                                @else
                            @foreach($productItem as $item)
                                <?php
                                $totalPrice = session("product.$item->id.1") * $item->offPrice + $totalPrice;
                                ?>
                                <tr>
                                    <td width="60px">
                                        <img alt="product" class="img-circle"
                                             width="60px"
                                             height="60px"
                                             src="{{asset($item->imgPath)}}"
                                        >
                                    </td>
                                    <td style="text-align: center;vertical-align: middle">
                                        {{$item->title}}
                                    </td>
                                    <td width="130px" style="vertical-align: middle">
                                        <button class="ali-btn-success btn-success"
                                                onclick="addProductCount(this,{{$item->id}},{{$item['offPrice']}})"
                                        >
                                          <i>+</i>
                                        </button>
                                        {!! Form::button(session("product.$item->id.1"), ['class'=>'btn-light','id'=>'countValue','disabled','style'=>'border: 0;']) !!}
                                        <button class="ali-btn-danger btn-danger"
                                                onclick="minusProductCount(this,{{$item->id}},{{$item['offPrice']}})"
                                        >
                                            <i>-</i>
                                        </button>
                                    </td>
                                    <td class="text-right" style="text-align: center;vertical-align: middle">
                                        {{number_format($item->offPrice) . ' تومان' }}
                                    </td>
                                    <td width="20px" height="10px" style="vertical-align: middle">
                                        <button class="ali-btn-danger btn-block btn-danger"
                                                onclick="deleteBuyItem(this,{{$item->id}})"
                                        >
                                            <i class="fa fa-close"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

            <div class="col-lg-4">
                <div class="card shadow-16dp ali-padding-15">
                    <h4>مجموع خرید:</h4>
                    <div class="row" style="display: flex;justify-content: left;">
{{--                        <div class="col-lg-4">--}}
                            <input type="text" id="totalText" name="totalText" value="{{$totalPrice}}" disabled
                                   style="border: 0;background-color: #fff;text-align: left">
{{--                        </div>--}}
                        <div style="margin-right: 0">
                            تومان
                        </div>
                        </div>
                    <form method="get" action="{{route('payment.send')}}" type="get">

                    <center>
                    <input type="submit" class="ali-btn  btn-primary" style="height: fit-content" value="پرداخت و ثبت">
                    </center>
                    </form>
                    {{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>
{{--@dd(session()->all())--}}
    <script>
        function deleteBuyItem(parent, item) {
            // location.reload();
            $.ajax({
                {{--url: '{{route('ajax.delete')}}'+item ,--}}
                url: "/basket/delete/"+item ,
                // method: "delete",
                type: "DELETE",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    item: item,
                    // mainPrice: mainPrice,
                    // _method:"DELETE",
                },
                success: function (data) {
                    $(parent).parents('tr').remove();
                    // console.log(data);
                    // alert('محصول حذف شد');
                },
                error: function (data) {
                    // console.log(data);
                    // alert('محصول حذف نشد');
                }
            });
            window.location = "https://imtproject.ir/basket";

        }

        function addProductCount(parent, item, offPrice) {
            $.ajax({
                url: '{{route('ajax.add')}}',
                method: "POST",
                // type: "post",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    item: item,
                },
                success: function (data) {
                    console.log(data);
                    var t = $(parent).parent().find('#countValue').html();
                    var t2 = $('#totalText').val();
                    t = parseInt(t) + 1;
                    t2 = parseInt(t2) + offPrice;
                    $(parent).parent().find('#countValue').html(t);
                    $('#totalText').val(t2);
                    // console.log($(parent).parent().find('#countValue').html());
                    // console.log($('#totalText').val());

                    // setcookie('totalPrice', t2);

                },
                error: function (data) {
                }
            })
        }

        function minusProductCount(parent, item, offPrice) {
            var t = $(parent).parent().find('#countValue').html();
            if (t > 0) {
                $.ajax({
                    url: '{{route('ajax.minus')}}',
                    method: "POST",
                    // type: "post",
                    cache: false,
                    data: {
                        "_token": "{{ csrf_token() }}",
                        item: item,
                        // _method:"POST",
                    },
                    success: function (data) {
                        console.log(data);

                        var t2 = $('#totalText').val();
                        t = parseInt(t) - 1;
                        t2 = parseInt(t2) - offPrice;
                        $(parent).parent().find('#countValue').html(t);
                        $('#totalText').val(t2);
                        // console.log($(parent).parent().find('#countValue').html());
                        // console.log($('#totalText').val());

                        // setcookie('totalPrice', t2);

                    },
                    error: function (data) {
                        console.log(data);
                        alert('محصول اضافه نشد');
                    }
                })
            }
        }
    </script>
@endsection
