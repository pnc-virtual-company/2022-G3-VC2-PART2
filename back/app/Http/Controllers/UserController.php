<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Alumni;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::all();
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        if ($user) {
            if ($user->role == 'alumni') {
                return User::with(['alumni', 'work_experience.company', 'education_backgrounds.school', 'skills.skill'])->where('id', $id)->first();
            } 
            // else if ($user->role == 'ero') {
            //     return User::with('alumni')->first();
            // }
            // else if ($user->role == 'admin') {
            //     return User::with('admin')->first();
            // }
        }
        abort(404);
    }
    /**


     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
      public function updateAlumnIntro(Request $request, $id)
    {
        $user =  User::findOrFail($id);
        $user-> first_name = $request->first_name;
        $user-> last_name = $request->last_name;
        $user-> email = $request->email;
        $user-> save();
        $alumni = Alumni::where('user_id', $id)->update([
            'phone' => $request->phone,
            'telegram' => $request->telegram,
            'batch' => $request->batch,
            'major' => $request->major,
            'address' => $request->address,
            'gender' => $request->gender,
            'birth_date' => $request->birth_date,
        ]);
        return response()->Json(["message"=>"introduction is updated successfully!"]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $idDeleted = User::destroy($id);
        if ($idDeleted) {
            return response()->json(['message' => 'User have been deleted'], 200);
        } else {
            return response()->json(['message' => 'Cannot delete!!'], 404);
        }
    }





}