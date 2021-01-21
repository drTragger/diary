@extends('homework.homework')
@section('stnav')
    <li>
        <a href="#" class="btn main-nav-a-btn">Marks</a>
    </li>
    <li>
        <a href="{{ route('homework.index', $group->id) }}" class="btn main-nav-a-btn">Homework</a>
    </li>
@endsection
@section('result')
    <div class="container-form">
        <h3 class="text-center">Send task</h3>
        <form action="#" method="POST" class="d-flex flex-direction-column">  {{--TODO send task--}}

            {{csrf_field()}}
            <label for="answer">Answer</label>
            <textarea type="text" name="answer" id="answer"></textarea>
            <input type="submit"
                   value="Summit">
        </form>
    </div>
@endsection