@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        {{-- Single task --}}
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>{{ $task->title }}</h3>
                    </div>
                    <div class="panel-body">
                        <p>{{ $task->description }}</p>
                    </div>
                    <div class="panel-footer">
                        @include('tasks.information')
                        @if(auth()->user()->isAdmin())
                            <div class="form">
                                <a type="button" class="btn btn-info" href="{{ route('tasks.edit', $task) }}">Edit</a>

                                <a type="button" class="btn btn-danger" onclick="event.preventDefault();
                                 document.getElementById('remove-project-form').submit();">Remove</a>

                                <form id="remove-project-form" action="{{ route('tasks.destroy', $task) }}"
                                method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        {{--Errors--}}
        @include('inc.errors_list')
        {{--Success--}}
        @include('inc.success')

        {{-- Replies area --}}
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>What other developers said about this task...
                            <span class="pull-right">{{ $replies->total() }} {{ str_plural('reply', $replies->total()) }}</span>
                        </h3>
                    </div>
                    @if($replies->count() !== 0)
                        <div class="panel-body">
                            @foreach($replies as $reply)
                                @include('reply.single')
                            @endforeach
                            <div class="text-center">
                                {{ $replies->links() }}
                            </div>
                        </div>
                    @endif
                    <div class="panel-footer">
                        @include('reply.create', ['route_data' => ['task', $task->id]])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection