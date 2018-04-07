<?php

namespace App\Policies;

use App\Models\Task;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Task $task)
    {
        return $user->isAdmin() || $user->id == $task->user_id;
    }

    public function update(User $user)
    {
        return $user->isAdmin();
    }
}
