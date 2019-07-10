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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tasks', 'TaskController@index')->name('task.index');
Route::get('/tasks/{id}', 'TaskController@show')->where('id', '[0-9]+')->name('task.show');
Route::put('/tasks/{id}', 'TaskController@update')->where('id', '[0-9]+')->name('task.update');
