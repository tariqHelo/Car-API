<?php

namespace App\Http\Controllers;

use App\Http\Requests\IEAC\StoreIEACRequest;
use App\Http\Requests\IEAC\UpdateIEACRequest;
use App\Models\InteriorElecticalsAirConditioner;


use App\Models\Car;

class InteriorElecticalsAirConditionerController extends Controller
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
     * @param  \App\Http\Requests\StoreIEACRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIEACRequest $request)
    {
        //store the data
        $ieac = InteriorElecticalsAirConditioner::create($request->validated());

        //store $ieac->id in car table
        $car = Car::where('user_id', auth()->user()->id)
             ->where('status', 'pending')->first();

        if ($car === null) {
            $car = Car::create([
                'interior_electicals_air_conditioner_id' => $ieac->id,
            ]);
        } else {
            $car->interior_electicals_air_conditioner_id = $ieac->id;
            $car->save();
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Interior Electicals Air Conditioner data stored successfully',
            // 'data' => json_decode($ieac->data),
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InteriorElecticalsAirConditioner  $interiorElecticalsAirConditioner
     * @return \Illuminate\Http\Response
     */
    public function show(InteriorElecticalsAirConditioner $interiorElecticalsAirConditioner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InteriorElecticalsAirConditioner  $interiorElecticalsAirConditioner
     * @return \Illuminate\Http\Response
     */
    public function edit(InteriorElecticalsAirConditioner $interiorElecticalsAirConditioner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInteriorElecticalsAirConditionerRequest  $request
     * @param  \App\Models\InteriorElecticalsAirConditioner  $interiorElecticalsAirConditioner
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInteriorElecticalsAirConditionerRequest $request, InteriorElecticalsAirConditioner $interiorElecticalsAirConditioner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InteriorElecticalsAirConditioner  $interiorElecticalsAirConditioner
     * @return \Illuminate\Http\Response
     */
    public function destroy(InteriorElecticalsAirConditioner $interiorElecticalsAirConditioner)
    {
        //
    }
}
