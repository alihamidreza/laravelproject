@extends('Admin.master')
@section('content')
    <form action="{{ route('permissions.update' , ['permission' => $permission->id]) }}" method="post" class="form-horizontal" enctype="multipart/form-data"
          style="text-align: right">

        @include('Admin.section.errors')
        {{ method_field('patch') }}
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">نام</label>
            <input type="text" class="form-control" id="name" placeholder="موضوع را وارد کنید" name="name"
                   value="{{ $permission->name }}">
        </div>
        <div class="form-group">
            <label for="label">توضیخات</label>
            <input class="form-control" id="label" type="text" name="label"
                   placeholder="توضیخات را وارد کنید" value="{{ $permission->label }}">
        </div>
        <div class="form-group col-sm-12">
            <button class="btn btn-sm btn-outline-primary" type="submit">ویرایش دسترسی</button>
        </div>
    </form>
@endsection
