@extends('Admin.master')
@section('content')
    <form action="{{ route('roles.update' , ['role' => $role->id]) }}" method="post" class="form-horizontal" enctype="multipart/form-data"
          style="text-align: right">

        @include('Admin.section.errors')
        {{ method_field('patch') }}
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">نام</label>
            <input type="text" class="form-control" id="name" placeholder="موضوع را وارد کنید" name="name"
                   value="{{ $role->name }}">
        </div>
        <div class="form-group">
            <label for="label">توضیخات</label>
            <input class="form-control" id="label" type="text" name="label"
                   placeholder="توضیخات را وارد کنید" value="{{ $role->label }}">
        </div>
        <div class="form-group">
            <div class="col-sm-12">
                <label for="permission_id">دسترسی ها</label>
                <select class="form-control" name="permission_id[]" id="permission_id" multiple>
                    @foreach(App\Permission::latest()->get() as $permission)
                        <option value="{{ $permission->id }}">{{ $permission->name }} - {{ $permission->label }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group col-sm-12">
            <br>
            <button class="btn btn-sm btn-outline-primary" type="submit">ویرایش دسترسی</button>
        </div>
    </form>
@endsection
