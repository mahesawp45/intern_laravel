<?php


namespace App\Repositories;
use App\Models\Todo;
use App\Repositories\TodoRepositoriesInterface;

class TodoRepositories implements TodoRepositoriesInterface {

    public function getAllTodos(){
         return Todo::where('isDeleted', 0)->get();
    }

    public function getTodoById($todoId){
        return Todo::find($todoId);
    }

    public function createTodo($newTodo){
        Todo::create($newTodo);
    }

    public function updateTodo($updatedTodo, $todoId){
        Todo::where('id', $todoId)->update($updatedTodo);
    }


    public function getAllDeletedTodo() {
        return Todo::where('isDeleted', 1)->get();
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
