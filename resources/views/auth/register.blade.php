<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Регистрация</title>
    <link href="css/bootstrap.css" rel="stylesheet">

</head>
<body>

<div class="container">

    <form class="form-signin" method="post">
        {!! csrf_field() !!}
        <h2 class="form-signin-heading">Заполните поля</h2>

        <input type="name" id="inputEmail" name="name" class="form-control" placeholder="Имя" required
               autofocus>

        <input type="surname" id="inputEmail" name="surname" class="form-control" placeholder="Фамилия" required
               autofocus>

        <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email адрес" required
               autofocus>

        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Пароль" required>

        <input type="password" id="inputPassword" name="password_confirmation" class="form-control"
               placeholder="Повторите пароль" required>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Регистрация</button>
    </form>

</div> <!-- /container -->
<script src="https://code.jquery.com/jquery-3.2.1.js"
        integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
        crossorigin="anonymous"></script>
<script src="https://cdn.rawgit.com/alertifyjs/alertify.js/v1.0.10/dist/js/alertify.js"></script>
@include('inc.message')
</body>
</html>
