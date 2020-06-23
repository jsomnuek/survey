<?php

namespace App\Http\Controllers\BasicInformations;

use App\Http\Controllers\Controller;
use App\Model\BasicInformations\QualitySystem;
use Illuminate\Http\Request;
use App\Helpers\LogActivity;


class QualitySystemController extends Controller
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
        $allQualitySystem = QualitySystem::all();
        return view('admin.basic_informations.quality_systems.index', [
            'showAllQualitySystem' => $allQualitySystem
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.basic_informations.quality_systems.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate unique data
        $this->validate($request,[
            'qualitySystemName' => 'required|unique:quality_systems,quality_system_name'
        ]);

        //insert new record
        $insertQualitySystem = new QualitySystem;
        $insertQualitySystem->quality_system_name = $request->input('qualitySystemName');
        $insertQualitySystem->quality_system_status = 'A';
        $insertQualitySystem->save();

        //log activity
        LogActivity::addToLog('Add quality system : " '. $insertQualitySystem->quality_system_name .' " successfully');
    
        //return index view
        return redirect('/qualitySystem');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\BasicInformations\QualitySystem  $qualitySystem
     * @return \Illuminate\Http\Response
     */
    public function show(QualitySystem $qualitySystem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\BasicInformations\QualitySystem  $qualitySystem
     * @return \Illuminate\Http\Response
     */
    public function edit(QualitySystem $qualitySystem)
    {
        $editQualitySystem = QualitySystem::find($qualitySystem->id);
        return view('admin.basic_informations.quality_systems.edit', [
            'editQualitySystem' => $editQualitySystem
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\BasicInformations\QualitySystem  $qualitySystem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QualitySystem $qualitySystem)
    {
        //validate unique data

        //insert new record
        $updateQualitySystem = QualitySystem::find($qualitySystem->id);
        $updateQualitySystem->quality_system_name = $request->input('qualitySystemName');
        $updateQualitySystem->quality_system_status = $request->input('qualitySystemStatus');
        $updateQualitySystem->save();

        //log activity
        LogActivity::addToLog('Edit quality system : " '. $updateQualitySystem->quality_system_name .' " successfully');
    
        //return index view
        return redirect('/qualitySystem');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\BasicInformations\QualitySystem  $qualitySystem
     * @return \Illuminate\Http\Response
     */
    public function destroy(QualitySystem $qualitySystem)
    {
        //
    }
}
