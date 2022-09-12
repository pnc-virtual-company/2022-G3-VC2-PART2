<?php

namespace App\Http\Controllers;

use App\Models\AlumniCompany;
use Illuminate\Http\Request;

class AlumniCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AlumniCompany::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $alumniCompany = new AlumniCompany();
        $alumniCompany = company_id -> $request-> company_id;
        $alumniCompany = alumni_id -> $request-> alumni_id;
        $alumniCompany = is_working -> $request -> is_working;
        $alumniCompany = start_date -> $request -> start_date;
        $alumniCompany = end_date -> $request -> end_date;
        $alumniCompany = position -> $request -> position;
        $alumniCompany->save();
        return response()->Json(["message"=>"work experince is created!"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AlumniCompany  $alumniCompany
     * @return \Illuminate\Http\Response
     */
    public function show(AlumniCompany $alumniCompany)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AlumniCompany  $alumniCompany
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $alumniCompany =  AlumniCompany::findOrFail($id);
        $alumniCompany->company_id = $request->company_id;
        $alumniCompany->is_working = $request->is_working;
        $alumniCompany->start_date = $request->start_date;
        if (asset($request->end_date)) {
            $alumniCompany->end_date = $request->end_date;
        } else {
            $alumniCompany->end_date = NULL;
        }
        $alumniCompany->position = $request->position;
        $alumniCompany->save();
        return response()->Json(["message"=>"work experince is updated!"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AlumniCompany  $alumniCompany
     * @return \Illuminate\Http\Response
     */
    public function destroy(AlumniCompany $alumniCompany)
    {
        //
    }
}