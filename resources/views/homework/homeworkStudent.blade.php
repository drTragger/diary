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
{{--    <a href="" class="btn a-btn-info align-self-center">Do homework</a>--}}
@endsection
