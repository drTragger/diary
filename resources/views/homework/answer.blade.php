@extends('templates.default')

@section('content')
    <div class="answer">
        <form action="{{ route('homework.addAnswer') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="text">Write your answer here</label>
                <textarea name="content" id="text" class="form-control" rows="10" cols="100"></textarea>
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
@endsection