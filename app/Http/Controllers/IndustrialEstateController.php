<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\IndustrialEstate;

class IndustrialEstateController extends Controller
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
        $allEstate = IndustrialEstate::paginate(15);
        return view('basic_informations.industrialEstate')->with('showAllEstate',$allEstate);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('basic_informations.industrialEstateCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validat Data before insert
        $this->validate($request,[
            'estateName' => 'required|unique:industrial_estates,estate_name',
        ]);

        // return $request->input();
        // dd();

        //insert new industrail estate record
        $insertEstate = new IndustrialEstate;
        $insertEstate->estate_name = $request->input('estateName');
        $insertEstate->estate_status = 'A';
        $insertEstate->save();

        // return view('basic_informations.industrialEstate');
        return redirect('/industrialEstate');
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
        $editEstate = IndustrialEstate::find($id);

        return view('basic_informations.industrialEstateEdit')->with('editEstate',$editEstate);
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
        // Validat Data before update
        // $this->validate($request,[
        //     'estateName' => 'required|unique:industrial_estates,estate_name',
        // ]);
        
        //
        $updateEstate = IndustrialEstate::find($id);
        $updateEstate->estate_name = $request->input('estateName');
        $updateEstate->estate_status = $request->input('estateStatus');
        $updateEstate->save();

        return redirect('/industrialEstate');
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
