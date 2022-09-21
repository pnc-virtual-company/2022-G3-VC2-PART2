<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class AuthenticationController extends Controller
{
    // login user
    public function userLogin($request){
        $user = User::where('email', $request->email)->first();
        $user->tokens()->delete();
        if(!$user || !Hash::check($request->password, $user->password))
        {   
            return response()->json(['sms'=>'invalid', 'email'=> $request->email, 'password'=> $request->password], 404);
        }
        $token = $user->createToken('myToken', ['user'])->plainTextToken;
        return response()->json(['token'=> $token, 'role'=> $user->role], 202);
    }

    // Get information by token
    public function getInfoByToken(){
        $info = auth('sanctum')->user();
        return Response()->json(['data'=>$info]);
    }
    
}