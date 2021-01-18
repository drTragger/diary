@extends('templates.default')

@section('content')
    @foreach($marks as $mark)
        <p>{{ $mark }}</p>
    @endforeach
@endsection