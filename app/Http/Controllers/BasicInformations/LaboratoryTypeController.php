<?php

namespace App\Http\Controllers\BasicInformations;

use App\Http\Controllers\Controller;
use App\Model\BasicInformations\LaboratoryType;
use Illuminate\Http\Request;

class LaboratoryTypeController extends Controller
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
        $allLabType = LaboratoryType::all();
        return view('admin.basic_informations.laboratory_types.index')->with('showAllLabType',$allLabType);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.basic_informations.laboratory_types.create');
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
            'labTypeName' => 'required|unique:laboratory_types,lab_type_name',
            ]);
        
        // Insert new product type record
        $insertLabType = new LaboratoryType;
        $insertLabType->lab_type_name = $request->input('labTypeName');
        $insertLabType->lab_type_abbr = $request->input('labTypeAbbr');
        $insertLabType->lab_type_status = 'A';
        $insertLabType->save();

        //return laboratoryType view
        return redirect('/laboratoryType');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LaboratoryType  $laboratoryType
     * @return \Illuminate\Http\Response
     */
    public function show(LaboratoryType $laboratoryType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LaboratoryType  $laboratoryType
     * @return \Illuminate\Http\Response
     */
    public function edit(LaboratoryType $laboratoryType)
    {
        $editLabType = LaboratoryType::find($laboratoryType->id);
        return view('admin.basic_informations.laboratory_types.edit')->with('editLabType',$editLabType);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LaboratoryType  $laboratoryType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LaboratoryType $laboratoryType)
    {
        // Validat Data before update
        // $this->validate($request,[
        //     'productTypeName' => 'required|unique:product_types,product_type_name',
        // ]);

        $updateLabType = LaboratoryType::find($laboratoryType->id);
        $updateLabType->lab_type_name = $request->input('labTypeName');
        $updateLabType->lab_type_abbr = $request->input('labTypeAbbr');
        $updateLabType->lab_type_status = $request->input('labTypeStatus');
        $updateLabType->save();

        return redirect('/laboratoryType');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LaboratoryType  $laboratoryType
     * @return \Illuminate\Http\Response
     */
    public function destroy(LaboratoryType $laboratoryType)
    {
        //
    }
}
