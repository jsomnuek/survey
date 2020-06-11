<?php

namespace App\Http\Controllers\BasicInformations;

use App\Http\Controllers\Controller;
use App\Model\BasicInformations\TestingCalibratingMethod;
use Illuminate\Http\Request;

class TestingCalibratingMethodController extends Controller
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
        $allTCMethod = TestingCalibratingMethod::all();
        return view ('admin.basic_informations.testing_calibrating_methods.index',['showAllTCMethod' => $allTCMethod]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.basic_informations.testing_calibrating_methods.create');
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
            'tCMethodName' => 'required|unique:testing_calibrating_methods,testing_method_name'
        ]);

        //insert new data
        $insertTCMethodName = new TestingCalibratingMethod;
        $insertTCMethodName->testing_method_name = $request->input('tCMethodName');
        $insertTCMethodName->testing_method_status = 'A';
        $insertTCMethodName->save();

        //return index view
        return redirect('/testingCalibratingMethod');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\BasicInformations\TestingCalibratingMethod  $testingCalibratingMethod
     * @return \Illuminate\Http\Response
     */
    public function show(TestingCalibratingMethod $testingCalibratingMethod)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\BasicInformations\TestingCalibratingMethod  $testingCalibratingMethod
     * @return \Illuminate\Http\Response
     */
    public function edit(TestingCalibratingMethod $testingCalibratingMethod)
    {
        $editTCMethod = TestingCalibratingMethod::find($testingCalibratingMethod->id);
        return view ('admin.basic_informations.testing_calibrating_methods.edit',['editTCMethod' => $editTCMethod]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\BasicInformations\TestingCalibratingMethod  $testingCalibratingMethod
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TestingCalibratingMethod $testingCalibratingMethod)
    {
        //validate data

        //insert new data
        $updateTCMethodName = TestingCalibratingMethod::find($testingCalibratingMethod->id);
        $updateTCMethodName->testing_method_name = $request->input('tCMethodName');
        $updateTCMethodName->testing_method_status = $request->input('tCMethodStatus');
        $updateTCMethodName->save();

        //return index view
        return redirect('/testingCalibratingMethod');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\BasicInformations\TestingCalibratingMethod  $testingCalibratingMethod
     * @return \Illuminate\Http\Response
     */
    public function destroy(TestingCalibratingMethod $testingCalibratingMethod)
    {
        //
    }
}
