<?php

namespace App\Http\Controllers\v1\Inspecter;

use App\Http\Controllers\Controller;
use App\Http\Requests\SSB\StoreSteeringSuspensionBrakesRequest;
use App\Http\Requests\SSB\UpdateSteeringSuspensionBrakesRequest;
use App\Models\SteeringSuspensionBrakes;

use App\Models\Car;

class SteeringSuspensionBrakesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSteeringSuspensionBrakesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSteeringSuspensionBrakesRequest $request)
    {
        //store the data
         $validated = $request->validated();

         $car = Car::withoutGlobalScopes()->find($validated['car_id']);  
         if($car){
                $ssb = SteeringSuspensionBrakes::create([
                    'data' => json_encode($validated['inputs']),
                ]);
                $car->steering_suspension_brake_id = $ssb->id;
                $car->save();
         }else{
             return response()->json([
                 'message' => 'car not found'
             ]);
         }
        return response()->json([
            'car_id' => $car->id,
            'status' => 'success',
            'message' => 'Steering Suspension Brakes data stored successfully',
            // 'data' => json_decode($ssb->data),
        ], 201);
    }

    
}
