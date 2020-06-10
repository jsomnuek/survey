<?php

namespace App\Http\Controllers\BasicInformations;

use App\Http\Controllers\Controller;
use App\Model\BasicInformations\ObjectiveUsage;
use Illuminate\Http\Request;

class ObjectiveUsageController extends Controller
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
        $allObjUsage = ObjectiveUsage::all();
        return view('admin.basic_informations.objective_usages.index')->with('showAllObjUsage',$allObjUsage);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.basic_informations.objective_usages.create');
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
            'objUsageName' => 'required|unique:objective_usages,obj_usage_name',
            ]);
        
        // Insert new product type record
        $insertObjUsage = new ObjectiveUsage;
        $insertObjUsage->obj_usage_name = $request->input('objUsageName');
        $insertObjUsage->obj_usage_status = 'A';
        $insertObjUsage->save();

        //return productType view
        return redirect('/objectiveUsage');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ObjectiveUsage  $objectiveUsage
     * @return \Illuminate\Http\Response
     */
    public function show(ObjectiveUsage $objectiveUsage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ObjectiveUsage  $objectiveUsage
     * @return \Illuminate\Http\Response
     */
    public function edit(ObjectiveUsage $objectiveUsage)
    {
        $editObjUsage = ObjectiveUsage::find($objectiveUsage->id);
        return view('admin.basic_informations.objective_usages.edit')->with('editObjUsage',$editObjUsage);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ObjectiveUsage  $objectiveUsage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ObjectiveUsage $objectiveUsage)
    {
        // Validat Data before update
        // $this->validate($request,[
        //     'productTypeName' => 'required|unique:product_types,product_type_name',
        // ]);

        $updateObjUsage = ObjectiveUsage::find($objectiveUsage->id);
        $updateObjUsage->obj_usage_name = $request->input('objUsageName');
        $updateObjUsage->obj_usage_status = $request->input('objUsageStatus');
        $updateObjUsage->save();

        return redirect('/objectiveUsage');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ObjectiveUsage  $objectiveUsage
     * @return \Illuminate\Http\Response
     */
    public function destroy(ObjectiveUsage $objectiveUsage)
    {
        //
    }
}
