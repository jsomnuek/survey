<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Employee\Organization;
use App\Model\BasicInformations\SaleProduct;
use App\Model\BasicInformations\Country;
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
        $country = Country::where('country_status', 'A')->get();
        $organisationType = OrganisationType::where('org_type_status', 'A')->get();
        $businessType = BusinessType::where('business_type_status', 'A')->get();
        $industrialType = IndustrialType::where('industrial_type_status', 'A')->get();
        // return $industrialType;

        return view('employee.organization.create',[
            'saleProducts' => $saleProduct,
            'countrys' => $country,
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
    public function store(Request $request)
    {
        // dd($request);
        // dd($request->all());

        // validate the data with function
        $this->validateOrganization();
        
        // store in the database
        $org = new Organization;

        $org->user_id = auth()->user()->id;
        $org->org_name = $request->org_name;
        $org->org_name_level_1 = $request->org_name_level_1;
        $org->org_name_level_2 = $request->org_name_level_2;
        $org->org_code = $request->org_code;
        $org->org_number = $request->org_number;
        $org->org_building = $request->org_building;
        $org->org_floor = $request->org_floor;
        $org->org_address = $request->org_address;
        $org->org_soi = $request->org_soi;
        $org->org_road = $request->org_road;
        $org->province_info_ch_id = $request->province_info_ch_id;
        $org->province_info_am_id = $request->province_info_am_id;
        $org->province_info_ta_id = $request->province_info_ta_id;
        $org->org_postcode = $request->org_postcode;
        $org->org_phone = $request->org_phone;
        $org->org_fax = $request->org_fax;
        $org->org_email = $request->org_email;
        $org->org_website = $request->org_website;
        $org->org_lat = $request->org_lat;
        $org->org_long = $request->org_long;
        $org->org_capital = $request->org_capital;
        $org->org_employee_amount = $request->org_employee_amount;
        $org->organisation_type_id = $request->organisation_type_id;
        $org->organisation_type_other = $request->organisation_type_other;
        $org->business_type_id = $request->business_type_id;
        $org->business_type_other = $request->business_type_other;
        $org->industrial_type_other = $request->industrial_type_other;
        
        $org->save();
        
        $org->saleProducts()->sync($request->sale_products, false);

        return redirect()->route('organization.edit', $org->id);
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
        $org = Organization::find($id);
        // data for loop select
        $saleProducts = SaleProduct::where('sale_product_status', 'A')->get();
        $countrys = Country::where('country_status', 'A')->get();
        $organisationTypes = OrganisationType::where('org_type_status', 'A')->get();
        $businessTypes = BusinessType::where('business_type_status', 'A')->get();
        $industrialTypes = IndustrialType::where('industrial_type_status', 'A')->get();
        // data relations in id
        $sale_product_items = array();
        foreach ($org->saleProducts as $item){
            $sale_product_items[] = $item->id;
        }
        // return $sale_product_items;

        return view('employee.organization.edit',[
            'org' => $org,
            'saleProducts' => $saleProducts,
            'sale_product_items' => $sale_product_items,
            'countrys' => $countrys,
            // 'country_items' => $country_items,
            'organisationTypes' => $organisationTypes,
            'businessTypes' => $businessTypes,
            'industrialTypes' => $industrialTypes,
        ]);
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
        // dd($request);
        // dd($request->all());

        // validate the data with function
        $this->validateOrganization();

        // store in the database
        $organization = Organization::find($id);
        $organization->org_name = $request->org_name;
        $organization->org_name_level_1 = $request->org_name_level_1;
        $organization->org_name_level_2 = $request->org_name_level_2;
        $organization->org_code = $request->org_code;
        $organization->org_number = $request['org_number'];
        $organization->org_building = $request['org_building'];
        $organization->org_floor = $request['org_floor'];
        $organization->org_address = $request['org_address'];
        $organization->org_soi = $request['org_soi'];
        $organization->org_road = $request['org_road'];
        $organization->province_info_ch_id = $request['province_info_ch_id'];
        $organization->province_info_am_id = $request['province_info_am_id'];
        $organization->province_info_ta_id = $request['province_info_ta_id'];
        $organization->org_postcode = $request['org_postcode'];
        $organization->org_phone = $request['org_phone'];
        $organization->org_fax = $request['org_fax'];
        $organization->org_email = $request['org_email'];
        $organization->org_website = $request['org_website'];
        $organization->org_lat = $request['org_lat'];
        $organization->org_long = $request['org_long'];
        $organization->org_capital = $request['org_capital'];
        $organization->org_employee_amount = $request['org_employee_amount'];
        $organization->organisation_type_id = $request['organisation_type_id'];
        $organization->organisation_type_other = $request['organisation_type_other'];
        $organization->business_type_id = $request['business_type_id'];
        $organization->business_type_other = $request['business_type_other'];
        $organization->industrial_type_other = $request['industrial_type_other'];
        
        $organization->save();

        $organization->saleProducts()->sync($request->sale_products);

        // if(request()->has('switch_sale_products') == 1){
        //     $saleProduct = $organization->saleProducts;
        //     $organization->saleProducts()->detach($saleProduct);
        // }

        return redirect()->route('organization.edit', $organization->id);
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
            'org_name' => '',
            'org_name_level_1' => '',
            'org_name_level_2' => '',
            'org_code' => '',
            'org_number' => '',
            'org_building' => '',
            'org_floor' => '',            
            'org_address' => '',            
            'org_soi' => '',
            'org_road' => '',            
            'province_info_ch_id' => '',
            'province_info_am_id' => '',
            'province_info_ta_id' => '',
            'org_postcode' => '',
            'org_phone' => '',            
            'org_fax' => '',
            'org_email' => '',
            'org_website' => '',
            'org_lat' => '',
            'org_long' => '',           
            'org_capital' => '',          
            'org_employee_amount' => '',  
            'organisation_type_id' => '',  
            'organisation_type_other' => '',
            'business_type_id' => '',
            'business_type_other' => '',
            'industrial_type_other' => '',
            'sale_products' => [''],
            'switch_sale_products' => '',
            'countries' => [''],
            'industrial_type' => [''],
        ]);
    }
}
