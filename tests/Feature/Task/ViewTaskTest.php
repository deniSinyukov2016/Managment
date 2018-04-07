<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ViewTaskTest extends TestCase
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
    public function is_admin_can_see_all_tasks()
    {
        $tasks = create(Task::class,[],5);
        $response = $this->signIn($this->admin)->get(route('tasks.index'));

        foreach ($tasks as $task) {
            $response->assertSee($task->title);
        }
    }

    /** @test */
    public function is_admin_can_see_one_task()
    {
        $task = create(Task::class);

        $this->signIn($this->admin)
             ->get(route('tasks.show', $task))
             ->assertSee($task->title)
             ->assertSee($task->description)
             ->assertSee($task->creator->name);
    }

    /** @test */
    public function it_user_can_show_only_him_task()
    {
        $this->signIn($this->user);

        $taskUser = create(Task::class, ['user_id' => $this->user->id]);
        $taskOtherUser = create(Task::class, ['user_id' => $this->admin->id]);

        $this->get(route('tasks.index'))
            ->assertSee($taskUser->title)
            ->assertDontSee($taskOtherUser->title);
    }

    /** @test */
    public function it_user_can_not_view_one_task_which_not_him()
    {
        $this->signIn($this->user);

        $taskOtherUser = create(Task::class, ['user_id' => $this->admin->id]);

        $this->get(route('tasks.show', $taskOtherUser))->assertStatus(403);
    }

    /** @test */
    public function it_can_not_view_list_tasks_if_unauthorized()
    {
        $this->get(route('tasks.index'))->assertRedirect('login');
    }

    /** @test */
    public function it_can_not_view_one_task_if_unauthorized()
    {
        $this->get(route('tasks.show', 1))->assertRedirect('login');
    }
}
