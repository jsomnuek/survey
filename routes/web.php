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

// Route::get('/org', function () {
//     return view('employee.organize.create');
// });


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dashboard', 'HomeController@admin')->name('dashboard');

// Route For Admin //
    // information Organization
Route::resource('/labLocation','BasicInformations\LabLocationController');
Route::resource('/industrialEstate','BasicInformations\IndustrialEstateController');
Route::resource('/organisationType','BasicInformations\OrganisationTypeController');
Route::resource('/businessType','BasicInformations\BusinessTypeController');
Route::resource('/saleProduct','BasicInformations\SaleProductController');
Route::resource('/industrialType','BasicInformations\IndustrialTypeController');

    // information Laboratory
Route::resource('/laboratoryType','BasicInformations\LaboratoryTypeController');
Route::resource('/areaService','BasicInformations\AreaServiceController');
Route::resource('/fixedCost','BasicInformations\FixedCostController');
Route::resource('/incomePerYear','BasicInformations\IncomePerYearController');
Route::resource('/employeeTraining','BasicInformations\EmployeeTrainingController');
Route::resource('/environmentManage','BasicInformations\EnvironmentManageController');

    // information Equipment
Route::resource('/equipment','BasicInformations\EquipmentController');
Route::resource('/majorTechnology','BasicInformations\MajorTechnologyController');
Route::resource('/technicalEquipment', 'BasicInformations\TechnicalEquipmentController');
Route::resource('/objectiveUsage','BasicInformations\ObjectiveUsageController');
Route::resource('/equipmentUsage','BasicInformations\EquipmentUsageController');
Route::resource('/equipmentCalibration','BasicInformations\EquipmentCalibrationController');
Route::resource('/equipmentMaintenance','BasicInformations\EquipmentMaintenanceController');
Route::resource('/equipmentManual','BasicInformations\EquipmentManualController');
Route::resource('/equipmentRent','BasicInformations\EquipmentRentController');

    // information Product
Route::resource('/productType', 'BasicInformations\ProductTypeController');
Route::resource('/testingCalibratingList','BasicInformations\TestingCalibratingListController');
Route::resource('/testingCalibratingType', 'BasicInformations\TestingCalibratingTypeController');
Route::resource('/testingCalibratingMethod','BasicInformations\TestingCalibratingMethodController');
Route::resource('/resultControl','BasicInformations\ResultControlController');
Route::resource('/proficiencyTesting','BasicInformations\ProficiencyTestingController');
Route::resource('/certifyLaboratory','BasicInformations\CertifyLaboratoryController');

// country
Route::resource('/country', 'BasicInformations\CountryController');
Route::get('/changwats', 'Api\ProvinceInfoController@changwats');
Route::get('/amphoes/{id}', 'Api\ProvinceInfoController@amphoes');
Route::get('/tambons/{id}', 'Api\ProvinceInfoController@tambons');


// Route For Employee
Route::resource('/organization', 'Employee\OrganizationController');
Route::resource('/lab', 'Employee\LabController');
Route::resource('/equipmentLab','Employee\EquipmentLabController');
Route::resource('/productLab','Employee\ProductLabController');



// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
