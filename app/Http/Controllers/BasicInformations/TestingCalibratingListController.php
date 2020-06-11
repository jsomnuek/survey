<?php

namespace App\Http\Controllers\BasicInformations;

use App\Http\Controllers\Controller;
use App\Model\BasicInformations\TestingCalibratingList;
use Illuminate\Http\Request;

class TestingCalibratingListController extends Controller
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
        $allTCList = TestingCalibratingList::all();
        return view('admin.basic_informations.testing_calibrating_lists.index',['showAllTCList' => $allTCList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.basic_informations.testing_calibrating_lists.create');
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
            'tCListName' => 'required|unique:testing_calibrating_lists,testing_list_name'
        ]);

        //insert new data
        $insertTCList = new TestingCalibratingList;
        $insertTCList->testing_list_name = $request->input('tCListName');
        $insertTCList->testing_list_status = 'A';
        $insertTCList->save();

        //return index view
        return redirect('/testingCalibratingList');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\BasicInformations\TestingCalibratingList  $testingCalibratingList
     * @return \Illuminate\Http\Response
     */
    public function show(TestingCalibratingList $testingCalibratingList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\BasicInformations\TestingCalibratingList  $testingCalibratingList
     * @return \Illuminate\Http\Response
     */
    public function edit(TestingCalibratingList $testingCalibratingList)
    {
        $editTCList = TestingCalibratingList::find($testingCalibratingList->id);
        return view('admin.basic_informations.testing_calibrating_lists.edit',['editTCList' => $editTCList]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\BasicInformations\TestingCalibratingList  $testingCalibratingList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TestingCalibratingList $testingCalibratingList)
    {
        //validate data

        //update data
        $updateTCList = TestingCalibratingList::find($testingCalibratingList->id);
        $updateTCList->testing_list_name = $request->input('tCListName');
        $updateTCList->testing_list_status = $request->input('tCListStatus');
        $updateTCList->save();

        //return index view
        return redirect('/testingCalibratingList');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\BasicInformations\TestingCalibratingList  $testingCalibratingList
     * @return \Illuminate\Http\Response
     */
    public function destroy(TestingCalibratingList $testingCalibratingList)
    {
        //
    }
}
