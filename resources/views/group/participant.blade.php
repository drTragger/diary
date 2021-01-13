@extends('templates.index')

@section('content')
    @include('common.errors')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div>
                    <form action="{{route('groups.addUser')}}" method="POST">

                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <label for="participant">participant</label>
                        <input type="text" name="participant" id="participant">
                        <input type="submit" name="Add participant">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
