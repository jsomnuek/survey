<?php

namespace App\Http\Controllers\Officer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;

use App\Helpers\LogActivity;

use App\Model\BasicInformations\SurveyStatus;

use App\Model\Employee\Lab;

use App\Model\Logs\LogCommentLab;

class QuestionnaireController extends Controller
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
        $users = User::where('region_id', auth()->user()->region->id)
            ->where('role_id', 3)    
            ->get();

        $surveyStatus = SurveyStatus::all();

        // return $users;

        return view('officer.questionnaire.index', [
            'users' => $users,
            'surveyStatus' => $surveyStatus,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $logCommentLabs = LogCommentLab::where('user_id', $id)->get();
        $surveyStatus = SurveyStatus::all();

        $labs = Lab::where('user_id', $id)
            ->orderBy('created_at', 'desc')
            ->get();

        $labJuly = Lab::where('user_id', $id)
            ->whereMonth('send_date', '07')
            ->get();
        $labAugust = Lab::where('user_id', $id)
            ->whereMonth('send_date', '08')
            ->get();
        $labSeptember = Lab::where('user_id', $id)
            ->whereMonth('send_date', '09')
            ->get();

        // return $logCommentLabs;

        return view('officer.questionnaire.show', [
            'user' => $user,
            'logCommentLabs' => $logCommentLabs,
            'surveyStatus' => $surveyStatus,
            'labs' => $labs,
            'labJuly' => $labJuly,
            'labAugust' => $labAugust,
            'labSeptember' => $labSeptember,
        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $lab = Lab::find($id);

        $surveyStatus = SurveyStatus::all();

        return view('officer.questionnaire.detail', compact(['lab', 'surveyStatus']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $survey_status_id = $request->input('survey_status_id');

        $lab = Lab::find($id);

        // if approve
        if($survey_status_id == 2) {
            // clean
            $lab->survey_status_id = 4;
            $lab->approve_date = date('Y-m-d H:i:s');
            $lab->save();

            // create log activity
            LogActivity::addToLog("Employee Approve Lab : $lab->id : $lab->lab_code successfully.");

            return redirect()->route('officer-questionnaire.show', $lab->user_id);
        }

        // if reject
        if($survey_status_id == 5) {
            // clean
            $lab->survey_status_id = 5;
            $lab->save();

            $logCommentLab = new LogCommentLab;
            $logCommentLab->user_id = $request->input('user_id');
            $logCommentLab->lab_id = $request->input('lab_id');
            $logCommentLab->survey_status_id = $survey_status_id;
            $logCommentLab->comment_lab_detail = $request->input('comment_lab_detail');
            $logCommentLab->reject_date = date('Y-m-d H:i:s');
            $logCommentLab->save();

            // create log activity
            LogActivity::addToLog("Employee Reject Lab : $lab->id : $lab->lab_code successfully.");

            return redirect()->route('officer-questionnaire.show', $lab->user_id);
        }
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
