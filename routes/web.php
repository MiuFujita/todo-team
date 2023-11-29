<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/mytodo', function () {
    return view('mytodo');
});

Route::get('/create', function () {
    return view('create');
});

Route::get('/detail', function () {
    return view('detail');
});

Route::get('/edit', function () {
    return view('edit');
});

Route::get('/share', function () {
    return view('share');
});
