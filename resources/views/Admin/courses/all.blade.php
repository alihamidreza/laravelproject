@extends('Admin.master')
@section('content')

    <div class="col-xs-4">
        <h2 align="right">مقالات</h2>
    </div>
    <div class="col-md-3">
        {{ $articles->render() }}
    </div>
        <a href="{{ route('Article.create') }}" class="btn btn-sm btn-outline-dark">اضافه کردن مقاله</a>
    <div class="table-responsive">
        <table class="table table-striped table-sm table-hover table-bordered   ">
            <thead>
            <tr>
                <th>عنوان</th>
                <th>تعداد بازدید</th>
                <th>تعداد کامنت</th>
                <th>تنظیمات</th>
                <th>کامنت ها</th>
            </tr>
            </thead>
            <tbody style="text-align: right !important;">
            @foreach($articles as $article)
            <tr>
                <td><a href="{{ $article->path() }}">{{ $article->title }}</a></td>
                <td>{{ $article->viewCount }}</td>
                <td>{{ $article->commentCount }}</td>
                <td>
                    <form method="post" action="/admin/Article/{{$article->id}}">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                        <div class="">
                            <button type="submit" class="btn btn-sm btn-outline-danger">حذف کردن</button>
                            <a href="{{ route('Article.edit' , ['Article' => $article->id]) }}" class="btn btn-sm btn-outline-warning">ویرایش</a>
                        </div>
                    </form>
                </td>
                <td>
                    <a href="{{ route('ArticleComments.show' , ['article' => $article->slug]) }}" class="btn btn-sm btn-outline-primary">مشاهده</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <div class="col-md-3">
            {{ $articles->render() }}
        </div>
    </div>

@endsection