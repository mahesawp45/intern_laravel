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


    // public function __construct()
    // {
        //  $this->todoRepository = $this->mock(TodoRepository::class, function (MockInterface $mock) {
        //     $mock->shouldReceive('getTodoById');
        //  });
        //  $this->todoRepository = new EloquentTodoRepository();
    // }


    // public function setRepo(TodoRepository $todoRepository) {
    //     $this->todoRepository = $todoRepository;
    // }

    // public function test_show_or_get_todo_by_id()
    // {

    //     $this->withExceptionHandling();

    //     // $todoModel = $this->createMock(Todo::class);
    //     // $todoRepository = $this->createMock(TodoRepository::class);
    //     // $eloquentTodo = $this->createMock(EloquentTodoRepository::class);

    //     // $todoCont = new TodoController($todoRepository);
    //     // $todoCont = new EloquentTodoRepository();

    //     // $todo = $todoCont->getTodoById(1);
    //     // $todoCont->show(1);

    //     $response = $this->get(route('todo.show', ['todo' => 1]));
    //     $response->assertStatus(200);

    // }
    public function test_show_or_get_todo_by_id()
    {

        $this->withExceptionHandling();

        $todo = Todo::factory()->create();

        $this->mock(EloquentTodoRepository::class, function (MockInterface $mock) use ($todo) {
            $mock
                ->shouldReceive('getTodoById')
                ->with(Mockery::on(function ($argument) use ($todo) {

                // var_dump($argument);
                // exit();
                // return $argument->is($todo->id);
                return $argument;
            }));
        });



        app(TodoController::class)->show($todo->id);
    }
}
