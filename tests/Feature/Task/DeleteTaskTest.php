<?php

namespace Tests\Feature\Task;

use App\Models\Task;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DeleteTaskTest extends TestCase
{
    use RefreshDatabase;

    private $admin;
    private $user;

    protected function setUp()
    {
        parent::setUp();

        $this->admin = create(User::class, ['is_admin' => true, 'confirmed' => 1]);
        $this->user  = create(User::class, ['is_admin' => false, 'confirmed' => 1]);
    }

    /** @test */
    public function it_admin_can_delete_task()
    {
        $this->signIn($this->admin);

        $task = create(Task::class);

        $this->delete(route('tasks.destroy', $task))
             ->assertRedirect(route('tasks.index'))
             ->assertSessionHas('status', 'Task success deleted!')
             ->assertStatus(302);

        $this->assertDatabaseHas('tasks', $task->toArray());
    }

    /** @test */
    public function it_user_can_not_delete_task()
    {
        $this->signIn($this->user);

        $task = create(Task::class);

        $this->delete(route('tasks.destroy', $task))
             ->assertRedirect(route('tasks.index'));

        $this->assertDatabaseHas('tasks', $task->toArray());
    }

    /** @test */
    public function it_user_can_not_delete_his_task()
    {
        $this->signIn($this->user);
        $this->withoutMiddleware();

        $task = create(Task::class, ['creator_id' => $this->user->id]);

        $this->delete(route('tasks.destroy', $task))
             ->assertStatus(403);

        $this->assertDatabaseHas('tasks', $task->toArray());
    }

    /** @test */
    public function it_can_not_delete_task_if_unauthorized()
    {
        $task = create(Task::class);
        $this->withoutMiddleware();

        $this->delete(route('tasks.destroy', $task))
             ->assertStatus(403);

        $this->assertDatabaseHas('tasks', $task->toArray());
    }
}
