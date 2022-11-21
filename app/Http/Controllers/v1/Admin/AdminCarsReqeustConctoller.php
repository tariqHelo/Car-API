<?php

namespace App\Http\Controllers\v1\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Car;

class AdminCarsReqeustConctoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all cars for admin   withoutGlobalScopes 
        $cars = Car::withoutGlobalScopes()->get()->map(function ($car) {
            return [
                'id' => $car->id,
                'status' => $car->status,
                'user_name' => $car->user->name,
                'carData' => $car->carData,
                'carImages' => $car->carImages,
            ];
        });
        //return all cars
        return response()->json([
            'status' => 'success',
            'cars' => $cars,
        ]);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //change car status to approved
    public function approveCar($id)
    {
        //get car by id
        $car = Car::withoutGlobalScopes()->find($id);
        //change car status to approved
        $car->status = 'approved';
        //save car
        $car->save();
        //return success message
        return response()->json([
            'status' => 'success',
            'message' => 'Car approved successfully',
        ]);
    }

    //change car status to rejected
    public function rejectCar($id)
    {
        //get car by id
        $car = Car::withoutGlobalScopes()->find($id);
        //change car status to rejected
        $car->status = 'rejected';
        //save car
        $car->save();
        //return success message
        return response()->json([
            'status' => 'success',
            'message' => 'Car rejected successfully',
        ]);
    }


    //change car status to pending
    public function pendingCar($id)
    {
        //get car by id
        $car = Car::withoutGlobalScopes()->find($id);
        //change car status to pending
        $car->status = 'pending';
        //save car
        $car->save();
        //return success message
        return response()->json([
            'status' => 'success',
            'message' => 'Car pending successfully',
        ]);
    }
}
