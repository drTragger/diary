@extends('templates.default')
@section('nav')
    @if($check)
        @include('templates.topnav')
    @else
        @include('templates.stnav')
    @endif
@endsection
@section('content')
    @if(count($tasks)>0)
        <div class="container d-flex flex-direction-row flex-wrap groups-container ">
            <div class="row margin-0-auto ">
                @foreach ($tasks as $task)
                    <div class="d-flex flex-column bd-highlight ">
                        <div class="group-item w-75">
                            <div>
                                <p>Homework# {{$task->id}}</p>
                                <p>Subject: {{$task->name}}</p>
                                <p>Date: {{mb_strimwidth($task->created_at,0,10)}}</p>
                                <p>{{$task->content}}</p>
                            </div>
                            <div class="container-a-bnt-info d-flex flex-direction-column">
                                @if($check)
                                    @include('homework.homeworkOwner')
                                @else
                                    @include('homework.homeworkStudent')
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="pages">{{$tasks->render()}}</div>
    @else
        <p class="row margin-0-auto ">No homework</p>
    @endif
@endsection

