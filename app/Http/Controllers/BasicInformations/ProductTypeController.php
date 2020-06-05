<?php

namespace App\Http\Controllers;

use App\ProductType;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
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
        $allProductType = ProductType::all();
        return view('basic_informations.productType')->with('showAllProductType',$allProductType);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('basic_informations.productTypeCreate');
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
            'productTypeName' => 'required|unique:product_types,product_type_name',
            ]);
        
        // Insert new product type record
        $insertProductType = new ProductType;
        $insertProductType->product_type_name = $request->input('productTypeName');
        $insertProductType->product_type_status = 'A';
        $insertProductType->save();

        //return productType view
        return redirect('/productType');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductType  $productType
     * @return \Illuminate\Http\Response
     */ 
    public function show(ProductType $productType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
     public function edit(ProductType $productType)
    {
        $editProductType = ProductType::find($productType->id);
        return view('basic_informations.productTypeEdit')->with('editProductType',$editProductType);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductType $productType)
    {
        // Validat Data before update
        // $this->validate($request,[
        //     'productTypeName' => 'required|unique:product_types,product_type_name',
        // ]);

        $updateProductType = ProductType::find($productType->id);
        $updateProductType->product_type_name = $request->input('productTypeName');
        $updateProductType->product_type_status = $request->input('productTypeStatus');
        $updateProductType->save();

        return redirect('/productType');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductType $productType)
    {
        //
    }
}
