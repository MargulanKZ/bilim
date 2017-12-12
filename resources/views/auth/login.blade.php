<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Войти</title>
    <link href="css/bootstrap.css" rel="stylesheet">
</head>
<body>

<div class="container">

    <form class="form-signin" method="post">
        {!! csrf_field() !!}
        <h2 class="form-signin-heading">Войти</h2>

        <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email адрес" required
               autofocus>

        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Пароль" required>
        <div class="checkbox">
            <label>
                <input type="checkbox" name="remember" value="1" >  Запомнить
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Войти</button>
    </form>

</div> <!-- /container -->

</body>
</html>
