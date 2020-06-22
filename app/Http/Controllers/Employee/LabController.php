<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Employee\Lab;
use App\Model\Employee\Organization;
use App\Model\BasicInformations\LabLocation;
use App\Model\BasicInformations\IndustrialEstate;
use App\Model\BasicInformations\LaboratoryType;
use App\Model\BasicInformations\AreaService;

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
        //
    }

    public function createByOrgId($orgId)
    {
        // data for loop select
        $orgId = Organization::findOrFail($orgId);
        $labLocations = LabLocation::where('location_status', 'A')->get();
        $industrialEstates = IndustrialEstate::where('estate_status', 'A')->get();
        $laboratoryTypes = LaboratoryType::where('lab_type_status', 'A')->get();
        $areaServices = AreaService::where('area_service_status', 'A')->get();

        return view('employee.lab.create', [
            'orgId' => $orgId,
            'labLocations' => $labLocations,
            'industrialEstates' => $industrialEstates,
            'laboratoryTypes' => $laboratoryTypes,
            'areaServices' => $areaServices,
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
        //
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
        ]);
    }
}
