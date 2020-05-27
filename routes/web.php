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

<<<<<<< HEAD
Route::resource('industrialEstate','IndustrialEstateController');
// Route::resource('subb','SubbsController');
=======
>>>>>>> e75085f54ea9a8c91e8e540e694d28604b62c3b4

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

<<<<<<< HEAD
=======
Route::resource('industrialEstate','IndustrialEstateController');
>>>>>>> e75085f54ea9a8c91e8e540e694d28604b62c3b4
