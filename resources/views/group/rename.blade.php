@extends('templates.default')
@section('back')
    <a href="{{route('groups.index')}}" class="btn btn-warning"><i class="fas fa-long-arrow-alt-left"></i></a>
@endsection

@section('content')
    <div class="panel panel-default fill-bg">
        <div class="panel-heading text-center"><h3>Rename Group</h3></div>

        <div class="panel-body mt-5">
            <form action="{{route('groups.saveRename')}}" method="post">
                {{csrf_field()}}
                {{method_field('put')}}
                <input type="hidden" name="group_id" value="{{ $group->id }}">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="group_name" id="name" class="form-control" value="{{ $group->name }}">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success">Rename</button>
                </div>
            </form>
        </div>
    </div>
@endsection
