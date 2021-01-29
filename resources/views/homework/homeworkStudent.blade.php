<div class="actions d-flex flex-wrap justify-content-center mt-4">
    @if(isset($task->file))
        <a href="{{ route('homework.downloadTask', ['task' => $task->id]) }}" class="btn btn-info" title="Add file"><i class="fas fa-file"></i></a>
    @endif
    <a href="{{route('homework.show', ['task'=>$task->id,'group'=> $group->id])}}"
       class="btn btn-dark" title="Do homework"><i class="fas fa-clipboard-check"></i></a>
</div>