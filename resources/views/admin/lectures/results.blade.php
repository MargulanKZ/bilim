@extends('layouts.admin')
@section('content')
    <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
        <h2>Результаты</h2>
        <br>
        <p style="float: left;"><strong>Сортировка по лекциям:</strong></p>
        <select name="forma" onchange="location = this.value;" style="float: left; margin-left: 15px;">
            {!! print_filter_lecture() !!}
        </select>
        <br><br>
        <p style="float: left;"><strong>Сортировка по пользователям:</strong></p>
        <select name="forma" onchange="location = this.value;" style="float: left; margin-left: 15px;">
            {!! print_filter_user() !!}
        </select>
        <br><br>
        <p style="float: left;"><strong>Сортировка по баллам:</strong></p>
        <select name="forma" onchange="location = this.value;" style="float: left; margin-left: 15px;">
            {!! print_sort_point() !!}
        </select>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Фамилия</th>
                    <th>Имя</th>
                    <th>Лекция</th>
                    <th>Правильные ответы</th>
                    <th>Все вопросы</th>
                    <th>Балл</th>
                </tr>
                </thead>
                <tbody>
                @if(count($data)>0)
                    @foreach($data as $item)
                        {!! print_all_result($item) !!}

                    @endforeach
                @endif


                </tbody>
            </table>
        </div>
    </main>

@stop
