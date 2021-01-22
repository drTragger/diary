@extends('templates.default')
@section('nav')
    @include('templates.stnav')
@endsection
@section('content')
    <div class="d-flex flex-column bd-highlight ">
        <div class="group-item w-75">
            <div>
                <p>Homework# {{$task->id}}</p>
                <p>Subject: {{$task->name}}</p>
                <p>Date: {{mb_strimwidth($task->created_at,0,10)}}</p>
                <p>{{$task->content}}</p>
            </div>
        </div>
    </div>
    <div class="answer">
        <form action="{{ route('homework.addAnswer') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="text">Write your answer here</label>
                <textarea name="content" id="text" class="form-control" rows="10" cols="100"></textarea>
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
@endsection