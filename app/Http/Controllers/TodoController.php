<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Repositories\EloquentTodoRepository;

class TodoController extends Controller
{
    protected $todoRepository;

    public function __construct(EloquentTodoRepository $eloquentTodoRepository)
    {
        $this->todoRepository = $eloquentTodoRepository;
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


        return view('index', compact('title', 'todos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create Todo';


        return view('create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TodoRequest $todoRequest)
    {
            // data di validasi di TodoRequest
            $validatedData = $todoRequest->validated();

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

        return view('show', compact('todo', 'title'));
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

        return view('edit', compact('title', 'todo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TodoRequest $todoRequest, $id)
    {

            $validatedData = $todoRequest->validated();

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
        try {
            $this->todoRepository->deleteTodoForever($id);
            return redirect(route('recycle_bin'))->with('success', 'Todo has been deleted!');
        } catch (\Throwable $th) {
            return back()->with('errorMessage', 'Something went wrong!');
        }


    }

    public function deleteTodo($id)
    {
        try {
            $this->todoRepository->deleteTodo($id);
            return redirect(route('index'))->with('success', 'Todo has been moved to the bin!');
        } catch (\Throwable $th) {
            return back()->with('errorMessage', 'Something went wrong!');
        }

    }

    public function restoreTodo($id) {

        try {
            $this->todoRepository->restoreTodo($id);
            return redirect(route('recycle_bin'))->with('success', 'Todo has been restored!');
        } catch (\Throwable $th) {
            return back()->with('errorMessage', 'Something went wrong!');
        }

    }

    public function recycleBin() {
        $title = 'Recycle Bin';

        return view('recycle-bin', compact('title'));
    }

}
