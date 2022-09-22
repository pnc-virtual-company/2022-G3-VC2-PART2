<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\AlumniCompanyController;
use App\Http\Controllers\CompanyController;
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
Route::group(['middleware'=> ['auth:sanctum']], function(){ 
    Route::get('/users', [UserController::class,"index"]);
    Route::get('/users/{id}', [UserController::class,"show"]);
    Route::delete('/users/{id}', [UserController::class,"destroy"]);
    Route::put('/alumniIntro/{id}', [Usercontroller::class,'updateAlumnIntro']); /* The route to update alumni introduction */
    Route::get('/alumnis', [UserController::class,"getAllAlumni"]); /* The route to get all alumni */
    Route::post('/alumnis/signup', [UserController::class,"signUpAlumni"]);/*the route to sign up alumni */

    Route::post('/alumniGeneralInfo', [AlumniController::class,"store"]);
    Route::delete('/alumniGeneralInfo/{id}', [AlumniController::class,"delete"]);
    Route::get('/alumniGeneralInfo', [AlumniController::class,"index"]);
    Route::put('/alumnis/experience/{id}', [AlumniCompanyController::class, 'update']);
    Route::put('/alumniGeneralInfo/{id}', [AlumniController::class,"updateAlumniInfo"]);
    Route::delete('alumniGeneralInfo/{id}', [AlumniController::class,"delete"]);

    Route::get('/companies', [CompanyController::class, "index"]);
    Route::delete('/companies/{id}', [CompanyController::class, "destroy"]); /** The route use to delete company */

    Route::put('/users/update/password/{id}', [UserController::class, "resetPassword"]); /* The route to update user's password */
    // Invite ERO and Alumni
    Route::post('/invite/eros/', [UserController::class, "createEro"]); /**The route use to create ero account */
    Route::post('/invite/alumnis/', [UserController::class, "createAlumni"]); /**The route use to create ero account */
    Route::put('/eros/register/{id}', [UserController::class, "registerEro"]); /**The route use to create ero account */
    Route::get('/eros', [UserController::class, "getEro"]);  
});

Route::group(['middleware'=>['auth:sanctum']], function(){
    Route::post('/users/logout/', [UserController::class, "logOut"]); /* The route to logout user account */
});
