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

Route::get('/', [
	'uses' => 'ListController@getIndex',
	'as' => 'list.index'
]);
Route::post('/add', [
	'uses' => 'ListController@postAdd',
	'as' => 'list.add'
]);
Route::get('/edit/{id}{action}', [
	'uses' => 'ListController@getEdit',
	'as' => 'list.edit'
]);
Route::get('/edittask/', [
	'uses' => 'ListController@getEditTask',
	'as' => 'list.edittask'
]);
