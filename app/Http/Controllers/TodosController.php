<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\TodoRepositories;

class TodosController extends Controller
{
    protected $todoRepository;

    public function __construct(TodoRepositories $todoRepositories)
    {
        $this->todoRepository = $todoRepositories;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'My Todo List';

        $todos = $this->todoRepository->getAllTodos();
        $deletedTodo = $this->todoRepository->getAllDeletedTodo();

        return view('index', compact('title', 'todos', 'deletedTodo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create Todo';
        $deletedTodo = $this->todoRepository->getAllDeletedTodo();

        return view('create', compact('title', 'deletedTodo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $errorMessage = [
            'title.max' => 'Title max 255 characters',
            'content.max' => 'Content max 1000 characters'
        ];

        $validatedData = $request->validate([
            'title' => 'max:255',
            'content' => 'max:1000',
        ], $errorMessage);

            $this->todoRepository->createTodo($validatedData);
            return redirect(route('todo.index'))->with('success', 'New Todo has been created!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $todo = $this->todoRepository->getTodoById($id);

        $title = $todo->title;
        $deletedTodo = $this->todoRepository->getAllDeletedTodo();

        return view('show', compact('todo', 'title', 'deletedTodo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo = $this->todoRepository->getTodoById($id);
        $title = $todo->title;
        $deletedTodo = $this->todoRepository->getAllDeletedTodo();

        return view('edit', compact('title', 'todo', 'deletedTodo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $errorMessage = [
            'title.max' => 'Title max 255 characters',
            'content.max' => 'Content max 1000 characters'
        ];

        $validatedData = $request->validate([
            'title' => 'max:255',
            'content' => 'max:1000',
        ], $errorMessage);

        $this->todoRepository->updateTodo($validatedData, $id);
        return redirect(route('todo.index'))->with('success', 'Todo has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $this->todoRepository->deleteTodoForever($id);
       return redirect(route('recycle_bin'))->with('success', 'Todo has been deleted!');
    }

    public function deleteTodo($id)
    {
        $this->todoRepository->deleteTodo($id);

        return redirect(route('index'))->with('success','Todo has been moved to the bin!');
    }

    public function restoreTodo($id) {
        $this->todoRepository->restoreTodo($id);
        return redirect(route('recycle_bin'))->with('success', 'Todo has been restored!');
    }

    public function recycleBin() {
        $title = 'Recycle Bin';

        $deletedTodo = $this->todoRepository->getAllDeletedTodo();

        return view('recycle-bin', compact('title', 'deletedTodo'));
    }

}
