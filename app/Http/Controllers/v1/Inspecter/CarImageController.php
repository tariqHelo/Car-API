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
        
        $carImages = [];
        foreach ($request->file('images') as $image) {
            //add add upload disk
            $path = $image->store('/',[
                'disk' => 'uploads'
            ]);
            $carImages[] = ['image' => $path];
            
        }
        $car = Car::withoutGlobalScopes()->find($request->car_id);
        if($car){
            $car->carImages()->createMany($carImages);
            return response()->json([
                //use  getCarImagesAttribute to get car images
                'car_id' => $car->id,
                'success' => true,
                'message' => 'car images added successfully',
            ]);
        }
        return response()->json([
            'success' => false,
            'message' => 'failed to add images'
            ], 400);
    }
}
