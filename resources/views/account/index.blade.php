<h2>Добро пожаловать, {{\Auth::user()->name}}</h2>
<br>
@if (\Auth::user()->isAdmin==1)
    <a href="{{route('admin')}}">Панель управления</a>
@endif
<br>
<a href="{{route('logout')}}">Выйти</a>
