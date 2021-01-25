@extends('templates.default')
@section('nav')
    @if($check)
        @include('templates.topnav')
    @else
        @include('templates.stnav')
    @endif
@endsection
@section('content')
    <div class="container">
        @if(!empty ($tasks))
            @foreach($tasks as $task)
                <div class="col-6 group-item tasks margin-0-auto mb-3">
                    @if($check)
                        <div class="actions">
                            <form action="{{ route('homework.taskEdition', ['task' => $task->id]) }}"
                                  method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="group_id" value="{{ $group->id }}">
                                <button type="submit" class="btn btn-secondary">Edit</button>
                            </form>
                            <form action="{{ route('homework.deleteTask', ['task' => $task->id]) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('delete') }}
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    @endif
                    <h4>{{$task->name}}</h4>
                    <p>{{$task->content}}</p>
                    <p>{{$task->created_at}}</p>
                    @if($check)
                        @include('homework.homeworkOwner')
                    @else
                        @include('homework.homeworkStudent')
                    @endif
                </div>
            @endforeach

            <div class="w-100 d-flex justify-center">
                {{ $tasks->links() }}
            </div>
        @endif
    </div>
@endsection