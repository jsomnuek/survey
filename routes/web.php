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

Route::get('/equipmentLab', function () {
    return view('equipmentLab');
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

Route::resource('testingCalibratingType', 'TestingCalibratingTypeController');

Route::resource('businessType','BusinessTypeController');

Route::resource('industrialType','IndustrialTypeController');

Route::resource('organisationType','OrganisationTypeController');

Route::resource('laboratoryType','LaboratoryTypeController');

Route::resource('certifyLaboratory','CertifyLaboratoryController');

Route::resource('majorTechnology','MajorTechnologyController');

Route::resource('objectiveUsage','ObjectiveUsageController');

Route::get('/changwats', 'Api\ProvinceInfosController@changwats')->name('changwats');
Route::post('/amphoes', 'Api\ProvinceInfosController@amphoes')->name('amphoes.post');
Route::post('/tambons', 'Api\ProvinceInfosController@tambons')->name('tambons.post');