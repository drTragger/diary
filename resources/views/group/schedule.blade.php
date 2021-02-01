@extends('templates.default')
@section('back')
    <a href="{{route('groups.index')}}" class="btn btn-warning"><i class="fas fa-long-arrow-alt-left"></i></a>
@endsection
@section('content')
    @include('common.errors')

    <table class="table">
        <thead>
        <tr>
            <td>Mon</td>
            <td>Tue</td>
            <td>Wed</td>
            <td>Thu</td>
            <td>Fri</td>
            <td>Sat</td>
            <td>Sun</td>
        </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
@endsection
