@extends('admin.layout.master')
@section('style')
    <style>
        form {
            float: left !important;
            width: unset !important;
            margin-right: 9px;
        }
        </style>
@endsection
@section('content')
    <div class="row">
        <div class="col m12 s12">



            @if(session('insert-file') and session('insert-file')=='success')
                <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    فایل آموزشی جدید با موفقیت <strong>ثبت شد!</strong>
                </div>
            @endif

            @if(session('edit-file') and session('edit-file')=='success')
                <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    فایل آموزش با موفقیت <strong>ویرایش شد!</strong>
                </div>
            @endif

            @if(session('delete-file') and session('delete-file')=='success')
                <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    فایل آموزش با موفقیت <strong>حذف شد!</strong>
                </div>
            @endif

            <?php
            Session::forget('insert-file');
            Session::forget('edit-file');
            Session::forget('delete-file');
            ?>



    <div class="col s12 m12">

        <div class="card-panel grey lighten-5 z-depth-1">
            <a href="{{route('file.create')}}" class="waves-effect  waves-light btn-small"> افزودن مستندات جدید</a>
            <div class="row valign-wrapper">
                <table class="responsive-table">
                    <thead>
                    <tr>
                        <th>ردیف</th>
                        <th>نام</th>
                        <td>مرحله</td>
                        <td>سطح</td>
                        <th>تاریخ ثبت</th>
                        <th>عملیات</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php $i=1; ?>

                    @foreach($files as $file)
                        <tr>

                            <td>{{$i}}</td>
                            <td>{{$file->name}}</td>
                            <td>{{$file->level->title}}</td>
                            <td>{{$file->surface->title}}</td>
                            <td>{{Verta::instance($file->created_at)}}</td>
                            <td>
                                {!! Form::open(['method'=>'DELETE','action'=>['Admin\AdminFileController@destroy',$file->id],'files'=>true]) !!}
                                <a class="delete btn-floating waves-effect waves-light red " type="submit"><i class="material-icons left">delete</i></a>
                                {!! Form::close() !!}
                                <a href="{{route('file.edit',$file->id)}}" class="btn-floating waves-effect waves-light amber" type="submit"><i class="material-icons left">mode_edit</i></a>

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
