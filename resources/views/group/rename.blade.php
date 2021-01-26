@extends('templates.default')
@section('back')
    <a href="{{route('groups.index')}}" class="btn btn-secondary">Back</a>
@endsection

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading text-center">Rename Group</div>

        <div class="panel-body mt-5">
            <form action="{{route('groups.saveRename')}}" method="post" class="text-center">
                {{csrf_field()}}
                {{method_field('put')}}
                <input type="hidden" name="group_id" value="{{ $group->id }}">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="group_name" id="name" class="form-control" value="{{ $group->name }}">
                </div>
                <button type="submit" class="btn btn-success">Rename</button>
            </form>
        </div>
    </div>
@endsection
