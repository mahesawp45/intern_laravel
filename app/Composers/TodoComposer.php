<?php

namespace App\Composers;

use App\Repositories\EloquentTodoRepository;
use Illuminate\View\View;

class TodoComposer {

    protected $EloquentTodoRepository;

    public function __construct(EloquentTodoRepository $EloquentTodoRepository)
    {
        $this->EloquentTodoRepository = $EloquentTodoRepository;
    }


    public function compose(View $view) {
        $view->with('deletedTodo', $this->EloquentTodoRepository->getAllDeletedTodo() );
    }


}
