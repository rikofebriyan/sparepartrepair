<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('/auth/login');
});

Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/partrepair', 'PartrepairController@index');
Route::get('/partrepair/request', 'PartrepairController@request');
Route::resource('partrepair/waitingtable', 'WaitingrepairController');
Route::resource('partrepair/progresstable', 'ProgressrepairController');
Route::resource('partrepair/progresspemakaian', 'ProgresspemakaianController');
Route::resource('tasks', 'TaskController');