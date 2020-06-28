@extends('admin.layout.master')

@section('style')
    <style>
        form{
            float: left !important;
            width: auto !important;
        }
        form a{
            margin-right: 5px;
        }
    </style>
@endsection
@section('contenta')
    <div class="row">
        <div class="col m12 s12">


            @if(session('insert-level') and session('insert-level')=='success')
                <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    سطح آموزش جدید با موفقیت <strong>اضافه شد!</strong>
                </div>
            @endif

            @if(session('edit-level') and session('edit-level')=='success')
                <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    سطح آموزش با موفقیت <strong>ویرایش شد!</strong>
                </div>
            @endif

            @if(session('delete-level') and session('delete-level')=='success')
                <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    سطح آموزش با موفقیت <strong>حذف شد!</strong>
                </div>
            @endif
            <?php
            Session::forget('insert-level');
            Session::forget('edit-level');
            Session::forget('delete-level');
            ?>



            <div class="col s12 m12">

                <div class="card-panel grey lighten-5 z-depth-1">
                    <a href="{{route('level.create')}}" class="waves-effect  waves-light btn-small">افزودن سطح آموزشی جدید</a>
                    <div class="row valign-wrapper">
                        <table class="responsive-table">
                            <thead>
                            <tr>
                                <th>ردیف</th>
                                <th>عنوان </th>
                                <th>تاریخ ایجاد</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php $i=1; ?>
                            @foreach($levels as $level)
                                <tr>

                                    <td>{{$i}}</td>
                                    <td>{{$level->title}}</td>
                                    <td>{{Verta::instance($level->created_at)}}</td>
                                    <td>
                                        <a href="{{route('level.edit',$level->id)}}" class="btn-floating waves-effect waves-light amber" type="submit"><i class="material-icons left">mode_edit</i></a>
{{--                                        {!! Form::open(['method' => 'DELETE', 'action' => ['Admin\AdminLevelController@destroy',$level->id]]) !!}--}}
{{--                                        <a class="delete btn-floating waves-effect waves-light red " type="submit"><i class="material-icons left">delete</i></a>--}}
{{--                                        {{Form::close()}}--}}

                                    </td>
                                </tr>
                            @endforeach
                            <?php $i++; ?>
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
                title: 'سطح آموزشی حذف شود',
                icon: 'warning',
                text:'با حذف شدن این سطح، فایل های آموزشی و مرحله های آموزشی مرتبط با این سطح، حذف می شوند. ',
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
