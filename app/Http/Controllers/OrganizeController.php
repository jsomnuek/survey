<?php

namespace App\Http\Controllers;

use App\Organize;
use App\IndustrialEstate;
use Illuminate\Http\Request;

class OrganizeController extends Controller
{
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
        $allOrgData = Organize::all();
        //$allEstate = IndustrialEstate::all();
        //dd($allOrgData);
        //return $allOrgData;

        return view('employee.organize.organize')->with('showAllOrg',$allOrgData);
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
     * @param  \App\Organize  $organize
     * @return \Illuminate\Http\Response
     */
    public function show(Organize $organize)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Organize  $organize
     * @return \Illuminate\Http\Response
     */
    public function edit(Organize $organize)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Organize  $organize
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Organize $organize)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Organize  $organize
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organize $organize)
    {
        //
    }
}
