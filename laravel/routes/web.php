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

Route::get('/', 'HomeController@index')->name('home');

Route::post('/check_name', 'HomeController@ajaxCheckName');

Route::post('/submit_name', 'HomeController@submit')->name('submit_name');

Route::get('/file/{file}', 'FilesController@load')->name('load');

Route::get('/file/{name}/create', 'FilesController@create')->name('create');

Route::post('/file/submit_create', 'FilesController@submitCreate')->name('submit_create');

Route::get('/file/{file}/raw', 'FilesController@raw')->name('raw');

Route::get('/file/{file}/edit', 'FilesController@edit')->middleware('password')->name('edit');

Route::get('/file/{file}/delete', 'FilesController@delete')->name('delete');

Route::post('/file/update_text', 'FilesController@ajaxUpdateText');

Route::post('/file/change_password', 'FilesController@changePassword')->name('change_password');

Route::post('/file/check_password', 'FilesController@checkPassword')->name('check_password');
