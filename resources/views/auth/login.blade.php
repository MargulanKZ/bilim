@extends('layouts.main')
@section('content')
    <div class="col-md-9 col-sm-8 portfolio-reponsive portfolio-reponsive2">

        <form class="form-signin" method="post">
            {!! csrf_field() !!}
            <h2 class="form-signin-heading">Войти</h2>

            <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email адрес" required
                   autofocus>

            <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Пароль"
                   required>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="remember" value="1"> Запомнить
                </label>
            </div>
            <button class="btn btn-lg btn-log btn-block" type="submit">Войти</button>
        </form>
    </div>
@stop
