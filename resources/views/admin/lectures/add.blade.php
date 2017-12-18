@extends('layouts.admin')
@section('content')
    <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
        <h1>Добавить новую лекцию</h1>
        <br>
        <form method="post">
            {!! csrf_field() !!}
            <p>Введите название лекции:<br><input type="text" name="title" class="form-control" required> </p>
            <p>Описание:<br><textarea name="description" class="form-control"></textarea></p>
            <p>Ссылка на видео:<br><input type="text" name="video" class="form-control" required> </p>
            <button type="submit" class="btn btn-success" style="cursor: pointer; float: right;">Добавить</button>
        </form>
    </main>

@stop