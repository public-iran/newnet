@extends('admin.layout.master')

@section('style')
    <style>
        form{
            float: left !important;
            width: unset !important;
            margin-right: 9px;
        }
    </style>
@endsection
        @section('content')
            <div class="row">
                <div class="col m12 s12">
                    @if(session('insert-surface') and session('insert-surface')=='success')
                        <div class="alert alert-success alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            مرحله آموزشی جدید با موفقیت <strong>اضافه شد!</strong>
                        </div>
                    @endif

                    @if(session('edit-surface') and session('edit-surface')=='success')
                        <div class="alert alert-success alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            مرحله آموزشی با موفقیت <strong>ویرایش شد!</strong>
                        </div>
                    @endif

                    @if(session('delete-surface') and session('delete-surface')=='success')
                        <div class="alert alert-success alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            مرحله آموزشی با موفقیت <strong>حذف شد!</strong>
                        </div>
                    @endif
                    <?php
                    Session::forget('insert-surface');
                    Session::forget('edit-surface');
                    Session::forget('delete-surface');
                    ?>



                    <div class="col s12 m12 ">
        <div class="card-panel grey lighten-5 z-depth-1">
            <a href="{{route('surface.create')}}" class="waves-effect  waves-light btn-small">افزودن مرحله آموزشی جدید</a>

            <div class="row valign-wrapper">
                <table class="responsive-table">
                    <thead>
                    <tr>
                        <th>ردیف</th>
                        <th>عنوان </th>
                        <th>مرحله </th>
                        <th>تاریخ ایجاد</th>
                        <th>عملیات</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php $i=1; ?>
                    @foreach($surfaces as $surface)
                        <tr>

                            <td>{{$i}}</td>
                            <td>{{$surface->title}}</td>
                            <td>{{$surface->level->title}}</td>
                            <td>{{Verta::instance($surface->created_at)}}</td>
                            <td>
                                <a href="{{route('surface.edit',$surface->id)}}" class="btn-floating waves-effect waves-light amber" type="submit"><i class="material-icons left">mode_edit</i></a>
{{--                                {!! Form::open(['method'=>'DELETE','action'=>['Admin\AdminSurfaceController@destroy',$surface->id],'files'=>true]) !!}--}}
{{--                                <a class="delete btn-floating waves-effect waves-light red " type="submit"><i class="material-icons left">delete</i></a>--}}
{{--                                {!! Form::close() !!}--}}
                            </td>
                        </tr>
                        <?php $i++; ?>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    </div>
    </div>

@endsection
@section('script')
    <script>
        $('.delete').click(function () {
            Swal.fire({
                title: ' سوال حذف شود',
                text:'با حذف شدن این مرحله، فایل های آموزشی  مرتبط با این سطح، حذف می شوند. ',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'بله حذف شود!',
                cancelButtonText: 'لغو'
            }).then((result) => {
                if (result.value) {
                    $('form').submit();
                }
            })
        })

    </script>
@endsection
