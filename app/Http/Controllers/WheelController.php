<?php

namespace App\Http\Controllers;

use App\Http\Requests\Wheel\StoreWheelRequest;
use App\Http\Requests\Wheel\UpdateWheelRequest;
use App\Models\Wheel;
use App\Models\Car;

class WheelController extends Controller
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
     * @param  \App\Http\Requests\StoreWheelRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWheelRequest $request)
    {
        //store the data
        $wheel = Wheel::create($request->validated());

        //store $wheel->id in car table
        $car = Car::where('user_id', auth()->user()->id)
             ->where('status', 'pending')->first();

        if ($car === null) {
            $car = Car::create([
                'wheel_id' => $wheel->id,
            ]);
        } else {
            $car->wheel_id = $wheel->id;
            $car->save();
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Wheel data stored successfully',
            // 'data' => json_decode($wheel->data),
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wheel  $wheel
     * @return \Illuminate\Http\Response
     */
    public function show(Wheel $wheel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wheel  $wheel
     * @return \Illuminate\Http\Response
     */
    public function edit(Wheel $wheel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWheelRequest  $request
     * @param  \App\Models\Wheel  $wheel
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWheelRequest $request, Wheel $wheel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wheel  $wheel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wheel $wheel)
    {
        //
    }
}
