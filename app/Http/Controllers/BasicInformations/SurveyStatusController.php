<?php

namespace App\Http\Controllers\BasicInformations;

use App\Http\Controllers\Controller;
use App\Model\BasicInformations\SurveyStatus;
use Illuminate\Http\Request;
use App\Helpers\LogActivity;

class SurveyStatusController extends Controller
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
        $allSurveyStatus = SurveyStatus::all();
        return view('admin.basic_informations.survey_statuses.index',['showAllSurveyStatus' => $allSurveyStatus]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.basic_informations.survey_statuses.create');
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
            'surveyStatusNameEn' => 'required|unique:survey_statuses,survey_status_name_en',
        ]);

        // insert new science tool
        $insertServey = new SurveyStatus;
        $insertServey->survey_status_name_en = $request->input('surveyStatusNameEn');
        $insertServey->survey_status_name_th = $request->input('surveyStatusNameTh');
        $insertServey->survey_status_status = 'A';
        $insertServey->save();
        
        // create log activity
        LogActivity::addToLog('Add science tools : " ' . $insertServey->survey_status_name . ' " successfully.');

        // return index view
        return redirect('/surveyStatus');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\BasicInformations\SurveyStatus  $surveyStatus
     * @return \Illuminate\Http\Response
     */
    public function show(SurveyStatus $surveyStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\BasicInformations\SurveyStatus  $surveyStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(SurveyStatus $surveyStatus)
    {
        $editSurveyStatus = SurveyStatus::find($surveyStatus->id);
        return view('admin.basic_informations.survey_statuses.edit', ['editSurveyStatus' => $editSurveyStatus]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\BasicInformations\SurveyStatus  $surveyStatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SurveyStatus $surveyStatus)
    {
        //validate data

        //update data
        $updateSurveyStatus = SurveyStatus::find($surveyStatus->id);
        $updateSurveyStatus->survey_status_name_en = $request->input('surveyStatusNameEn');
        $updateSurveyStatus->survey_status_name_th = $request->input('surveyStatusNameTh');
        $updateSurveyStatus->survey_status_status = $request->input('surveyStatusStatus');
        $updateSurveyStatus->save();

        //log activity
        LogActivity::addToLog('Edit survey status : " '. $updateSurveyStatus->quality_system_name .' " successfully');
    

        //return index view
        return redirect('/surveyStatus');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\BasicInformations\SurveyStatus  $surveyStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(SurveyStatus $surveyStatus)
    {
        //
    }
}
