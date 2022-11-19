<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCarImageRequest;
use App\Http\Requests\UpdateCarImageRequest;
use App\Models\CarImage;

class CarImageController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCarImageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCarImageRequest $request)
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CarImage  $carImage
     * @return \Illuminate\Http\Response
     */
    public function show(CarImage $carImage)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCarImageRequest  $request
     * @param  \App\Models\CarImage  $carImage
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCarImageRequest $request, CarImage $carImage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CarImage  $carImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(CarImage $carImage)
    {
        //
    }
}
