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
        $orgs = Organization::all();

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
    {
        // check request 
        // dump(request()->all());
        // dd($request->all());

        // validation
        request()->validate([
            'org_name' => 'required',
            'org_address' => 'required',
            'org_postcode' => 'required',
            'org_phone' => 'required',
            'org_email' => 'required',
        ]);

        // clean up
        $organization = new Organization;
        $organization->org_name =  $request['org_name'];
        $organization->org_number =  $request['org_number'];
        $organization->org_building =  $request['org_building'];
        $organization->org_floor =  $request['org_floor'];
        $organization->org_address =  $request['org_address'];
        $organization->org_soi =  $request['org_soi'];
        $organization->org_road =  $request['org_road'];
        $organization->org_postcode =  $request['org_postcode'];
        $organization->org_phone =  $request['org_phone'];
        $organization->org_fax =  $request['org_fax'];
        $organization->org_email =  $request['org_email'];
        $organization->org_website =  $request['org_website'];
        $organization->org_lat =  $request['org_lat'];
        $organization->org_long =  $request['org_long'];
        $organization->org_capital =  $request['org_capital'];
        $organization->org_employee_amount =  $request['org_employee_amount'];
        $organization->save();

        return redirect('/organization');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $org = Organization::find($id);

        return view('employee.organization.show', ['org' => $org]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $org = Organization::find($id);

        return view('employee.organization.edit', compact('org'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // check request 
        // dump(request()->all());
        // dd($request->all());

        // validation

        // clean up
        $organization = Organization::find($id);
        $organization->org_name =  $request['org_name'];
        $organization->org_number =  $request['org_number'];
        $organization->org_building =  $request['org_building'];
        $organization->org_floor =  $request['org_floor'];
        $organization->org_address =  $request['org_address'];
        $organization->org_soi =  $request['org_soi'];
        $organization->org_road =  $request['org_road'];
        $organization->org_postcode =  $request['org_postcode'];
        $organization->org_phone =  $request['org_phone'];
        $organization->org_fax =  $request['org_fax'];
        $organization->org_email =  $request['org_email'];
        $organization->org_website =  $request['org_website'];
        $organization->org_lat =  $request['org_lat'];
        $organization->org_long =  $request['org_long'];
        $organization->org_capital =  $request['org_capital'];
        $organization->org_employee_amount =  $request['org_employee_amount'];
        $organization->save();

        return redirect('/organization');
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
}
