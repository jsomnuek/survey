<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Employee\Lab;
use App\Model\Employee\Organization;
use App\Model\Employee\EducationLevelLab;
use App\Model\Employee\Development\Internal;
use App\Model\Employee\Development\IsoIec17025;
use App\Model\Employee\Development\Method;
use App\Model\Employee\Development\Safety;
use App\Model\Employee\Development\Statistic;
use App\Model\Employee\Development\Technique;
use App\Model\Employee\Development\Uncertainty;
use App\Model\BasicInformations\LocationLab;
use App\Model\BasicInformations\IndustrialEstate;
use App\Model\BasicInformations\LaboratoryType;
use App\Model\BasicInformations\AreaService;
use App\Model\BasicInformations\FixedCost;
use App\Model\BasicInformations\IncomePerYear;
use App\Model\BasicInformations\EmployeeTraining;

use App\Helpers\LogActivity;

class LabController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $labs = Lab::where('user_id', auth()->user()->id)->get();
        return view('employee.lab.index', [
            'labs' => $labs
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // data for loop select
        $organizations = Organization::where('user_id', auth()->user()->id)->get();
        $locationLabs = LocationLab::where('location_status', 'A')->get();
        $industrialEstates = IndustrialEstate::where('estate_status', 'A')->get();
        $laboratoryTypes = LaboratoryType::where('lab_type_status', 'A')->get();
        $areaServices = AreaService::where('area_service_status', 'A')->get();
        $fixedCosts = FixedCost::where('fixed_cost_status', 'A')->get();
        $incomePerYears = IncomePerYear::where('income_status', 'A')->get();
        $employeeTrainings = EmployeeTraining::where('emp_training_status', 'A')->get();

        return view('employee.lab.create', [
            'organizations' => $organizations,
            'locationLabs' => $locationLabs,
            'industrialEstates' => $industrialEstates,
            'laboratoryTypes' => $laboratoryTypes,
            'areaServices' => $areaServices,
            'fixedCosts' => $fixedCosts,
            'incomePerYears' => $incomePerYears,
            'employeeTrainings' => $employeeTrainings,
        ]);
    }

    public function createByOrgId($orgId)
    {
        // data for loop select
        $org = Organization::findOrFail($orgId);
        $locationLabs = LocationLab::where('location_status', 'A')->get();
        $industrialEstates = IndustrialEstate::where('estate_status', 'A')->get();
        $laboratoryTypes = LaboratoryType::where('lab_type_status', 'A')->get();
        $areaServices = AreaService::where('area_service_status', 'A')->get();
        $fixedCosts = FixedCost::where('fixed_cost_status', 'A')->get();
        $incomePerYears = IncomePerYear::where('income_status', 'A')->get();
        $employeeTrainings = EmployeeTraining::where('emp_training_status', 'A')->get();

        return view('employee.lab.create-org-id', [
            'org' => $org,
            'locationLabs' => $locationLabs,
            'industrialEstates' => $industrialEstates,
            'laboratoryTypes' => $laboratoryTypes,
            'areaServices' => $areaServices,
            'fixedCosts' => $fixedCosts,
            'incomePerYears' => $incomePerYears,
            'employeeTrainings' => $employeeTrainings,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        // dd($request->all());

        // validate the data with function
        $this->validateLab();

        // store in the database
        $lab = new Lab;

        $lab->user_id = auth()->user()->id;
        $lab->organization_id = $request->input('organization_id');
        $lab->lab_name = $request->input('lab_name');
        $lab->lab_code = $request->input('lab_code');
        $lab->location_lab_id = $request->input('location_lab_id');
        $lab->location_lab_other = $request->input('location_lab_other');
        $lab->industrial_estate_id = $request->input('industrial_estate_id');
        $lab->industrial_estate_other = $request->input('industrial_estate_other');
        $lab->laboratory_type_id = $request->input('laboratory_type_id');
        $lab->area_service_id = $request->input('area_service_id');
        $lab->lab_employee_amount = $request->input('lab_employee_amount');
        $lab->fixed_cost_id = $request->input('fixed_cost_id');
        $lab->income_per_year_id = $request->input('income_per_year_id');
        $lab->lab_development_other = $request->input('lab_development_other');
        $lab->employee_training_id = $request->input('employee_training_id');
        $lab->lab_environmental_management = $request->input('lab_environmental_management');
        $lab->lab_development_problem = $request->input('lab_development_problem');
        $lab->lab_development_request = $request->input('lab_development_request');
        $lab->lab_development_suggestion = $request->input('lab_development_suggestion');

        if($lab->save()) {
            // clean
            $education = new EducationLevelLab;
            $education->lab_id = $lab->id;
            $education->education_primary_amount = $request->input('education_primary_amount');
            $education->education_secondary_amount = $request->input('education_secondary_amount');
            $education->education_vocational_amount = $request->input('education_vocational_amount');
            $education->education_high_vocational_amount = $request->input('education_high_vocational_amount');
            $education->education_bachelor_amount = $request->input('education_bachelor_amount');
            $education->education_master_amount = $request->input('education_master_amount');
            $education->education_doctor_amount = $request->input('education_doctor_amount');
            $education->education_other = $request->input('education_other');
            $education->save();

            // clean
            $iso = new IsoIec17025;
            $iso->lab_id = $lab->id;
            $iso->development_amount = $request->input('1_development_amount');
            $iso->development_day = $request->input('1_development_day');
            $iso->development_interested = $request->input('1_development_interested');
            $iso->save();

            // clean
            $uncertainty = new Uncertainty;
            $uncertainty->lab_id = $lab->id;
            $uncertainty->development_amount = $request->input('2_development_amount');
            $uncertainty->development_day = $request->input('2_development_day');
            $uncertainty->development_interested = $request->input('2_development_interested');
            $uncertainty->save();
            
            // clean
            $method = new Method;
            $method->lab_id = $lab->id;
            $method->development_amount = $request->input('3_development_amount');
            $method->development_day = $request->input('3_development_day');
            $method->development_interested = $request->input('3_development_interested');
            $method->save();
            
            // clean
            $internal = new Internal;
            $internal->lab_id = $lab->id;
            $internal->development_amount = $request->input('4_development_amount');
            $internal->development_day = $request->input('4_development_day');
            $internal->development_interested = $request->input('4_development_interested');
            $internal->save();
            
            // clean
            $statistic = new Statistic;
            $statistic->lab_id = $lab->id;
            $statistic->development_amount = $request->input('5_development_amount');
            $statistic->development_day = $request->input('5_development_day');
            $statistic->development_interested = $request->input('5_development_interested');
            $statistic->save();
            
            // clean
            $technique = new Technique;
            $technique->lab_id = $lab->id;
            $technique->development_amount = $request->input('6_development_amount');
            $technique->development_day = $request->input('6_development_day');
            $technique->development_interested = $request->input('6_development_interested');
            $technique->save();

            // clean
            $safety = new Safety;
            $safety->lab_id = $lab->id;
            $safety->development_amount = $request->input('7_development_amount');
            $safety->development_day = $request->input('7_development_day');
            $safety->development_interested = $request->input('7_development_interested');
            $safety->save();

            // create log activity
            LogActivity::addToLog('Add Lab to an Oranization : " ' . $lab->lab_name . ' to ' .$lab->organization_id . ' " successfully.');

            return redirect()->route('labs.show', $lab->id);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lab = Lab::findOrFail($id);
        // return $lab;
        return view('employee.lab.show', ['lab' => $lab]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lab = Lab::findOrFail($id);
        $organizations = Organization::where('user_id', auth()->user()->id)->get();
        $locationLabs = LocationLab::where('location_status', 'A')->get();
        $industrialEstates = IndustrialEstate::where('estate_status', 'A')->get();
        $laboratoryTypes = LaboratoryType::where('lab_type_status', 'A')->get();
        $areaServices = AreaService::where('area_service_status', 'A')->get();
        $fixedCosts = FixedCost::where('fixed_cost_status', 'A')->get();
        $incomePerYears = IncomePerYear::where('income_status', 'A')->get();
        $employeeTrainings = EmployeeTraining::where('emp_training_status', 'A')->get();

        // return $lab;
        
        return view('employee.lab.edit', [
            'lab' => $lab,
            'organizations' => $organizations,
            'locationLabs' => $locationLabs,
            'industrialEstates' => $industrialEstates,
            'laboratoryTypes' => $laboratoryTypes,
            'areaServices' => $areaServices,
            'fixedCosts' => $fixedCosts,
            'incomePerYears' => $incomePerYears,
            'employeeTrainings' => $employeeTrainings,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        // dd($request->all());

        // validate the data with function
        $this->validateLab();

        // store in the database
        $lab = Lab::find($id);
        $lab->organization_id = $request->input('organization_id');
        $lab->lab_name = $request->input('lab_name');
        $lab->lab_code = $request->input('lab_code');
        $lab->location_lab_id = $request->input('location_lab_id');
        $lab->location_lab_other = $request->input('location_lab_other');
        $lab->industrial_estate_id = $request->input('industrial_estate_id');
        $lab->industrial_estate_other = $request->input('industrial_estate_other');
        $lab->laboratory_type_id = $request->input('laboratory_type_id');
        $lab->area_service_id = $request->input('area_service_id');
        $lab->lab_employee_amount = $request->input('lab_employee_amount');
        $lab->fixed_cost_id = $request->input('fixed_cost_id');
        $lab->income_per_year_id = $request->input('income_per_year_id');
        $lab->lab_development_other = $request->input('lab_development_other');
        $lab->employee_training_id = $request->input('employee_training_id');
        $lab->lab_environmental_management = $request->input('lab_environmental_management');
        $lab->lab_development_problem = $request->input('lab_development_problem');
        $lab->lab_development_request = $request->input('lab_development_request');
        $lab->lab_development_suggestion = $request->input('lab_development_suggestion');
        
        if($lab->save()) {

            // clean
            EducationLevelLab::where('lab_id', $id)
                ->update([
                    'education_primary_amount' => $request->input('education_primary_amount'),
                    'education_secondary_amount' => $request->input('education_secondary_amount'),
                    'education_vocational_amount' => $request->input('education_vocational_amount'),
                    'education_high_vocational_amount' => $request->input('education_high_vocational_amount'),
                    'education_bachelor_amount' => $request->input('education_bachelor_amount'),
                    'education_master_amount' => $request->input('education_master_amount'),
                    'education_doctor_amount' => $request->input('education_doctor_amount'),
                    'education_other' => $request->input('education_other'),
                ]);

            // clean
            IsoIec17025::where('lab_id', $id)
                ->update([
                    'development_amount' => $request->input('1_development_amount'),
                    'development_day' => $request->input('1_development_day'),
                    'development_interested' => $request->input('1_development_interested'),
                ]);
            // clean
            Uncertainty::where('lab_id', $id)
                ->update([
                    'development_amount' => $request->input('2_development_amount'),
                    'development_day' => $request->input('2_development_day'),
                    'development_interested' => $request->input('2_development_interested'),
                ]);
            // clean
            Method::where('lab_id', $id)
                ->update([
                    'development_amount' => $request->input('3_development_amount'),
                    'development_day' => $request->input('3_development_day'),
                    'development_interested' => $request->input('3_development_interested'),
                ]);
            // clean
            Internal::where('lab_id', $id)
                ->update([
                    'development_amount' => $request->input('4_development_amount'),
                    'development_day' => $request->input('4_development_day'),
                    'development_interested' => $request->input('4_development_interested'),
                ]);
            // clean
            Statistic::where('lab_id', $id)
                ->update([
                    'development_amount' => $request->input('5_development_amount'),
                    'development_day' => $request->input('5_development_day'),
                    'development_interested' => $request->input('5_development_interested'),
                ]);
            // clean
            Technique::where('lab_id', $id)
                ->update([
                    'development_amount' => $request->input('6_development_amount'),
                    'development_day' => $request->input('6_development_day'),
                    'development_interested' => $request->input('6_development_interested'),
                ]);
            Safety::where('lab_id', $id)
                ->update([
                    'development_amount' => $request->input('7_development_amount'),
                    'development_day' => $request->input('7_development_day'),
                    'development_interested' => $request->input('7_development_interested'),
                ]);

            // create log activity
            LogActivity::addToLog('Edit Lab in an Oranization : " ' . $lab->lab_name . ' to ' .$lab->organization_id . ' " successfully.');
            return redirect()->route('labs.show', $lab->id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return abort(404);
    }

    protected function validateLab()
    {
        return request()->validate([
            'organization_id' => 'required',
            'lab_name' => 'required',
            'lab_code' => 'required',
            'location_lab_id' => 'required',
            'location_lab_other' => '',
            'industrial_estate_id' => '',
            'industrial_estate_other' => '',
            'laboratory_type_id' => 'required',
            'area_service_id' => 'required',
            'lab_employee_amount' => 'required',
            'education_primary_amount' => '',
            'education_secondary_amount' => '',
            'education_vocational_amount' => '',
            'education_high_vocational_amount' => '',
            'education_bachelor_amount' => '',
            'education_master_amount' => '',
            'education_doctor_amount' => '',
            'education_other' => '',
            'fixed_cost_id' => '',
            'income_per_year_id' => '',
            '1_development_amount' => '',
            '1_development_day' => '',
            '1_development_interested' => '',
            '2_development_amount' => '',
            '2_development_day' => '',
            '2_development_interested' => '',
            '3_development_amount' => '',
            '3_development_day' => '',
            '3_development_interested' => '',
            '4_development_amount' => '',
            '4_development_day' => '',
            '4_development_interested' => '',
            '5_development_amount' => '',
            '5_development_day' => '',
            '5_development_interested' => '',
            '6_development_amount' => '',
            '6_development_day' => '',
            '6_development_interested' => '',
            '7_development_amount' => '',
            '7_development_day' => '',
            '7_development_interested' => '',
            'lab_development_other' => '',
            'employee_training_id' => 'required',
            'lab_environmental_management' => '',
            'lab_development_problem' => '',
            'lab_development_request' => '',
            'lab_development_suggestion' => '',
        ]);
    }
}
