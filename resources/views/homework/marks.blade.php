@extends('templates.default')

@section('content')
        @if(count($marks) > 0)
            <table class="table">
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
                    <tr>
                        <td>{{ $mark->task->name }}</td>
                        <td>{{ $mark->task->content }}</td>
                        <td>{{ $mark->user->name }}</td>
                        <td>{{ $mark->mark }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <div class="card bg-warning">
                <div class="card-body">There are no marks</div>
            </div>
        @endif
@endsection