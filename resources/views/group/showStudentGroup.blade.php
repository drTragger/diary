@extends('templates.default')
@section('nav')
    <li>
        <a href="#" class="btn main-nav-a-btn">Marks</a>
    </li>
    <li>
        <a href="#" class="btn main-nav-a-btn">Homework</a>
{{--        <a href="{{route('homework.index')}}" class="btn main-nav-a-btn">Homework</a>--}}
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
