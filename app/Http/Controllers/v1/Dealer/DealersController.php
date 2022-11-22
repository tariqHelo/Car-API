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
     * @param  \App\Models\v1\Dealer\DealerController  $dealerController
     * @return \Illuminate\Http\Response
     */
    public function show(DealerController $dealerController)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\v1\Dealer\DealerController  $dealerController
     * @return \Illuminate\Http\Response
     */
    public function edit(DealerController $dealerController)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\v1\Dealer\DealerController  $dealerController
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DealerController $dealerController)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\v1\Dealer\DealerController  $dealerController
     * @return \Illuminate\Http\Response
     */
    public function destroy(DealerController $dealerController)
    {
        //
    }
}
