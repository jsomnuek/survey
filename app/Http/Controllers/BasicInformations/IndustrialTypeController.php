<?php

namespace App\Http\Controllers\BasicInformations;

use App\Http\Controllers\Controller;
use App\Model\BasicInformations\IndustrialType;
use Illuminate\Http\Request;

class IndustrialTypeController extends Controller
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
        $allIndustType = IndustrialType::all();
        return view('admin.basic_informations.industrial_types.index')->with('showAllIndustType',$allIndustType);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            return view('admin.basic_informations.industrial_types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate data before insert
        $this->validate($request,[
            'industTypeName' => 'required|unique:industrial_types,industrial_type_name',]);

        //Insert new industrial type record
        $insertIndustType = new IndustrialType;
        $insertIndustType->industrial_type_name = $request->input('industTypeName');
        $insertIndustType->industrial_type_status = 'A';
        $insertIndustType->save();

        // return new organisationType view.
        return redirect('/industrialType');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\IndustrialType  $industrialType
     * @return \Illuminate\Http\Response
     */
    public function show(IndustrialType $industrialType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\IndustrialType  $industrialType
     * @return \Illuminate\Http\Response
     */
    public function edit(IndustrialType $industrialType)
    {
        $editIndustType = IndustrialType::find($industrialType->id);
        return view('admin.basic_informations.industrial_types.edit')->with('editIndustType', $editIndustType);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\IndustrialType  $industrialType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IndustrialType $industrialType)
    {
        //Validate Data before update
        // $this->validate($request,[
        //     'orgTypeName' => 'required|unique:organisation_types,org_type_name',
        // ]);

        $updateIndustType = IndustrialType::find($industrialType->id);
        $updateIndustType->industrial_type_name = $request->input('industTypeName');
        $updateIndustType->industrial_type_status = $request->input('industTypeStatus');
        $updateIndustType->save();

        return redirect('/industrialType');

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\IndustrialType  $industrialType
     * @return \Illuminate\Http\Response
     */
    public function destroy(IndustrialType $industrialType)
    {
        //
    }
}
