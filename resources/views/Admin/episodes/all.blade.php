@extends('Admin.master')
@section('content')

    <div class="col-xs-4">
        <h2 align="right">مقالات</h2>
    </div>
    <div class="col-md-3">
        {{ $episodes->render() }}
    </div>
    <a href="{{ route('Episode.create') }}" class="btn btn-sm btn-outline-dark">اضافه کردن قسمت</a>
    <div class="table-responsive">
        <table class="table table-striped table-sm table-hover table-bordered">
            <thead>
            <tr>
                <th>عنوان</th>
                <th>وضعیت قسمت</th>
                <th>تعداد بازدید</th>
                <th>تعداد کامنت</th>
                <th>تعداد دانلود</th>
                <th>تنظیمات</th>
                <th>کامنت ها</th>
            </tr>
            </thead>
            <tbody style="text-align: right !important;">
            @foreach($episodes as $episode)
                <tr>
                    <td><a href="{{ $episode->path() }}">{{ $episode->title }}</a></td>
                    <td>
                        @if($episode->type == 'free')
                            رایگان
                            @else
                                قفل
                        @endif
                    </td>
                    <td>{{ $episode->viewCount }}</td>
                    <td>{{ $episode->commentCount }}</td>
                    <td>{{ $episode->downloadCount }}</td>
                    <td>
                        <form method="post" action="/admin/Episode/{{$episode->id}}">
                            {{ method_field('delete') }}
                            {{ csrf_field() }}
                            <div class="">
                                <button type="submit" class="btn btn-sm btn-outline-danger">حذف کردن</button>
                                <a href="{{ route('Episode.edit' , ['Episode' => $episode->id]) }}" class="btn btn-sm btn-outline-warning">ویرایش</a>
                            </div>
                        </form>
                    </td>
                    <td>
                        <a href="{{ route('ArticleComments.show' , ['Episode' => $episode->slug]) }}" class="btn btn-sm btn-outline-primary">مشاهده</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="col-md-3">
            {{ $episodes->render() }}
        </div>
    </div>

@endsection