@extends('templates.default')
@section('back')
    <a href="{{route('groups.index')}}" class="btn btn-warning"><i class="fas fa-long-arrow-alt-left"></i></a>
@endsection

@section('content')
    @if(count($marks) > 0)
        <table class="table text-center">
            <thead>
            <tr>
                <th>Task title</th>
                <th>Task</th>
                <th>Student</th>
                <th>Mark</th>
            </tr>
            </thead>
            <tbody>
            @foreach($marks as $mark)
                <tr class="table-color">
                    <td>{{ $mark->task->name }}</td>
                    <td>{{ $mark->task->content }}</td>
                    <td>{{ $mark->user->name }}</td>
                    <td>
                        @if(isset($mark->mark))
                            {{ $mark->mark }}
                        @elseif($check)
                            <a href="{{ route('homework.estimate', ['task' => $mark->task_id]) }}"
                               class="btn btn-secondary">Estimate</a>
                        @else
                            Not estimated
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <div class="card bg-warning mt-4">
            <div class="card-body">There are no marks</div>
        </div>
    @endif
@endsection