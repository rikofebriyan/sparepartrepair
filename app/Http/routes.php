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


Route::auth();

Route::get('/', function () {
    return view('/Auth/login');
});

Route::get('/home', 'HomeController@index');
Route::get('/partrepair', 'PartrepairController@index');
Route::get('/partrepair/request', 'PartrepairController@request');
Route::resource('tasks', 'TaskController');
Route::resource('partrepair/waitingtable', 'WaitingrepairController');
Route::resource('partrepair/progresstable', 'ProgressrepairController');
Route::resource('partrepair/progresspemakaian', 'ProgresspemakaianController');
Route::resource('partrepair/progresstrial', 'ProgresstrialController');
Route::resource('partrepair/finishrepair', 'FinishrepairController');
Route::resource('matrix/section', 'SectionController');
Route::resource('matrix/line', 'LineController');
Route::resource('matrix/machine', 'MachineController');
Route::resource('matrix/maker', 'MakerController');
Route::resource('matrix/master_spare_part', 'MastersparepartController');
Route::resource('matrix/standard_pengecekan', 'StandardpengecekanController');
Route::resource('matrix/repair_kit', 'RepairkitController');
Route::resource('matrix/subcont', 'SubcontController');
Route::resource('matrix/item_standard', 'ItemstandardController');
Route::resource('matrix/code_part_repair', 'CodepartrepairController');
Route::resource('matrix/category_code', 'CategorycodeController');
Route::resource('matrix/user', 'UserController');

Route::get('/ajax', 'InfoController@index');
Route::get('/getline', 'InfoController@getline');
Route::get('/getmachine', 'InfoController@getmachine');