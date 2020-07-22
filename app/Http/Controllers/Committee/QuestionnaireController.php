<?php

namespace App\Http\Controllers\Committee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;

use App\Helpers\LogActivity;

use App\Model\BasicInformations\SurveyStatus;

use App\Model\Employee\Lab;

use App\Model\Logs\LogCommentLab;
use App\Model\Logs\LogCommentLabFile;

class QuestionnaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('role_id', 3)
            ->where('status', 'A')
            ->where('user_code', 'NOT LIKE', '%IT%')   
            ->get();

        // return $users;

        return view('committee.questionnaire.index', [
            'users' => $users,
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

        return view('committee.questionnaire.show', [
            'user' => $user,
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

        return view('committee.questionnaire.detail', compact(['lab', 'surveyStatus']));
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
        //
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
