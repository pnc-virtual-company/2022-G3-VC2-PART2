<?php

namespace App\Http\Controllers;

use App\Models\AlumniSchool;
use Illuminate\Http\Request;

class AlumniSchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AlumniSchool::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $alumniSchool = new AlumniSchool();
        $alumniSchool->user_id = $request->user_id;
        $alumniSchool->school_id = $request->school_id;
        $alumniSchool->start_date = $request->start_date;
        $alumniSchool->end_date = $request->end_date;
        $alumniSchool->major = $request->major;
        $alumniSchool->degree = $request->degree;

        $alumniSchool->save();
        return response()->Json(['sms'=> "school is added"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AlumniSchool  $alumniSchool
     * @return \Illuminate\Http\Response
     */
    public function show(AlumniSchool $alumniSchool)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AlumniSchool  $alumniSchool
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AlumniSchool $alumniSchool)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AlumniSchool  $alumniSchool
     * @return \Illuminate\Http\Response
     */
    public function destroy(AlumniSchool $alumniSchool)
    {
        //
    }
}
