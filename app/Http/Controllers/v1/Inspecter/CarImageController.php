<?php

namespace App\Http\Controllers\v1\Inspecter;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCarImageRequest;
use App\Http\Requests\UpdateCarImageRequest;
use App\Models\CarImage;
use App\Models\Car;

//use request
use Illuminate\Http\Request;

class CarImageController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCarImageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function storeImages(Request $request)
    {
        
       // dd($request->all());
        //add car images to uploads folder and store the path in database
        $carImages = [];
        foreach ($request->file('images') as $image) {
            //add add upload disk
            $path = $image->store('uploads', 'public');
            $carImages[] = ['image' => $path];
            
        }
       // dd($request->car_id);
        
       //store images in database with car id
        $car = Car::withoutGlobalScopes()->find($request->car_id);
       // dd($car);
        $car->carImages()->createMany($carImages);
    
        //return the car images
        return response()->json([
            'carImages' => $carImages
        ], 201);
    }
}
