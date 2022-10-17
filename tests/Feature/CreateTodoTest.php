<?php

namespace Tests\Feature;

use App\Models\Todo;
use Database\Factories\TodoFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateTodoTest extends TestCase
{
    use RefreshDatabase;

    public function test_to_create_todo_page() {

        $response = $this->get(route('todo.create'));

        $response->assertStatus(200);
    }


    public function test_storing_a_todo_to_database() {

        // $this->withoutExceptionHandling();

        $todo = Todo::factory()->make();

        $response = $this->post(route('todo.store'), $todo->toArray());

        $response->assertRedirect('/')->assertSessionHas('success');
    }

}
