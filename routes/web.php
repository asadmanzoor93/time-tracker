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

/***
 * Team Routes
 */
Route::get('/teams', 'TeamController@index')->name('teamsIndex');
Route::get('/team/create', 'TeamController@create')->name('createTeam');
Route::post('/team/save', 'TeamController@store')->name('saveTeam');
Route::get('/team/edit/{id}', 'TeamController@edit')->name('editTeam');
Route::post('/team/update', 'TeamController@update')->name('updateTeam');
Route::get('/team/delete/{id}', 'TeamController@destroy')->name('deleteTeam');

/***
 * User Routes
 */
Route::get('/users', 'UserController@index')->name('usersIndex');
Route::get('/user/create', 'UserController@create')->name('createUser');
Route::post('/user/save', 'UserController@store')->name('saveUser');
Route::get('/user/edit/{id}', 'UserController@edit')->name('editUser');
Route::post('/user/update', 'UserController@update')->name('updateUser');
Route::get('/user/delete/{id}', 'UserController@destroy')->name('deleteUser');

/***
 * TimeLog Routes
 */
Route::get('/timelogs', 'TimeLogController@index')->name('timelogsIndex');
Route::get('/timelog/create', 'TimeLogController@create')->name('createTimeLog');
Route::post('/timelog/save', 'TimeLogController@store')->name('saveTimeLog');
Route::get('/timelog/edit/{id}', 'TimeLogController@edit')->name('editTimeLog');
Route::post('/timelog/update', 'TimeLogController@update')->name('updateTimeLog');
Route::get('/timelog/delete/{id}', 'TimeLogController@destroy')->name('deleteTimeLog');
Route::get('/fetch_timelogs', 'TimeLogController@fetchTimeLogsAjax')->name('fetchTimeLogsAjax');