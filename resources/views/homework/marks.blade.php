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
                <th>Date</th>
                <th>Student</th>
                <th>Mark</th>
                <th>Date of estimate</th>
            </tr>
            </thead>
            <tbody>
            @foreach($marks as $mark)
                <tr class="table-color">
                    <td>{{ $mark->task->name }}</td>
                    <td>{{ $mark->task->updated_at }}</td>
                    <td>{{ $mark->user->name }}</td>

                    @if(isset($mark->mark))
                        <td>Mark: {{ $mark->mark }}</td>
                        <td>{{$mark->updated_at}}</td>
                    @elseif($check)
                        <td colspan="2">
                            <a href="{{ route('homework.estimate', ['task' => $mark->task_id]) }}"
                               class="btn btn-secondary">Estimate</a>
                        </td>
                    @else
                        Not estimated
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