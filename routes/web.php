<?php

use App\Http\Controllers\TodoController;
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



Route::controller(TodoController::class)->group( function () {
    Route::get('/', 'index')->name('index');
    Route::get('/recycle-bin', 'recycleBin')->name('recycle_bin');

    Route::name('todo.')->group( function () {
        Route::put('/delete-todo/{todo}', 'deleteTodo')->name('delete_todo');
        Route::put('/restore-todo/{todo}', 'restoreTodo')->name('restore_todo');
    });

});

Route::resource('todo', TodoController::class);
