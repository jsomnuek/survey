<?php

namespace App\Http\Controllers\BasicInformations;

use App\Http\Controllers\Controller;
use App\Model\BasicInformations\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
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
        $allCountry = Country::all();
        return view('admin.basic_informations.countries.index',['showAllCountry' => $allCountry]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.basic_informations.countries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate date
        $this->validate($request, [
            'countryCode' => 'required|unique:countries,country_code',
            'countryNameThai' => 'required|unique:countries,country_name_thai',
            'countryNameEng' => 'required|unique:countries,country_name_eng'
        ]);

        //insert new data
            $insertCountry = new Country;
            $insertCountry->country_code = $request->input('countryCode');
            $insertCountry->country_name_thai = $request->input('countryNameThai');
            $insertCountry->country_name_eng = $request->input('countryNameEng');
            $insertCountry->country_status = 'A';
            $insertCountry->save();

        //return index view
        return redirect('/country');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\BasicInformations\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\BasicInformations\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        $editCountry = Country::find($country->id);
        return view('admin.basic_informations.countries.edit',['editCountry' => $editCountry]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\BasicInformations\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {
        //validate date

        //insert new data
            $updateCountry = Country::find($country->id);
            $updateCountry->country_code = $request->input('countryCode');
            $updateCountry->country_name_thai = $request->input('countryNameThai');
            $updateCountry->country_name_eng = $request->input('countryNameEng');
            $updateCountry->country_status = $request->input('countryStatus');
            $updateCountry->save();

        //return index view
        return redirect('/country');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\BasicInformations\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        //
    }
}
