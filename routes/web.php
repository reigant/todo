<?php

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

use App\Repositories\Interfaces\TodoRepositoryInterface;
use App\Model\Todo;

Route::get('/', function () {
    return view('welcome');
});

/*
 * See why i use except below
 *
*/
Route::resource('todo', 'TodoController')->except('show', 'edit');
Route::get('todo/create/{date}', 'TodoController@create')->name('todo.createByDate');

/*
 * Note NOT BEST PRACTICE
 * Just to show that you can do like this
 *
*/
Route::get('todo/{date}', function($date, TodoRepositoryInterface $todoRepo) {
    $todos = $todoRepo->getAllByDate($date);
    if (!$todos) {
        abort(404);
    }
    return view('todo.list', compact('todos', 'date'));
})->name('todo.showByDate');

Route::get('todo/{id}/edit', function($id, TodoRepositoryInterface $todoRepo) {
    $todo = $todoRepo->getById($id);
    if (!$todo) {
        abort(404);
    }
    return view('todo.edit', compact('todo'));
})->name('todo.edit');

Route::delete('todo/{date}/delete', function($date, TodoRepositoryInterface $todoRepo) {
    $todos = $todoRepo->getAllByDate($date);
    if (!$todos) {
        abort(404);
    }
    $todoRepo->deleteByDate($date);
    return redirect()->route('todo.index')
        ->with('success', 'Todo Deleted Successfully');
})->name('todo.destroyByDate');
