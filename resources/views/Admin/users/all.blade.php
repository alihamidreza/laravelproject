@extends('Admin.master')
@section('content')

    <div class="col-xs-4">
        <h2 align="right">کاربران</h2>
    </div>
    <div class="col-md-3">
        {{ $users->render() }}
    </div>
    <div class="btn-group">
        <a href="{{ route('roles.index') }}" class="btn btn-sm btn-primary">سطوح دسترسی</a>
        <a href="{{ route('Article.create') }}" class="btn btn-sm btn-success">کاربران مدیریت</a>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sm table-hover table-bordered   ">
            <thead>
            <tr>
                <th>نام</th>
                <th>ایمیل</th>
                <th>وضعیت ایمیل</th>
                <th>تنظیمات</th>
            </tr>
            </thead>
            <tbody style="text-align: right !important;">
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>0</td>
                    <td>
                        <form method="post" action="/admin/users/{{$user->id}}">
                            {{ method_field('delete') }}
                            {{ csrf_field() }}
                            <button class="btn btn-outline-danger">حذف</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="col-md-3">
            {{ $users->render() }}
        </div>
    </div>

@endsection