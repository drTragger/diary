@extends('templates.default')
@section('back')
    <a href="{{route('groups.index')}}" class="btn btn-secondary">Back</a>
@endsection

@section('content')
    @if($group->owner_id == Auth::user()->id)
        <a href="{{ route('homework.task', $group->id) }}" class="btn btn-success">Add homework</a>
    @endif
    @if(count($tasks) > 0)
        <div class="d-flex flex-wrap justify-content-around mt-4">
            @foreach($tasks as $task)
                <div class="col-5 border border-dark  pt-3 pb-3 bg-task mb-4 grid-t-r">
                    <div>
                        <h4 class="homework-title">{{$task->name}}</h4>
                        <p class="word-wrap">{{mb_strimwidth($task->content, 0 , 200, '...')}}</p>
                    </div>
                    <p>{{$task->created_at}}</p>
                    @if($check)
                        @include('homework.homeworkOwner')
                    @else
                        @include('homework.homeworkStudent')
                    @endif
                    @if($check)
                        <div class="actions d-flex justify-content-center mt-4">
                            @if(count($task->answers->where('mark', null)))
                                <a href="{{ route('homework.estimate', ['task' => $task->id]) }}"
                                   class="btn btn-success">Estimate</a>
                            @endif
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
                </div>
            @endforeach

            <div class="w-100 d-flex justify-center">
                {{ $tasks->links() }}
            </div>
        </div>
    @else
        <div class="card bg-warning">
            <div class="card-body">You have no homework</div>
        </div>
    @endif
@endsection