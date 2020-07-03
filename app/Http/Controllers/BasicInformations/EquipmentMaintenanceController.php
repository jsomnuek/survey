<?php

namespace App\Http\Controllers\BasicInformations;

use App\Http\Controllers\Controller;
use App\Model\BasicInformations\EquipmentMaintenance;
use Illuminate\Http\Request;

use App\Helpers\LogActivity;

class EquipmentMaintenanceController extends Controller
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
        $allEquipmentMA = EquipmentMaintenance::all();
        return view('admin.basic_informations.equipment_maintenances.index',['showAllEquipmentMA' => $allEquipmentMA]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.basic_informations.equipment_maintenances.create');
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
            'equipmentMAName' => 'required|unique:equipment_maintenances,equipment_maintenance_name'
        ]);

        //insert new data
        $insertEquipmentMA = new EquipmentMaintenance;
        $insertEquipmentMA->equipment_maintenance_name = $request->input('equipmentMAName');
        $insertEquipmentMA->equipment_maintenance_status = 'A';
        $insertEquipmentMA->save();

        // create log activity
        LogActivity::addToLog('Add new equipment maintenances : " ' . $insertEquipmentMA->equipment_maintenance_name . ' " successfully.');

        //return index view
        return redirect('/equipmentMaintenance');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\BasicInformations\EquipmentMaintenance  $equipmentMaintenance
     * @return \Illuminate\Http\Response
     */
    public function show(EquipmentMaintenance $equipmentMaintenance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\BasicInformations\EquipmentMaintenance  $equipmentMaintenance
     * @return \Illuminate\Http\Response
     */
    public function edit(EquipmentMaintenance $equipmentMaintenance)
    {
        $editEquipmentMA = EquipmentMaintenance::find($equipmentMaintenance->id);
        return view('admin.basic_informations.equipment_maintenances.edit',['editEquipmentMA' => $editEquipmentMA]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\BasicInformations\EquipmentMaintenance  $equipmentMaintenance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EquipmentMaintenance $equipmentMaintenance)
    {
        //validate data

        //update new data
        $updateEquipmentMA = EquipmentMaintenance::find($equipmentMaintenance->id);
        $updateEquipmentMA->equipment_maintenance_name = $request->input('equipmentMAName');
        $updateEquipmentMA->equipment_maintenance_status = $request->input('equipmentMAStatus');;
        $updateEquipmentMA->save();

        // create log activity
        LogActivity::addToLog('Update equipment maintenances : " ' . $updateEquipmentMA->equipment_maintenance_name . ' " successfully.');

        //return index view
        return redirect('/equipmentMaintenance');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\BasicInformations\EquipmentMaintenance  $equipmentMaintenance
     * @return \Illuminate\Http\Response
     */
    public function destroy(EquipmentMaintenance $equipmentMaintenance)
    {
        //
    }
}
