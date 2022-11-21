<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



use App\Http\Controllers\v1\AuthController;
use App\Http\Controllers\v1\Admin\AdminCarsReqeustConctoller;
//use CarImageController for store car images
use App\Http\Controllers\v1\Inspecter\CarImageController;
//use dealer controller for store dealer
use App\Http\Controllers\v1\Dealer\DealerControllerController;



use App\Http\Controllers\v1\Inspecter\{
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


//add group with prefix api with v1 version




Route::group(['prefix' => 'v1'], function () {

    //route test for api
    Route::get('/test', function () {
        return response()->json(['message' => 'test api']);
    });
    //register user 
    Route::post('/register', [AuthController::class, 'register']);
    //login user
    Route::post('/login', [AuthController::class , 'login']);

        //route group for auth user
        Route::group(['middleware' => ['auth:sanctum']], function () {
            
            //route group for inspecter
            Route::group(['prefix' => 'inspecter'], function () {
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

                //route for add car images
                Route::post('/cars/{car}/images', [CarImageController::class, 'storeImages']);
           });

            //route group for admin 
            Route::group(['prefix' => 'admin'], function () {
                //add resourceApi route
                Route::apiResource('cars', AdminCarsReqeustConctoller::class);
                //route for approve car
                Route::post('/cars/{car}/approve', [AdminCarsReqeustConctoller::class, 'approveCar'])->name('cars.approve');
                //route for reject car
                Route::post('/cars/{car}/reject', [AdminCarsReqeustConctoller::class, 'rejectCar'])->name('cars.reject');
                //route for pending car
                Route::post('/cars/{car}/pending', [AdminCarsReqeustConctoller::class, 'pendingCar'])->name('cars.pending');
            });

            //route group for dealer
            Route::group(['prefix' => 'dealer'], function () {
                //add resourceApi route
                Route::apiResource('cars', CarController::class);
            });
            //add logout route
            Route::post('/logout', [AuthController::class , 'logout']);
        });

});
