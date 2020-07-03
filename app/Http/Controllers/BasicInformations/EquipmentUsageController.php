<?php

namespace App\Http\Controllers\BasicInformations;

use App\Http\Controllers\Controller;
use App\Model\BasicInformations\EquipmentUsage;
use Illuminate\Http\Request;
use App\Helpers\LogActivity;

class EquipmentUsageController extends Controller
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
        $allEquipmentUsage = EquipmentUsage::all();
        return view('admin.basic_informations.equipment_usages.index',['showAllEquipmentUsage' => $allEquipmentUsage]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.basic_informations.equipment_usages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate unique data
        $this->validate($request,[
            'equipmentUsageName' => 'required|unique:equipment_usages,equipment_usage_name'
        ]);

        //insert new record
        $insertEquipmentUsage = new EquipmentUsage;
        $insertEquipmentUsage->equipment_usage_name = $request->input('equipmentUsageName');
        $insertEquipmentUsage->equipment_usage_status = 'A';
        $insertEquipmentUsage->save();

        // create log activity
        LogActivity::addToLog('Add equipment usage : " ' . $insertEquipmentUsage->equipment_usage_name . ' " successfully.');

        //return index view
        return redirect('/equipmentUsage');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\BasicInformations\EquipmentUsage  $equipmentUsage
     * @return \Illuminate\Http\Response
     */
    public function show(EquipmentUsage $equipmentUsage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\BasicInformations\EquipmentUsage  $equipmentUsage
     * @return \Illuminate\Http\Response
     */
    public function edit(EquipmentUsage $equipmentUsage)
    {
        $editEquipmentUsage = EquipmentUsage::find($equipmentUsage->id);
        return view('admin.basic_informations.equipment_usages.edit',['editEquipmentUsage' => $editEquipmentUsage]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\BasicInformations\EquipmentUsage  $equipmentUsage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EquipmentUsage $equipmentUsage)
    {
        //validate data

        //update data
        $updateEquipmentUsage = EquipmentUsage::find($equipmentUsage->id);
        $updateEquipmentUsage->equipment_usage_name = $request->input('equipmentUsageName');
        $updateEquipmentUsage->equipment_usage_status = $request->input('equipmentUsageStatus');
        $updateEquipmentUsage->save();

        // create log activity
        LogActivity::addToLog('Edit equipment usage : " ' . $updateEquipmentUsage->equipment_usage_name . ' " successfully.');

        
        //return index view
        return redirect('/equipmentUsage');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\BasicInformations\EquipmentUsage  $equipmentUsage
     * @return \Illuminate\Http\Response
     */
    public function destroy(EquipmentUsage $equipmentUsage)
    {
        //
    }
}
