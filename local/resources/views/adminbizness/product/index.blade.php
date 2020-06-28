@extends('adminbizness.layout.master')


@section('Admin_content')


    {{--@dd($productItems)--}}
    <!-- Hover Rows -->
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            {{--            <div class="card">--}}
            <div class="header">
                <div class="row"
                     style="display: flex;justify-content: space-between;align-items: center;margin-bottom: 15px">
                    <div class="col-lg-10" style="font-size: 15px;color: #666666">
                        لیست محصولات
                    </div>
                    <a class="btn btn-success waves-effect" href="{{route('products.create')}}">
                        افزودن محصول
                    </a>

                </div>
            </div>
            <div class="body table-responsive">
                <table class="table table-hover" style="text-align: center;background: white">
                    <tbody>
                    <tr>
                        <td>شناسه</td>
                        <td>تصویر</td>
                        <td>محصول</td>
                        <td>وضعیت انتشار</td>
                        <td>دسته بندی</td>
                        <td>قیمت اصلی</td>
                        <td>قیمت حراجی</td>
                        <td>اقدامات</td>
                    </tr>
                    @foreach($productItems as $key=>$item)
                        <tr style="vertical-align: middle">
                            <td scope="row">{{$key +1 }}</td>
                            <td><img class="img-fluid"
                                     src="{{asset($item->imgPath)}}"
                                     alt="تصویر نیست" style="max-height: 70px;max-width: 100px"></td>
                            <td>{{$item['title']}}</td>
                            @if($item->status === '0')
                                <td>
                                    <i class="material-icons" style="color: #cb4f40">clear</i>
                                </td>
                            @else
                                <td>
                                    <i class="material-icons" style="color: #40bf85">done</i>
                                </td>
                            @endif
                            <td>
                                <?php
                                $category = $item->categoryId;
                                $category = explode('$$', $category)
                                ?>
                                <p>{{$category[count($category)-2]}}/{{$category[count($category)-1]}}</p>
                            </td>

                            <td>{{$item->mainPrice}} ریال</td>
                            <td>{{$item->offPrice}} ریال</td>


                            <td>
                                <center>
                                    <button style="width: 40px" class="btn bg-red waves-effect"
                                            onclick="deleteUser(this,{{$item}})">
                                        <i class="material-icons">delete_forever</i>
                                    </button>
                                    <a href="
{{--{{route('user.edit',$item['id'])}}--}}
                                        "
                                       class="btn bg-light-blue waves-effect">
                                        <i class="material-icons">create</i>
                                    </a>
                                </center>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {{--            </div>--}}
        </div>
    </div>
    <!-- #END# Hover Rows -->
@endsection
