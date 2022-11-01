<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /*public function addAdmin(Request $request)
    {
        $data = new adminUser;

        $data->agencyName=$request->agencyName;
        $data->firstName=$request->firstName;
        $data->lastName=$request->lastName;
        $data->emergencyType=$request->emergencyType;
        $data->address=$request->address;
        $data->contactNumber=$request->contactNumber;
        $data->email=$request->name;
        $data->password=$request->password;

        $data->role='2';

        $data->save();

        require redirect()->back();

    }*/
}
