@extends('Admin.master')
@section('content')
    <div class="form-group" align="right">
        <h4>ویرایش مقام کاربر</h4>
        <br>
    </div>
    <form action="{{ route('level.update' , ['user' => $user->id]) }}" method="post" class="form-horizontal" enctype="multipart/form-data"
          style="text-align: right">

        @include('Admin.section.errors')
        {{ method_field('patch') }}
        {{ csrf_field() }}
        <div class="form-group">
            <select name="role_id" id="role_id" class="form-control">
                @foreach(\App\Role::all() as $role)
                    <option value="{{ $role->id }}" {{ $roles->id == $role->id ? 'selected' : ''}}>{{ $role->name }} - {{ $role->label }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-sm-12">
            <br>
            <button class="btn btn-sm btn-outline-primary" type="submit">ویرایش</button>
        </div>
    </form>
@endsection
