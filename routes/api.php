<?php

use App\Http\Controllers\Api\FacilityController;
use App\Http\Controllers\Api\FacilityRequestController;
use App\Http\Controllers\Api\PointsController;
use App\Http\Controllers\Api\UserAuthController;
use App\Http\Controllers\Classes\ApiResponseClass;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Route;

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

Route::post('register', [UserAuthController::class, 'register']);
Route::post('login', [UserAuthController::class, 'login']);
Route::post('logout', [UserAuthController::class, 'logout']);

Route::group(['namespace' => 'App\Http\Controllers','middleware' => ['auth:api']], function () {

Route::post('addfacility', [FacilityController::class, 'store']);
Route::post('updatefacility/{id}', [FacilityController::class, 'update']);
Route::get('facility/{id}', [FacilityController::class, 'show']);
Route::get('allfacilities', [FacilityController::class, 'index']);
Route::delete('deletefacility/{id}', [FacilityController::class, 'destroy']);

Route::post('addpoints', [PointsController::class, 'store']);
Route::get('allpoints', [PointsController::class, 'index']);

Route::post('addfacilityrequest', [FacilityRequestController::class, 'store']);
});


//Route::get('users',[UserController::class,'index']);
Route::get('/users', function () {
    return ApiResponseClass::successResponse(UserResource::collection(User::all()));
});

Route::middleware('auth:api')->group(function () {
    Route::get('get-user', [UserAuthController::class, 'userInfo']);
});
