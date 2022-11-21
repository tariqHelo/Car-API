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
            $car->wheel_id = $wheel->id;
            $car->save();
        }else{
            return response()->json([
                'message' => 'car not found'
            ]);
        }
        return response()->json([
            'car_id' => $car->id,
            'status' => 'success',
            'message' => 'Wheel data stored successfully',
        ]);
    }
}
