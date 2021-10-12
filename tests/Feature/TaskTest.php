<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class TaskTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_past_task()
    {
        $task = Task::factory()->make([
            'due_date' => '2021-10-11'
        ]);
        $this->assertTrue($task->isPast());
    }

    public function test_guest_cannot_access_tasks_index()
    {
        $response = $this->get(route('tasks.index'));

        $response->assertRedirect('/login');
        $this->assertGuest();
    }

    public function test_auth_user_can_access_tasks_index()
    {
        $user = User::factory()->create();
//        $response = $this->post("/login", [
//            'email' => $user->email,
//            'password' => 'password'
//        ]);
        $auth = Auth::loginUsingId($user->id);
        $response = $this->get(route('tasks.index'));
        $response->assertStatus(200);
    }

    public function test_auth_user_can_access_tasks_create()
    {
        $user = User::factory()->create();
        $auth = Auth::loginUsingId($user->id);
        $response = $this->get(route('tasks.create'));
        $response->assertStatus(200);
    }

    public function test_auth_user_can_store_new_task()
    {

        $user = User::factory()->create();
        $auth = Auth::loginUsingId($user->id);
        $response = $this->post(route('tasks.store'), [
            'title' => 'Test Auth User Can Store New Task',
            'detail' => '........',
            'due_date' => now()->addDays(5)->format('Y-m-d'),
            'tags' => 'test, feature test'
        ]);
        $response->assertRedirect(route('tasks.index'));

        $response = $this->get(route('tasks.index'));
        $response->assertSee('Test Auth User Can Store New Task');
        $this->assertDatabaseHas('tags', [
            'name' => 'feature test'
        ]);
        $this->assertDatabaseHas('tags', [
            'name' => 'test'
        ]);
    }
}
