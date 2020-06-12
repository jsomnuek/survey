<?php

namespace App\Http\Controllers\BasicInformations;

use App\Http\Controllers\Controller;
use App\Model\BasicInformations\EnvironmentManage;
use Illuminate\Http\Request;

class EnvironmentManageController extends Controller
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
        $allEvnManage = EnvironmentManage::all();
        return view('admin.basic_informations.environment_manages.index',['showAllEnvManage' => $allEvnManage]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.basic_informations.environment_manages.create');
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
            'envMangeName' => 'required|unique:environment_manages,env_manage_name'
        ]);

        //insert new data
        $insertEnvMange = new EnvironmentManage;
        $insertEnvMange->env_manage_name = $request->input('envMangeName');
        $insertEnvMange->env_manage_status = 'A';
        $insertEnvMange->save();

        //return index view
        return redirect('/environmentManage');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\BasicInformations\EnvironmentManage  $environmentManage
     * @return \Illuminate\Http\Response
     */
    public function show(EnvironmentManage $environmentManage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\BasicInformations\EnvironmentManage  $environmentManage
     * @return \Illuminate\Http\Response
     */
    public function edit(EnvironmentManage $environmentManage)
    {
        $editEnvManage = EnvironmentManage::find($environmentManage->id);
        return view('admin.basic_informations.environment_manages.edit',['editEnvManage' => $editEnvManage]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\BasicInformations\EnvironmentManage  $environmentManage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EnvironmentManage $environmentManage)
    {
        //validate data

        //update data
        $updateEnvManage = EnvironmentManage::find($environmentManage->id);
        $updateEnvManage->env_manage_name = $request->input('envManageName');
        $updateEnvManage->env_manage_status = $request->input('envManageStatus');
        $updateEnvManage->save();

        //return index view
        return redirect('/environmentManage');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\BasicInformations\EnvironmentManage  $environmentManage
     * @return \Illuminate\Http\Response
     */
    public function destroy(EnvironmentManage $environmentManage)
    {
        //
    }
}
