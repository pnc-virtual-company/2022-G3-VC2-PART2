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

     
      /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateAlumniInfo(Request $request, $id)
    {
        $alumni =  Alumni::find($id);
        $alumni-> major = $request->major;
        $alumni-> address = $request->address;
        $alumni-> birth_date = $request->birth_date;
        $alumni-> gender = $request->gender;
        $alumni-> save();
        return response()->Json(["message"=>"alumni is updated successfully!"]);

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