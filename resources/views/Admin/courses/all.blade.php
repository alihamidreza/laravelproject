@extends('Admin.master')
@section('content')

    <div class="col-xs-4">
        <h2 align="right">مقالات</h2>
    </div>
    <div class="col-md-3">
        {{ $courses->render() }}
    </div>
        <a href="{{ route('Course.create') }}" class="btn btn-sm btn-outline-dark">ایجاد دوره جدید</a>
    <div class="table-responsive">
        <table class="table table-striped table-sm table-hover table-bordered   ">
            <thead>
            <tr>
                <th>عنوان</th>
                <th>تعداد بازدید</th>
                <th>تعداد کامنت</th>
                <th>نوع دوره</th>
                <th>قیمت دوره</th>
                <th>تنظیمات</th>
                <th>کامنت ها</th>
            </tr>
            </thead>
            <tbody style="text-align: right !important;">
            @foreach($courses as $course)
            <tr>
                <td><a href="{{ $course->path() }}">{{ $course->title }}</a></td>
                <td>{{ $course->viewCount }}</td>
                <td>{{ $course->commentCount }}</td>
                <td>
                    @if($course->type == 'free')
                        رایگان
                    @elseif($course->type == 'vip')
                    اعضای ویژه
                    @else
                        نقدی
                    @endif
                </td>
                <td>{{ $course->price }}</td>
                <td>
                    <form method="post" action="/admin/Course/{{$course->id}}">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                        <div class="">
                            <button type="submit" class="btn btn-sm btn-outline-danger">حذف کردن</button>
                            <a href="{{ route('Course.edit' , ['Course' => $course->id]) }}" class="btn btn-sm btn-outline-warning">ویرایش</a>
                        </div>
                    </form>
                </td>
                <td>
                    <a href="{{ route('ArticleComments.show' , ['Course' => $course->slug]) }}" class="btn btn-sm btn-outline-primary">مشاهده</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <div class="col-md-3">
            {{ $courses->render() }}
        </div>
    </div>

@endsection