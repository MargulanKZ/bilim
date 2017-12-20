<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Bilim Test</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link rel="stylesheet" type="text/css" href="/css/sidebar.css">
    <link rel="shortcut icon" type="image/x-icon" href="/images/logo.png"/>


</head>
<body>

<div class="boxed">
    <div class="top">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <ul class="flat-information">


                        @if(\Auth::user())
                            <li><a href="">Здравсвтуйте, {!! Auth::user()->name !!}</a></li>
                        @else
                            <li><a href="">Здравсвтуйте, Гость</a></li>
                        @endif
                    </ul>
                </div><!-- col-md-8 -->
                <div class="col-md-4">
                    <div class="wrap-flat">
                        <ul class="flat-login-register">
                            @if (\Auth::user())
                                <li><a href="{{route('logout')}}">Выйти</a></li>
                            @else
                                <li><a href="{{route('login')}}">Войти</a></li>
                                <li><a href="{{route('register')}}">Регистрация</a></li>
                            @endif
                        </ul>

                    </div><!-- wrap-flat -->
                </div><!-- col-md-4 -->
            </div><!-- row -->
        </div><!-- container -->
    </div><!-- top -->
</div>


<aside class="sidebar-left">

    <a class="company-logo" href="/"><img src="/images/logo.png"></a>

    <div class="sidebar-links">

        @if(\Auth::user() and \Auth::user()->isAdmin)
            <a class="link-green" href="{{route('admin.lect')}}"><i class="fa fa-heart-o"></i>Панель управления</a>
        @endif
        <a class="link-blue" href="{!! route('user.results') !!}"><i class="fa fa-picture-o"></i>Мои результаты</a>
        <a class="link-red" href="{{route('home')}}"><i class="fa fa-heart-o"></i>Лекции</a>

    </div>

</aside>

<div class="main-content">

    <div class="menu">
        @yield('content')


    </div>

</div>


</body>
<!-- Javascript -->
<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>

    $(function () {

        var links = $('.sidebar-links > a');

        links.on('click', function () {

            links.removeClass('selected');
            $(this).addClass('selected');

        })
    });

</script>
</html>