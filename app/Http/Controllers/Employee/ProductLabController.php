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
        
        return view('employee.productlab.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allIndustrialTypes = IndustrialType::all();
        $allProductTypes = ProductType::all();
        $allTestingCalibratingType = TestingCalibratingType::all();
        $allCertifyLaboratory = CertifyLaboratory::all();
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
