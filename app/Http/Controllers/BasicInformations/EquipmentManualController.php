<?php

namespace App\Http\Controllers\BasicInformations;

use App\Http\Controllers\Controller;
use App\Model\BasicInformations\EquipmentManual;
use Illuminate\Http\Request;

class EquipmentManualController extends Controller
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
        $allEquipmentManual = EquipmentManual::all();
        return view('admin.basic_informations.equipment_manuals.index',['showAllEquipmentManual' => $allEquipmentManual]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.basic_informations.equipment_manuals.create');
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
            'equipmentManualName' => 'required|unique:equipment_manuals,equipment_manual_name'
        ]);

        //insert new data
        $insertEquipmentManual = new EquipmentManual;
        $insertEquipmentManual->equipment_manual_name = $request->input('equipmentManualName');
        $insertEquipmentManual->equipment_manual_status = 'A';
        $insertEquipmentManual->save();

        //return index view
        return redirect('/equipmentManual');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\BasicInformations\EquipmentManual  $equipmentManual
     * @return \Illuminate\Http\Response
     */
    public function show(EquipmentManual $equipmentManual)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\BasicInformations\EquipmentManual  $equipmentManual
     * @return \Illuminate\Http\Response
     */
    public function edit(EquipmentManual $equipmentManual)
    {
        $editEquipmentManual = EquipmentManual::find($equipmentManual->id);
        return view('admin.basic_informations.equipment_manuals.edit',['editEquipmentManual' => $editEquipmentManual]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\BasicInformations\EquipmentManual  $equipmentManual
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EquipmentManual $equipmentManual)
    {
        //validate data
    
        //update new data
        $updateEquipmentManual = EquipmentManual::find($equipmentManual->id);
        $updateEquipmentManual->equipment_manual_name = $request->input('equipmentManualName');
        $updateEquipmentManual->equipment_manual_status = $request->input('equipmentManualStatus');
        $updateEquipmentManual->save();
    
        //return index view
        return redirect('/equipmentManual');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\BasicInformations\EquipmentManual  $equipmentManual
     * @return \Illuminate\Http\Response
     */
    public function destroy(EquipmentManual $equipmentManual)
    {
        //
    }
}
