<?php

namespace App\Http\Controllers\v1\Inspecter;

use App\Http\Controllers\Controller;
use App\Http\Requests\Wheel\StoreWheelRequest;
use App\Http\Requests\Wheel\UpdateWheelRequest;
use App\Models\Wheel;
use App\Models\Car;

class WheelController extends Controller
{
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreWheelRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWheelRequest $request)
    {

        $validated = $request->validated();
        $car = Car::withoutGlobalScopes()->find($validated['car_id']);  
        if($car){
            $wheel = Wheel::create([
                'data' => json_encode($validated['inputs']),
            ]);
            //update car with new IEAC_id
            $car->update([
                'wheel_id' => $wheel->id,
            ]);
            return response()->json([
                'car_id' => $validated['car_id'],
                'status' => 'success',
                'message' => 'Wheel data stored successfully',
            ],201);
        }else{
            return response()->json([
                'message' => 'car not found'
            ]);
        }
    }
}
