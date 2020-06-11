<?php

namespace App\Http\Controllers\BasicInformations;

use App\Http\Controllers\Controller;
use App\Model\BasicInformations\IncomePerYear;
use Illuminate\Http\Request;

class IncomePerYearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allIncomePerYear = IncomePerYear::all();
        return view('admin.basic_informations.income_per_years.index',['showAllIncomePerYear' => $allIncomePerYear]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.basic_informations.income_per_years.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate unique data
        $this->validate($request,[
            'incomeDetail' => 'required|unique:income_per_years,income_detail'
        ]);

        //insert new data
        $insertIncomePerYear = new IncomePerYear;
        $insertIncomePerYear->income_detail = $request->input('incomeDetail');
        $insertIncomePerYear->income_status = 'A';
        $insertIncomePerYear->save();

        //retuen index view
        return redirect('/incomePerYear');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\BasicInformations\IncomePerYear  $incomePerYear
     * @return \Illuminate\Http\Response
     */
    public function show(IncomePerYear $incomePerYear)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\BasicInformations\IncomePerYear  $incomePerYear
     * @return \Illuminate\Http\Response
     */
    public function edit(IncomePerYear $incomePerYear)
    {
        $editIncomePerYear = IncomePerYear::find($incomePerYear->id);
        return view('admin.basic_informations.income_per_years.edit',['editIncomePerYear' => $editIncomePerYear]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\BasicInformations\IncomePerYear  $incomePerYear
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IncomePerYear $incomePerYear)
    {
        //validate data before update

        //update data
        $updateIncomePerYear = IncomePerYear::find($incomePerYear->id);
        $incomePerYear->income_detail = $request->input('incomeDetail');
        $incomePerYear->income_status = $request->input('incomeStatus');
        $incomePerYear->save();

        //retuen index view
        return redirect('/incomePerYear');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\BasicInformations\IncomePerYear  $incomePerYear
     * @return \Illuminate\Http\Response
     */
    public function destroy(IncomePerYear $incomePerYear)
    {
        //
    }
}
