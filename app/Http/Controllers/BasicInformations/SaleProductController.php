<?php

namespace App\Http\Controllers\BasicInformations;

use App\Http\Controllers\Controller;
use App\Model\BasicInformations\SaleProduct;
use Illuminate\Http\Request;

class SaleProductController extends Controller
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
        $allSaleProduct = SaleProduct::all();
        return view('admin.basic_informations.sale_products.index')->with('showAllSaleProduct', $allSaleProduct);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.basic_informations.sale_products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate unique data
        $this->validate($request,[
            'saleProductName' => 'required|unique:sale_products,sale_product_name'
        ]);

        //Insert new data
        $insertSaleProduct = new SaleProduct;
        $insertSaleProduct->sale_product_name = $request->input('saleProductName');
        $insertSaleProduct->sale_product_status = 'A';
        $insertSaleProduct->save();

        //Retuen sale product view
        return redirect('/saleProduct');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\BasicInformations\SaleProduct  $saleProduct
     * @return \Illuminate\Http\Response
     */
    public function show(SaleProduct $saleProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\BasicInformations\SaleProduct  $saleProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(SaleProduct $saleProduct)
    {
        $editSaleProduct = SaleProduct::find($saleProduct->id);
        return view('admin.basic_informations.sale_products.edit')->with('editSaleProduct', $saleProduct);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\BasicInformations\SaleProduct  $saleProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SaleProduct $saleProduct)
    {
        //Validate data before update

        $updateSaleProduct = SaleProduct::find($saleProduct->id);
        $updateSaleProduct->sale_product_name = $request->input('saleProductName');
        $updateSaleProduct->sale_product_status = $request->input('saleProductStatus');
        $updateSaleProduct->save();

        //return sale product view
        return redirect('/saleProduct');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\BasicInformations\SaleProduct  $saleProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(SaleProduct $saleProduct)
    {
        //
    }
}
