<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\User;
use Illuminate\Http\Request;

class AlumniController extends  Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Alumni::with(['user'])->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $alumni = new Alumni();
        $alumni-> user_id = $request->user_id;
        $alumni-> major = $request->major;
        $alumni-> batch = $request->batch;
        $alumni-> address = $request->address;
        $alumni-> gender = $request->gender;
        $alumni-> save();
        return response()->Json(["message"=>"alumni is created successfully!"]);
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


    public function updateAlumniIntroduction(Request $request, $id)
    {
        $alumni =  Alumni::findOrFail($id);
        $alumni-> phone = $request->phone;
        $alumni-> telegram = $request->telegram;
        $alumni-> batch = $request->batch;
        $user = User::where('id', $alumni->user_id)->get()->first()->update(['first_name' => $request->first_name,'last_name' => $request->last_name,'email' => $request->email]);
        $alumni-> save();
        return response()->Json(["message"=>"introduction is updated successfully!",'phone' => $request->phone, 'telegram' => $request->telegram,'batch' => $request->batch]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alumni  $alumni
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alumni = Alumni::where('id',$id);
        if(!empty($alumni)){
            $alumni->delete();
            return response()->json(['sms'=>'student deleted successfully']);
        }
        return response()->json(['sms'=>'student could not be deleted']);
    }
}

