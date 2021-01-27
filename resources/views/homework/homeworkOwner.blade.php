<div class="statistics">
    <div>Submitted: {{ count($task->answers) }} students</div>
    <div>Checked: {{ count($task->answers) - count($task->answers->where('mark', null)) }} answers</div>
</div>
<div class="actions d-flex justify-content-center mt-4">
    @if(isset($task->file))
        <a href="{{ route('homework.downloadTask', ['task' => $task->id]) }}" class="btn btn-info">Attachment</a>
    @endif
    @if(count($task->answers->where('mark', null)))
        <a href="{{ route('homework.estimate', ['task' => $task->id]) }}"
           class="btn btn-success">Estimate</a>
    @endif
    <form action="{{ route('homework.taskEdition', ['task' => $task->id]) }}"
          method="post">
        {{ csrf_field() }}
        <input type="hidden" name="group_id" value="{{ $group->id }}">
        <button type="submit" class="btn btn-secondary">Edit</button>
    </form>
    <form action="{{ route('homework.deleteTask', ['task' => $task->id]) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('delete') }}
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
</div>