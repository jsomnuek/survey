<?php

namespace App\Http\Controllers;

use App\EquipmentLab;
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
        //$allEstate = IndustrialEstate::all();
        //dd($allOrgData);
        //return $allOrgData;

        return view('equipmentlab')->with('showEquipmentLab',$allEquipmentLab);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
