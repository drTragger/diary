@extends('templates.default')
@section('nav')
    @include('templates.stnav')
@endsection
@section('content')
    <div class="group-item margin-0-auto w-90 height-max-content d-flex align-self-center">
        <div class="">
            <p>Name: {{$group->name}}</p>
            <p>Description: {{$group->description}}</p>
            <p>Owner: {{$group->user->name}}</p>
            <p>Date created: {{$group->created_at}}</p>
        </div>
    </div>
@endsection
