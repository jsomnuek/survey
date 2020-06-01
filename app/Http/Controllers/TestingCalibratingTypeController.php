<?php

namespace App\Http\Controllers;

use App\TestingCalibratingType;
use Illuminate\Http\Request;

class TestingCalibratingTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allTCType = TestingCalibratingType::all();
        return view('basic_informations.testingCalibratingType')->with('showAllTCType',$allTCType);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('basic_informations.testingCalibratingTypeCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate Data before insert
        $this->validate($request,[
            'tCTypeName' => 'required|unique:testing_calibrating_types,testing_calibrating_type_name',
        ]);

        // Insert new testing/calibrating type record
        $insertTestingCalibratingType = new TestingCalibratingType;
        $insertTestingCalibratingType->testing_calibrating_type_name = $request->input('tCTypeName');
        $insertTestingCalibratingType->testing_calibrating_type_status = 'A';
        $insertTestingCalibratingType->save();

        //return view for Testing Calibrating Type
        return redirect('/testingCalibratingType');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TestingCalibratingType  $testingCalibratingType
     * @return \Illuminate\Http\Response
     */
    public function show(TestingCalibratingType $testingCalibratingType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TestingCalibratingType  $testingCalibratingType
     * @return \Illuminate\Http\Response
     */
    public function edit(TestingCalibratingType $testingCalibratingType)
    {
        $editTCType = TestingCalibratingType::find($testingCalibratingType->id);
        return view('basic_informations.testingCalibratingTypeEdit')->with('editTCType', $editTCType);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TestingCalibratingType  $testingCalibratingType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TestingCalibratingType $testingCalibratingType)
    {
        //Validate Data before update
        // $this->validate($request,[
        //     'orgTypeName' => 'required|unique:organisation_types,org_type_name',
        // ]);

        $updateTCType = TestingCalibratingType::find($testingCalibratingType->id);
        $updateTCType->testing_calibrating_type_name = $request->input('tCTypeName');
        $updateTCType->testing_calibrating_type_status = $request->input('tCTypeStatus');
        $updateTCType->save();

        return redirect('/testingCalibratingType');

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TestingCalibratingType  $testingCalibratingType
     * @return \Illuminate\Http\Response
     */
    public function destroy(TestingCalibratingType $testingCalibratingType)
    {
        //
    }
}
