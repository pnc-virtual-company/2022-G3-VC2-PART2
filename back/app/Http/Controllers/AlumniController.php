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
         $user = new User();
        $user-> first_name = $request->first_name;
        $user-> last_name = $request->last_name;
        $user-> email = $request->email;
        $user-> password = $request->password;
        $user-> role = $request->role;
        $user-> image = $request->image;
        $user-> save();
        return response()->Json(["message"=>"alumni is created successfully!"]);
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