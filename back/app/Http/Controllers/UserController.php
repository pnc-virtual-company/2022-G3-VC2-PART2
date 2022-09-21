<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Alumni;
use App\Models\Ero;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->profile = 'avatar.png';
        $user->cover = 'avatar.png'; 
        $user->save();
        return response()->Json(["message"=>"alumni is created successfully!"]);
    }

    public function inviteEro(Request $request)
    {
        $user = new User();
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 'ero';
        $user->profile = 'avatar.png';
        $user->cover = 'avatar.png';
        $user->save();

        $ero = new Ero();
        $ero->user_id = $user->id;
        $ero->save();
        return response()->Json(["message"=>"ero is created successfully!"]);
        
    }

    public function registerEro(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->save();

        return response()->json(["sms"=> "Ero is register successfully!"]);
    }

    public function getEro()
    {
       return User::where('role', 'ero')->where('first_name', '!=', NULL)->where('last_name', '!=', NULL)->get();
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
            else {
                return $user;
            }
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
    public function resetPassword(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if (Hash::check($request->confirm_current_password,$user->password)) {
            if (!Hash::check($request->new_password, $user->password)) {
                $user->password = Hash::make($request->new_password);
                $user->save();
                return Response()->json(['message' => 'password is changed']);
            } else {
                return Response()->json(['message' => 'you must add a new password']);
            }
        } else {
            return Response()->json(['message' => 'incorrect current password']);
        }
    }

    public function logIn(Request $request)
    {
        //check email
        $user = User::where('email', $request->email)->first();
        //check password
        if($user){
            if(Hash::check($request->password, $user->password)){
                $token = $user->createToken('mytoken')->plainTextToken;
                $respone = [
                    'user'=>$user,
                    'token'=>$token
                ];
                return response()->json($respone);
            } else {
                return response()->json(['sms'=>'Invalid password'],401);
            }
        } else {
           return response()->json(['sms'=>'Log in fail'],401);
        }
      
    }

    public function logOut(Request $request)
    {
        Auth()->user()->tokens()->delete();
        return response()->Json(["sms"=>"log out succes"]);
    }

    public function getAllAlumni(Request $request)
    {
        return User::with(['alumni', 'work_experience.company', 'education_backgrounds.school', 'skills.skill'])->where('role', 'alumni')->where('first_name', '!=', NULL)->where('last_name', '!=', NULL)->get();
    }
}