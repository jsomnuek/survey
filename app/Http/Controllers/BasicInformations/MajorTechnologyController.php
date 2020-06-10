<?php

namespace App\Http\Controllers\BasicInformations;

use App\Http\Controllers\Controller;
use App\Model\BasicInformations\MajorTechnology;
use Illuminate\Http\Request;

class MajorTechnologyController extends Controller
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
        $allMajorTech = MajorTechnology::all();
        return view('admin.basic_informations.major_technologies.index')->with('showAllMajorTech',$allMajorTech);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.basic_informations.major_technologies.create');
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
            'majorTechName' => 'required|unique:major_technologies,major_tech_name',
            ]);
        
        // Insert new product type record
        $insertMajorTech = new MajorTechnology;
        $insertMajorTech->major_tech_name = $request->input('majorTechName');
        $insertMajorTech->major_tech_status = 'A';
        $insertMajorTech->save();

        //return productType view
        return redirect('/majorTechnology');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\MajorTechnology  $majorTechnology
     * @return \Illuminate\Http\Response
     */
    public function show(MajorTechnology $majorTechnology)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MajorTechnology  $majorTechnology
     * @return \Illuminate\Http\Response
     */
    public function edit(MajorTechnology $majorTechnology)
    {
        $editMajorTech = MajorTechnology::find($majorTechnology->id);
        return view('admin.basic_informations.major_technologies.edit')->with('editMajorTech',$editMajorTech);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MajorTechnology  $majorTechnology
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MajorTechnology $majorTechnology)
    {
        // Validat Data before update
        // $this->validate($request,[
        //     'productTypeName' => 'required|unique:product_types,product_type_name',
        // ]);

        $updateMajorTech = MajorTechnology::find($majorTechnology->id);
        $updateMajorTech->major_tech_name = $request->input('majorTechName');
        $updateMajorTech->major_tech_status = $request->input('majorTechStatus');
        $updateMajorTech->save();

        return redirect('/majorTechnology');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MajorTechnology  $majorTechnology
     * @return \Illuminate\Http\Response
     */
    public function destroy(MajorTechnology $majorTechnology)
    {
        //
    }
}
