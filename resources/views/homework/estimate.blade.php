@extends('templates.default')
@section('nav')
    @include('templates.topnav')
@endsection
@section('content')
    @if(!empty($answers->all()))
        <div class="container-form">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Participant</th>
                    <th>Answer</th>
                    <th>Mark</th>
                </tr>
                </thead>
                <tbody class="table">
                @foreach($answers as $answer)
                    <tr>
                        <td>{{$answer->id}}</td>
                        <td>{{$answer->user->name}}</td>
                        <td>{{$answer->content}}</td>
                        <td>
                            <form action="{{ route('homework.setMark', $answer->id) }}" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="task" value="{{ $task->id }}">
                                <input type="number" name="mark" placeholder="Enter the mark" required>
                                <input type="submit" value="Save" class="btn a-btn-info align-self-center">
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p>Nothing to estimate</p>
    @endif
@endsection