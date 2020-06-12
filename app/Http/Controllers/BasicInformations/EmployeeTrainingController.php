<?php

namespace App\Http\Controllers\BasicInformations;

use App\Http\Controllers\Controller;
use App\Model\BasicInformations\EmployeeTraining;
use Illuminate\Http\Request;

class EmployeeTrainingController extends Controller
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
        $allEmpTraining = EmployeeTraining::all();
        return view('admin.basic_informations.employee_trainings.index',['showAllEmpTraining' => $allEmpTraining]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.basic_informations.employee_trainings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate data
        $this->validate($request,[
            'empTrainingDetail' => 'required|unique:employee_trainings,emp_training_detail'
        ]);

        //insert new data
        $insertEmpTraining = new EmployeeTraining;
        $insertEmpTraining->emp_training_detail = $request->input('empTrainingDetail');
        $insertEmpTraining->emp_training_status = ('A');
        $insertEmpTraining->save();

        //return index view
        return redirect('/employeeTraining');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\BasicInformations\EmployeeTraining  $employeeTraining
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeeTraining $employeeTraining)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\BasicInformations\EmployeeTraining  $employeeTraining
     * @return \Illuminate\Http\Response
     */
    public function edit(EmployeeTraining $employeeTraining)
    {
        $editEmpTraining = EmployeeTraining::find($employeeTraining->id);
        return view('admin.basic_informations.employee_trainings.edit',['editEmpTraining' => $editEmpTraining]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\BasicInformations\EmployeeTraining  $employeeTraining
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmployeeTraining $employeeTraining)
    {
        //validate data

        //update data
        $updateEmpTraining = EmployeeTraining::find($employeeTraining->id);
        $updateEmpTraining->emp_training_detail = $request->input('empTrainingDetail');
        $updateEmpTraining->emp_training_status = $request->input('empTrainingStatus');
        $updateEmpTraining->save();

        //return index view
        return redirect('/employeeTraining');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\BasicInformations\EmployeeTraining  $employeeTraining
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployeeTraining $employeeTraining)
    {
        //
    }
}
