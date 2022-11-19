<?php

namespace App\Http\Controllers;

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
        $ssb = SteeringSuspensionBrakes::create($request->validated());

        //store $ssb->id in car table
        $car = Car::where('user_id', auth()->user()->id)
             ->where('status', 'pending')->first();

        if ($car === null) {
            $car = Car::create([
                'steering_suspension_brakes_id' => $ssb->id,
            ]);
        } else {
            $car->steering_suspension_brakes_id = $ssb->id;
            $car->save();
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Steering Suspension Brakes data stored successfully',
            // 'data' => json_decode($ssb->data),
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SteeringSuspensionBrakes  $steeringSuspensionBrakes
     * @return \Illuminate\Http\Response
     */
    public function show(SteeringSuspensionBrakes $steeringSuspensionBrakes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SteeringSuspensionBrakes  $steeringSuspensionBrakes
     * @return \Illuminate\Http\Response
     */
    public function edit(SteeringSuspensionBrakes $steeringSuspensionBrakes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSteeringSuspensionBrakesRequest  $request
     * @param  \App\Models\SteeringSuspensionBrakes  $steeringSuspensionBrakes
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSteeringSuspensionBrakesRequest $request, SteeringSuspensionBrakes $steeringSuspensionBrakes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SteeringSuspensionBrakes  $steeringSuspensionBrakes
     * @return \Illuminate\Http\Response
     */
    public function destroy(SteeringSuspensionBrakes $steeringSuspensionBrakes)
    {
        //
    }
}
