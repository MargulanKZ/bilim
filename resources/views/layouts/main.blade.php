<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Bilim Test</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css">


</head>
<body>

<div class="boxed">
    <div class="top">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <ul class="flat-information">

                        <li><a href="">8-708-199-8224</a></li>
                        <li><a href="">margulan.yerlan@gmail.com</a></li>
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


<div class="container" style="min-height: 1000px; margin-top: 50px;">
    <div class="row">
        <div class="col-md-3 col-sm-4 sidebar-reponsive flat-course-sidebar">
            <div class="sidebar">
                <div class="widget widget-categories">
                    <h3 class="widget-title">Меню</h3>
                    <ul>
                        <li><a href="{{route('account')}}">Личный кабинет</a></li>
                        <li><a href="{{route('home')}}">Лекции</a></li>


                    </ul>
                </div>
            </div>
        </div>
        @yield('content')
    </div>
</div>
</section>


<div class="bottom">
    <div class="container">
        <div class="copyright">
            <p>For BilimLand | created by Margulan</p>
        </div>
    </div>
</div><!-- bottom -->

<a href="#"></a>
</div><!-- Boxed -->

<!-- Javascript -->
<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>


</body>
</html>