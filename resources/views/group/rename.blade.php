@extends('templates.default')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Rename Group</div>

                <div class="panel-body">
                    <form action="{{route('groups.saveRename')}}" method="post">
                        {{csrf_field()}}
                        {{method_field('put')}}
                        <input type="hidden" name="group_id" value="{{ $group->id }}">
                        <input type="text" name="group_name" value="{{ $group->name }}">
                        <input type="submit" value="Save Change">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
