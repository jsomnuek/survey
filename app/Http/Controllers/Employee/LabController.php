<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Employee\Lab;
use App\Model\Employee\Organization;
use App\Model\BasicInformations\LocationLab;
use App\Model\BasicInformations\IndustrialEstate;
use App\Model\BasicInformations\LaboratoryType;
use App\Model\BasicInformations\AreaService;
use App\Model\BasicInformations\EducationLevel;
use App\Model\BasicInformations\FixedCost;
use App\Model\BasicInformations\IncomePerYear;
use App\Model\BasicInformations\LabDevelopment;

class LabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('employee.lab.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return abort(404);
    }

    public function createByOrgId($orgId)
    {
        // data for loop select
        $org = Organization::findOrFail($orgId);
        $locationLabs = LocationLab::where('location_status', 'A')->get();
        $industrialEstates = IndustrialEstate::where('estate_status', 'A')->get();
        $laboratoryTypes = LaboratoryType::where('lab_type_status', 'A')->get();
        $areaServices = AreaService::where('area_service_status', 'A')->get();
        $educationLevels = EducationLevel::where('edu_level_status', 'A')->get();
        $fixedCosts = FixedCost::where('fixed_cost_status', 'A')->get();
        $incomePerYears = IncomePerYear::where('income_status', 'A')->get();
        $labDevelopments = LabDevelopment::where('lab_dev_status', 'A')->get();
        $items = 0;

        return view('employee.lab.create', [
            'org' => $org,
            'locationLabs' => $locationLabs,
            'industrialEstates' => $industrialEstates,
            'laboratoryTypes' => $laboratoryTypes,
            'areaServices' => $areaServices,
            'educationLevels' => $educationLevels,
            'educationLevelAmountItems' => $items,
            'fixedCosts' => $fixedCosts,
            'incomePerYears' => $incomePerYears,
            'labDevelopments' => $labDevelopments,
            'labDevelopmentAmountItems' => $items,
            'labDevelopmentDayItems' => $items,
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
        dd($request->all());

        // validate the data with function
        $this->validateLab();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
            'lab_name' => 'required',
            'lab_code' => 'required',
            'lab_location_id' => 'required',
            'lab_location_other' => '',
            'industrial_estate_id' => '',
            'industrial_estate_other' => '',
            'laboratory_type_id' => 'required',
            'area_service_id' => 'required',
            'lab_employee_amount' => 'required',
            'education_level_id' => [''],
            'education_level_amount' => [''],
            'education_level_other' => '',
            'fixed_cost_id' => '',
            'income_per_year_id' => '',
            'lab_development_id' => [''],
            'lab_development_amount' => [''],
            'lab_development_day' => [''],
            'lab_development_join' => [''],
            'lab_development_other' => '',
        ]);
    }
}
