<?php

namespace App\Http\Controllers\BasicInformations;

use App\Http\Controllers\Controller;
use App\Model\BasicInformations\EducationLevel;
use Illuminate\Http\Request;

class EducationLevelController extends Controller
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
        $allEduLeve = EducationLevel::all();
        return view('admin.basic_informations.education_levels.index',['showAllEduLevel' => $allEduLeve]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.basic_informations.education_levels.create');
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
        $this->validate($request, [
            'eduLevelName' => 'required|unique:education_levels,edu_level_name'
        ]);

        //insert new data
        $insertEduLevel = new EducationLevel;
        $insertEduLevel->edu_level_name = $request->input('eduLevelName');
        $insertEduLevel->edu_level_abbr = $request->input('eduLevelAbbr');
        $insertEduLevel->edu_level_status = 'A';
        $insertEduLevel->save();

        //return  index view
        return redirect('/educationLevel');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\BasicInformations\EducationLevel  $educationLevel
     * @return \Illuminate\Http\Response
     */
    public function show(EducationLevel $educationLevel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\BasicInformations\EducationLevel  $educationLevel
     * @return \Illuminate\Http\Response
     */
    public function edit(EducationLevel $educationLevel)
    {
        $editEduLeve = EducationLevel::find($educationLevel->id);
        return view('admin.basic_informations.education_levels.edit',['editEduLevel' => $editEduLeve]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\BasicInformations\EducationLevel  $educationLevel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EducationLevel $educationLevel)
    {
        //Validate unique data

        //update data
        $updateEduLevel = EducationLevel::find($educationLevel->id);
        $updateEduLevel->edu_level_name = $request->input('eduLevelName');
        $updateEduLevel->edu_level_abbr = $request->input('eduLevelAbbr');
        $updateEduLevel->edu_level_status = $request->input('eduLevelStatus');
        $updateEduLevel->save();

        //return  index view
        return redirect('/educationLevel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\BasicInformations\EducationLevel  $educationLevel
     * @return \Illuminate\Http\Response
     */
    public function destroy(EducationLevel $educationLevel)
    {
        //
    }
}
