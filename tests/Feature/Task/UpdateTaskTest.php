<?php

namespace Tests\Feature\Task;

use App\Models\Task;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UpdateTaskTest extends TestCase
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
    public function it_admin_can_view_update_form_task()
    {
        $this->signIn($this->admin)
            ->get(route('tasks.edit', create(Task::class)))
            ->assertStatus(200);
    }

    /** @test */
    public function it_user_can_not_view_update_form_task()
    {
        $this->signIn($this->user)
            ->get(route('tasks.edit', create(Task::class)))
            ->assertRedirect(route('tasks.index'));
    }

    /** @test */
    public function it_admin_can_update_task()
    {
        $this->signIn($this->admin);

        $task = create(Task::class);
        $data = $task->toArray();
        $data['title'] = 'TestTask';

        $this->put(route('tasks.update', ['task' => $task]), $data)
             ->assertRedirect(route('tasks.show', $task))
             ->assertSessionHas('status', 'Task edited success');

        $this->assertDatabaseHas('tasks', array_only($data, 'title'));
    }

    /** @test */
    public function it_user_can_not_update_task()
    {
        $this->signIn($this->user);
        $this->withoutMiddleware();

        $task = create(Task::class);
        $data = $task->toArray();
        $data['title'] = 'TestTask';

        $this->put(route('tasks.update', ['task' => $task]), $data)
             ->assertStatus(403);

        $this->assertDatabaseHas('tasks', $task->toArray());
    }
}
