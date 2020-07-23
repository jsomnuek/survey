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

Route::middleware(['checkRole:admin,bstiAdmin'])->group(function() {
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
    Route::resource('/roleList','BasicInformations\RoleController');
    Route::resource('/saleProduct','BasicInformations\SaleProductController');
    Route::resource('/scienceTool','BasicInformations\ScienceToolController');
    Route::resource('/surveyStatus','BasicInformations\SurveyStatusController');
    Route::resource('/technicalEquipment', 'BasicInformations\TechnicalEquipmentController');
    Route::resource('/testingCalibratingList','BasicInformations\TestingCalibratingListController');
    Route::resource('/testingCalibratingMethod','BasicInformations\TestingCalibratingMethodController');
    Route::resource('/testingCalibratingType', 'BasicInformations\TestingCalibratingTypeController');
    
    // Log Activities
    Route::get('logActivity','LogActivityController@index');
});

Route::middleware(['checkRole:admin,dssUser,surveyer'])->group(function() {
    // OrganizationController
    Route::put('/organization-changeStatus/{id}', 'Employee\OrganizationController@changeStatus');
    Route::resource('/organization', 'Employee\OrganizationController');

    // LabController
    Route::get('/lab/create-org-id/{id}', 'Employee\LabController@createByOrgId')->name('lab.create-org-id');
    Route::put('/lab-changeStatus/{id}', 'Employee\LabController@changeStatus');
    Route::resource('/lab', 'Employee\LabController');

    // EquipmentController
    Route::get('/equipment/create-lab-id/{id}', 'Employee\EquipmentController@createByLabId')->name('equipment.create-lab-id');
    Route::put('/equipment-changeStatus/{id}', 'Employee\EquipmentController@changeStatus');
    Route::resource('/equipment','Employee\EquipmentController');

    // ProductLabController
    Route::get('/productlab/create-lab-id/{id}', 'Employee\ProductLabController@createByLabId')->name('productlab.create-lab-id');
    Route::put('/productlab-changeStatus/{id}', 'Employee\ProductLabController@changeStatus');
    Route::resource('/productlab', 'Employee\ProductLabController');

    // AskController
    Route::resource('/ask', 'Employee\AskController');

    //QuestionnaireController
    
    Route::get('/questionnaire', 'Employee\QuestionnaireController@index')->name('questionnaire.index');
    Route::get('/questionnaire/{id}', 'Employee\QuestionnaireController@show')->name('questionnaire.show');
    Route::put('/questionnaire/{id}', 'Employee\QuestionnaireController@update')->name('questionnaire.update');
    
});

Route::middleware(['checkRole:admin,approver'])->group(function() {
    // Officer
    Route::get('/officer-questionnaire', 'Officer\QuestionnaireController@index')->name('officer-questionnaire.index');
    Route::get('/officer-questionnaire/{id}', 'Officer\QuestionnaireController@show')->name('officer-questionnaire.show');
    Route::get('/officer-questionnaire/{id}/send', 'Officer\QuestionnaireController@send')->name('officer-questionnaire.send');
    Route::get('/officer-questionnaire-detail/{id}', 'Officer\QuestionnaireController@detail')->name('officer-questionnaire.detail');
    Route::post('/officer-questionnaire', 'Officer\QuestionnaireController@store')->name('officer-questionnaire.store');
    Route::put('/officer-questionnaire/{id}', 'Officer\QuestionnaireController@update')->name('officer-questionnaire.update');
});

Route::middleware(['checkRole:admin,bstiAdmin'])->group(function() {
    Route::get('/showRegisterEmployee','Employee\EmployeeController@showRegisterEmployee');
    Route::get('/viewRegisterEmployee','Employee\EmployeeController@index');
    Route::get('/editRegisterEmployee/{id}','Employee\EmployeeController@edit');
    Route::put('/editRegisterEmployee/{id}','Employee\EmployeeController@update');
    Route::get('/showLoginEmployee','Employee\EmployeeController@showLoginEmployee');
    Route::get('/showUnloginEmployee','Employee\EmployeeController@showUnloginEmployee');

    // QuestionnaireController
    Route::get('/bstiadmin-questionnaire', 'BstiAdmin\QuestionnaireController@index')->name('bstiadmin-questionnaire.index');
    Route::get('/bstiadmin-questionnaire/{id}', 'BstiAdmin\QuestionnaireController@show')->name('bstiadmin-questionnaire.show');
    Route::get('/bstiadmin-questionnaire/{id}/send', 'BstiAdmin\QuestionnaireController@send')->name('bstiadmin-questionnaire.send');
    Route::get('/bstiadmin-questionnaire-detail/{id}', 'BstiAdmin\QuestionnaireController@detail')->name('bstiadmin-questionnaire.detail');
    Route::post('/bstiadmin-questionnaire', 'BstiAdmin\QuestionnaireController@store')->name('bstiadmin-questionnaire.store');
    Route::put('/bstiadmin-questionnaire/{id}', 'BstiAdmin\QuestionnaireController@update')->name('bstiadmin-questionnaire.update');
});

Route::middleware(['checkRole:admin,committee'])->group(function() {

    // QuestionnaireController
    Route::get('/committee-questionnaire', 'Committee\QuestionnaireController@index')->name('committee-questionnaire.index');
    Route::get('/committee-questionnaire/{id}', 'Committee\QuestionnaireController@show')->name('committee-questionnaire.show');
    Route::get('/committee-questionnaire-detail/{id}', 'Committee\QuestionnaireController@detail')->name('committee-questionnaire.detail');
});
