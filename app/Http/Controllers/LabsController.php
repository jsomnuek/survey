<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lab;

class LabsController extends Controller
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
        $allLabs = Lab::all();
        //dd($allLabs);
        //return $allLabs;
        return view('lab')->with('showAllLabs',$allLabs);

    }

}
