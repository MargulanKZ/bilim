@extends('layouts.main')
@section('content')
    <div class="col-md-9 col-sm-8 portfolio-reponsive portfolio-reponsive2 test-data">
        {!! print_result($data) !!}
        <button class="center"><h3 class="entry-title"><a href="{!! route('testing', ['id' => $lecture]) !!}">Пройти снова</a></h3></button>
    </div>
@stop