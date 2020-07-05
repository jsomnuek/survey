<?php

namespace App\Http\Controllers\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Employee\Lab;
use App\Model\Employee\ProductLab;
use App\Model\Employee\Equipment;
use App\Model\BasicInformations\ProductType;
use App\Model\BasicInformations\TestingCalibratingList;
use App\Model\BasicInformations\TestingCalibratingType;
use App\Model\BasicInformations\TestingCalibratingMethod;
use App\Model\BasicInformations\ResultControl;
use App\Model\BasicInformations\CertifyLaboratory;

use App\Helpers\LogActivity;

class ProductLabController extends Controller
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
        $allProductLab = ProductLab::all();
        //return $allProductLab;
        return view('employee.productlab.index',['allProductLabs' => $allProductLab]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allLab = Lab::where('user_id', auth()->user()->id)->get();
        $allEquipment = Equipment::where('user_id', auth()->user()->id)->get();
        $allProductTypes = ProductType::where('product_type_status','A')->get();
        $allTestingCalibratingList = TestingCalibratingList::where('testing_list_status','A')->get();
        $allTestingCalibratingType = TestingCalibratingType::where('testing_calibrating_type_status','A')->get();
        $allTestingCalibratingMethod = TestingCalibratingMethod::where('testing_method_status','A')->get();
        $allResultControl = ResultControl::where('result_control_status','A')->get();
        $allCertifyLaboratory = CertifyLaboratory::where('cert_lab_status','A')->get();
        $data = [
            'labs' => $allLab,
            'equipments' => $allEquipment,
            'productTypes' => $allProductTypes,
            'testingCalibratingLists' => $allTestingCalibratingList,
            'testingCalibratingTypes' => $allTestingCalibratingType,
            'testingCalibratingMethods' => $allTestingCalibratingMethod,
            'resultControls' => $allResultControl,
            'cerifyLaboratories'=>$allCertifyLaboratory,
        ];
        // return $data;
        return view('employee.productLab.create')->with($data);
    }

    public function createFromLabID($labid)
    {
        $allLab = Lab::where('id', $labid)->get();
        $allEquipment = Equipment::where('user_id', auth()->user()->id)->get();
        $allProductTypes = ProductType::where('product_type_status','A')->get();
        $allTestingCalibratingList = TestingCalibratingList::where('testing_list_status','A')->get();
        $allTestingCalibratingType = TestingCalibratingType::where('testing_calibrating_type_status','A')->get();
        $allTestingCalibratingMethod = TestingCalibratingMethod::where('testing_method_status','A')->get();
        $allResultControl = ResultControl::where('result_control_status','A')->get();
        $allCertifyLaboratory = CertifyLaboratory::where('cert_lab_status','A')->get();
        $data = [
            'labs' => $allLab,
            'equipments' => $allEquipment,
            'productTypes' => $allProductTypes,
            'testingCalibratingLists' => $allTestingCalibratingList,
            'testingCalibratingTypes' => $allTestingCalibratingType,
            'testingCalibratingMethods' => $allTestingCalibratingMethod,
            'resultControls' => $allResultControl,
            'cerifyLaboratories'=>$allCertifyLaboratory,
        ];
        // return $data;
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

        // Validate Check
        $this->validateProductLab();

        //clean up sort by number on views
        $productLab = new ProductLab;
        $productLab->user_id = auth()->user()->id;
        $productLab->lab_id = $request['lab_id'];
        $productLab->product_lab_name = $request['product_lab_name'];
        //$productLab->product_type_id = $request['product_type_id'];
        $productLab->product_type_other = $request['product_type_other'];
        $productLab->product_lab_standard = $request['product_lab_standard'];
        $productLab->product_lab_test_name = $request['product_lab_test_name'];
        // for4.5 
        $productLab->testing_calibrating_list_id = $request['testing_calibrating_list_id'];
        $productLab->testing_calibrating_type_id = $request['testing_calibrating_type_id'];
        $productLab->testing_calibrating_type_other = $request['testing_calibrating_type_other'];
        $productLab->testing_calibrating_method_id = $request['testing_calibrating_method_id'];
        $productLab->testing_calibrating_method_detail = $request['testing_calibrating_method_detail'];
        $productLab->product_lab_test_unit = $request['product_lab_test_unit'];
        $productLab->product_lab_test_duration = $request['product_lab_test_duration'];
        $productLab->product_lab_test_fee = $request['product_lab_test_fee'];
        $productLab->product_lab_material_ref = $request['product_lab_material_ref'];
        $productLab->product_lab_material_ref_from = $request['product_lab_material_ref_from'];
        //$productLab->product_lab_test_control = $request['product_lab_test_control'];
        $productLab->product_lab_result_control_other = $request['product_lab_result_control_other'];
        $productLab->proficiency_testing = $request['proficiency_testing'];
        $productLab->proficiency_testing_by = $request['proficiency_testing_by'];
        $productLab->proficiency_testing_year = $request['proficiency_testing_year'];
        $productLab->certify_laboratory_id = $request['certify_laboratory_id'];

        $productLab->save();
        $productLab->equipments()->sync($request->equipments_id, false);
        $productLab->productTypes()->sync($request->product_type_id, false);
        $productLab->resultControls()->sync($request->result_control_id, false);

        // return $productLab;
        return redirect()->route('productLab.show', $productLab->id);
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
        //return $productLab;
        
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
        $allProductLab = ProductLab::findOrFail($id);
        $allProductTypes = ProductType::where('product_type_status','A')->get();
        // return $allProductTypes;
        $allProductTypesItem = [];
        foreach ($allProductLab->productTypes as $item) {
            $allProductTypesItem[] = $item->id;
        }
        return $allProductTypesItem;
        $allEquipment = Equipment::where('lab_id',5)->get();
        // return $allEquipment;

        $allEquipmentsItem = [];
        foreach ($allEquipment->equipments as $item){
            $allEquipmentItem[] = $item->id;
        }
        // return $allEquipmentItem;
        $allTestingCalibratingList = TestingCalibratingList::where('testing_list_status','A')->get();
        $allTestingCalibratingType = TestingCalibratingType::where('testing_calibrating_type_status','A')->get();
        $allTestingCalibratingMethod = TestingCalibratingMethod::where('testing_method_status','A')->get();
        $allResultControl = ResultControl::where('result_control_status','A')->get();
        $allResultControlItem = [];
        foreach ($allProductLab->resultControls as $item) {
            $allResultControlItem[] = $item->id;
        }
        $allCertifyLaboratory = CertifyLaboratory::where('cert_lab_status','A')->get();
        $data = [
            'productLabs' => $allProductLab,
            //'equipments' => $allEquipment,
            'equipmentItem' => $allEquipmentItem,
            'productTypes' => $allProductTypes,
            'productTypesItem' => $allProductTypesItem,
            'testingCalibratingLists' => $allTestingCalibratingList,
            'testingCalibratingTypes' => $allTestingCalibratingType,
            'testingCalibratingMethods' => $allTestingCalibratingMethod,
            'resultControls' => $allResultControl,
            'resultControlsItem' => $allResultControlItem,
            'cerifyLaboratories'=>$allCertifyLaboratory,
        ];
        //return $data;
        return view('employee.productLab.edit')->with($data);

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
        $this->validateProductLab();

        //Clean Up data Before Update to Database

        $productLab =  ProductLab::find($id) ;
        $productLab->user_id = auth()->user()->id;
        $productLab->product_lab_name = $request['product_lab_name'];
        //$productLab->product_type_id = $request['product_type_id'];
        $productLab->product_type_other = $request['product_type_other'];
        $productLab->product_lab_standard = $request['product_lab_standard'];
        $productLab->product_lab_test_name = $request['product_lab_test_name'];
        // for4.5 
        $productLab->testing_calibrating_list_id = $request['testing_calibrating_list_id'];
        $productLab->testing_calibrating_type_id = $request['testing_calibrating_type_id'];
        $productLab->testing_calibrating_type_other = $request['testing_calibrating_type_other'];
        $productLab->testing_calibrating_method_id = $request['testing_calibrating_method_id'];
        $productLab->testing_calibrating_method_detail = $request['testing_calibrating_method_detail'];
        $productLab->product_lab_test_unit = $request['product_lab_test_unit'];
        $productLab->product_lab_test_duration = $request['product_lab_test_duration'];
        $productLab->product_lab_test_fee = $request['product_lab_test_fee'];
        $productLab->product_lab_material_ref = $request['product_lab_material_ref'];
        $productLab->product_lab_material_ref_from = $request['product_lab_material_ref_from'];
        //$productLab->product_lab_test_control = $request['product_lab_test_control'];
        $productLab->product_lab_result_control_other = $request['product_lab_result_control_other'];
        $productLab->proficiency_testing = $request['proficiency_testing'];
        $productLab->proficiency_testing_by = $request['proficiency_testing_by'];
        $productLab->proficiency_testing_year = $request['proficiency_testing_year'];
        $productLab->certify_laboratory_id = $request['certify_laboratory_id'];

        $productLab->save();
        $productLab->productTypes()->sync($request->product_type_id);
        $productLab->resultControls()->sync($request->result_control_id);

        return redirect()->route('productLab.show', $productLab->id);
        // return to productLab that you edit
        //return redirect("/productLab/$productLab->id");

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
            'equipments_id' => ['required'],
            'product_type_id' =>['required'],
            'product_lab_name' =>'required',
            'product_type_other' =>'',
            'product_lab_standard' =>'',
            'product_lab_test_name' =>'',
            'testing_calibrating_list_id' =>'required',
            'testing_calibrating_type_id' =>'required',
            'testing_calibrating_type_other' =>'',
            'testing_calibrating_method_id' =>'required', 
            'testing_calibrating_method_detail' =>'',
            'product_lab_test_unit' =>'',
            'product_lab_test_duration' =>'',
            'product_lab_test_fee' =>'',
            'product_lab_material_ref' =>'',
            'product_lab_material_ref_from' =>'',
            'product_lab_test_control' =>'',
            'product_lab_result_control_other' =>'',
            'proficiency_testing' =>'required',
            'proficiency_testing_by' =>'',
            'proficiency_testing_year' =>'',
            'certify_laboratory_id' =>'required',
            'product_type_id' =>'required',
            'result_control_id' =>['required'],
        ]);
    }
}