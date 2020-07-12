<?php

namespace App\Http\Controllers\Questionnaire;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QuestionnaireController extends Controller
{
    //Check authenticated user
    public function __construct() {
        $this->middleware('auth');
    }

    public function showUnApproveQuestionnaire() {
        return view('questionnaires.show-unapprove');
    }

    public function showApprovedQuestionnaire() {
        return view('questionnaires.show-approved');
    }

    public function showVerifyQuestionnaire() {
        return view('questionnaires.show-verify');
    }
}
