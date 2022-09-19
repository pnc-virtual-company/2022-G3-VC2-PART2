<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return School::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $school = new School();
        $school->name = $request->name;
        $school->address = $request->address;
        if ($request->logo && $request->logo != 'null') {
            $logo = $request->logo;
            $newName = "IMG_LOGO". time() . "_" . $logo->getClientOriginalName();
            $school->logo = $newName;
            $logo->move(storage_path('images'), $newName);
        } else {
            $school->logo = "school_logo.jpg";
        }
        if($request->link && $request->link != 'null'){
            $school->link = $request->link;
        } else {
            $school->link = NULL;
        }
        $school->save();
        return $school;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return School::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $school = School::findOrFail($id);
         $school->name = $request->name;
         if ($request->logo) {
            $school->logo = $request->logo;
        }
        if($request->link){
            $school->link = $request->link;
        }
         $school->save();
 
         return response()->Json(["sms"=>"school is updated"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return School::destroy($id);
    }
}
