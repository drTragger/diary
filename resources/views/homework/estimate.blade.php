@extends('templates.default')
@section('back')
    <a href="{{ url()->previous() }}" class="btn btn-warning">Back</a>
@endsection
@section('content')
    @if(!empty($answers->all()))
        <div class="container-form fill-bg">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Participant</th>
                    <th scope="col">Answer</th>
                    <th scope="col">Mark</th>
                </tr>
                </thead>
                <tbody>
                @foreach($answers as $answer)
                    <tr>
                        <th scope="row">{{$answer->id}}</th>
                        <td>{{$answer->user->name}}</td>
                        <td>{{$answer->content}}</td>
                        <td>
                            <form action="{{ route('homework.setMark', $answer->id) }}" method="post"
                                  class="form-inline">
                                {{ csrf_field() }}
                                <input type="hidden" name="task" value="{{ $task->id }}">
                                <input type="number" name="mark" class="form-control" placeholder="Enter the mark"
                                       required>
                                <button type="submit" class="btn btn-secondary">Estimate</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="bg-warning text-center pt-3 pb-2">
            <p>Nothing to estimate</p>
        </div>
    @endif
@endsection