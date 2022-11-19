<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    AuthController,
    CarController,
    EngineTransmissionController,
    InteriorElecticalsAirConditionerController,
    SteeringSuspensionBrakesController,
    CarSpaceController,
    WheelController,
};

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

//route login and register
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class , 'login']);

//add group auth middleware
Route::group(['middleware' => 'auth:sanctum'], function () {
    //add resourceApi route
    Route::apiResource('cars', CarController::class);

    //add EngineTransmission route
    Route::apiResource('engine-transmissions', EngineTransmissionController::class);

    //add interiorElecticalsAirConditioner route
    Route::apiResource('ieac', InteriorElecticalsAirConditionerController::class);

    //add steeringSuspensionBrakes route
    Route::apiResource('ssa', SteeringSuspensionBrakesController::class);

    //add carSpace route
    Route::apiResource('car-spaces', CarSpaceController::class);

    //add wheel route
    Route::apiResource('wheels', WheelController::class);

    //add logout route
    Route::post('/logout', [AuthController::class , 'logout']);
});
