<?php

namespace App\Http\Controllers\Employee;
use App\Http\Controllers\Controller;
use App\Model\Employee\EquipmentLab;
use App\Model\BasicInformations\Equipment;
use App\Model\BasicInformations\MajorTechnology;
use App\Model\BasicInformations\TechnicalEquipment;
use App\Model\BasicInformations\ObjectiveUsage;
use App\Model\BasicInformations\EquipmentUsage;
use App\Model\BasicInformations\EquipmentCalibration;
use App\Model\BasicInformations\EquipmentMaintenance;
use App\Model\BasicInformations\EquipmentManual;
use App\Model\BasicInformations\EquipmentRent;
use Illuminate\Http\Request;

class EquipmentLabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allEquipmentLab = EquipmentLab::all();
        $allEquipments = Equipment::all();
        //$allEstate = IndustrialEstate::all();
        //dd($allOrgData);
        //return $allOrgData;
        

        return view('employee.equipmentLab.index')->with('showEquipmentLab',$allEquipmentLab);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allEquipments = Equipment::where('equipment_status','A')->get();
        $allMajorTechnology = MajorTechnology::where('major_tech_status','A')->get();
        $allTechnicalEquipment = TechnicalEquipment::where('technical_equipment_status','A')->get();
        $allObjectiveUsage = ObjectiveUsage::where('obj_usage_status','A')->get();
        $allEquipmentUsage = EquipmentUsage::where('equipment_usage_status','A')->get();
        $allEquipmentCalibration = EquipmentCalibration::where('equipment_calibration_status','A')->get();
        $allEquipmentMaintenance = EquipmentMaintenance::where('equipment_maintenance_status','A')->get();
        $allEquipmentManual = EquipmentManual::where('equipment_manual_status','A')->get();
        $allEquipmentRent = EquipmentRent::where('equipment_rent_status','A')->get();
        $data = [
            'equipments' => $allEquipments,
            'majorTechnologies' => $allMajorTechnology,
            'technicalEquipments' => $allTechnicalEquipment,
            'objectiveUsages' => $allObjectiveUsage,
            'equipmentUsages' => $allEquipmentUsage,
            'equipmentCalibrations' => $allEquipmentCalibration,
            'equipmentMaintenances' => $allEquipmentMaintenance,
            'equipmentManuals' => $allEquipmentManual,
            'equipmentRents' => $allEquipmentRent,

        ];
        //dd($data);
        return view('employee.equipmentLab.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'equipment_lab_id' => 'required'

        ]);
        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EquipmentLab  $equipmentLab
     * @return \Illuminate\Http\Response
     */
    public function show(EquipmentLab $equipmentLab)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EquipmentLab  $equipmentLab
     * @return \Illuminate\Http\Response
     */
    public function edit(EquipmentLab $equipmentLab)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EquipmentLab  $equipmentLab
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EquipmentLab $equipmentLab)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EquipmentLab  $equipmentLab
     * @return \Illuminate\Http\Response
     */
    public function destroy(EquipmentLab $equipmentLab)
    {
        //
    }
}
