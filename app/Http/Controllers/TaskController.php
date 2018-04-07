<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use App\Models\User;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin:tasks.index')->except('index','show');
    }

    public function index()
    {
        $statuses     = Task::statuses();
        /** @var \Illuminate\Database\Eloquent\Builder $tasksBuilder */
        $tasksBuilder = Task::taskBuilder();
        $tasksTotal   = $tasksBuilder->count();

        if (request()->exists('status')) {
            $tasksBuilder->where('status', request('status'));
        }

        $tasks = $tasksBuilder->paginate(6);

        return view('tasks.index', compact('tasks', 'statuses', 'tasksTotal'));
    }

    public function show(Task $task)
    {
        $this->authorize('view', $task);

        $task->load(['user']);
        $replies = $task->replies()->with('user')->orderBy('id', 'desc')->paginate();

        return view('tasks.show', compact('task', 'replies'));
    }

    public function create()
    {
        $users = User::all();

        return view('tasks.create', compact('users'));
    }

    public function store(TaskRequest $request)
    {
        $this->authorize('update', Task::class);

        Task::query()->create($request->validated());

        return redirect()->route('tasks.create')->with('status', 'Task was successfully added');
    }

    public function edit(Task $task)
    {
        $users = User::all();

        return view('tasks.edit', compact('task', 'users'));
    }

    public function update(TaskRequest $request, Task $task)
    {
        $this->authorize('update', $task);

        $task->update($request->validated());

        session()->flash('status', 'Task edited success');

        return redirect()->route('tasks.show', $task);
    }

    /**
     * @param Task $task
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Task $task)
    {
        $this->authorize('update', $task);

        $task->delete();

        session()->flash('status', 'Task success deleted!');

        return redirect()->route('tasks.index');
    }
}
