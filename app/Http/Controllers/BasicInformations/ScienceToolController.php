<?php

namespace App\Http\Controllers\BasicInformations;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\BasicInformations\ScienceTool;
use App\Helpers\LogActivity;

class ScienceToolController extends Controller
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
        $allScienceTool = ScienceTool::all();
        return view('admin.basic_informations.science_tools.index')->with('showAllScienceTool',$allScienceTool);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.basic_informations.science_tools.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->input();
        $this->validate($request, [
            'scienceToolName' => 'required|unique:science_tools,science_tool_name',
            'scienceToolAbbr' => 'required|unique:science_tools,science_tool_abbr'
        ]);

        // insert new science tool
        $insertScienceTool = new ScienceTool;
        $insertScienceTool->science_tool_name = $request->input('scienceToolName');
        $insertScienceTool->science_tool_abbr = $request->input('scienceToolAbbr');
        $insertScienceTool->science_tool_status = 'A';
        $insertScienceTool->save();
        
        // create log activity
        LogActivity::addToLog('Add new science tools : " ' . $insertScienceTool->science_tool_name . ' " successfully.');

        // return index view
        return redirect('/scienceTool');

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
        $editScienceTool = ScienceTool::find($id);
        return view('admin.basic_informations.science_tools.edit')->with('editScienceTool',$editScienceTool);
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
        $updateScienceTool = ScienceTool::find($id);
        $updateScienceTool->science_tool_name = $request->input('scienceToolName');
        $updateScienceTool->science_tool_abbr = $request->input('scienceToolAbbr');
        $updateScienceTool->science_tool_status = $request->input('ScienceToolStatus');
        $updateScienceTool->save();

        // create log activity
        LogActivity::addToLog('Update science tools : ' . $updateScienceTool->science_tool_name .' successfully.');
        
        return redirect('/scienceTool');
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
