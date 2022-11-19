<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarSpace\StoreCarSpaceRequest;
use App\Http\Requests\CarSpace\UpdateCarSpaceRequest;
use App\Models\CarSpace;
use App\Models\Car;


class CarSpaceController extends Controller
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
     * @param  \App\Http\Requests\StoreCarSpaceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCarSpaceRequest $request)
    {
        //store the data
        $carSpace = CarSpace::create($request->validated());

        //store $carSpace->id in car table
        $car = Car::where('user_id', auth()->user()->id)
             ->where('status', 'pending')->first();

        if ($car === null) {
            $car = Car::create([
                'car_space_id' => $carSpace->id,
            ]);
        } else {
            $car->car_space_id = $carSpace->id;
            $car->save();
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Car Space data stored successfully',
            // 'data' => json_decode($carSpace->data),
        ], 201);
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
