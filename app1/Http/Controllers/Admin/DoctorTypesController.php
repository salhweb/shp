<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Input;
use DB;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;
use Illuminate\Http\Response;
use App\DoctorTypes;
use Validator;
//db-name

class DoctorTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin/doctor.type');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
	$v = Validator::make($request->all(), [
        'doctor_type' => 'required',
   	 ]);

	 if ($v->fails())
	    {
		return redirect()->back()->withErrors($v)->withInput();
	    }
	 else
	{
		$doctor_type = new DoctorTypes;
		$doctor_type->type = $request->input('doctor_type');
		$doctor_type->save();
		$request->session()->flash('alert-success', 'Doctor type added!');
		return view('admin/doctor.type');
	}
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
