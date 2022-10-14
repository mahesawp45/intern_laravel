<?php

namespace App\Repositories;

interface TodoRepository {
    public function getAllTodos();

    public function getTodoById($todoId);

    public function createTodo($newTodo);

    public function updateTodo($newTodo, $todoId);

    public function getAllDeletedTodo();

    public function deleteTodo($todoId);

    public function restoreTodo($todoId);

    public function deleteTodoForever($todoId);
}
