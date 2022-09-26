<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\AlumniCompanyController;
use App\Http\Controllers\AlumniSchoolController;
use App\Http\Controllers\AlumniSkillController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\EroController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|

| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/users', [UserController::class,"store"]);
Route::post('/users/login', [UserController::class, "logIn"]); /* The route to login user account */

// Public routes
Route::get('/users/image/{image_name}', [UserController::class,"getImage"]); 
Route::get('/alumnis', [UserController::class,"getAllAlumni"]); /* The route to get all alumni */
Route::get('/alumnis/unaccepted/', [UserController::class,"getUnacceptedAlumni"]); 
Route::get('/companies', [CompanyController::class, "index"]);
Route::get('/skills', [SkillController::class, "index"]);
Route::get('/schools', [SchoolController::class, "index"]);
Route::post('/alumnis/signup', [UserController::class,"signUpAlumni"]);/*the route to sign up alumni */

// Private routes
Route::group(['middleware'=> ['auth:sanctum']], function(){ 
    // User routes
    Route::get('/users/{id}', [UserController::class,"show"]);
    Route::delete('/users/{id}', [UserController::class,"destroy"]);
    Route::get('/emails/{id}', [UserController::class,"getEmails"]);
    Route::put('/users/update_profile/{id}', [UserController::class,"updateProfileImage"]); 
    Route::put('/users/update_cover/{id}', [UserController::class,"updateCoverImage"]); 
    Route::put('/alumniGeneralInfor/{id}', [Usercontroller::class,'updateAlumnGeneralInfor']); /* The route to update alumni introduction */
    Route::put('/users/update/password/{id}', [UserController::class, "resetPassword"]); /* The route to update user's password */
    Route::put('/users/ero/{id}', [UserController::class, 'updateEroInfor']);
    Route::put('/users/request/seen/{id}', [UserController::class, 'makeAsSeen']);
    Route::put('/users/request/accept/{id}', [UserController::class, 'acceptAlumniAccount']);

    // ERO and Alumni management
    Route::post('/invite/eros/', [UserController::class, "inviteEro"]); /**The route use to create ero account */
    Route::post('/invite/alumnis/', [UserController::class, "inviteAlumni"]); /**The route use to create ero account */
    Route::put('/eros/register/{id}', [UserController::class, "registerEro"]); /**The route use to create ero account */
    Route::get('/eros', [UserController::class, "getEro"]);  
    
    // Alumni company routes
    Route::put('/alumnis/experience/{id}', [AlumniCompanyController::class, 'update']);
    Route::post('/alumnis/experience', [AlumniCompanyController::class, 'store']);
    Route::delete('/alumnis/experience/{id}', [AlumniCompanyController::class, 'destroy']);
    
    // Alumni skill routes
    Route::post('/alumni/skills/', [AlumniSkillController::class, "store"]);
    Route::delete('/alumni/skills/{id}', [AlumniSkillController::class, "destroy"]);

    // Alumni school routes
    Route::post('/alumni/schools/', [AlumniSchoolController::class, "store"]);
    Route::put('/alumni/schools/{id}', [AlumniSchoolController::class, "update"]);
    Route::delete('/alumni/schools/{id}', [AlumniSchoolController::class, "destroy"]);

    // Company routes
    Route::post('/companies', [CompanyController::class, "store"]);
    Route::delete('/companies/{id}', [CompanyController::class, "destroy"]); /** The route use to delete company */

    // Skill routes
    Route::post('/skills', [SkillController::class, "store"]);
    Route::delete('/skills/{id}', [SkillController::class, "destroy"]);
    
    // School routes
    Route::post('/schools', [SchoolController::class, "store"]);
    Route::delete('/schools/{id}', [SchoolController::class, "destroy"]);

});

Route::group(['middleware'=>['auth:sanctum']], function(){
    Route::post('/users/logout/', [UserController::class, "logOut"]); /* The route to logout user account */
});
