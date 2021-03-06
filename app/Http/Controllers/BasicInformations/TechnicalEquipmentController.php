<?php

namespace App\Http\Controllers\BasicInformations;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\BasicInformations\TechnicalEquipment;

class TechnicalEquipmentController extends Controller
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
        // return TechnicalEquipment::all();
        $allTechnicalEquipment = TechnicalEquipment::all();
        return view('admin.basic_informations.technical_equipments.index')->with('showAllTechnicalEquipment',$allTechnicalEquipment);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.basic_informations.technical_equipments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->input();
        $this->validate($request, [
            'technicalEquipmentName' => 'required|unique:technical_equipments,technical_equipment_name'
         ]);

        // insert new equipment
        $insertTechnicalEquipment = new TechnicalEquipment;
        $insertTechnicalEquipment->technical_equipment_name = $request->input('technicalEquipmentName');
        $insertTechnicalEquipment->technical_equipment_status = 'A';
        $insertTechnicalEquipment->save();
        
        return redirect('/technicalEquipment');

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
        $editTechnicalEquipment = TechnicalEquipment::find($id);
        return view('admin.basic_informations.technical_equipments.edit')->with('editTechnicalEquipment',$editTechnicalEquipment);
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
        $updateTechnicalEquipment = TechnicalEquipment::find($id);
        $updateTechnicalEquipment->technical_equipment_name = $request->input('technicalEquipmentName');
        $updateTechnicalEquipment->technical_equipment_status = $request->input('technicalEquipmentStatus');
        $updateTechnicalEquipment->save();
        return redirect('/technicalEquipment');
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