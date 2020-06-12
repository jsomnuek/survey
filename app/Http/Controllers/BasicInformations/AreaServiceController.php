<?php

namespace App\Http\Controllers\BasicInformations;

use App\Http\Controllers\Controller;
use App\Model\BasicInformations\AreaService;
use Illuminate\Http\Request;

class AreaServiceController extends Controller
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
        $allAreaService = AreaService::all();
        return view('admin.basic_informations.area_services.index',['showAllAreaService' => $allAreaService]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.basic_informations.area_services.create');
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
            'areaServiceName' => 'required|unique:area_services,area_service_name'
        ]);

        //Insert new data
        $insertAreaService = new AreaService;
        $insertAreaService->area_service_name = $request->input('areaServiceName');
        $insertAreaService->area_service_status = 'A';
        $insertAreaService->save();

        //return to area service view
        return redirect('/areaService');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\BasicInformations\AreaService  $areaService
     * @return \Illuminate\Http\Response
     */
    public function show(AreaService $areaService)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\BasicInformations\AreaService  $areaService
     * @return \Illuminate\Http\Response
     */
    public function edit(AreaService $areaService)
    {
        $editAreaService = AreaService::find($areaService->id);
        return view('admin.basic_informations.area_services.edit',['editAreaService' => $editAreaService]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\BasicInformations\AreaService  $areaService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AreaService $areaService)
    {
        //Validate data before update

        //Update data
        $updateAreaService = AreaService::find($areaService->id);
        $updateAreaService->area_service_name = $request->input('areaServiceName');
        $updateAreaService->area_service_status = $request->input('areaServiceStatus');
        $updateAreaService->save();

        //Return index view
        return redirect('/areaService');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\BasicInformations\AreaService  $areaService
     * @return \Illuminate\Http\Response
     */
    public function destroy(AreaService $areaService)
    {
        //
    }
}
