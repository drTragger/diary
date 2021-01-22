@extends('templates.default')
@section('content')
    <div class="container">
        @if(!empty ($tasks))
            @foreach($tasks as $task)
                <div class="col-6 group-item">
                    <h4>{{$task->name}}</h4>
                    <p>{{$task->content}}</p>
                    <p>{{$task->created_at}}</p>
                </div>
            @endforeach

            <div class="w-100 d-flex justify-center">
                {{ $tasks->links() }}
            </div>
        @endif
    </div>
@endsection