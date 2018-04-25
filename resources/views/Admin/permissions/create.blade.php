@extends('Admin.master')
@section('content')

    <form action="{{ route('permissions.store') }}" method="post" class="form-horizontal" enctype="multipart/form-data"
          style="text-align: right">
        @include('Admin.section.errors')
        @if(Session::has('message'))
            <p class="alert alert-danger">{{ Session::get('message') }}</p>
        @endif
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">نام</label>
            <input type="text" class="form-control" id="name" placeholder="موضوع را وارد کنید" name="name"
                   value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <label for="label">توضیخات</label>
            <input class="form-control" id="label" type="text" name="label"
                   placeholder="توضیخات را وارد کنید" value="{{ old('label') }}">
        </div>
        <div class="form-group col-sm-12">
            <br>
            <button class="btn btn-sm btn-outline-primary" type="submit">ارسال</button>
        </div>
    </form>
@endsection