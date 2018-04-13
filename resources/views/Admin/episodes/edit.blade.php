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
    <form action="{{ route('Episode.update' , ['Episode' => $episode->id]) }}" method="post" class="form-horizontal"
          style="text-align: right">

        @include('Admin.section.errors')
        {{ method_field('PATCH') }}
        {{ csrf_field() }}
        <div class="form-group">
            <label for="title">موضوع</label>
            <input type="text" class="form-control" id="title" placeholder="موضوع را وارد کنید" name="title"
                   value="{{ $episode->title }}">
        </div>

        <div class="form-group">
            <label for="type">نوع قسمت</label>
            <select name="type" class="form-control col-sm-12">
                <option value="lock" {{ $episode->type=='lock' ? 'selected' : '' }}>قفل</option>
                <option value="free" {{ $episode->type=='free' ? 'selected' : '' }}>رایگان</option>
            </select>
            <div class="form-group">
                <div class="col-sm-12">
                    <br>
                    <label for="videoUrl">دوره قسمت</label>
                    <select name="course_id" class="form-control">
                        <option value="{{ $episode->course_id }}">{{ $episode->course->title }}</option>
                        @foreach(App\course::latest()->get() as $course)
                            <option value="{{ $course->id }}">{{ $course->title }}</option>
                        @endforeach
                    </select>
                    <br>
                </div>
            </div>
        </div>
        <br>
        <div class="form-group">
            <br>
            <label for="description">توضیحات</label>
            <textarea class="form-control" id="description" rows="6" name="description"
                      placeholder="متن را وارد کنید">{{ $episode->description }}</textarea>
        </div>
        <div class="form-group">
            <div class="col-sm-6">
                <label for="videoUrl">آدرس قسمت</label>
                <input type="text" class="form-control" name="videoUrl" id="viedoUrl" value="{{ $episode->videoUrl }}">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-6">
                <label for="number">شماره دوره</label>
                <input type="number" class="form-control" name="number" id="number" value="{{ $episode->number }}">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-6">
                <br>
                <label for="time">زمان دوره</label>
                <input type="text" class="form-control" name="time" id="time" value="{{ $episode->time }}">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-12">
                <br>
                <label for="tags">تگ ها</label>
                <input class="form-control " id="tags" type="text" name="tags" placeholder="تگ ها را وارد کنید"
                       value="{{ $episode->tags }}">
            </div>
            <br>
        </div>
        <div class="form-group col-sm-12">
            <br>
            <button class="btn btn-sm btn-outline-primary" type="submit">ویرایش مقاله</button>
        </div>
    </form>
@endsection
