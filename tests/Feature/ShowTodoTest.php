<?php

namespace Tests\Feature;

use App\Http\Controllers\TodoController;
use App\Models\Todo;
use App\Repositories\EloquentTodoRepository;
use App\Repositories\TodoRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\App;
use Mockery;
use Mockery\MockInterface;
use Tests\CreatesApplication;
use Tests\TestCase;

class ShowTodoTest extends TestCase
{

    use RefreshDatabase;

    protected $todoRepository;

    public function test_show_or_get_todo_by_id()
    {

        $this->withCookie('name', 'Mahesa');

        $todo = Todo::factory()->create();

        $this->mock(EloquentTodoRepository::class, function (MockInterface $mock) use ($todo) {
            $mock
                ->shouldReceive('getTodoById')
                ->with(Mockery::on(function ($argument) use ($todo) {

                return $argument;
            }));
        });



        app(TodoController::class)->show($todo->id);
    }
}
