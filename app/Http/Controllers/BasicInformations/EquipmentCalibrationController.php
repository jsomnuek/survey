<?php

namespace App\Http\Controllers\BasicInformations;

use App\Http\Controllers\Controller;
use App\Model\BasicInformations\EquipmentCalibration;
use Illuminate\Http\Request;
use App\Helpers\LogActivity;

class EquipmentCalibrationController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allEquipmentCalibration = EquipmentCalibration::all();
        return view('admin.basic_informations.equipment_calibrations.index',['showAllEquipmentCalibration' => $allEquipmentCalibration]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.basic_informations.equipment_calibrations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate data
        $this->validate($request,[
            'equipmentCalibrationName' => 'required|unique:equipment_calibrations,equipment_calibration_name'
        ]);

        //insert new data
        $insertEquipmentCalibration = new EquipmentCalibration;
        $insertEquipmentCalibration->equipment_calibration_name = $request->input('equipmentCalibrationName');
        $insertEquipmentCalibration->equipment_calibration_status = 'A';
        $insertEquipmentCalibration->save();

        // create log activity
        LogActivity::addToLog('Add new equipment calibration : " ' . $insertEquipmentCalibration->equipment_calibration_name . ' " successfully.');

        //return index view
        return redirect('/equipmentCalibration');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\BasicInformations\EquipmentCalibration  $equipmentCalibration
     * @return \Illuminate\Http\Response
     */
    public function show(EquipmentCalibration $equipmentCalibration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\BasicInformations\EquipmentCalibration  $equipmentCalibration
     * @return \Illuminate\Http\Response
     */
    public function edit(EquipmentCalibration $equipmentCalibration)
    {
        $editEquipmentCalibration = EquipmentCalibration::find($equipmentCalibration->id);
        return view('admin.basic_informations.equipment_calibrations.edit',['editEquipmentCalibration' => $editEquipmentCalibration]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\BasicInformations\EquipmentCalibration  $equipmentCalibration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EquipmentCalibration $equipmentCalibration)
    {
        //validate data

        //update new data
        $updateEquipmentCalibration = EquipmentCalibration::find($equipmentCalibration->id);
        $updateEquipmentCalibration->equipment_calibration_name = $request->input('equipmentCalibrationName');
        $updateEquipmentCalibration->equipment_calibration_status = $request->input('equipmentCalibrationStatus');
        $updateEquipmentCalibration->save();

        // create log activity
        LogActivity::addToLog('Update equipment calibration : " ' . $updateEquipmentCalibration->equipment_calibration_name . ' " successfully.');

        //return index view
        return redirect('/equipmentCalibration');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\BasicInformations\EquipmentCalibration  $equipmentCalibration
     * @return \Illuminate\Http\Response
     */
    public function destroy(EquipmentCalibration $equipmentCalibration)
    {
        //
    }
}
