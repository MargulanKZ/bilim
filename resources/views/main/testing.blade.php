@extends('layouts.main')
@section('content')
    <div class="col-md-9 col-sm-8 portfolio-reponsive portfolio-reponsive2 test-data">
        @if(is_array($data))
            <form class="form-test" method="post">
                {!! csrf_field() !!}
                <input style="display: none" name="lecture" value="{{$l_id}}">
                @foreach($data as $q_id => $item)
                    <div class="question" data-id="{{$q_id}}" id="question-{{$q_id}}">
                        @foreach($item as $a_id => $answer)
                            @if(!$a_id)
                                <p class="q">{{$answer}}</p>
                            @else
                                <p class="a">
                                    <input type="radio" id="answer-{{$a_id}}" name="{{$q_id}}"
                                           value="{{$a_id}}">
                                    <label for="answer-{{$a_id}}">{{$answer}}</label>
                                </p>
                            @endif
                        @endforeach
                    </div>
                @endforeach
                {!! pagination(count($data),$data) !!}
                @endif
                <div class="buttons">
                    <button class="center btn" type="submit">Закончить тест</button>
                </div>
            </form>

    </div>
@stop

<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="/js/scripts.js"></script>
