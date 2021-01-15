@extends('templates.default')
@section('nav')
    <li>
        <a href="#" class="btn main-nav-a-btn">Ученики</a>
    </li>
    <li>
        <a href="{{route('groups.selectUser', $group->id)}}" class="btn main-nav-a-btn">Добавить ученика</a>
    </li>
    <li>
        <form action="{{route('groups.delete', $group->id)}}" method="POST">
            {{csrf_field()}}
            {{method_field('DELETE')}}
            <input type="submit" value="Удалить группу" class="btn main-nav-a-btn">
        </form>
{{--        <a href="{{route('groups.delete', $group->id)}}" class="btn main-nav-a-btn">Удалить группу</a>--}}
    </li>
@endsection
@yield('content')
