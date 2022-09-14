<?php

namespace App\Http\Controllers;

use App\Models\AlumniSkill;
use Illuminate\Http\Request;

class AlumniSkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AlumniSkill::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $alumniSkill = new AlumniSkill();
        $alumniSkill->user_id = $request->user_id;
        $alumniSkill->skill_id = $request->skill_id;

        $alumniSkill->save();
        return response()->Json(['sms'=> "skill is added"]);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AlumniSkill  $alumniSkill
     * @return \Illuminate\Http\Response
     */
    public function show(AlumniSkill $alumniSkill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AlumniSkill  $alumniSkill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AlumniSkill $alumniSkill)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AlumniSkill  $alumniSkill
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alumniSkill = AlumniSkill::where('id', $id)->get();
        if(count($alumniSkill)>0){
            AlumniSkill::destroy($id);
            return response()->json(['message'=>"skill delete successfully"]);
        }else{
            return response()->json(['message'=>"skill cannot delete successfully"]);
        }
    }
}
