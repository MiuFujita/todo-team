<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\AddController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/mytodo', 'App\Http\Controllers\TodoController@mytodo');
// // Route::get('/create', function () {
// //     return view('create');
// // });

// Route::get('/create', 'App\Http\Controllers\TodoController@create')->name('create');


// Route::post('/create', 'App\Http\Controllers\TodoController@store')->name('store');

// Route::post('/share', 'App\Http\Controllers\TodoController@store')->name('share');

// Route::post('/mytodo', 'App\Http\Controllers\TodoController@store')->name('mytodo');

// // Route::get('/share/{todoId}', 'App\Http\Controllers\TodoController@share')->name('share');

// // Route::get('/mytodo/{todoId}', 'App\Http\Controllers\TodoController@mytodo')->name('mytodo');

// Route::get('/detail/{id}', 'App\Http\Controllers\TodoController@detail')->name('detail');

// Route::get('/share', 'App\Http\Controllers\TodoController@share')->name('share');

// Route::get('/edit/{id}', 'App\Http\Controllers\TodoController@edit')->name('edit');

// Route::get('/todo/{id}/edit', 'App\Http\Controllers\TodoController@edit')->name('edit');

// Route::post('/todo/{id}/update', 'App\Http\Controllers\TodoController@update')->name('todo.update');


// Route::delete('/todo/delete/{id}', 'App\Http\Controllers\TodoController@delete')->name('todo.delete');



// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route::get('/detail', function () {
//     return view('detail');
// });


// Route::get('/edit', function () {
//     return view('edit');
// });

// // routes/web.php

// Route::delete('/todo/remove/{todo_id}', 'App\Http\Controllers\AddController@destroy')->name('todo.remove');

// Route::get('/todo/detail/{id}', 'App\Http\Controllers\TodoController@detail')->name('todo.detail');

// Route::get('/todo/add/{todo_id}', 'App\Http\Controllers\AddController@store')->name('todo.add');
// Route::delete('/todo/add/{todo_id}', 'App\Http\Controllers\AddController@destroy')->name('todo.remove');

// Route::delete('/add/{todo_id}', 'App\Http\Controllers\AddController@destroy')->name('add.destroy');
// Route::post('/todo/add/{todo_id}', 'App\Http\Controllers\AddController@store')->name('todo.add.post');


// // 既存のルートはそのままで追加
// Route::delete('/todo/destroy/{id}', 'App\Http\Controllers\TodoController@destroy')->name('todo.destroy');
// Route::get('/todos/{todo_id}/adds', 'App\Http\Controllers\AddController@store')->name('todo.add');
// Route::delete('/todos/destroy/{id}', 'App\Http\Controllers\AddController@destroy')->name('add.destroy');

// Route::get('/mytodo','App\Http\Controllers\AddController@mytodo');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Todo 関連のルート
Route::get('/mytodo', 'App\Http\Controllers\TodoController@mytodo')->name('mytodo');
Route::get('/create', 'App\Http\Controllers\TodoController@create')->name('create');
Route::post('/create', 'App\Http\Controllers\TodoController@store')->name('store');
Route::get('/share', 'App\Http\Controllers\TodoController@share')->name('share');
Route::get('/detail/{id}', 'App\Http\Controllers\TodoController@detail')->name('detail');
// Route::get('/todo/detail/{id}', 'App\Http\Controllers\TodoController@delete')->name('todo.delete');
Route::get('/edit/{id}', 'App\Http\Controllers\TodoController@edit')->name('edit');
Route::post('/todo/{id}/update', 'App\Http\Controllers\TodoController@update')->name('todo.update');
Route::delete('/todo/delete/{id}', 'App\Http\Controllers\TodoController@delete')->name('todo.delete');

// mytodoとshareのチェックボックス系
Route::delete('/todo/destroy/{id}', 'App\Http\Controllers\TodoController@destroy')->name('todo.destroy');


// Add 関連のルート
Route::post('/todos/{todo_id}/adds', 'App\Http\Controllers\AddController@store')->name('todo.add');
Route::get('/todos/{todo_id}/adds', 'App\Http\Controllers\AddController@store')->name('todo.add');
Route::delete('/add/delete/{id}', 'App\Http\Controllers\AddController@delete')->name('add.delete');
Route::delete('/todo/remove/{todo_id}', 'App\Http\Controllers\AddController@delete')->name('todo.remove');
// Route::delete('/add/destroy/{todo_id}', 'App\Http\Controllers\AddController@delete')->name('todo.remove');

// 不要なルートを削除
Route::delete('/add/{todo_id}', 'App\Http\Controllers\AddController@destroy')->name('add.destroy');

