<?php

namespace App\Http\Controllers\BasicInformations;

use App\Http\Controllers\Controller;
use App\Model\BasicInformations\ProficiencyTesting;
use Illuminate\Http\Request;

class ProficiencyTestingController extends Controller
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
        $allPT = ProficiencyTesting::all();
        return view ('admin.basic_informations.proficiency_testings.index',['showAllPT' => $allPT]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.basic_informations.proficiency_testings.create');
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
        $this->validate($request, [
            'pTName' => 'required|unique:proficiency_testings,pt_name'
        ]);

        //insert new data
        $insertPT = new ProficiencyTesting;
        $insertPT->pt_name = $request->input('pTName');
        $insertPT->pt_status = 'A';
        $insertPT->save();

        //return index view
        return redirect ('/proficiencyTesting');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\BasicInformations\ProficiencyTesting  $proficiencyTesting
     * @return \Illuminate\Http\Response
     */
    public function show(ProficiencyTesting $proficiencyTesting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\BasicInformations\ProficiencyTesting  $proficiencyTesting
     * @return \Illuminate\Http\Response
     */
    public function edit(ProficiencyTesting $proficiencyTesting)
    {
        $editPT = ProficiencyTesting::find($proficiencyTesting->id);
        return view ('admin.basic_informations.proficiency_testings.edit',['editPT' => $editPT]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\BasicInformations\ProficiencyTesting  $proficiencyTesting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProficiencyTesting $proficiencyTesting)
    {
        //validate data

        //update new data
        $updatePT = ProficiencyTesting::find($proficiencyTesting->id);
        $updatePT->pt_name = $request->input('pTName');
        $updatePT->pt_status = $request->input('pTStatus');
        $updatePT->save();

        //return index view
        return redirect ('/proficiencyTesting');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\BasicInformations\ProficiencyTesting  $proficiencyTesting
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProficiencyTesting $proficiencyTesting)
    {
        //
    }
}
