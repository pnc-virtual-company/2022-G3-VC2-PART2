<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;

class AlumniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Alumni::orderBy('id','desc')->get();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $alumni=new Alumni();
        $alumni->user_id=$request->user_id;
        $alumni->major=$request->major;
        $alumni->batch=$request->batch;
        $alumni->phone=$request->phone;
        $alumni->telegram=$request->telegram;
        $alumni->address=$request->address;
        $alumni->gender=$request->gender;
        $alumni->save();
        return response()->json(['message'=>'create successfully']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alumni  $alumni
     * @return \Illuminate\Http\Response
     */
    public function show(Alumni $alumni)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alumni  $alumni
     * @return \Illuminate\Http\Response
     */
    public function UpdateAlumniIntroduction(Request $request, $id)
    {
        $alumni=Alumni::findOrFail($id);
        $alumni->major = $request->major;
        $alumni->batch = $request->batch;
        $alumni->telegram=$request->telegram;
        $alumni->address=$request->address;
        $alumni->address = $request->address;
        $alumni->gender = $request->gender;
        $alumni->save();
        return response()->json(['message'=>'updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alumni  $alumni
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alumni $alumni)
    {
        //
    }
}
