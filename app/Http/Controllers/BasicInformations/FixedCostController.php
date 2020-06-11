<?php

namespace App\Http\Controllers\BasicInformations;

use App\Http\Controllers\Controller;
use App\Model\BasicInformations\FixedCost;
use Illuminate\Http\Request;

class FixedCostController extends Controller
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
        $allFixedCost = FixedCost::all();
        return view('admin.basic_informations.fixed_costs.index',['showAllFixedCost' => $allFixedCost]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.basic_informations.fixed_costs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate unique data
        $this->validate($request,[
            'fixedCostName' => 'required|unique:fixed_costs,fixed_cost_name'
        ]);

        //Insert new data
        $insertFixedCost = new FixedCost;
        $insertFixedCost->fixed_cost_name = $request->input('fixedCostName');
        $insertFixedCost->fixed_cost_status = 'A';
        $insertFixedCost->save();

        //return fixed cost view
        return redirect('/fixedCost');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\BasicInformations\FixedCost  $fixedCost
     * @return \Illuminate\Http\Response
     */
    public function show(FixedCost $fixedCost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\BasicInformations\FixedCost  $fixedCost
     * @return \Illuminate\Http\Response
     */
    public function edit(FixedCost $fixedCost)
    {
        $editFixedCost = FixedCost::find($fixedCost->id);
        return view('admin.basic_informations.fixed_costs.edit',['editFixedCost' => $editFixedCost]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\BasicInformations\FixedCost  $fixedCost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FixedCost $fixedCost)
    {
        //Validate data before update

        //update data
        $updateFixedCost = FixedCost::find($fixedCost->id);
        $updateFixedCost->fixed_cost_name = $request->input('fixedCostName');
        $updateFixedCost->fixed_cost_status = $request->input('fixedCostStatus');
        $updateFixedCost->save();

        //return fixed cost view
        return redirect('/fixedCost');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\BasicInformations\FixedCost  $fixedCost
     * @return \Illuminate\Http\Response
     */
    public function destroy(FixedCost $fixedCost)
    {
        //
    }
}
