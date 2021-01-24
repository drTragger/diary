@extends('templates.default')
@section('nav')
    @include('templates.topnav')
@endsection
@section('content')

    @if(!empty($answers))
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
                    <td>{{$answer->owner_id}}</td>
                    <td>{{$answer->content}}</td>
                    <td>
                        <form action="" method="post">
                            <input type="number" name="mark" required>
                            <input type="submit" value="Save" class="btn a-btn-info align-self-center">>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection