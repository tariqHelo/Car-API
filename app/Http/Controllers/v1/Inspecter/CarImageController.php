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

        //recive images from request api React js
        $car = Car::withoutGlobalScopes()->find($request->car_id);
         $values = $request->file('images');
         $carImages = [];
         if (is_array($values) || is_object($values))
         {
             foreach ($values as $value)
             {
                $path = $value->store('/',[
                    'disk' => 'uploads'
                ]);

                $carImages[] = ['image' => $path];
             }
         }
        // $carImages = [];
        // // $values = get_values();
        // foreach ($images as $image) {
        //     //add add upload disk
        //     $path = $image->store('/',[
        //         'disk' => 'uploads'
        //     ]);
        //     $carImages[] = ['image' => $path];
            
        // }
        if($car){
            $car->carImages()->createMany($carImages);
            return response()->json([
                //use  getCarImagesAttribute to get car images
                'car_id' => $car->id,
                'carImages' => $carImages,

                'success' => true,
                'message' => 'car images added successfully',
            ]);
        }
        return response()->json([
            'success' => false,
            //display images
            'message' => 'failed to add images'
            ], 400);
    }
}
