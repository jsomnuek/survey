<?php

namespace App\Http\Controllers\BasicInformations;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
<<<<<<< HEAD
use App\Model\BasicInformation\Equipment;
=======
use App\Model\BasicInformations\Equipment;
>>>>>>> ca6f2d4b4922e07f3cc223db3647f9d41c9a6edf

class EquipmentController extends Controller
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
        // return Equipment::all();
        $allEquipment = Equipment::paginate(15);
        return view('admin.basic_informations.equipments.index')->with('showAllEquipment',$allEquipment);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.basic_informations.equipments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->input();
        $this->validate($request, [
            'equipmentName' => 'required|unique:equipments,equipment_name',
            'equipmentAbbr' => 'required|unique:equipments,equipment_abbr'
        ]);

        // insert new equipment
        $insertEquipment = new Equipment;
        $insertEquipment->equipment_name = $request->input('equipmentName');
        $insertEquipment->equipment_abbr = $request->input('equipmentAbbr');
        $insertEquipment->equipment_status = 'A';
        $insertEquipment->save();
        
        return redirect('/equipment');

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
        $editEquipment = Equipment::find($id);
        return view('admin.basic_informations.equipments.edit')->with('editEquipment',$editEquipment);
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
        $updateEquipment = Equipment::find($id);
        $updateEquipment->equipment_name = $request->input('equipmentName');
        $updateEquipment->equipment_abbr = $request->input('equipmentAbbr');
        $updateEquipment->equipment_status = $request->input('equipmentStatus');
        $updateEquipment->save();
        return redirect('/equipment');
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
}
