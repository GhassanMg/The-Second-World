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

Route::group(['namespace' => 'App\Http\Controllers', 'middleware' => ['guest:api']], function () {
    Route::post('register', [UserAuthController::class, 'register']);
    Route::post('login', [UserAuthController::class, 'login']);
});

Route::group(['namespace' => 'App\Http\Controllers', 'middleware' => ['auth:api']], function () {

    Route::group(['middleware' => 'is_admin'], function () {
        Route::post('addfacility', [FacilityController::class, 'store']);
        Route::post('updatefacility/{id}', [FacilityController::class, 'update']);
        Route::get('facility/{id}', [FacilityController::class, 'show']);
        Route::get('allfacilities', [FacilityController::class, 'index'])->middleware('is_admin');
        Route::delete('deletefacility/{id}', [FacilityController::class, 'destroy']);

        Route::post('addpoints', [PointsController::class, 'store']);
        Route::get('allpoints', [PointsController::class, 'index']);

        Route::get('getallfacilityrequests', [FacilityRequestController::class, 'index']);
        Route::post('addfacilityrequest', [FacilityRequestController::class, 'store']);
        Route::get('getfacilityrequests/{id}', [FacilityRequestController::class, 'show']);
        Route::post('updatefacilityrequeststatus/update/{id}', [FacilityRequestController::class, 'update']);
    });

    //Auth
    Route::get('logout', [UserAuthController::class, 'logout']);
});


//Route::get('users',[UserController::class,'index']);
Route::get('/users', function () {
    return ApiResponseClass::successResponse(UserResource::collection(User::all()));
});

Route::middleware('auth:api')->group(function () {
    Route::get('get-user', [UserAuthController::class, 'userInfo']);
});
