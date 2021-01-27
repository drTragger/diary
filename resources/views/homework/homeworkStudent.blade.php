<div class="actions d-flex justify-content-center mt-4">
    @if(isset($task->file))
        <a href="{{ route('homework.downloadTask', ['task' => $task->id]) }}" class="btn btn-info">Attachment</a>
    @endif
    <a href="{{route('homework.show', ['task'=>$task->id,'group'=> $group->id])}}"
       class="btn btn-dark">Submit</a>
</div>