@extends('layouts.admin')
@section('content')
    <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
        <h1>Добавить новый вопрос</h1>
        <br>
        <form method="post" class="question">
            {!! csrf_field() !!}
            <p>Введите вопрос:<br><input type="text" name="question" class="form-control" required></p>
            <p>Правильный ответ:<br><input type="text" name="correct" class="form-control" required></p>
            <h3>Неправильные ответы:</h3>
            <br>
            <input type="text" name="lecture" style="display: none" value="{{$id}}" required>
            <input type="text" name="answer-1" required>
            <a class="add_answer" onclick="add()">+</a>
            <span style="display: none" id="count">2</span>
            <button type="submit" class="btn btn-success" style="cursor: pointer; float: right;">Добавить</button>
        </form>
    </main>

    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="/js/scripts.js"></script>
@stop
<style>
    .add_answer:hover
    {
        cursor: pointer;
        background: black;
    }
    .add_answer{
        width: 30px;
        height: 30px;
        text-align: center;
        padding: auto;
        display: block;

        border: 1px solid green;
        border-radius: 15px;
    }
</style>