@extends('Admin.master')
@section('script')
    <script src="/ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('body' ,{
            filebrowserUploadUrl : 'admin/panel/upload-image',
            filebrowserImageUploadUrl : 'admin/panel/upload-image'
        });
    </script>
@endsection
@section('content')
    <form action="{{ route('Article.store') }}" method="post" class="form-horizontal" enctype="multipart/form-data"
          style="text-align: right">
        @include('Admin.section.errors')
        {{ csrf_field() }}
        <div class="form-group">
            <label for="title">موضوع</label>
            <input type="text" class="form-control" id="title" placeholder="موضوع را وارد کنید" name="title"
                   value="{{ old('title') }}">
        </div>
        <div class="form-group">
            <label for="description">توضیخات</label>
            <input class="form-control" id="description" type="text" name="description"
                   placeholder="توضیخات را وارد کنید" value="{{ old('description') }}">
        </div>
        <div class="form-group">
            <label for="body">متن</label>
            <textarea class="form-control" id="body" rows="6" name="body"
                      placeholder="متن را وارد کنید">{{ old('body') }}</textarea>
        </div>
        <div class="form-group">
            <div class="col-sm-6">
                <label for="images">تصویر</label>
                <label class="form-control">
                    <input type="file" id="images" name="images" value="{{ old('images') }}">
                </label>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-6">
                <label for="tags">تگ ها</label>
                <input class="form-control " id="tags" type="text" name="tags" placeholder="تگ ها را وارد کنید"
                       value="{{ old('tags') }}">
            </div>
        </div>
        <div class="form-group col-sm-12">
            <button class="btn btn-sm btn-outline-primary" type="submit">ارسال مقاله</button>
        </div>
    </form>
@endsection