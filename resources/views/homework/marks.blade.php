@extends('templates.default')
@section('back')
    <a href="{{route('groups.index')}}" class="btn btn-warning" title="Back"><i class="fas fa-long-arrow-alt-left"></i></a>
@endsection

@section('content')
    @if(count($marks) > 0)
        <table class="table text-center">
            <thead>
            <tr>
                <th>Task title</th>
                <th>Date</th>
                @if($check)
                    <th>Student</th>
                @endif
                <th>Mark</th>
                <th>Date of estimate</th>
            </tr>
            </thead>
            <tbody>
            @foreach($marks as $mark)
                <tr class="table-color">
                    <td>{{ $mark->task->name }}</td>
                    <td>{{ $mark->task->updated_at }}</td>
                    @if($check)
                        <td>{{ $mark->user->name }}</td>
                    @endif

                    @if(isset($mark->mark))
                        <td>{{ $mark->mark }}</td>
                        <td>{{$mark->updated_at}}</td>
                    @elseif($check)
                        <td colspan="2">
                            <a href="{{ route('homework.estimate', ['task' => $mark->task_id]) }}"
                               class="btn btn-secondary">Estimate</a>
                        </td>
                    @else
                        <td colspan="2">Not estimated</td>
                    @endif
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