<?php


namespace App\Repositories;
use App\Models\Todo;
use App\Repositories\TodoRepository;

class EloquentTodoRepository implements TodoRepository {

    public function getAllTodos(){
         return Todo::where('isDeleted', 0)->latest()->get();
    }

    public function getTodoById($todoId){
        return Todo::findOrFail($todoId);
    }

    public function createTodo($newTodo){
        Todo::create($newTodo);
    }

    public function updateTodo($updatedTodo, $todoId){
        Todo::where('id', $todoId)->update($updatedTodo);
    }


    public function getAllDeletedTodo() {
        return Todo::where('isDeleted', 1)->latest()->get();
    }

    public function deleteTodo($todoId){
        Todo::where('id', $todoId)->update(['isDeleted' => 1]);
    }

    public function restoreTodo($todoId) {
        Todo::where('id', $todoId)->update(['isDeleted' => 0]);
    }

    public function deleteTodoForever($todoId){
        Todo::destroy($todoId);
    }
}
