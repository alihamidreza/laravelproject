@extends('Admin.master')
@section('content')

    <div class="col-xs-4">
        <h2 align="right">مقام ها</h2>
    </div>
    <div class="col-md-3">
        {{ $roles->render() }}
    </div>
    <div class="btn-group">
        <a href="{{ route('roles.create') }}" class="btn btn-sm btn-primary">ایجاد مقام</a>
        <a href="{{ route('Article.create') }}" class="btn btn-sm btn-success">بخش دسترسی ها</a>
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
            @foreach($roles as $role)
                <tr>
                    <td>{{ $role->name }}</td>
                    <td>{{ $role->label }}</td>
                    <td>
                        <form method="post" action="/admin/roles/{{$role->id}}">
                            {{ method_field('delete') }}
                            {{ csrf_field() }}
                            <div class="">
                                <button type="submit" class="btn btn-sm btn-outline-danger">حذف کردن</button>
                                <a href="{{ route('roles.edit' , ['role' => $role->id]) }}" class="btn btn-sm btn-outline-warning">ویرایش</a>
                            </div>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="col-md-3">
            {{ $roles->render() }}
        </div>
    </div>

@endsection