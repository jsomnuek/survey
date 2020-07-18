<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;

use App\Model\BasicInformations\Role;
use App\Model\BasicInformations\Region;
use App\Model\BasicInformations\Agency;

use App\Helpers\LogActivity;

class EmployeeController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    public function showRegisterEmployee () {

        // get user where role_id = 3 (employee)
        $registerEmployee = User::where('role_id',3)
                                ->where('email', 'not like', "%dss.go.th%")
                                ->orderBy('user_code','asc')
                                ->get();

        return view ('super_users.employees.register-employees',[
            'showRegisterEmployee' => $registerEmployee]);
    }

    public function showLoginEmployee () {
        // get user where remember token is not null
        $loginEmployee = User::whereNotNull('remember_token')
                                ->where('role_id',3)
                                ->where('email', 'not like', "%dss.go.th%")
                                ->get();
        return view ('super_users.employees.login-employees', ['showLoginEmployee' => $loginEmployee]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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
