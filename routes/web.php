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


Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Route::resource('industrialEstate','IndustrialEstateController');

Route::resource('equipment','EquipmentController');

<<<<<<< HEAD
<<<<<<< HEAD
Route::resource('technicalEquipment','TechnicalEquipmentController');
=======
Route::resource('productType','ProductTypeController');
>>>>>>> 52cdcedc4f8bc1dce816de61304df00d86b9f95f
=======
Route::resource('productType','ProductTypeController');
>>>>>>> a650407554fae2f3a5ad863b3657a854f7344270
