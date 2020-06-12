<?php

namespace App\Http\Controllers\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Employee\ProductLab;
use App\Model\BasicInformations\ProductType;
use App\Model\BasicInformations\IndustrialType;
use App\Model\BasicInformations\TestingCalibratingType;
use App\Model\BasicInformations\CertifyLaboratory;

class ProductLabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allProductLab = ProductLab::paginate(2);
        return view('employee.productlab.index',['allProductLabs' => $allProductLab]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allIndustrialTypes = IndustrialType::where('industrial_type_status','A')->get();
        $allProductTypes = ProductType::all();
        $allTestingCalibratingType = TestingCalibratingType::all();
        $allCertifyLaboratory = CertifyLaboratory::where('cert_lab_status','A')->get();
        $data = [
            'industrialTypes' => $allIndustrialTypes,
            'productTypes' => $allProductTypes,
            'testingCalibratingTypes'=>$allTestingCalibratingType,
            'cerifyLaboratories'=>$allCertifyLaboratory,
        ];
        //return $data;
        return view('employee.productLab.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());

        $request->validate([
            'product_lab_name' => 'required|unique:product_labs',
            'product_type_id' => 'required',
            'product_lab_standard' => '' ,
            'product_lab_test_name' => '',
            'product_lab_test_process' => 'required',
            'testing_calibrating_type_id' => 'required',
            'product_lab_test_method' => 'required',
            'product_lab_test_method_detail' => '',
            'product_lab_test_unit' => '',
            'product_lab_test_duration' => 'required',
            'product_lab_test_fee' => '',
            'product_lab_material_ref' => '',
            'product_lab_material_ref_from' => '',
            'product_lab_test_control' => 'required',
            'proficiency_testing' => 'required',
            'proficiency_testing_by' => '',
            'proficiency_testing_year' => '',
            'certify_laboratory_id' => 'required'
        ]);

        //clean up
        $productLab = new ProductLab;
        $productLab->product_lab_name = $request['product_lab_name'];
        $productLab->product_type_id = $request['product_type_id'];
        $productLab->product_lab_standard = $request['product_lab_standard'];
        $productLab->product_lab_test_name = $request['product_lab_test_name'];
        $productLab->product_lab_test_process = $request['product_lab_test_process'];
        $productLab->testing_calibrating_type_id = $request['testing_calibrating_type_id'];
        $productLab->product_lab_test_method = $request['product_lab_test_method'];
        $productLab->product_lab_test_method_detail = $request['product_lab_test_method_detail'];
        $productLab->product_lab_test_unit = $request['product_lab_test_unit'];
        $productLab->product_lab_test_duration = $request['product_lab_test_duration'];
        $productLab->product_lab_test_fee = $request['product_lab_test_fee'];
        $productLab->product_lab_material_ref = $request['product_lab_material_ref'];
        $productLab->product_lab_material_ref_from = $request['product_lab_material_ref_from'];
        $productLab->product_lab_test_control = $request['product_lab_test_control'];
        $productLab->proficiency_testing = $request['proficiency_testing'];
        $productLab->proficiency_testing_by = $request['proficiency_testing_by'];
        $productLab->proficiency_testing_year = $request['proficiency_testing_year'];
        $productLab->certify_laboratory_id = $request['certify_laboratory_id'];

        $productLab->save();
        return redirect('/productLab');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productLab = ProductLab::find($id);
        // return $productLab;
        
        return view('employee.productLab.show',['productLabs'=>$productLab]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productLab = ProductLab::find($id);
        $allIndustrialTypes = IndustrialType::all();
        $allProductTypes = ProductType::all();
        $allTestingCalibratingType = TestingCalibratingType::all();
        $allCertifyLaboratory = CertifyLaboratory::all();
        
        // return $productLab;

        return view('employee.productLab.edit')->with([
            'productLabs' => $productLab,
            'industrialTypes' => $allIndustrialTypes,
            'productTypes' => $allProductTypes,
            'testingCalibratingTypes' => $allTestingCalibratingType,
            'cerifyLaboratories' => $allCertifyLaboratory
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
        //dd($request->all());

        // Validate Check
        $request->validate([
            'product_lab_name' => 'required',
            'product_type_id' => 'required',
            'product_lab_standard' => '' ,
            'product_lab_test_name' => '',
            'product_lab_test_process' => 'required',
            'testing_calibrating_type_id' => 'required',
            'product_lab_test_method' => 'required',
            'product_lab_test_method_detail' => '',
            'product_lab_test_unit' => '',
            'product_lab_test_duration' => 'required',
            'product_lab_test_fee' => '',
            'product_lab_material_ref' => '',
            'product_lab_material_ref_from' => '',
            'product_lab_test_control' => 'required',
            'proficiency_testing' => 'required',
            'proficiency_testing_by' => '',
            'proficiency_testing_year' => '',
            'certify_laboratory_id' => 'required'
        ]);

        
        //Clean Up data Before Update to Database

        $productLab =  ProductLab::find($id) ;
        $productLab->product_lab_name = $request['product_lab_name'];
        $productLab->product_type_id = $request['product_type_id'];
        $productLab->product_lab_standard = $request['product_lab_standard'];
        $productLab->product_lab_test_name = $request['product_lab_test_name'];
        $productLab->product_lab_test_process = $request['product_lab_test_process'];
        $productLab->testing_calibrating_type_id = $request['testing_calibrating_type_id'];
        $productLab->product_lab_test_method = $request['product_lab_test_method'];
        $productLab->product_lab_test_method_detail = $request['product_lab_test_method_detail'];
        $productLab->product_lab_test_unit = $request['product_lab_test_unit'];
        $productLab->product_lab_test_duration = $request['product_lab_test_duration'];
        $productLab->product_lab_test_fee = $request['product_lab_test_fee'];
        $productLab->product_lab_material_ref = $request['product_lab_material_ref'];
        $productLab->product_lab_material_ref_from = $request['product_lab_material_ref_from'];
        $productLab->product_lab_test_control = $request['product_lab_test_control'];
        $productLab->proficiency_testing = $request['proficiency_testing'];
        $productLab->proficiency_testing_by = $request['proficiency_testing_by'];
        $productLab->proficiency_testing_year = $request['proficiency_testing_year'];
        $productLab->certify_laboratory_id = $request['certify_laboratory_id'];

        $productLab->update();

        // return to productLab that you edit
        return redirect("/productLab/$productLab->id");

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

    protected function validateProductLab()
    {
        return request()->validate([
            'product_name' => 'required',
            'product_type' => '',
        ]);
    }
}
