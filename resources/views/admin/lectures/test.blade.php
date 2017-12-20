@extends('layouts.admin')
@section('content')
    <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
        <h2>Все лекции</h2>
        <br>
        <a href="{!! route('question.add',['id'=>$id]) !!}" class="btn btn-info">Добавить новый вопрос</a>
        <br><br><br>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Вопрос</th>
                    <th>Действие</th>
                </tr>
                </thead>
                <tbody>
                @if(is_array($questions))
                    @foreach($questions as $key => $item)
                        <tr>
                            <td>{{$questions[$key][0]}}</td>

                            <td><a href="">Редактировать</a> || <a
                                        href="javascript:;" class="delete" rel="{{$key}}">Удалить</a></td>
                        </tr>
                    @endforeach
                @endif


                </tbody>
            </table>
        </div>
    </main>

@stop
@section('js')
    <script>
        $(function () {
            $(".delete").on('click', function () {
                if (confirm("Вы действительно хотите удалить этот вопрос ?")) {
                    let id = $(this).attr("rel");
                    $.ajax({
                        type: "DELETE",
                        url: "{!! route('question.delete') !!}",
                        data: {_token: "{{csrf_token()}}", id: id},
                        complete: function () {
                            alert("Вопрос успешно удалена");
                            location.reload();
                        }
                    });
                } else {
                    alertify.error("Дествие отменено пользователем");
                }
            });
        });
    </script>
@stop