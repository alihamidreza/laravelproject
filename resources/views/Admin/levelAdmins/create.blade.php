@extends('Admin.master')
@section('content')
    <div class="form-group" align="right">
        <h4>ایجاد مقام کاربر</h4>
        <br>
    </div>
    <form action="{{ route('level.store') }}" method="post" class="form-horizontal" enctype="multipart/form-data"
          style="text-align: right">
        @include('Admin.section.errors')
        {{ csrf_field() }}
        <div class="form-group">
            <select name="user_id" id="user_id" class="form-control">
                @foreach(\App\User::where('level' , 'admin')->get() as $user)
                    <option value="{{ $user->id }}">{{ $user->name }} - {{ $user->email }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <select name="role_id" id="role_id" class="form-control">
                @foreach(\App\Role::all() as $role)
                    <option value="{{ $role->id }}">{{ $role->name }} - {{ $role->label }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-sm-12">
            <br>
            <button class="btn btn-sm btn-outline-primary" type="submit">ایجاد کردن</button>
        </div>
    </form>
@endsection
