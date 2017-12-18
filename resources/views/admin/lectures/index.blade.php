@extends('layouts.admin')
@section('content')
    <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
        <h2>Все лекции</h2>
        <br>
        <a href="{!! route('lect.add') !!}" class="btn btn-info">Добавить новую лекцию</a>
        <br><br><br>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Название</th>
                    <th>Описание</th>
                    <th>Ссылка на видео</th>
                    <th>Дата создания</th>
                    <th>Действие</th>
                </tr>
                </thead>
                <tbody>

                    @foreach($lectures as $lecture)
                        <tr>
                            <td>{{$lecture->title}}</td>
                            <td>{{$lecture->description}}</td>
                            <td><a href="{{$lecture->video}}">{{$lecture->video}}</a></td>
                            <td>{{$lecture->created_at->format('d-m-Y H:i')}}</td>
                            <td><a href="{!! route('lect.edit', ['id' => $lecture->id]) !!}">Редактировать</a> || <a href="javascript:;" class="delete" rel="{{$lecture->id}}">Удалить</a> </td>
                        </tr>
                    @endforeach





                </tbody>
            </table>
        </div>
    </main>

@stop
@section('js')
    <script>
        $(function(){
            $(".delete").on('click', function () {
                if(confirm("Вы действительно хотите удалить эту лекцию ?")) {
                    let id = $(this).attr("rel");
                    $.ajax({
                        type: "DELETE",
                        url: "{!! route('lect.delete') !!}",
                        data: {_token:"{{csrf_token()}}", id:id},
                        complete: function() {
                            alert("Лекция успешно удалена");
                            location.reload();
                        }
                    });
                }else{
                    alertify.error("Дествие отменено пользователем");
                }
            });
        });
    </script>
@stop