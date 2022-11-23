<?php

namespace App\Http\Controllers\v1\Inspecter;

use App\Http\Controllers\Controller;
use App\Http\Requests\IEAC\StoreIEACRequest;
use App\Http\Requests\IEAC\UpdateIEACRequest;
use App\Models\InteriorElecticalsAirConditioner;


use App\Models\Car;

class InteriorElecticalsAirConditionerController extends Controller
{
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreIEACRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIEACRequest $request)
    {
        //validat key inputs in request
        $validated = $request->validated();
        // $validated = json_encode($validated['inputs']);
       // dd($validated);


        $car = Car::withoutGlobalScopes()->find($validated['car_id']); 
       // dd($car) ;
       // dd($car); 
        if($car){
            //create new IEAC
            $IEAC = InteriorElecticalsAirConditioner::create([
                'data' => json_encode($validated['inputs']),
            ]);
            //update car with new IEAC_id
            $car->update([
                'interior_electicals_air_conditioner_id' => $IEAC->id,
            ]);
            //return josn response
            return response()->json([
                'car_id' => $validated['car_id'],
                'status' => 'success',
                'message' => 'Interior Electicals Air Conditioner data stored successfully',
            ],201);
        }else{
            return response()->json([
                'message' => 'you didint have IEAC before',
            ], 400);
        }
     
    }

   
}
