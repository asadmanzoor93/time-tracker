<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/todoItems', 'TeamController@listTodoItems')->name('listTodoItems');
Route::get('/todoItem/{id}', 'TeamController@getTodoItem')->name('getTodoItem');
Route::post('/todoItem', 'TeamController@todoItem')->name('todoItem');
Route::get('/todoItem/delete/{id}', 'TeamController@deleteTodo')->name('deleteTodo');