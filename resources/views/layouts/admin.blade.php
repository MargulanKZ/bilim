<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>Панель Управления</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="/images/logo.png"/>
    <link href="/css/dashboard.css" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
    <button class="navbar-toggler navbar-toggler-right hidden-lg-up" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="/admin">Панель управления</a>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/admin/lect">Главная <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/">Вернуться на сайт<span class="sr-only">(current)</span></a>
            </li>
        </ul>
        <form class="form-inline mt-2 mt-md-0">

            <a href="{{route('logout')}}">Выйти</a>
        </form>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <nav class="col-sm-3 col-md-2 hidden-xs-down bg-faded sidebar">
            <ul class="nav nav-pills flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="{!! route('admin.lect') !!}">Лекции</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{!! route('results') !!}">Результаты</a>
                </li>

            </ul>
        </nav>

        @yield('content')
    </div>

</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.js"
        integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
        crossorigin="anonymous"></script>
<script src="https://cdn.rawgit.com/alertifyjs/alertify.js/v1.0.10/dist/js/alertify.js"></script>
@yield('js')
@include('inc.message')
{{--<script src="/js/bootstrap.min.js"></script>--}}

</body>
</html>