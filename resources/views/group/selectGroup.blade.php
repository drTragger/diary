@extends('templates.default')
@section('nav')
    @include('templates.topnav')
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
