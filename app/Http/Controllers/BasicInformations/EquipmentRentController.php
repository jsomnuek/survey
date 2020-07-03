<?php

namespace App\Http\Controllers\BasicInformations;

use App\Http\Controllers\Controller;
use App\Model\BasicInformations\EquipmentRent;
use Illuminate\Http\Request;
use App\Helpers\LogActivity;

class EquipmentRentController extends Controller
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
        $allEquipmentRent = EquipmentRent::all();
        return view('admin.basic_informations.equipment_rents.index',['showAllEquipmentRent' => $allEquipmentRent]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.basic_informations.equipment_rents.create');
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
            'equipmentRentName' => 'required|unique:equipment_rents,equipment_rent_name'
        ]);

        //insert new record
        $insertEquipmentRent = new EquipmentRent;
        $insertEquipmentRent->equipment_rent_name = $request->input('equipmentRentName');
        $insertEquipmentRent->equipment_rent_status = 'A';
        $insertEquipmentRent->save();

        // create log activity
        LogActivity::addToLog('Add equipment rents : " ' . $insertEquipmentRent->equipment_rent_name . ' " successfully.');

        //retuen index view
        return redirect('/equipmentRent');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\BasicInformations\EquipmentRent  $equipmentRent
     * @return \Illuminate\Http\Response
     */
    public function show(EquipmentRent $equipmentRent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\BasicInformations\EquipmentRent  $equipmentRent
     * @return \Illuminate\Http\Response
     */
    public function edit(EquipmentRent $equipmentRent)
    {
        $editEquipmentRent = EquipmentRent::find($equipmentRent->id);
        return view('admin.basic_informations.equipment_rents.edit',['editEquipmentRent' => $editEquipmentRent]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\BasicInformations\EquipmentRent  $equipmentRent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EquipmentRent $equipmentRent)
    {
        //validate data

        //update data
        $updateEquipmentRent = EquipmentRent::find($equipmentRent->id);
        $updateEquipmentRent->equipment_rent_name = $request->input('equipmentRentName');
        $updateEquipmentRent->equipment_rent_status = $request->input('equipmentRentStatus');
        $updateEquipmentRent->save();

        // create log activity
        LogActivity::addToLog('Edit equipment rents : " ' . $updateEquipmentRent->equipment_rent_name . ' " successfully.');

        //retuen index view
        return redirect('/equipmentRent');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\BasicInformations\EquipmentRent  $equipmentRent
     * @return \Illuminate\Http\Response
     */
    public function destroy(EquipmentRent $equipmentRent)
    {
        //
    }
}
