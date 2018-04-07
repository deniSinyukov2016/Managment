@if( auth()->user()->isAdmin() )
    <p>
        Created by
        <a href="{{ route('users.show', $task->creator) }}">
            {{ $task->creator->name }}
        </a>
        {{ $task->created_at->diffForHumans() }}
    </p>
    <p>
        @if(isset($task->user->name))
            Must do
            <a href="{{ route('users.show', $task->user_id)}}">
                {{ $task->user->name }}
            </a>
        @endif
        {{ (isset($task->date_to)?'before '.date('m.d.Y',strtotime($task->date_to)):'') }}
    </p>
@else
    <p>Created by {{ $task->creator->name}} {{ $task->created_at->diffForHumans() }}</p>
    <p>
        {{ (isset($task->user->name)?'Must do '.$task->user->name:'') }}
        {{ (isset($task->date_to)?'before '.date('m.d.Y',strtotime($task->date_to)):'') }}
    </p>
@endif
<p>Type: {{ $task->type }}</p>
<p>Status: {{  $task->status }}</p>
<p>Importance: {{ $task->importance }}</p>