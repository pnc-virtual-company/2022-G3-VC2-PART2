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


Route::get('users', [UserController::class,"index"]);
Route::get('emails/{id}', [UserController::class,"getEmails"]);
Route::post('users', [UserController::class,"store"]);
Route::get('users/{id}', [UserController::class,"show"]);
Route::delete('users/{id}', [UserController::class,"destroy"]);
Route::put('users/update_profile/{id}', [UserController::class,"updateProfileImage"]); 
Route::put('users/update_cover/{id}', [UserController::class,"updateCoverImage"]); 
Route::get('users/image/{image_name}', [UserController::class,"getImage"]); 
Route::put('alumniIntro/{id}', [Usercontroller::class,'updateAlumnIntro']); /* The route to update alumni introduction */

Route::get('alumniGeneralInfo', [AlumniController::class,"index"]);
Route::post('alumniGeneralInfo', [AlumniController::class,"store"]);
Route::delete('alumniGeneralInfo/{id}', [AlumniController::class,"delete"]);

Route::get('alumniGeneralInfo', [AlumniController::class,"index"]);
Route::post('alumniGeneralInfo', [AlumniController::class,"store"]);

Route::get('/alumnis/experience', [AlumniCompanyController::class, 'index']);
Route::put('/alumnis/experience/{id}', [AlumniCompanyController::class, 'update']);
Route::post('/alumnis/experience', [AlumniCompanyController::class, 'store']);
Route::put('alumniGeneralInfo/{id}', [AlumniController::class,"updateAlumniInfo"]);
Route::delete('alumniGeneralInfo/{id}', [AlumniController::class,"delete"]);

Route::get('/companies', [CompanyController::class, "index"]);
Route::get('/companies/{id}', [CompanyController::class, "index"]);
Route::post('/companies', [CompanyController::class, "store"]);

Route::get('/skills/', [SkillController::class, "index"]);
Route::post('/skills/', [SkillController::class, "store"]);
Route::delete('/skills/{id}', [SkillController::class, "destroy"]);

Route::get('/alumni/skills/', [AlumniSkillController::class, "index"]);
Route::post('/alumni/skills/', [AlumniSkillController::class, "store"]);
Route::delete('/alumni/skills/{id}', [AlumniSkillController::class, "destroy"]);

Route::get('/schools/', [SchoolController::class, "index"]);
Route::post('/schools/', [SchoolController::class, "store"]);
Route::get('/schools/{id}', [SchoolController::class, "show"]);
Route::put('/schools/{id}', [SchoolController::class, "update"]);
Route::delete('/schools/{id}', [SchoolController::class, "destroy"]);


Route::get('/alumni/schools', [AlumniSchoolController::class, "index"]);
Route::post('/alumni/schools/', [AlumniSchoolController::class, "store"]);
Route::get('/alumni/schools/{id}', [AlumniSchoolController::class, "show"]);
Route::put('/alumni/schools/{id}', [AlumniSchoolController::class, "update"]);
Route::delete('/alumni/schools/{id}', [AlumniSchoolController::class, "destroy"]);







