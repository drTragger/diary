@extends('templates.default')
@section('back')
    <a href="{{route('groups.index')}}" class="btn btn-warning"><i class="fas fa-long-arrow-alt-left"></i></a>
@endsection

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if($group->owner_id == Auth::user()->id)
        <a href="{{ route('homework.task', $group->id) }}" class="btn btn-success">Add homework</a>
    @endif
    @if(count($tasks) > 0)
        <div class="d-flex flex-wrap justify-content-between mt-4">
            @foreach($tasks as $task)
                <div class="task border border-dark mb-5">
                    <h4 class="homework-title">{{$task->name}}</h4>
                    <div class="bg-task mb-4 grid-t-r task-info">
                        <p class="word-wrap">{{mb_strimwidth($task->content, 0 , 200, '...')}}</p>
                        <p>{{$task->created_at}}</p>
                        @if($check)
                            @include('homework.homeworkOwner')
                        @else
                            @include('homework.homeworkStudent')
                        @endif
                    </div>
                </div>
            @endforeach
            <div class="pagination">
                <div class="pagination-buttons">
                    {{ $tasks->links() }}
                </div>
            </div>
        </div>
    @else
        <div class="card bg-warning">
            <div class="card-body">You have no homework</div>
        </div>
    @endif
@endsection