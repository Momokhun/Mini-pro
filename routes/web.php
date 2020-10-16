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

Route::resource('/todo', 'App\Http\Controllers\TodoController');
Route::put('/todos/{todo}/complete', 'App\Http\Controllers\TodoController@complete')->name('todo.complete');
Route::delete('/todos/{todo}/incomplete', 'App\Http\Controllers\TodoController@incomplete')->name('todo.incomplete');


Route::get('/', 'App\Http\Controllers\TodoController@index');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



