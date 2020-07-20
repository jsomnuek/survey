<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Helpers\LogActivity;

use App\User;

use App\Model\Employee\Organization;
use App\Model\Employee\Lab;
use App\Model\Employee\Equipment;
use App\Model\Employee\ProductLab;

use App\Model\BasicInformations\SurveyStatus;

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
        $user = User::find(auth()->user()->id);

        $logCommentLabs = LogCommentLab::where('user_id', auth()->user()->id)->get();

        $surveyStatus = SurveyStatus::all();

        $labs = Lab::where('user_id', auth()->user()->id)
            ->orderBy('created_at', 'desc')
            ->get();

        $labJuly = Lab::where('user_id', auth()->user()->id)
            ->whereMonth('send_date', '07')
            ->get();
        $labAugust = Lab::where('user_id', auth()->user()->id)
            ->whereMonth('send_date', '08')
            ->get();
        $labSeptember = Lab::where('user_id', auth()->user()->id)
            ->whereMonth('send_date', '09')
            ->get();

        // return $logCommentLabs;

        return view('employee.questionnaire.index', [
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
        $lab = Lab::find($id);
        
        $user = User::find($lab->user_id);

        $surveyStatus = SurveyStatus::all();

        return view('employee.questionnaire.show', compact(['lab', 'user', 'surveyStatus']));

        // return response()->json(['data' => $lab]);
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

        // if send
        if($survey_status_id == 1) {
            // clean
            $lab->survey_status_id = 2;
            $lab->send_date = date('Y-m-d H:i:s');
            $lab->save();

            // create log activity
            LogActivity::addToLog("Employee Edit Lab : $lab->id : $lab->lab_code successfully.");

            return redirect()->route('questionnaire.index');
        }
        // if edit
        if($survey_status_id == 3) {
            // clean
            $lab->survey_status_id = 2;
            $lab->save();

            // create log activity
            LogActivity::addToLog("Employee Edit Lab : $lab->id : $lab->lab_code successfully.");

            return redirect()->route('questionnaire.index');
        }

        // Test function Reset
        if($survey_status_id == 100) {
            // clean
            $lab->survey_status_id = 1;
            $lab->completed = false;
            $lab->send_date = null;
            $lab->save();

            // $equipments = array();
            // foreach ($lab->equipments as $item){
            //     // clean
            //     // $equipments[] = $item->id;
            //     Equipment::where('id', $item->id)->update(['completed' => false,]);
            // }
            // return $equipments;

            // foreach ($lab->productLabs as $item){
            //     // clean
            //     ProductLab::where('id', $item->id)->update(['completed' => false,]);
            // }

            return redirect()->route('questionnaire.index');
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
