@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1>Creating a task...</h1>
        <div class="col-md-6">

            <form action="{{ route('tasks.store') }}" method="POST">

                {{ csrf_field() }}

                {{--Errors--}}
                @include('inc.errors_list')

                {{--Success--}}
                @include('inc.success')

                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" id="title" name="title">
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea class="form-control" rows="5" id="description" name="description"></textarea>
                </div>
                <div class="form-group">
                    <label for="user_id">User</label>
                    <select name="user_id" id="user_id" class="form-control">
                        <option value="">Choose one user</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ ucfirst($user->name) }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="type">Type</label>
                    <select name="type" id="type" class="form-control">
                        <option>Choose one variant</option>
                        @foreach(config('enums.tasks.types') as $key => $type)
                            <option value="{{ $key }}">{{ ucfirst($type) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="">Choose one variant</option>
                        @foreach(config('enums.tasks.statuses') as $key => $status)
                            <option value="{{ $key }}">{{ ucfirst($status) }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="importance">Importance</label>
                    <select name="importance" id="importance" class="form-control">
                        <option value="">Choose one variant</option>
                        @foreach(config('enums.tasks.importance') as $key => $importance)
                            <option value="{{ $key }}">{{ ucfirst($importance) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="date_to">Date to</label>
                    <input type="date" class="form-control" id="date_to" name="date_to">
                </div>

                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>
@endsection