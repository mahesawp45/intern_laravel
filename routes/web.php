<?php

use App\Http\Controllers\TodoController;
use App\Http\Controllers\TodosController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::controller(TodosController::class)->group( function () {
    Route::get('/', 'index')->name('index');
    Route::put('todo/delete-todo/{id}', 'deleteTodo')->name('delete_todo');
    Route::get('/recycle-bin', 'recycleBin')->name('recycle_bin');
    Route::put('todo/restore-todo/{id}', 'restoreTodo')->name('restore_todo');

});

Route::resource('todo', TodosController::class);
