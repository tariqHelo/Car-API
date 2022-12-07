<?php

namespace App\Http\Controllers\v1\Inspecter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;

class GeneralInfoController extends Controller
{
    //store general info data as json in car table
    public function store(Request $request)
    {
        $validated = $request->validate([
            'general_info' => 'required|array',
            //validate carname inside general_info array
            //'general_info.car_name' => 'required|string',
        ]);

        //create general info data as json
        $generalInfo = json_encode($validated['general_info']);
       // dd($generalInfo);

        //create new record in car table
        $car = Car::create([
            //store name form general_info array car_name
            'name' => $validated['general_info']['car_name'],
            //add status approved to car table
            'status' => 'approved',
            'general_info' => $generalInfo,
        ]);

        return response()->json([
            'car_id' => $car->id,
            'status' => 'success',
            'message' => 'General Info data stored successfully',
        ],201);
    }
}
