@extends('templates.default')
@section('back')
    <a href="{{ url()->previous($group->id)}}" class="btn btn-warning"><i class="fas fa-long-arrow-alt-left"></i></a>
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
    @if(!empty($answers->all()))
        <div class="modern-form">
            @foreach($answers as $answer)
                <h4 class="text-center">Participant's answer</h4>
                <p class="text-left">Name: {{ $answer->user->name }}</p>
                <p>Date: {{$answer->created_at}}</p>
                <p class="text-muted">Answer:</p>
                <p class="p-3">{{ $answer->content }}</p>
                @if(isset($answer->file))
                    <p>
                        <a href="{{ route('homework.downloadAnswer', ['task' => $answer->id]) }}"
                           class="btn btn-info"><i class="fas fa-file"></i></a>
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
                    <button type="submit" class="btn btn-success"><i class="fas fa-check"></i></button>
                </form>
            @endforeach
        </div>
        {{--        <div class="container-form">--}}
        {{--            <table class="table text-center mt-4">--}}
        {{--                <thead>--}}
        {{--                <tr>--}}
        {{--                    <th scope="col">#</th>--}}
        {{--                    <th scope="col">Participant</th>--}}
        {{--                    <th scope="col">Answer</th>--}}
        {{--                    <th scope="col">Attachment</th>--}}
        {{--                    <th scope="col">Mark</th>--}}
        {{--                </tr>--}}
        {{--                </thead>--}}
        {{--                <tbody>--}}
        {{--                @foreach($answers as $answer)--}}
        {{--                    <tr class="table-color">--}}
        {{--                        <th scope="row">{{$answer->id}}</th>--}}
        {{--                        <td>{{ $answer->user->name }}</td>--}}
        {{--                        <td>{{ $answer->content }}</td>--}}
        {{--                        @if(isset($answer->file))--}}
        {{--                            <td>--}}
        {{--                                <a href="{{ route('homework.downloadAnswer', ['task' => $answer->id]) }}"--}}
        {{--                                   class="btn btn-info"><i class="fas fa-file"></i></a>--}}
        {{--                            </td>--}}
        {{--                        @else--}}
        {{--                            <td>No attachment</td>--}}
        {{--                        @endif--}}
        {{--                        <td>--}}
        {{--                            <form action="{{ route('homework.setMark', $answer->id) }}" method="post"--}}
        {{--                                  class="form-inline">--}}
        {{--                                {{ csrf_field() }}--}}
        {{--                                <input type="hidden" name="task" value="{{ $task->id }}">--}}
        {{--                                <input type="number" name="mark" class="form-control"--}}
        {{--                                       placeholder="Enter the mark"--}}
        {{--                                       required>--}}
        {{--                                <button type="submit" class="btn btn-secondary"><i class="fas fa-check"></i></button>--}}
        {{--                            </form>--}}
        {{--                        </td>--}}
        {{--                    </tr>--}}
        {{--                @endforeach--}}
        {{--                </tbody>--}}
        {{--            </table>--}}
        {{--        </div>--}}
    @else
        <div class="card bg-warning mt-4">
            <div class="card-body">Nothing to estimate</div>
        </div>
    @endif
@endsection