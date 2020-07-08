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

Route::get('/changwats', 'Api\ProvinceInfoController@changwats');
Route::get('/amphoes/{id}', 'Api\ProvinceInfoController@amphoes');
Route::get('/tambons/{id}', 'Api\ProvinceInfoController@tambons');

Route::middleware(['checkRole:admin'])->group(function() {
    // Dashboard
    Route::get('/dashboard', 'HomeController@admin')->name('dashboard');

    // Basic Information
    Route::resource('/areaService','BasicInformations\AreaServiceController');
    Route::resource('/businessType','BasicInformations\BusinessTypeController');
    Route::resource('/certifyLaboratory','BasicInformations\CertifyLaboratoryController');
    Route::resource('/country', 'BasicInformations\CountryController');
    Route::resource('/educationLevel','BasicInformations\EducationLevelController');
    Route::resource('/employeeTraining','BasicInformations\EmployeeTrainingController');
    Route::resource('/environmentManage','BasicInformations\EnvironmentManageController');
    Route::resource('/equipmentCalibration','BasicInformations\EquipmentCalibrationController');
    Route::resource('/equipmentMaintenance','BasicInformations\EquipmentMaintenanceController');
    Route::resource('/equipmentManual','BasicInformations\EquipmentManualController');
    Route::resource('/equipmentRent','BasicInformations\EquipmentRentController');
    Route::resource('/equipmentUsage','BasicInformations\EquipmentUsageController');
    Route::resource('/fixedCost','BasicInformations\FixedCostController');
    Route::resource('/incomePerYear','BasicInformations\IncomePerYearController');
    Route::resource('/industrialEstate','BasicInformations\IndustrialEstateController');
    Route::resource('/industrialType','BasicInformations\IndustrialTypeController');
    Route::resource('/locationLab','BasicInformations\LocationLabController');
    Route::resource('/labDevelopment','BasicInformations\LabDevelopmentController');
    Route::resource('/laboratoryType','BasicInformations\LaboratoryTypeController');
    Route::resource('/majorTechnology','BasicInformations\MajorTechnologyController');
    Route::resource('/objectiveUsage','BasicInformations\ObjectiveUsageController');
    Route::resource('/organisationType','BasicInformations\OrganisationTypeController');
    Route::resource('/productType', 'BasicInformations\ProductTypeController');
    Route::resource('/proficiencyTesting','BasicInformations\ProficiencyTestingController');
    Route::resource('/qualitySystem','BasicInformations\QualitySystemController');
    Route::resource('/resultControl','BasicInformations\ResultControlController');
    Route::resource('/saleProduct','BasicInformations\SaleProductController');
    Route::resource('/scienceTool','BasicInformations\ScienceToolController');
    Route::resource('/technicalEquipment', 'BasicInformations\TechnicalEquipmentController');
    Route::resource('/testingCalibratingList','BasicInformations\TestingCalibratingListController');
    Route::resource('/testingCalibratingMethod','BasicInformations\TestingCalibratingMethodController');
    Route::resource('/testingCalibratingType', 'BasicInformations\TestingCalibratingTypeController');
    
    // Log Activities
    Route::get('logActivity','LogActivityController@index');
});

Route::middleware(['checkRole:admin,dssUser,surveyer'])->group(function(){
    Route::resource('/organization', 'Employee\OrganizationController');
    Route::resource('/labs', 'Employee\LabController');
    Route::get('/labs/create-org-id/{id}', 'Employee\LabController@createByOrgId')->name('labs.create-org-id');
    Route::get('/productLab/create-form-lab/{id}', 'Employee\ProductLabController@createFromLabID')->name('productLab.create-from-lab');
    Route::resource('/equipments','Employee\EquipmentController');
    Route::resource('/productLab','Employee\ProductLabController');
});
