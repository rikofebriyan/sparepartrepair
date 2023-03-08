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

// login routes
Route::get('/login', 'LoginController@login')->name('login')->middleware('guest');
Route::post('/submit-login', 'LoginController@submitLogin')->name('submit-login')->middleware('guest');
Route::get('/logout', 'LoginController@logout')->name('logout')->middleware('auth');
Route::get('/register', 'LoginController@register')->name('register')->middleware('guest');
Route::post('/submit-register', 'LoginController@submitRegister')->name('submit-register')->middleware('guest');

// Route::auth();

Route::group(['middleware' => ['auth', 'ADMIN']], function () {
    Route::resource('matrix/user', 'UserController');
});


Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/partrepair', 'PartrepairController@index')->name('partrepair');
    Route::get('/partrepair/request', 'PartrepairController@request')->name('request');
    Route::get('/partrepair/ganttchart', 'GanttchartController@index')->name('ganttchart');
    Route::get('/partrepair/deletedtable', 'WaitingrepairController@deleted')->name('deletedtable');
    Route::get('/partrepair/finishtable', 'WaitingrepairController@finish')->name('finishtable');

    Route::get('/partrepair/waitingtable', 'WaitingrepairController@index')->name('partrepair.waitingtable.index');
    Route::get('/partrepair/registeredticket', 'RegisteredTicketController@index')->name('partrepair.registeredticket.index');
    Route::get('/partrepair/waitingtable/{id}', 'WaitingrepairController@waitingRepairForm1')->name('partrepair.waitingtable.show');
    Route::get('/partrepair/waitingtable/form2/{id}', 'WaitingrepairController@waitingRepairForm2')->name('partrepair.waitingtable.show.form2');
    Route::get('/partrepair/waitingtable/form3/{id}', 'WaitingrepairController@waitingRepairForm3')->name('partrepair.waitingtable.show.form3');
    Route::get('/partrepair/waitingtable/form4/{id}', 'WaitingrepairController@waitingRepairForm4')->name('partrepair.waitingtable.show.form4');
    Route::get('/partrepair/waitingtable/form5/{id}', 'WaitingrepairController@waitingRepairForm5')->name('partrepair.waitingtable.show.form5');
    Route::delete('/partrepair/waitingtable/{id}', 'WaitingrepairController@destroy')->name('partrepair.waitingtable.destroy');
    Route::post('/partrepair/waitingtable', 'WaitingrepairController@store')->name('partrepair.waitingtable.store');
    Route::put('/partrepair/progresstable/revision/{id}', 'ProgressrepairController@revision')->name('partrepair.progress.revision');
    Route::put('/partrepair/progresstable/delay/{id}', 'ProgressrepairController@delay')->name('partrepair.progress.delay');


    Route::resource('partrepair/progresstable', 'ProgressrepairController');
    Route::resource('partrepair/progresspemakaian', 'ProgresspemakaianController');
    Route::resource('partrepair/progresstrial', 'ProgresstrialController');
    Route::resource('partrepair/finishrepair', 'FinishrepairController');
    Route::resource('partrepair/stockout', 'StockoutController');
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
    Route::resource('Auth/profile', 'ProfileController');
    Route::resource('partrepair/waitingapprove', 'WaitingApprovalController');

    Route::get('/ajax', 'InfoController@index')->name('ajax');
    Route::get('/getline', 'InfoController@getline')->name('get-line');
    Route::get('/getmachine', 'InfoController@getmachine')->name('get-machine');
    Route::get('/getlabour', 'InfoController@getlabour')->name('get-labour');
    Route::get('/get-number-of-repair', 'InfoController@getNumberOfRepair')->name('get-number-of-repair');
    Route::get('/getMaker', 'InfoController@getMaker')->name('get-maker');
    Route::get('/getTypeOfPart', 'InfoController@getTypeOfPart')->name('get-type-of-part');
    Route::get('/getSubcont', 'InfoController@getSubcont')->name('get-subcont');
    Route::get('/getcategory', 'InfoController@getcategory')->name('get-category');
    Route::get('/report', 'HomeController@reportHome')->name('report');
    Route::get('/partrepair/masterdelete', 'InfoController@masterdelete')->name('part-repair-master-delete');
    Route::get('/getmaster', 'InfoController@getmaster')->name('get-master');
    Route::get('/mymodel', 'InfoController@mymodel')->name('mymodel');
    Route::get('/mymodelrevision', 'InfoController@mymodelrevision')->name('mymodelrevision');
    Route::patch('/updatemodel/{id}', 'InfoController@updatemodel');
    Route::post('/export', 'ExportController@export')->name('export');
});

// Route::get('/write-email', 'OutlookController@writeEmail');

// Route::get('/send-email', 'EmailController@sendEmail');