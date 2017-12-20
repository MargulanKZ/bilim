@extends('layouts.main')
@section('content')

    <div class="col-md-9 col-sm-8 portfolio-reponsive portfolio-reponsive">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>

                    <th>Лекция</th>
                    <th>Правильные ответы</th>
                    <th>Все вопросы</th>
                    <th>Балл</th>
                </tr>
                </thead>
                <tbody>
                @if(count($data)>0)
                    @foreach($data as $item)
                        {!! print_person_result($item) !!}

                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
@stop