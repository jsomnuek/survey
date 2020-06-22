<?php

namespace App\Http\Controllers\BasicInformations;

use App\Http\Controllers\Controller;
use App\Model\BasicInformations\LabDevelopment;
use Illuminate\Http\Request;

class LabDevelopmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allLabDev = LabDevelopment::all();
        return view('admin.basic_informations.lab_developments.index',[
            'showAllLabDev' => $allLabDev
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.basic_informations.lab_developments.create');
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
        $this->validate($request, [
            'labDevName' => 'required|unique:lab_developments,lab_dev_name'
        ]);

        // insert new data
        $insertLabDev = new LabDevelopment;
        $insertLabDev->lab_dev_name = $request->input('labDevName');
        $insertLabDev->lab_dev_status = 'A';
        $insertLabDev->save();

        //return index view
        return redirect('/labDevelopment');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\BasicInformations\LabDevelopment  $labDevelopment
     * @return \Illuminate\Http\Response
     */
    public function show(LabDevelopment $labDevelopment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\BasicInformations\LabDevelopment  $labDevelopment
     * @return \Illuminate\Http\Response
     */
    public function edit(LabDevelopment $labDevelopment)
    {
        $editLabDev = LabDevelopment::find($labDevelopment->id);
        return view('admin.basic_informations.lab_developments.edit',[
            'editLabDev' => $editLabDev
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\BasicInformations\LabDevelopment  $labDevelopment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LabDevelopment $labDevelopment)
    {
        //validate unique data

        // update new data
        $updateLabDev = LabDevelopment::find($labDevelopment->id);
        $updateLabDev->lab_dev_name = $request->input('labDevName');
        $updateLabDev->lab_dev_status = $request->input('labDevStatus');
        $updateLabDev->save();

        //return index view
        return redirect('/labDevelopment');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\BasicInformations\LabDevelopment  $labDevelopment
     * @return \Illuminate\Http\Response
     */
    public function destroy(LabDevelopment $labDevelopment)
    {
        //
    }
}
