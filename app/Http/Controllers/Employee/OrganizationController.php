<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Employee\Organization;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $orgs = Organization::all();
        $orgs = Organization::paginate(5);

        return view('employee.organization.index', ['orgs' => $orgs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.organization.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    // public function store()
    {
        Organization::create($this->validateOrganization());

        return redirect('/organization');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    public function show(Organization $organization)
    {
        // $org = Organization::find($id);
        // $org = Organization::findOrFail($id);

        return view('employee.organization.show', ['org' => $organization]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    public function edit(Organization $organization)
    {
        // $org = Organization::find($id);
        $org = $organization;

        return view('employee.organization.edit', compact('org'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    public function update(Organization $organization)
    {
        // clean up
        $organization->update($this->validateOrganization());

        return redirect("/organization/$organization->id");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    protected function validateOrganization()
    {
        return request()->validate([
            'org_name' => 'required',
            'org_code' => '',
            'org_number' => '',
            'org_location' => '',
            'org_location_other' => '',
            'org_building' => '',
            'org_floor' => '',
            'org_address' => 'required',
            'org_soi' => '',
            'org_road' => '',
            'province_info_ch_id' => 'required',
            'province_info_am_id' => 'required',
            'province_info_ta_id' => 'required',
            'org_postcode' => 'required|min:5|max:5',
            'org_phone' => 'required',
            'org_fax' => '',
            'org_email' => 'required',
            'org_website' => '',
            'org_lat' => '',
            'org_long' => '',
            'org_type' => '',
            'org_type_other' => '',
            'org_type_of_business' => '',
            'org_distribution' => '',
            'org_distribution_other' => '',
            'org_capital' => '',
            'org_employee_amount' => '',
        ]);
    }
}
