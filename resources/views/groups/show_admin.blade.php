@extends('templates.admin')
@section('content')

    @if(count($tasks)>0)
        @foreach ($tasks as $task)
            <div>
                <div>
                    <div>
                        Homework# {{$task->id}}
                    </div>
                    <div>
                        Subject: {{$task->name}}
                    </div>
                    <div>
                        Date: {{$task->date_created}}
                    </div>
                </div>
                <div>
                    {{$task->content}}
                </div>
                <div>
                    Submitted: X students     {{--TODO get submitted tasks--}}
                </div>
            </div>
        @endforeach
    @endif
@endsection

