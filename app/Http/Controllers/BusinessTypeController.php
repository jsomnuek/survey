<?php

namespace App\Http\Controllers;

use App\BusinessType;
use Illuminate\Http\Request;

class BusinessTypeController extends Controller
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
        $allBizType = BusinessType::all();
        return view('basic_informations.businessType')->with('showAllBizType',$allBizType);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('basic_informations.businessTypeCreate');
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
            'bizTypeName' => 'required|unique:business_types,business_type_name',]);

        //Insert new industrial type record
        $insertBizType = new BusinessType;
        $insertBizType->business_type_name = $request->input('bizTypeName');
        $insertBizType->business_type_status = 'A';
        $insertBizType->save();

        // return new organisationType view.
        return redirect('/businessType');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BusinessType  $businessType
     * @return \Illuminate\Http\Response
     */
    public function show(BusinessType $businessType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BusinessType  $businessType
     * @return \Illuminate\Http\Response
     */
    public function edit(BusinessType $businessType)
    {
        $editBizType = BusinessType::find($businessType->id);
        return view('basic_informations.businessTypeEdit')->with('editBizType', $editBizType);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BusinessType  $businessType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BusinessType $businessType)
    {
        //Validate Data before update
        // $this->validate($request,[
        //     'orgTypeName' => 'required|unique:organisation_types,org_type_name',
        // ]);

        $updateBizType = BusinessType::find($businessType->id);
        $updateBizType->business_type_name = $request->input('bizTypeName');
        $updateBizType->business_type_status = $request->input('bizTypeStatus');
        $updateBizType->save();

        return redirect('/businessType');

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BusinessType  $businessType
     * @return \Illuminate\Http\Response
     */
    public function destroy(BusinessType $businessType)
    {
        //
    }
}
