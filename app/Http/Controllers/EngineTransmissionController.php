<?php

namespace App\Http\Controllers;

use App\Http\Requests\EngineTransmission\StoreEngineTransmissionRequest;
use App\Http\Requests\EngineTransmission\UpdateEngineTransmissionRequest;
use App\Models\EngineTransmission;

use Illuminate\Http\Request;

use App\Models\Car;

class EngineTransmissionController extends Controller
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
     * @param  \App\Http\Requests\StoreEngineTransmissionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEngineTransmissionRequest $request)
    {
        
       // dd($request->data);
        //createorupdate engine transmission
        // $engineTransmission = EngineTransmission::updateOrCreate(
        //     ['id' => $request->id],
        //     ['data' => json_encode($request->validated())]
        // );

        //validate key value pair of array
        $request->validate([
            'data.*.key' => 'required',
            'data.*.value' => 'required',
        ]);

        //if the key is not in the array then add i


        //createorupdate engine transmission
        $engineTransmission = EngineTransmission::updateOrCreate(
            ['id' => $request->id],
            ['data' => json_encode($request->data)]
        );

        //validate $request->data as array and store it in database
        // $engineTransmission = EngineTransmission::updateOrCreate(
        //     ['id' => $request->id],
        //     ['data' => json_encode($request->data)]
        // );

        // $engineTransmission = EngineTransmission::create([
        //     'data' => json_encode($request->data),
        // ]);
        
        //check have user_id and status = pending
        $car = Car::where('user_id', auth()->user()->id)
             ->where('status', 'pending')->first();

       // dd($car);

        if ($car === null) {
            $car = Car::create([
                'engine_transmission_id' => $engineTransmission->id,
            ]);
        }else{
            $car->update([
                'engine_transmission_id' => $engineTransmission->id,
            ]);
        }

        //return josn response
        return response()->json([
            'status' => 'success',
            'message' => 'Engine Transmission data stored successfully',
            //id of engine transmission
           // 'car' => $car->id,
        //    'data' => json_decode($engineTransmission->data),
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EngineTransmission  $engineTransmission
     * @return \Illuminate\Http\Response
     */
    public function show(EngineTransmission $engineTransmission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EngineTransmission  $engineTransmission
     * @return \Illuminate\Http\Response
     */
    public function edit(EngineTransmission $engineTransmission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEngineTransmissionRequest  $request
     * @param  \App\Models\EngineTransmission  $engineTransmission
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEngineTransmissionRequest $request, EngineTransmission $engineTransmission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EngineTransmission  $engineTransmission
     * @return \Illuminate\Http\Response
     */
    public function destroy(EngineTransmission $engineTransmission)
    {
        //
    }
}
