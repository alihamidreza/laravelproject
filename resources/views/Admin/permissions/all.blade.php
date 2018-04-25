@extends('Admin.master')
@section('content')

    <div class="col-xs-4">
        <h2 align="right">مقام ها</h2>
    </div>
    <div class="col-md-3">
        {{ $permissions->render() }}
    </div>
    <div class="btn-group">
        <a href="{{ route('permissions.create') }}" class="btn btn-sm btn-success">ایجاد دسترسی ها</a>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sm table-hover table-bordered   ">
            <thead>
            <tr>
                <th>نام</th>
                <th>توضیحات</th>
                <th>تنظیمات</th>
            </tr>
            </thead>
            <tbody style="text-align: right !important;">
            @foreach($permissions as $permission)
                <tr>
                    <td>{{ $permission->name }}</td>
                    <td>{{ $permission->label }}</td>
                    <td>
                        <form method="post" action="/admin/permissions/{{$permission->id}}">
                            {{ method_field('delete') }}
                            {{ csrf_field() }}
                            <div class="">
                                <button type="submit" class="btn btn-sm btn-outline-danger">حذف کردن</button>
                                <a href="{{ route('permissions.edit' , ['$permission' => $permission->id]) }}" class="btn btn-sm btn-outline-warning">ویرایش</a>
                            </div>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="col-md-3">
            {{ $permissions->render() }}
        </div>
    </div>

@endsection