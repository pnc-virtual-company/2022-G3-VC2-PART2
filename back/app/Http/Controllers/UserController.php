<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Alumni;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\MailController;

class UserController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function inviteEro(Request $request)
    {
        $user = new User();
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 'ero';
        $user->profile = 'IMG_PROFILE_avatar.png';
        $user->cover = 'IMG_COVER_cover.png';
        $user->is_accepted = TRUE;
        $user->is_seen = TRUE;
        $user->save();
        $data = ['email' => $user->email, 'password' => $request->password];
        (new MailController)->sendEroInvitation($data);
        return response()->Json(["message"=>"ero is created successfully!"]);
    }

    public function inviteAlumni(Request $request)
    {
        $user = new User();
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 'alumni';
        $user->profile = 'IMG_PROFILE_avatar.png';
        $user->cover = 'IMG_COVER_cover.png';
        $user->is_accepted = TRUE;
        $user->is_seen = TRUE;
        $user->save();
        $alumni = new Alumni();
        $alumni->user_id = $user->id;
        $alumni->save();
        $data = ['email' => $user->email, 'password' => $request->password];
        (new MailController)->sendAlumniInvitation($data);
        return response()->Json(["message"=>"alumni is created successfully!"]);
    }

    public function registerEro(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->save();
        $token = $user->createToken('mytoken')->plainTextToken;
        $respone = [
            'user'=>$user,
            'token'=>$token
        ];
        return response()->json($respone);
    }

    public function registerAlumni(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->save();
        $alumni = Alumni::where('user_id', $user->id)->update([
            'phone' => $request->phone,
            'telegram' => $request->telegram,
            'batch' => $request->batch,
            'major' => $request->major,
            'address' => $request->address,
            'gender' => $request->gender,
            'birth_date' => $request->birth_date,
        ]);

        $token = $user->createToken('mytoken')->plainTextToken;
        $respone = [
            'user'=>$user,
            'token'=>$token
        ];
        return response()->json($respone);
    }

    public function getEro()
    {
       return User::where('role', 'ero')->get();
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
      public function updateAlumnGeneralInfor(Request $request, $id)
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
    
    public function getEmails($id)
    {
        return User::select('email')->where('id','!=', $id)->where('role', '!=', 'admin')->get();
    }

    public function resetPassword(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if (Hash::check($request->confirm_current_password, $user->password)) {
            $user->password = Hash::make($request->new_password);
            $user->save();
            return Response()->json(['message' => 'password is changed']);
        } else {
            return Response()->json(['message' => 'failed']);
        }
    }

    public function logIn(Request $request)
    {
        //check email
        $user = User::where('email', $request->email)->first();
        //check password
        if($user){
            if(Hash::check($request->password, $user->password)){
                if (!$user->first_name && !$user->last_name || $user->first_name == NULL && $user->last_name == NULL) {
                    $respone = [
                        'user'=>$user,
                    ];
                } else {
                    $token = $user->createToken('mytoken')->plainTextToken;
                    $respone = [
                        'user'=>$user,
                        'token'=>$token
                    ];
                }
                return response()->json($respone);
            } else {
                return response()->json(['sms'=>'Invalid password. Please try again!'],401);
            }
        } else {
           return response()->json(['sms'=>'Your email not found. Please try again with another email !'], 401);
        }
      
    }

    public function logOut(Request $request)
    {
        Auth()->user()->tokens()->delete();
        return response()->Json(["sms"=>"log out succes"]);
    }
    
    public function getInfoByToken(){
        $info = auth('sanctum')->user();
        return Response()->json(['data'=>$info]);
    }

    public function getAllAlumni(Request $request)
    {
        return User::with(['alumni', 'work_experience.company', 'education_backgrounds.school', 'skills.skill'])->where('role', 'alumni')->where('is_accepted', TRUE)->get();
    }

    public function getUnacceptedAlumni(Request $request)
    {
        return User::with(['alumni', 'work_experience.company', 'education_backgrounds.school', 'skills.skill'])->where('role', 'alumni')->where('is_accepted', FALSE)->get();
    }

    public function updateProfileImage(Request $request,$id){
        $user = User::find($id);
        if($user->profile != "IMG_PROFILE_avatar.png") {
            $previousImgPath = storage_path('images/') . $user->profile;
            if (File::exists($previousImgPath)) {
                File::delete($previousImgPath);
            }
        }
        $profile = $request->profile;
        $newName = "IMG_PROFILE_". time() . "_" . $profile->getClientOriginalName();
        $profile->move(storage_path('images'), $newName);
        $user->profile = $newName;
        $user->save();
        return $user->profile;
    }

    public function updateCoverImage(Request $request,$id){
        $user = User::find($id);
        if($user->cover != "IMG_COVER_cover.png") {
            $previousImgPath = storage_path('images/') . $user->cover;
            if (File::exists($previousImgPath)) {
                File::delete($previousImgPath);
            }
        }
        $cover = $request->cover;
        $newName = "IMG_COVER_". time() . "_" . $cover->getClientOriginalName();
        $cover->move(storage_path('images'), $newName);
        $user->cover = $newName;
        $user->save();
        return $user->cover;
    }
    
    public function getImage($imageName)
    {
        $path = storage_path('images/' . $imageName);
        if (File::exists($path)) {
            $file = File::get($path);
        } else {
            abort(404);
        }
        $type = File::mimeType($path);
        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);
        return $response;
    }

    public function signUpAlumni(Request $request)
    {
        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->role = 'alumni';
        $user->profile = 'IMG_PROFILE_avatar.png';
        $user->cover = 'IMG_COVER_cover.png';
        $user->is_accepted = FALSE;
        $user->is_seen = FALSE;
        $user->save();
        
        $alumni = new Alumni();
        $alumni->user_id = $user->id;
        $alumni->major = $request->major;
        $alumni->batch = $request->batch;
        $alumni->address = $request->address;
        $alumni->telegram = $request->telegram;
        $alumni->phone = $request->phone;
        $alumni->gender = $request->gender;
        $alumni->birth_date = $request->birth_date;
        $alumni->save();
        (new MailController)->sendRegistrationEmail($user);
        return response()->Json(["message"=>"alumni sign up successfully!"]);
    }

    public function updateEroInfor(Request $request, $id) {
        $user = User::findOrFail($id);
        $user->email = $request->email;
        $user->save();

        return response()->Json(["message"=>"information is updated successfully!"]);
    }

    public function makeAsSeen($id) {
        $user = User::findOrFail($id);
        $user->is_seen = TRUE;
        $user->save();
        return response()->Json(["message"=>"request is seen by ero!"]);
    }

    public function acceptAlumniAccount(Request $request, $id) {
        $user = User::findOrFail($id);
        $user->is_accepted = TRUE;
        $user->password = Hash::make($request->password);
        $user->save();
        $data = ['email' => $user->email, 'password' => $request->password];
        (new MailController)->sendAcceptanceMail($data);
        return response()->Json(["message"=>"request is accepted by ero!"]);
    }

    public function verifyCode(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        $user->verify_code = $request->verify_code;
        $user->save();
        (new MailController)->sendVerifyCode($request);
        return response()->Json(["message"=>"verify code sent"]);
    }

    public function checkVerifyCode(Request $request)
    {
        $user = User::where('email', $request->email)->where('verify_code', $request->verify_code)->first();
        if ($user) {
            return $user->id;
        }
        abort(404);
    }

    public function saveCreatedPassword(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->password = Hash::make($request->password);
        $user->verify_code = NULL;
        $user->save();
        return response()->Json(["message"=>"password save"]);
    }
}
