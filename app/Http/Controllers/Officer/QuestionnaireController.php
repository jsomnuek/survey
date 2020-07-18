<?php

namespace App\Http\Controllers\Officer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;

use App\Helpers\LogActivity;

use App\Model\BasicInformations\SurveyStatus;

use App\Model\Employee\Lab;

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

        // return $labs;

        return view('officer.questionnaire.show', [
            'user' => $user,
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
        return $id;
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
