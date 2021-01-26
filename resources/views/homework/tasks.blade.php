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