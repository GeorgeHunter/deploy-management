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

Auth::routes();

Route::get('/', 'OverviewController@index')->name('overview')->middleware('auth');
Route::get('/overview', 'OverviewController@index')->name('overview')->middleware('auth');

Route::get('/repositories', 'RepositoriesController@index');
Route::get('/repositories/add', 'RepositoriesController@create');
Route::post('/repositories', 'RepositoriesController@store');
Route::get('/repositories/{repository}', 'RepositoriesController@show');

Route::get('/gen', 'TargetsController@generateWPConfig');

Route::get('/repositories/{repository}/targets/create', 'TargetsController@create');
Route::post('/repositories/{repository}/targets/store', 'TargetsController@store');
