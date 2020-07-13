<?php

namespace App\Http\Controllers\Questionnaire;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Employee\Organization;

class QuestionnaireController extends Controller
{
    //Check authenticated user
    public function __construct() {
        $this->middleware('auth');
    }

    public function showUnApproveQuestionnaire() {

        $orgs = Organization::where('completed', 0)->get();

        // return $orgs;

        return view('questionnaires.show-unapprove', [
            'orgs' => $orgs,
        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $org = Organization::find($id);
        $org = Organization::findOrFail($id);

        // Check for correct user
        if(auth()->user()->id !== $org->user_id){
            return redirect()->route('organization.index')->with('error', 'Unauthorized Page');
        }
        
        return view('employee.organization.show', [
            'org' => $org,
        ]);
    }

    public function showApprovedQuestionnaire() {
        return view('questionnaires.show-approved');
    }

    public function showVerifyQuestionnaire() {
        return view('questionnaires.show-verify');
    }
}
