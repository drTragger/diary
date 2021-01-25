{{--<a href="{{route('homework.show', [$task, $group->id])}}" class="btn a-btn-info align-self-center">Do homework</a>--}}
{{--<form action="{{route('homework.show', ['task'=>$task->id,'group'=> $group->id])}}" method="get">--}}
{{--    {{csrf_field()}}--}}
{{--    <button type="submit" class="btn btn-primary">Submit</button>--}}
{{--</form>--}}
<a href="{{route('homework.show', ['task'=>$task->id,'group'=> $group->id])}}" class="btn a-btn-info">Submit</a>

