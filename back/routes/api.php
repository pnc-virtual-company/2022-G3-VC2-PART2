<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\AlumniCompanyController;
use App\Http\Controllers\CompanyController;
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
Route::put('alumniIntro/{id}', [Usercontroller::class,'updateAlumnIntro']); /* The route to update alumni introduction */

Route::get('alumniGeneralInfo', [AlumniController::class,"index"]);
Route::post('alumniGeneralInfo', [AlumniController::class,"store"]);
Route::delete('alumniGeneralInfo/{id}', [AlumniController::class,"delete"]);

Route::get('alumniGeneralInfo', [AlumniController::class,"index"]);
Route::post('alumniGeneralInfo', [AlumniController::class,"store"]);

Route::put('/alumnis/experience/{id}', [AlumniCompanyController::class, 'update']);
Route::put('alumniGeneralInfo/{id}', [AlumniController::class,"updateAlumniInfo"]);
Route::delete('alumniGeneralInfo/{id}', [AlumniController::class,"delete"]);

Route::get('/companies', [CompanyController::class, "index"]);

