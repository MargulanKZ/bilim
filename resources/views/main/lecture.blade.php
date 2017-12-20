@extends('layouts.main')
@section('content')
    <div class="wrap-entry">

        <h1 class="entry-title"><a href="#">{{$lecture->title}}</a></h1>
        <div class="entry-author">
            <span class="calendar">{{$lecture->created_at->format('d M-Y')}}</span>
        </div>
        <div style="height: 400px; background: black; width: 800px; margin-left: 20px; margin-top: 30px;">
            <iframe src="http://www.youtube.com/embed/{!! YoutubeID($lecture->video)!!}"
                    width="800" height="400" frameborder="0" allowfullscreen ng-show="showvideo"></iframe>
        </div>

        <div style="margin-top: 20px;">
            <h1><strong>Описание: </strong></h1>
            <p style="margin-left: 30px; font-size: 24px;">{{$lecture->description}}</p>
        </div>


            <button class="center"><h3 class="entry-title"><a href="{!! route('testing', ['id' => $lecture->id]) !!}">Пройти тест</a></h3></button>

    </div>
@stop