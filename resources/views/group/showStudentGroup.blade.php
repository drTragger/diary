@extends('templates.default')
@section('nav')
    @include('templates.topnav')
@endsection
@section('content')
    <p>Stud</p>
    <div class="group-item margin-0-auto w-90 height-max-content d-flex align-self-center">
        <div class="">
            <p>Название: {{$group->name}}</p>
            <p>Описание: {{$group->description}}</p>
            <p>Владелец: {{$group->user->name}}</p>
            <p>Дата создания: {{$group->created_at}}</p>
        </div>
    </div>
    <p>Stud</p>
@endsection
