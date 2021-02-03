@extends('templates.default')
@section('back')
    <a href="{{ route('homework.index', $group->id) }}" class="btn btn-warning" title="Back"><i
                class="fas fa-long-arrow-alt-left"></i></a>
@endsection
@section('content')
    @include('common.errors')
    @if(!empty($answers->all()))
        <div class="modern-form">
            @foreach($answers as $answer)
                <div class="answer">
                    <h4 class="text-center">{{ $answer->user->name }}'s answer</h4>
                    <p>Date: {{$answer->created_at}}</p>
                    <p class="text-muted">Answer:</p>
                    <p class="p-3">{{ $answer->content }}</p>
                    @if(isset($answer->file))
                        <p>
                            <a href="{{ route('homework.downloadAnswer', ['task' => $answer->id]) }}"
                               class="btn btn-info" title="Download answer"><i class="fas fa-file"></i></a>
                        </p>
                    @else
                        <p class="text-center">No attachment</p>
                    @endif
                    <form action="{{ route('homework.setMark', $answer->id) }}" method="post"
                          class="form-inline d-flex justify-content-center">
                        {{ csrf_field() }}
                        <input type="hidden" name="task" value="{{ $task->id }}">
                        <input type="number" name="mark" class="form-control"
                               placeholder="Enter the mark"
                               required>
                        <button type="submit" class="btn btn-success" title="Estimate"><i class="fas fa-check"></i></button>
                    </form>
                </div>
            @endforeach
        </div>
        <div class="pagination">
            <div class="pagination-buttons">
                {{ $answers->links() }}
            </div>
        </div>
    @else
        <div class="card bg-warning mt-4">
            <div class="card-body">Nothing to estimate</div>
        </div>
    @endif
@endsection