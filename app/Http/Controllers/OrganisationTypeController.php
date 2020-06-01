<?php

namespace App\Http\Controllers;

use App\OrganisationType;
use Illuminate\Http\Request;

class OrganisationTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allOrgType = OrganisationType::all();
        return view('basic_informations.organisationType')->with('showAllOrgType',$allOrgType);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('basic_informations.organisationTypeCreate');
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
            'orgTypeName' => 'required|unique:organisation_types,org_type_name',]);

        //Insert new org type record
        $insertOrgType = new OrganisationType;
        $insertOrgType->org_type_name = $request->input('orgTypeName');
        $insertOrgType->org_type_status = 'A';
        $insertOrgType->save();

        // return new organisationType view.
        return redirect('/organisationType');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OrganisationType  $organisationType
     * @return \Illuminate\Http\Response
     */
    public function show(OrganisationType $organisationType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OrganisationType  $organisationType
     * @return \Illuminate\Http\Response
     */
    public function edit(OrganisationType $organisationType)
    {
        $editOrgType = OrganisationType::find($organisationType->id);
        return view('basic_informations.organisationTypeEdit')->with('editOrgType', $editOrgType);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OrganisationType  $organisationType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrganisationType $organisationType)
    {
        //Validate Data before update
        // $this->validate($request,[
        //     'orgTypeName' => 'required|unique:organisation_types,org_type_name',
        // ]);

        $updateOrgType = OrganisationType::find($organisationType->id);
        $updateOrgType->org_type_name = $request->input('orgTypeName');
        $updateOrgType->org_type_status = $request->input('orgTypeStatus');
        $updateOrgType->save();

        return redirect('/organisationType');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OrganisationType  $organisationType
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrganisationType $organisationType)
    {
        //
    }
}
