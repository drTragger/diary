@extends('templates.index')

@section('content')
    @include('common.errors')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div>
                    <form action="{{route('groups.add')}}" method="POST">

                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <label for="name">name</label>
                        <input type="text" name="name" id="name">
                        <label for="description">description</label>
                        <input type="text" name="description" id="description">
                        <input type="hidden" name="status" value="on">
                        <input type="submit"
                               name="Add">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
