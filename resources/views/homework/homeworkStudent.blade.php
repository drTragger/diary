{{--<a href="{{route('homework.show', [$task, $group->id])}}" class="btn a-btn-info align-self-center">Do homework</a>--}}
<form action="{{route('homework.show', ['task'=>$task->id,'group'=> $group->id])}}" method="post">
    {{csrf_field()}}
    {{method_field('get')}}
    <input type="submit" value="todo">
</form>

