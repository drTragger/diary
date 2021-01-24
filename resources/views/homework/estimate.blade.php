@extends('templates.default')
@section('nav')
    @include('templates.topnav')
@endsection
@section('content')
    @if(!empty($answers))
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
                        <td>{{$answer->name}}</td>
                        <td>{{$answer->content}}</td>
                        <td>
                            <form action="" method="post">
                                <input type="number" name="mark" placeholder="Enter the mark" required>
                                <input type="submit" value="Save" class="btn a-btn-info align-self-center">
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection