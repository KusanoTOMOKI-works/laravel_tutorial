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

// Route::get('/folders/{id}/tasks', 'TaskController@index')->name('tasks.index');
//
// Route::get('/folders/create','FolderController@showCreateForm')->name('folders.create');
// Route::post('/folders/create','FolderController@create');
//
// Route::get('/folders/{id}/tasks/create','TaskController@showCreateForm')->name('tasks.create');
// Route::post('/folders/{id}/tasks/create','TaskController@create');
//
//
// Route::get('folders/{id}/tasks/{task_id}/edit', 'TaskController@showEditForm')->name('tasks.edit');
// Route::post('folders/{id}/tasks/{task_id}/edit', 'TaskController@edit');
//
// Route::get('/','HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/', 'HomeController@index')->name('home');

    Route::get('/folders/{id}/tasks', 'TaskController@index')->name('tasks.index');

    Route::get('/folders/create', 'FolderController@showCreateForm')->name('folders.create');
    Route::post('/folders/create', 'FolderController@create');

    Route::get('/folders/{id}/tasks/create', 'TaskController@showCreateForm')->name('tasks.create');
    Route::post('/folders/{id}/tasks/create', 'TaskController@create');

    Route::get('/folders/{id}/tasks/{task_id}/edit', 'TaskController@showEditForm')->name('tasks.edit');
    Route::post('/folders/{id}/tasks/{task_id}/edit', 'TaskController@edit');

    // 詳細確認画面への遷移
    Route::get('folders/{id}/tasks/{task_id}/detail','TaskController@showDetail')->name('tasks.detail');

    // 削除機能
    Route::get('/folders/{id}/tasks/{task_id}/delete','TaskController@delete')->name('tasks.delete');

    // Route::get('folders/{id}/tasks/search','TaskController@search')->name('tasks.search');

});

Auth::routes();
