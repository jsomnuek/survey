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

Route::get('/org', function () {
    return view('employee.organize');
});


Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Route::resource('/industrialEstate','BasicInformations\IndustrialEstateController');

Route::resource('equipment','EquipmentController');


// Route::get('/lab', 'LabsController@index');
// Route::post('/lab', 'LabsController@store');
// Route::get('/lab/create', 'LabsController@create');

Route::resource('organize','OrganizeController');

Route::resource('technicalEquipment', 'TechnicalEquipmentController');

Route::resource('productType', 'ProductTypeController');

Route::resource('testingCalibratingType', 'TestingCalibratingTypeController');

Route::resource('/businessType','BasicInformations\BusinessTypeController');

Route::resource('industrialType','IndustrialTypeController');

Route::resource('organisationType','OrganisationTypeController');

Route::resource('laboratoryType','LaboratoryTypeController');

Route::resource('certifyLaboratory','CertifyLaboratoryController');

Route::resource('majorTechnology','MajorTechnologyController');

Route::resource('objectiveUsage','ObjectiveUsageController');

Route::get('/changwats', 'Api\ProvinceInfosController@changwats')->name('changwats');
Route::post('/amphoes', 'Api\ProvinceInfosController@amphoes')->name('amphoes.post');
Route::post('/tambons', 'Api\ProvinceInfosController@tambons')->name('tambons.post');

Route::resource('/organization', 'Employee\OrganizationController');

Route::resource('/lab', 'Employee\LabController');

Route::resource('/equipmentLab','Employee\EquipmentLabController');

Route::resource('/productLab','Employee\ProductLabController');