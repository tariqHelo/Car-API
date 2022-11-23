<?php

namespace App\Http\Controllers\v1\Inspecter;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarSpace\StoreCarSpaceRequest;
use App\Http\Requests\CarSpace\UpdateCarSpaceRequest;
use App\Models\CarSpace;
use App\Models\Car;


class CarSpaceController extends Controller
{
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCarSpaceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCarSpaceRequest $request)
    {
        //store the data
        // $validated = $request->validated();?
        $validated = $request->validated();

        $car = Car::withoutGlobalScopes()->find($validated['car_id']);
       // dd($car);  
        if($car){
            $carSpace = CarSpace::create([
                'data' => json_encode($validated['inputs']),
            ]);
            //update car with new IEAC_id
            $car->update([
                'car_space_id' => $carSpace->id,
            ]);
            //return josn response
            return response()->json([
                'car_id' => $validated['car_id'],
                'status' => 'success',
                'message' => 'Car Space data stored successfully',
            ],201);
        }else{
            return response()->json([
                'message' => 'car not found'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CarSpace  $carSpace
     * @return \Illuminate\Http\Response
     */
    public function show(CarSpace $carSpace)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CarSpace  $carSpace
     * @return \Illuminate\Http\Response
     */
    public function edit(CarSpace $carSpace)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCarSpaceRequest  $request
     * @param  \App\Models\CarSpace  $carSpace
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCarSpaceRequest $request, CarSpace $carSpace)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CarSpace  $carSpace
     * @return \Illuminate\Http\Response
     */
    public function destroy(CarSpace $carSpace)
    {
        //
    }
}
