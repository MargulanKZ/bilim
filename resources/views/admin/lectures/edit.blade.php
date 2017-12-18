@extends('layouts.admin')
@section('content')
    <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
        <h1>Редактировать лекцию</h1>
        <br>
        <form method="post">
            {!! csrf_field() !!}
            <p>Введите название лекции:<br><input type="text" name="title" class="form-control" value="{{$lecture->title}}" required> </p>
            <p>Описание:<br><textarea name="description" class="form-control">{{$lecture->description}}</textarea></p>
            <p>Ссылка на видео:<br><input type="text" name="video" class="form-control" value="{{$lecture->video}}" required> </p>
            <button type="submit" class="btn btn-success" style="cursor: pointer; float: right;">Сохранить</button>
        </form>
    </main>

@stop