<div class="col-md-6">

    <div class="panel panel-default">
        <div class="panel-heading"> {{ $task->title }} </div>
        <div class="panel-body" style="height: 130px">
            {{ str_limit($task->description) }}
        </div>
        <div class="panel-footer">
            <a type="button" class="btn btn-default" href="{{ route('tasks.show', $task) }}">See more</a>
            @if($task->is_liked)
                <span class="btn btn-primary" style="cursor: auto; display: inline-block;">You like this idea</span>
            @endif
            <span class="btn btn-warning" style="cursor: auto; display: inline-block;">
                {{ $task->replies->count() }} {{ str_plural('replies', $task->replies->count()) }}
            </span>
        </div>
    </div>

</div>