<?php

namespace App\Http\Controllers\BasicInformations;

use App\Http\Controllers\Controller;
use App\Model\BasicInformations\LabLocation;
use Illuminate\Http\Request;

class LabLocationController extends Controller
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
        $allLabLocation = LabLocation::all();
        return view('admin.basic_informations.lab_locations.index')->with('showAllLabLocation',$allLabLocation);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.basic_informations.lab_locations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate Data before insert
        $this->validate($request, [
            'labLocationName' => 'required|unique:lab_locations,location_name' 
        ]);

        // Insert new lab location
        $insertLabLocation = new LabLocation;
        $insertLabLocation->location_name = $request->input('labLocationName');
        $insertLabLocation->location_status = 'A';
        $insertLabLocation->save();

        // Return to lab location view
        return redirect ('/labLocation');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\BasicInformations\LabLocation  $labLocation
     * @return \Illuminate\Http\Response
     */
    public function show(LabLocation $labLocation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\BasicInformations\LabLocation  $labLocation
     * @return \Illuminate\Http\Response
     */
    public function edit(LabLocation $labLocation)
    {
        $editLabLocation = LabLocation::find($labLocation->id);
        return view('admin.basic_informations.lab_locations.edit')->with('editLabLocation', $editLabLocation);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\BasicInformations\LabLocation  $labLocation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LabLocation $labLocation)
    {
        // Validate data before update

        // Update data
        $updateLabLocation = LabLocation::find($labLocation->id);
        $updateLabLocation->location_name = $request->input('labLocationName');
        $updateLabLocation->location_status = $request->input('labLocationStatus');
        $updateLabLocation->save();

        // Return to lab location view
        return redirect('/labLocation');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\BasicInformations\LabLocation  $labLocation
     * @return \Illuminate\Http\Response
     */
    public function destroy(LabLocation $labLocation)
    {
        //
    }
}
