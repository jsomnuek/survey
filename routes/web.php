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
    return view('index');
});

Route::get('/subb', function () {
    return view('subb');
});

// Route::get('/lab', function () {
//     return view('lab');
// });



Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Route::resource('industrialEstate','IndustrialEstateController');

Route::resource('equipment','EquipmentController');

Route::resource('lab','LabsController');

Route::resource('organize','OrganizeController');

Route::resource('technicalEquipment', 'TechnicalEquipmentController');

Route::resource('productType', 'ProductTypeController');
