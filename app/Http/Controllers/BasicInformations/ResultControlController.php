<?php

namespace App\Http\Controllers\BasicInformations;

use App\Http\Controllers\Controller;
use App\Model\BasicInformations\ResultControl;
use Illuminate\Http\Request;

class ResultControlController extends Controller
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
        $allResultControl = ResultControl::all();
        return view ('admin.basic_informations.result_controls.index',['showAllResultControl' => $allResultControl]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.basic_informations.result_controls.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate data
        $this->validate($request, [
            'resultControlName' => 'required|unique:result_controls,result_control_name'
        ]);

        //insert new data
        $insertResultControl = new ResultControl;
        $insertResultControl->result_control_name = $request->input('resultControlName');
        $insertResultControl->result_control_status = ('A');
        $insertResultControl->save();

        //return index view
        return redirect('/resultControl');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\BasicInformations\ResultControl  $resultControl
     * @return \Illuminate\Http\Response
     */
    public function show(ResultControl $resultControl)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\BasicInformations\ResultControl  $resultControl
     * @return \Illuminate\Http\Response
     */
    public function edit(ResultControl $resultControl)
    {
        $editResultControl = ResultControl::find($resultControl->id);
        return view ('admin.basic_informations.result_controls.edit',['editResultControl' => $editResultControl]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\BasicInformations\ResultControl  $resultControl
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ResultControl $resultControl)
    {
        //validate data

        //update new data
        $updateResultControl = ResultControl::find($resultControl->id);
        $updateResultControl->result_control_name = $request->input('resultControlName');
        $updateResultControl->result_control_status = $request->input('resultControlStatus');
        $updateResultControl->save();

        //return index view
        return redirect('/resultControl');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\BasicInformations\ResultControl  $resultControl
     * @return \Illuminate\Http\Response
     */
    public function destroy(ResultControl $resultControl)
    {
        //
    }
}
