<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
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
        $user-> profile = $request->profile;
        $user-> cover = $request->cover;
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
    
    public function getEmails($id)
    {
        return User::select('email')->where('id','!=', $id)->get();
    }

    public function updateProfileImage(Request $request,$id){
        $user = User::find($id);
        if($user->profile != "avatar.png") {
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
        return response(['massage'=>"Updated profile Success"]);
    }

    public function updateCoverImage(Request $request,$id){
        $user = User::find($id);
        if($user->cover != "avatar.png") {
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
        return response(['massage'=>"Updated cover Success"]);
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
    }