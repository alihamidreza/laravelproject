@extends('Admin.master')
@section('script')
    <script src="/ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('body', {
            filebrowserUploadUrl: 'admin/panel/upload-image',
            filebrowserImageUploadUrl: 'admin/panel/upload-image'
        });
    </script>
@endsection
@section('content')
    <form action="{{ route('Course.update' , ['Course' => $courses->id]) }}" method="post" class="form-horizontal"
          enctype="multipart/form-data"
          style="text-align: right">

        @include('Admin.section.errors')
        {{ method_field('patch') }}
        {{ csrf_field() }}
        <div class="form-group">
            <label for="title">موضوع</label>
            <input type="text" class="form-control" id="title" placeholder="موضوع را وارد کنید" name="title"
                   value="{{ $courses->title }}">
        </div>

        <div class="form-group">
            <label for="type">نوع دوره</label>
            <select name="type" class="form-control col-sm-12">
                <option value="vip" {{ $courses->type=='vip' ? 'selected' : '' }}>اعضای ویژه</option>
                <option value="free" {{ $courses->type=='free' ? 'selected' : '' }}>رایگان</option>
                <option value="cash" {{ $courses->type=='cash' ? 'selected' : '' }}>نقدی</option>
            </select>
        </div>

        <div class="form-group">
            <label for="body">متن</label>
            <textarea class="form-control" id="body" rows="6" name="body"
                      placeholder="متن را وارد کنید">{{ $courses->body }}</textarea>
        </div>
        <div class="form-group">
            <div class="col-sm-12">
                <div style="width: 200px;height: 200px"><a href="/{{ $courses->images }}"><img
                                src="/{{ $courses->images}}"
                                style="object-fit: cover;max-width: 100%;max-height: 100%; margin: auto;"></a>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-12">
                <label for="images">تصویر</label>
                <label class="form-control">
                    <input type="file" id="images" name="images">
                </label>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-6">
                <label for="price">قیمت</label>
                <input class="form-control " id="price" type="text" name="price" placeholder="تگ ها را وارد کنید"
                       value="{{ $courses->price }}">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-6">
                <label for="tags">تگ ها</label>
                <input class="form-control " id="tags" type="text" name="tags" placeholder="تگ ها را وارد کنید"
                       value="{{ $courses->tags }}">
            </div>
        </div>
        <div class="form-group col-sm-12">
            <br>
            <button class="btn btn-sm btn-outline-primary" type="submit">ویرایش مقاله</button>
        </div>
    </form>
@endsection
