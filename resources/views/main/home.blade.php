@extends('layouts.main')
@section('content')
    <div class="col-md-9 col-sm-8 portfolio-reponsive portfolio-reponsive2">
        <div class="portfolio style4">

            @foreach($lectures as $lecture)
                <article class="entry">
                    <div class="entry-post">
                        <h3 class="entry-title"><a href="{!! route('lecture', ['id' => $lecture->id]) !!}">{{$lecture->title}}</a></h3>

                        <div class="entry-number">
                            <div class="entry-count">
                                <span class="count">{{$lecture->description}}</span>
                            </div>
                            <div class="entry-price color-green">
                                Дата создания:<span class="green">{{$lecture->created_at->format('d-m-Y')}}</span>
                            </div>
                        </div>
                    </div>
                </article>
            @endforeach

        </div>
        <div class="row">
            <div class="dividers h79">
            </div><!-- dividers flat30 -->
        </div>

        <div class="pagDiv">


                    {!! $lectures->links() !!}

        </div>
    </div>
@stop