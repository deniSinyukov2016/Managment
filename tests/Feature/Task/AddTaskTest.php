<?php

namespace Tests\Feature\Task;

use App\Models\Task;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AddTaskTest extends TestCase
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
    public function it_can_not_view_form_tasks_if_unauthorized()
    {
        $this->get(route('tasks.create'))->assertRedirect('login');
    }

    /** @test */
    public function is_user_can_not_view_form_task()
    {
        $this->signIn($this->user);

        $this->get(route('tasks.create'))->assertRedirect('tasks');
    }

    /** @test */
    public function is_admin_can_add_new_task()
    {
        $this->signIn($this->admin);

        $task = make(Task::class);
        $this->post(route('tasks.store'), $task->toArray())
            ->assertRedirect(route('tasks.create'))
            ->assertSessionHas('status', 'Task was successfully added');

        $this->assertDatabaseHas('tasks', ['title' => $task->title]);
    }

    /** @test */
    public function it_user_can_not_add_new_task()
    {
        $this->withoutMiddleware();
        $this->signIn($this->user);
        $task = make(Task::class);
        $this->post(route('tasks.store'), $task->toArray())
             ->assertStatus(403);

        $this->assertDatabaseMissing('tasks', ['title' => $task->title]);
    }

    /** @test */
    public function it_can_not_add_task_if_unauthorized()
    {
        $this->withoutMiddleware();

        $task = make(Task::class);
        $this->post(route('tasks.store'), $task->toArray())
             ->assertStatus(403);

        $this->assertDatabaseMissing('tasks', ['title' => $task->title]);
    }
}
