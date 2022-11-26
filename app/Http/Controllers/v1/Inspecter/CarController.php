<?php

namespace App\Http\Controllers\v1\Inspecter;

use App\Http\Controllers\Controller;

use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
use App\Models\Car;
use App\Models\CarImage;
//use request
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  

        $cars = Car::with('carImages')->get()->map(function ($car) {
            return [
                'id' => $car->id,
                'user_name' => $car->user->name,
                'carData' => $car->carData,
                'carImages' => $car->carImages,
            ];
        });

        //return all cars
        return response()->json([
            'status' => 'success',
            'UserType' => 'Inspecter',
            'cars' => $cars,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCarRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCarRequest $request)
    {
        $car = Car::create($request->validated());

        //return josn response
        return response()->json([
            'status' => 'success',
            'data' => $car,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        return response()->json($car->load('images'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCarRequest  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCarRequest $request, Car $car)
    {
        $car->update($request->validated());
        //add images to car
        $car->images()->createMany($request->images);
        return response()->json($car);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $car->delete();
        //delete images from car
        $car->images()->delete();
        return response()->json(null, 204);
    }

    //build storeImages function
    public function storeImages(Request $request)
    {
        //add car images to uploads folder and store the path in database
        $carImages = [];
        foreach ($request->file('images') as $image) {
            $path = $image->store('uploads', 'public');
            $carImages[] = ['path' => $path];
        }
        //create car images and car_id is the id of the car
        $car = Car::find($request->car_id);
        $car->carImages()->createMany($carImages);
        //return the car images
        return response()->json([
            'carImages' => $carImages
        ], 201);
    }
}
