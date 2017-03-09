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

Auth::routes();

Route::get('/home','KanbanController@index');
Route::post('/addKanban','KanbanController@addKanban');


Route::get('/kanban/{id}', 'KanbanController@kanban');
Route::post('/kanban/{id}/add','TaskController@addTask');
Route::post('/addUserToKanban','TaskController@addUserToKanban');

