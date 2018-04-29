@extends('Admin.master')
@section('content')

    <div class="col-xs-4">
        <h2 align="right">مدیران سایت</h2>
    </div>
    <div class="col-md-3">
        {{ $roles->render() }}
    </div>
    <div class="btn-group">
        <a href="{{ route('level.create') }}" class="btn btn-sm btn-success">ثبت مقام برای کاربران</a>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sm table-hover table-bordered   ">
            <thead>
            <tr>
                <th>نام</th>
                <th>ایمیل</th>
                <th>مقام</th>
                <th>تنظیمات</th>
            </tr>
            </thead>
            <tbody style="text-align: right !important;">
            @foreach($roles as $role)
                @if(count($role->users))
                    @foreach($role->users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $role->name }} - {{ $role->label }}</td>
                            <td>
                                <form method="post" action="/admin/users/level/{{$user->id}}">
                                    {{ method_field('delete') }}
                                    {{ csrf_field() }}
                                    <div class="">
                                        <button type="submit" class="btn btn-sm btn-outline-danger">حذف کردن</button>
                                        <a href="{{ route('level.edit' , ['user' => $user->id]) }}" class="btn btn-sm btn-warning">ویرایش</a>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
            @endforeach
            </tbody>
        </table>
        <div class="col-md-3">
            {{ $roles->render() }}
        </div>
    </div>

@endsection