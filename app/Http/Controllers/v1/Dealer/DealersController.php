<?php

namespace App\Http\Controllers\v1\Dealer;

use App\Http\Controllers\Controller;

use App\Models\Car;
use Illuminate\Http\Request;

class DealersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::withoutGlobalScopes()->get()->map(function ($car) {
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
            'UserType' => 'Dealer',
            'cars' => $cars,
        ]);
    }

  //post data for car request when BidNow button clicked
    public function store(Request $request)
    {
        $car = Car::withoutGlobalScopes()->find($request->car_id);
        $car->update([
            'status' => 'requested',
            'dealer_id' => $request->user()->id,
        ]);
        return response()->json([
            'status' => 'success',
            'message' => 'Car Requested Successfully',
        ]);
    }

    //car data for dealer when dealer click on car details
    public function show($id)
    {
        $car = Car::withoutGlobalScopes()->find($id);
        //add price to bid now button
        $car->price = $car->carData->price;
        return response()->json([
            'status' => 'success',
            'car' => $car,
        ]);
    }
}
