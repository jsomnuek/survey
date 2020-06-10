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

Route::resource('/technicalEquipment', 'BasicInformations\TechnicalEquipmentController');

Route::resource('/productType', 'BasicInformations\ProductTypeController');

Route::resource('/testingCalibratingType', 'BasicInformations\TestingCalibratingTypeController');

Route::resource('/businessType','BasicInformations\BusinessTypeController');

Route::resource('/industrialType','BasicInformations\IndustrialTypeController');

Route::resource('/organisationType','BasicInformations\OrganisationTypeController');

Route::resource('/laboratoryType','BasicInformations\LaboratoryTypeController');

Route::resource('/certifyLaboratory','BasicInformations\CertifyLaboratoryController');

Route::resource('/majorTechnology','BasicInformations\MajorTechnologyController');

Route::resource('/objectiveUsage','BasicInformations\ObjectiveUsageController');

Route::get('/changwats', 'Api\ProvinceInfoController@changwats');
Route::get('/amphoes/{id}', 'Api\ProvinceInfoController@amphoes');
Route::get('/tambons/{id}', 'Api\ProvinceInfoController@tambons');

Route::resource('/organization', 'Employee\OrganizationController');

Route::resource('/lab', 'Employee\LabController');

Route::resource('/equipmentLab','Employee\EquipmentLabController');

Route::resource('/productLab','Employee\ProductLabController');