@extends('templates.default')
@section('nav')
    <li>
        <a href="{{route('groups.selectUser')}}" class="btn main-nav-a-btn">Добавить ученика</a>
    </li>
    <li>
        <a href="#" class="btn main-nav-a-btn">Удалить группу</a>
    </li>
@endsection
@section('content')
    <div class="group-item margin-0-auto w-90 height-max-content d-flex align-self-center">
        <div class="">
            <p>Название: {{$group->name}}</p>
            <p>Описание: {{$group->description}}</p>
            <p>Владелец: {{$group->user->name}}</p>
            <p>Дата создания: {{$group->created_at}}</p>
        </div>
    </div>
@endsection
