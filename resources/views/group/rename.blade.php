@extends('templates.default')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 margin-0-auto">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">Rename Group</div>

                    <div class="panel-body">
                        <form action="{{route('groups.saveRename')}}" method="post" class="d-flex justify-center">
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
            </div>
        </div>
    </div>
@endsection
