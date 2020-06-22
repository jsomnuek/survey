<?php

namespace App\Http\Controllers\BasicInformations;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\BasicInformations\LocationLab;
use App\Helpers\LogActivity;

class LocationLabController extends Controller
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
        $allLocationLab = LocationLab::all();
        return view('admin.basic_informations.location_labs.index')->with('showAllLocationLab',$allLocationLab);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.basic_informations.location_labs.create');
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
            'locationLabName' => 'required|unique:location_labs,location_name' 
        ]);

        // Insert new location lab
        $insertLocationLab = new LocationLab;
        $insertLocationLab->location_name = $request->input('locationLabName');
        $insertLocationLab->location_status = 'A';
        $insertLocationLab->save();

        // create log activity
        LogActivity::addToLog('Add new location lab : " ' . $insertLocationLab->location_name . ' " successfully.');

        // Return index view
        return redirect ('/locationLab');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\BasicInformations\LocationLab  $locationLab
     * @return \Illuminate\Http\Response
     */
    public function show(LocationLab $locationLab)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\BasicInformations\LocationLab  $locationLab
     * @return \Illuminate\Http\Response
     */
    public function edit(LocationLab $locationLab)
    {
        $editLocationLab = LocationLab::find($locationLab->id);
        return view('admin.basic_informations.location_labs.edit')->with('editLocationLab', $editLocationLab);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\BasicInformations\LocationLab  $locationLab
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LocationLab $locationLab)
    {
        // Validate data before update

        // Update data
        $updateLocationLab = LocationLab::find($locationLab->id);
        $updateLocationLab->location_name = $request->input('locationLabName');
        $updateLocationLab->location_status = $request->input('locationLabStatus');
        $updateLocationLab->save();

        // create log activity
        LogActivity::addToLog('Update location lab : " ' . $updateLocationLab->location_name . ' " successfully.');

        // Return to lab location view
        return redirect('/locationLab');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\BasicInformations\LocationLab  $locationLab
     * @return \Illuminate\Http\Response
     */
    public function destroy(LocationLab $locationLab)
    {
        //
    }
}
