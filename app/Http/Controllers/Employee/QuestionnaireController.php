<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Employee\Organization;
use App\Model\Employee\Lab;
use App\Model\Employee\Equipment;
use App\Model\Employee\ProductLab;

class QuestionnaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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

        // return date('Y-m-d H:i:s');

        return view('employee.questionnaire.index', [
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

        return view('employee.questionnaire.show', compact('lab'));

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

        // Reset
        if($survey_status_id == 1) {
            // clean
            $lab->survey_status_id = $request->input('survey_status_id');
            $lab->completed = false;
            $lab->send_date = null;
            $lab->save();

            // clean
            Organization::where('id', $lab->organization_id)->update(['completed' => false,]);

            // $equipments = array();
            foreach ($lab->equipments as $item){
                // clean
                // $equipments[] = $item->id;
                Equipment::where('id', $item->id)->update(['completed' => false,]);
            }
            // return $equipments;

            foreach ($lab->productLabs as $item){
                // clean
                ProductLab::where('id', $item->id)->update(['completed' => false,]);
            }

            return redirect()->route('questionnaire.index');
        }

        // confirm
        if($survey_status_id == 2) {
            // clean
            $lab->survey_status_id = $request->input('survey_status_id');
            $lab->completed = true;
            $lab->send_date = date('Y-m-d H:i:s');
            $lab->save();

            // clean
            Organization::where('id', $lab->organization_id)->update(['completed' => true,]);

            // $equipments = array();
            foreach ($lab->equipments as $item){
                // clean
                // $equipments[] = $item->id;
                Equipment::where('id', $item->id)->update(['completed' => true,]);
            }
            // return $equipments;

            foreach ($lab->productLabs as $item){
                // clean
                ProductLab::where('id', $item->id)->update(['completed' => true,]);
            }

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
