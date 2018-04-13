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
    <form action="{{ route('Episode.store') }}" method="post" class="form-horizontal" enctype="multipart/form-data"
          style="text-align: right">
        @include('Admin.section.errors')
        @if(Session::has('message'))
            <p class="alert alert-danger">{{ Session::get('message') }}</p>
        @endif
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
            <div class="col-sm-12">
                <label for="images">دوره</label>
                <select class="form-control" name="course_id">
                    @foreach(App\course::latest()->get() as $course)
                    <option value="{{ $course->id }}">{{ $course->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-12">
                <br>
                <label for="images">نوع قسمت</label>
                <select class="form-control" name="type">
                    <option value="free">آزاد</option>
                    <option value="lock">قفل</option>
                </select>
            </div>
        </div>
        <br>
        <div class="form-group">
            <div class="col-sm-6">
                <br>
                <label for="images">شماره دوره</label>
                    <input type="number" id="number" name="number" value="{{ old('number') }}" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-6">
                <br>
                <label for="images">زمان ویدیو</label>
                    <input type="text" id="time" name="time" value="{{ old('time') }}" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-6">
                <br>
                <label for="images">آدرس ویدیو</label>
                    <input type="text" id="videoUrl" name="videoUrl" value="{{ old('videoUrl') }}" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-12">
                <br>
                <label for="tags">تگ ها</label>
                <input class="form-control " id="tags" type="text" name="tags" placeholder="تگ ها را وارد کنید"
                       value="{{ old('tags') }}">
            </div>
        </div>
        <div class="form-group col-sm-12">
            <br>
            <button class="btn btn-sm btn-outline-primary" type="submit">ارسال مقاله</button>
        </div>
    </form>
@endsection