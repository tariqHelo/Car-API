<?php

namespace App\Http\Controllers\v1\Inspecter;

use App\Http\Controllers\Controller;
use App\Http\Requests\EngineTransmission\StoreEngineTransmissionRequest;
use App\Http\Requests\EngineTransmission\UpdateEngineTransmissionRequest;
use App\Models\EngineTransmission;

use Illuminate\Http\Request;

use App\Models\Car;

class EngineTransmissionController extends Controller
{
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEngineTransmissionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEngineTransmissionRequest $request)
    {
        
       // dd($request->all());

        //validate data array 
          $validated = $request->validated();
          $validated = json_encode($validated['inputs']);
         // dd($validated);
        $engineTransmission = EngineTransmission::create([
            'data' => $validated,
        ]);
        
        $car = Car::create([
            'engine_transmission_id' => $engineTransmission->id,
        ]);

        //return josn response
        return response()->json([
            'car_id' => $car->id,
            'status' => 'success',
            'message' => 'Engine Transmission data stored successfully',
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EngineTransmission  $engineTransmission
     * @return \Illuminate\Http\Response
     */
    public function show(EngineTransmission $engineTransmission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EngineTransmission  $engineTransmission
     * @return \Illuminate\Http\Response
     */
    public function edit(EngineTransmission $engineTransmission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEngineTransmissionRequest  $request
     * @param  \App\Models\EngineTransmission  $engineTransmission
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEngineTransmissionRequest $request, EngineTransmission $engineTransmission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EngineTransmission  $engineTransmission
     * @return \Illuminate\Http\Response
     */
    public function destroy(EngineTransmission $engineTransmission)
    {
        //
    }
}
