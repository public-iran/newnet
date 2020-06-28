@extends('layouts.master')
@section('content')

    {{--<div class="container">--}}
    {{--***************************************************** start navigation Category *****************************************************--}}
    {{--    <div class="ali-nav-category align-items-center mb-16 ali-box-style">--}}
    {{--        <!--breadcrumb-->--}}
    {{--        <ol class="breadcrumb">--}}
    {{--            <li class="breadcrumb-item"><a href="/">خانه</a></li>--}}
    {{--            <li class="breadcrumb-item"><a href="/cosmetics-hygiene">آرایشی بهداشتی</a></li>--}}
    {{--            <li class="breadcrumb-item"><a href="/personal-hygiene">بهداشت فردی</a></li>--}}
    {{--            <li class="breadcrumb-item"><a href="/personal-hygiene/skin-care">مراقبت از پوست</a></li>--}}
    {{--            <li class="breadcrumb-item"><a href="/personal-hygiene/skin-care/body-butter">کره بدن</a></li>--}}
    {{--            <li class="breadcrumb-item"><a href="">کره بدن توت فرنگی 250 میلی لیتری فروتینی--}}
    {{--                </a></li>--}}
    {{--        </ol>--}}
    {{--        <!--breadcrumb end-->--}}
    {{--    </div>--}}


    {{--***************************************************** end navigation Category *****************************************************--}}
    {{--***************************************************** start Product Box *****************************************************--}}
    <div class="row ali-row-back ali-flex ali-box-style">
        <div class="col-lg-4 " align="center">
            <img class="img-fluid"
                 src="{{asset($product->imgPath)}}"
                 alt="تصویر نیست">
        </div>
        <div class="col-lg-8">
            <div class="col-lg-12">
                <div class="card shadow-16dp ali-padding-15">

                    <!--product wrap header-->
                    <div class="px-20 pt-20">
                        <div class="d-flex align-items-center justify-content-between">
                        {{--@dd($product->imgPath)--}}
                        <!--title and subtitle-->
                            <div class="w-70-lg">
                                <div class="h4 line-height-sm font-weight-bold">{{$product->title}}</div>
                            </div>
                            <!--title and subtitle end-->

                        </div>
                    </div>
                    <!--product wrap header end-->
                    <!--divider-->
                    <div class="px-20">
                        <hr>
                    </div>
                    <!--divider end-->
                    <!--branding wrap-->
                    <div class="pb-16 px-20">
                        <div class="row">

                            <div class="col-lg-7 ali-flex">
                                <div class="col-lg-3">
                                    <p>دسته بندی</p>
                                </div>
                                <div class="col-lg-9">
                                    <?php
                                    $category = $product->categoryId;
                                    $category = explode('$$', $category)
                                    ?>
                                    <p>{{$category[count($category)-1]}}</p>
                                </div>
                            </div>
                            <?php
                            if ($product->feature != ":"){
                            $feature = $product->feature;
                            $array = explode('@@', $feature);
                            foreach ($array as $value) {
                            $content = explode('?@', $value);
                            $featureName = $content[0];
                            $featureValue = $content[1];
                            ?>

                            <div class="col-lg-7 ali-flex">
                                <div class="col-lg-3">
                                    <p>{{$featureName}}</p>
                                </div>
                                <div class="col-lg-9">
                                    <p>{{$featureValue}}</p>
                                </div>
                            </div>


                            <?php
                            }
                            }
                            ?>
                        </div>
                    </div>
                    <!--branding wrap end-->
                    <div class="pt-16 pb-20 px-20">
                        <div class="row align-items-center">
                            <!--product price-->
                            <div class="col-lg-7 ali-flex">
                                <div class="col-lg-4">
                                    <p>قیمت اولیه</p>
                                    <p>قیمت حراجی</p>
                                    <p>حاشیه سود</p>
                                </div>
                                <div class="col-lg-8">
                                    <p class="text-muted">{{$product->mainPrice}} ریال</p>
                                    <p>{{$product->offPrice}} ریال</p>
                                    <p>{{$product->lucre}} ریال</p>
                                </div>
                                <!--product price-->
                                <!--product price end-->
                            </div>
                            <div class="col-lg-5">

                                <div class="d-flex justify-content-end ml-20">
                                    <div class="text-right">
                                        <div class="product-box_action">
                                            <button onclick="addToBasket({{$product->id}})"
                                                    class="btn btn-gradient-primary add-to-cart" data-productid="171130"
                                                    data-storeid="1959" data-supplier="False" data-qty="1"><i
                                                    class="ico ico-bag"></i>افزودن به سبد
                                            </button>
                                        </div>
                                        <span class="text-caption text-muted d-block my-4"><i
                                                class="ico ico-18px ico-circle-info filter-gray"></i>افزودن به سبد خرید به معنای اتمام خرید نیست</span>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--product price end-->
                </div>
            </div>
        </div>
    </div>
    {{--***************************************************** end Product Box *****************************************************--}}
    {{--***************************************************** start Product describtion and comments *****************************************************--}}
    <div class="row ali-row-back ali-flex ali-box-style">
        <div class="card-header_tools rounded-lg w-100 bg-gray">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs nav-tabs-lg w-100" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab"
                       aria-controls="description" aria-selected="true"><i class="ico ico-circle-info"></i>توضیحات</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="comments-tab" data-toggle="tab" href="#comments" role="tab"
                       aria-controls="comments" aria-selected="false"><i class="ico ico-comments"></i>نظرات کاربران</a>
                </li>
            </ul>
            <!--header tools end-->
        </div>
        <div class="card-body">
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="description" role="tabpanel" aria-labelledby="description-tab">
                    <div class="d-flex align-items-stretch">
                        <!--icon-->
                        <div class="ml-24">
                            <div class="bg-gray-100 rounded-circle p-36">
                                <i class="ico ico-color_paper-pen ico-64px ico-fw-0"></i>
                            </div>
                        </div>
                        <!--icon end-->
                        <div class="text-justify">
                            <p><?php echo $product->content ?></p>
                        </div>
                    </div>
                </div>
                <!--comments-->
                <div class="tab-pane" id="comments" role="tabpanel" aria-labelledby="comments-tab">

                    <div class="d-flex align-items-stretch">

                        <!--star-->
                        <div class="w-100 d-flex align-items-center">

                            {{--@dd($comments)--}}
                            <span class="text-caption text-muted d-block my-4">با ارسال نظرات ما را در بهبود ارائه خدمات یاری فرمایید.</span>

                            <div class="w-50">
                            </div>
                        </div>
                        <!--star end-->
                        <!--divider-->
                        <div class="d-flex align-items-center mx-24">
                            <div class="divider-vertical divider-vertical-lg"></div>
                        </div>
                        <!--divider end-->
                        <!--write comment button-->
                        @if(auth()->user())
                            <div class="w-50 d-flex align-items-center justify-content-center">
                                <div class="text-center">
                                    <a class="btn btn-outline-primary px-48" href=""
                                       data-toggle="modal"
                                       onclick="setparentid(0)"
                                       data-target="#exampleModal"><i
                                            class="ico ico-exit"></i>ارسال نظر</a>
                                </div>
                            </div>
                    @else
                        <p>برای ثبت نظر باید <a style="color: #005cbf" href="{{route('login')}}"> وارد </a>حساب خود شوید.</p>
                    @endif
                    <!--write comment button end-->

                    </div>

                    <hr>
                    {{--                    @dd(count($comments))--}}
                    @if(count($comments) === 0)
                        <ul class="list-unstyled">
                            <li>
                                اولین نفری باشید که نظر خود را ثبت میکند!
                            </li>
                            <li>
                                <hr class="my-20">
                            </li>
                        </ul>

                    @else
                        @foreach($comments as $commentItem)
                            @if($commentItem->parentId === 0 && $commentItem->status ===1)
                                <div class="row">
                                    <div class="col-lg-12">
                                        <ul class="ali-comment-box">

                                            <li class="ali-cmt-answer-padding">
                                                {{--                                                <strong><span>{{$commentItem->user->name}}</span></strong>--}}
                                                توسط <strong><span> {{$commentItem->user->username}} </span></strong>در
                                                <?php
                                                $v = new Verta($commentItem->created_at);
                                                ?>
                                                <span>{{$v}}</span>
                                            </li>
                                            <li class="ali-cmt-answer-padding">
                                                <div class="row">
                                                    <div class="col-lg-10">
                                                        <p>
                                                            {{$commentItem->content}}
                                                        </p>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        @if(auth()->user())
                                                            <a class="ali-btn-answer btn-primary"
                                                               data-toggle="modal"
                                                               data-target="#exampleModal"
                                                               onclick="setparentid('{{$commentItem->id}}')"
                                                               {{--                                                               onclick="addParentId({{$commentItem->id}})"--}}
                                                               data-whatever="@mdo">
                                                                پاسخ
                                                            </a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </li>

                                            {{--                                            answer comment    --}}
                                            @foreach($comments as $commentItemAnswer)
                                                @if( $commentItem->id == $commentItemAnswer->parentId  && $commentItemAnswer->status ===1 )
                                                    <div class="ali-cmt-answer-box">
                                                        <li class="ali-cmt-answer-padding">
                                                            {{--                                                        <strong><span>{{$commentItemAnswer->user->name}}</span></strong>--}}
                                                            توسط <strong><span> {{$commentItem->user->username}} </span></strong>در
                                                            <?php
                                                            $v = new Verta($commentItemAnswer->created_at);
                                                            ?>
                                                            <span>{{$v}}</span>
                                                        </li>
                                                        <li class="ali-cmt-answer-padding">
                                                            <div class="row">
                                                                <div class="col-lg-10">
                                                                    <p>
                                                                        {{$commentItemAnswer->content}}
                                                                    </p>
                                                                </div>
                                                                <div class="col-lg-2">
                                                                    @if(auth()->user())
                                                                        <a onclick="setparentid('{{$commentItem->id}}')"
                                                                           class="ali-btn-answer btn-primary"
                                                                           data-toggle="modal"
                                                                           data-target="#exampleModal"
                                                                           {{--                                                                       onclick="addParentId({{$commentItem->id}})"--}}
                                                                           data-whatever="@mdo">
                                                                            پاسخ
                                                                        </a>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif
                </div>
                <!--comments end-->
            </div>
        </div>
    </div>
    {{--***************************************************** end Product describtion and comments *****************************************************--}}
    {{--***************************************************** start New Product *****************************************************--}}
    <div class="row ali-row-back ali-box-style" style="display: block">
        <!--card header-->
        <div class="col-lg-12">
            <!--header caption-->
            <div class="card-header_caption">
                <div class="card-header_caption-title">
                    <div class="card-header_caption-text">کالاهای جدید</div>
                </div>
            </div>
            <!--header caption end-->
        </div>
        <!--card header end-->
        <div class="row ali-flex ali-padding-2040">
            @foreach($newProducts as $key=>$item)
                @if($key>=5)
                    @break
                @endif
                <div class="product-box product-box_hover" align="center">
                    <!--product image and badge-->
                    <a href="{{route('product.show',$item->slug)}}" class="product-box_image"
                       data-click="showProductDetail" data-productid="171130"
                       data-storeid="1959" data-supplier="False">
                        <img src="{{asset($item->imgPath)}}"
                             alt="کره بدن توت فرنگی 250 میلی لیتری فروتینی
                " width="210" height="210" class="swiper-lazy swiper-lazy-loaded">
                        <div class="product-box_discount"><span>%45<small>تخفیف</small></span></div>
                    </a>
                    <!--product image and badge end-->
                    <!--product title-->
                    <a href="{{route('product.show',$item->slug)}}" data-click="showProductDetail"
                       data-productid="171130"
                       class="product-box_title text-dark">{{$item->title}}
                    </a>
                    <!--product title end-->
                    <!--product content-->
                    <div class="product-box_content">
                        <!--price-->
                        <a href="{{route('product.show',$item->slug)}}" data-click="showProductDetail"
                           data-productid="171130"
                           class="product-box_price">
                            <del>{{$item->mainPrice}}</del>
                            <div class="product-box_price-value">484,000 <span
                                    class="product-box_price-currency">ریال</span></div>
                        </a>
                        <!--price end-->
                        <!--action-->
                        <div class="product-box_action">
                            <button onclick="addToBasket({{$item->id}})" type="button"
                                    class="btn btn-gradient-primary add-to-cart pr-8 pl-8"
                                    data-productid="171130" data-storeid="1959" data-supplier="False" data-qty="1"><i
                                    class="ico ico-color_plus-circle filter-none"></i>افزودن به سبد
                            </button>
                        </div>
                        <!--action btn-->
                    </div>
                    <!--product content end-->
                </div>
            @endforeach
        </div>
    </div>
    {{--***************************************************** end New Product *****************************************************--}}
    {{--************************************ start modal for answer comments ***********************************--}}
    <div class="modal fade ali-modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="commentText" class="col-form-label">متن نظر:</label>
                            <textarea class="form-control" id="commentText"></textarea>
                            <input type="hidden" class="form-control" id="parentId"/>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">لغو</button>
                    @if(auth()->user())
                        <button id="replycm" type="button" class="btn btn-primary"

                                onclick="storeComment('{{$product->id}}',{{auth()->id()}})" data-parentid=""
                                data-dismiss="modal">
                            ثبت نظر
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </div>
    {{--************************************ end modal for answer comments ***********************************--}}
    <script>
        function storeComment(productId, userId) {
            var parentid = $('#replycm').attr('data-parentid');
            // alert(parentid);
            var content = $('#commentText').val();
            $.ajax({
                url: '{{route('ajax.commentStore')}}',
                method: "POST",
                // type: "post",
                cache: false,
                data: {
                    "_token": "{{ csrf_token()}}",
                    productId: productId,
                    userId: userId,
                    content: content,
                    parentId: parentid,
                    // _method:"POST",
                },
                success: function () {
                    $('#commentText').val("");
                    alert('نظر ثبت شد');

                },
                error: function () {
                    alert('نظر ثبت نشد');
                }
            })
        }
    </script>

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

        function setparentid(id) {
            $('#replycm').attr('data-parentid', id);
        }


    </script>

@endsection
