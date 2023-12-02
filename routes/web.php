<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TodoController;


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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/mytodo', 'App\Http\Controllers\TodoController@mytodo')->name('mytodo');

Route::get('/create', function () {
    return view('create');
});

Route::get('/create', 'App\Http\Controllers\TodoController@create')->name('create');


Route::post('/create', 'App\Http\Controllers\TodoController@store')->name('store');

Route::get('/detail', function () {
    return view('detail');
});

Route::get('/detail/{id}', 'App\Http\Controllers\TodoController@detail')->name('detail');


Route::get('/edit', function () {
    return view('edit');
});

Route::get('/edit/{id}', 'App\Http\Controllers\TodoController@edit')->name('edit');

Route::get('/todo/{id}/edit', 'App\Http\Controllers\TodoController@edit')->name('edit');
Route::post('/todo/{id}/update', 'App\Http\Controllers\TodoController@update')->name('todo.update');



Route::get('/share', function () {
    return view('share');
});

Route::get('/share', 'App\Http\Controllers\TodoController@share')->name('share');


