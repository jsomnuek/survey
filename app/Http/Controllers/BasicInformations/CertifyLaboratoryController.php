<?php

namespace App\Http\Controllers;

use App\CertifyLaboratory;
use Illuminate\Http\Request;

class CertifyLaboratoryController extends Controller
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
        $allCertLab = CertifyLaboratory::all();
        return view('basic_informations.certifyLaboratory')->with('showAllCertLab',$allCertLab);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('basic_informations.certifyLaboratoryCreate');
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
            'certLabName' => 'required|unique:certify_laboratories,cert_lab_name',
            ]);
        
        // Insert new certify laboratory record
        $insertCertLab = new CertifyLaboratory;
        $insertCertLab->cert_lab_name = $request->input('certLabName');
        $insertCertLab->cert_lab_status = 'A';
        $insertCertLab->save();

        //return productType view
        return redirect('/certifyLaboratory');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\CertifyLaboratory  $certifyLaboratory
     * @return \Illuminate\Http\Response
     */
    public function show(CertifyLaboratory $certifyLaboratory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CertifyLaboratory  $certifyLaboratory
     * @return \Illuminate\Http\Response
     */
    public function edit(CertifyLaboratory $certifyLaboratory)
    {
        $editCertLab = CertifyLaboratory::find($certifyLaboratory->id);
        return view('basic_informations.certifyLaboratoryEdit')->with('editCertLab',$editCertLab);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CertifyLaboratory  $certifyLaboratory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CertifyLaboratory $certifyLaboratory)
    {
        // Validat Data before update
        // $this->validate($request,[
        //     'productTypeName' => 'required|unique:product_types,product_type_name',
        // ]);

        $updateCertLab = CertifyLaboratory::find($certifyLaboratory->id);
        $updateCertLab->cert_lab_name = $request->input('certLabName');
        $updateCertLab->cert_lab_status = $request->input('certLabStatus');
        $updateCertLab->save();

        return redirect('/certifyLaboratory');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CertifyLaboratory  $certifyLaboratory
     * @return \Illuminate\Http\Response
     */
    public function destroy(CertifyLaboratory $certifyLaboratory)
    {
        //
    }
}
