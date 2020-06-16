<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Employee\Organization;
use App\Model\BasicInformations\SaleProduct;
use App\Model\BasicInformations\OrganisationType;
use App\Model\BasicInformations\BusinessType;
use App\Model\BasicInformations\IndustrialType;

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
        $saleProduct = SaleProduct::where('sale_product_status', 'A')->get();
        $organisationType = OrganisationType::where('org_type_status', 'A')->get();
        $businessType = BusinessType::where('business_type_status', 'A')->get();
        $industrialType = IndustrialType::where('industrial_type_status', 'A')->get();

        return view('employee.organization.create',[
            'saleProducts' => $saleProduct,
            'organisationTypes' => $organisationType,
            'businessTypes' => $businessType,
            'industrialTypes' => $industrialType,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Organization $organization)
    {
        // dd($request->all());
        // ddd($request->all());
        // return $request->all();

        $request = $this->validateOrganization();

        // return $request;
        
        // clean up     
        Organization::create([
            'user_id' => auth()->user()->id,
            'org_name' => $request['org_name'],
            'org_name_level_1' => $request['org_name_level_1'],
            'org_name_level_2' => $request['org_name_level_2'],
            'org_code' => $request['org_code'],
            'org_number' => $request['org_number'],
            'org_building' => $request['org_building'],
            'org_floor' => $request['org_floor'],
            'org_address' => $request['org_address'],
            'org_soi' => $request['org_soi'],
            'org_road' => $request['org_road'],
            'province_info_ch_id' => $request['province_info_ch_id'],
            'province_info_am_id' => $request['province_info_am_id'],
            'province_info_ta_id' => $request['province_info_ta_id'],
            'org_postcode' => $request['org_postcode'],
            'org_phone' => $request['org_phone'],
            'org_fax' => $request['org_fax'],
            'org_email' => $request['org_email'],
            'org_website' => $request['org_website'],
            'org_lat' => $request['org_lat'],
            'org_long' => $request['org_long'],
            'org_capital' => $request['org_capital'],          
            'org_employee_amount' => $request['org_employee_amount'],     
            'sale_product_other' => $request['sale_product_other'],  
            'organisation_type_id' => $request['organisation_type_id'],  
            'organisation_type_other' => $request['organisation_type_other'],
            'business_type_id' => $request['business_type_id'],
            'business_type_other' => $request['business_type_other'],
            'industrial_type_other' => $request['industrial_type_other'],
            saleProducts()->attach($request->input('sale_product')),
            industrialTypes()->attach($request->input('industrial_type')),
        ]);           

        // $org = new Organization;
        // $org->saleProducts()->attach($request->input('sale_roduct'));
        // $org->industrialTypes()->attach($request->input('industrial_type'));

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
        // $org = Organization::find($id);
        $org = Organization::findOrFail($id);

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
        $saleProduct = SaleProduct::where('sale_product_status', 'A')->get();
        $organisationType = OrganisationType::where('org_type_status', 'A')->get();
        $businessType = BusinessType::where('business_type_status', 'A')->get();
        $industrialType = IndustrialType::where('industrial_type_status', 'A')->get();
        
        $org = Organization::find($id);

        // return view('employee.organization.edit', compact('org'));

        return view('employee.organization.edit',[
            'org' => $org,
            'saleProducts' => $saleProduct,
            'organisationTypes' => $organisationType,
            'businessTypes' => $businessType,
            'industrialTypes' => $industrialType,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Organization $organization)
    {
        // validate
        $request = $this->validateOrganization();

        // return $request;

        // clean up
        // $organization->update($this->validateOrganization());

        $org = Organization::find($organization->id);
        $org->org_name = $request['org_name'];
        $org->org_name_level_1 = $request['org_name_level_1'];
        $org->org_name_level_2 = $request['org_name_level_2'];
        $org->org_code = $request['org_code'];
        $org->org_number = $request['org_number'];
        $org->lab_location_id = $request['lab_location_id'];
        $org->lab_location_other = $request['lab_location_other'];
        $org->industrial_estate_id = $request['industrial_estate_id'];
        $org->industrial_estate_other = $request['industrial_estate_other'];
        $org->org_building = $request['org_building'];
        $org->org_floor = $request['org_floor'];
        $org->org_address = $request['org_address'];
        $org->org_soi = $request['org_soi'];
        $org->org_road = $request['org_road'];
        $org->province_info_ch_id = $request['province_info_ch_id'];
        $org->province_info_am_id = $request['province_info_am_id'];
        $org->province_info_ta_id = $request['province_info_ta_id'];
        $org->org_postcode = $request['org_postcode'];
        $org->org_phone = $request['org_phone'];
        $org->org_fax = $request['org_fax'];
        $org->org_email = $request['org_email'];
        $org->org_website = $request['org_website'];
        $org->org_lat = $request['org_lat'];
        $org->org_long = $request['org_long'];
        $org->organisation_type_id = $request['organisation_type_id'];
        $org->organisation_type_other = $request['organisation_type_other'];
        $org->business_type_id = $request['business_type_id'];
        $org->sale_product_id = $request['sale_product_id'];
        $org->org_capital = $request['org_capital'];
        $org->org_employee_amount = $request['org_employee_amount'];
        $org->industrial_type_id = $request['industrial_type_id'];
        $org->industrial_type_other = $request['industrial_type_other'];
        $org->save();

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
            'org_name_level_1' => '',
            'org_name_level_2' => '',
            'org_code' => 'required',
            'org_number' => '',
            'org_building' => '',
            'org_floor' => '',            
            'org_address' => 'required',            
            'org_soi' => '',
            'org_road' => '',            
            'province_info_ch_id' => 'required',
            'province_info_am_id' => 'required',
            'province_info_ta_id' => 'required',
            'org_postcode' => 'required|min:5|max:5',
            'org_phone' => '',            
            'org_fax' => '',
            'org_email' => '',
            'org_website' => '',
            'org_lat' => '',
            'org_long' => '',           
            'org_capital' => '',          
            'org_employee_amount' => 'required',     
            'sale_product_other' => '',  
            'organisation_type_id' => 'required',  
            'organisation_type_other' => '',
            'business_type_id' => 'required',
            'business_type_other' => '',
            'industrial_type_other' => '',
            'sale_products' => ['required', 'exists:sale_products,id'],
            'industrial_types' => ['required', 'exists:industrial_types,id'],
        ]);
    }
}
