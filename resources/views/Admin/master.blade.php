<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>آموزش لاراول</title>
    <link rel="stylesheet" href="/css/panel.css">

</head>

<body>
{{--header--}}
@include('Admin.section.header')
<div class="container-fluid">
    <div class="row">
        {{--silebar--}}
        @include('Admin.section.slidebar')
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
            {{--content--}}
            @yield('content')
        </main>
    </div>
</div>
{{--footer--}}
@include('Admin.section.footer')
</body>
</html>
