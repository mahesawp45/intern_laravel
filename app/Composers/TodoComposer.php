<?php

namespace App\Composers;

use App\Repositories\TodoRepositories;
use Illuminate\View\View;

class TodoComposer {

    protected $todoRepositories;

    public function __construct(TodoRepositories $todoRepositories)
    {
        $this->todoRepositories = $todoRepositories;
    }


    public function compose(View $view) {
        $view->with('deletedTodo', $this->todoRepositories->getAllDeletedTodo() );
    }


}
