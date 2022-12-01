<?php

namespace App\Http\Controllers\v1\Dealer;

use App\Http\Requests\StoreBidRequest;
use App\Http\Requests\UpdateBidRequest;
use App\Models\Bid;
use App\Notifications\BidNotification;

class BidController extends Controller
{
    //add bid for car
    public function store(StoreBidRequest $request)
    {
        //cehck if user already bid for this car
        $bid = Bid::where('car_id', $request->car_id)
        ->where('user_id', $request->user_id)
        ->first();
        //updateOrCreate bid
        Bid::updateOrCreate(
            [
                'car_id' => $request->car_id,
                'user_id' => $request->user_id,
            ],
            [
                'bid' => $request->bid,
            ]
        );

        //add notification for admin
        $admin->notify(new BidNotification($car, $user, $request->bid));

        return response()->json([
            'status' => 'success',
            'message' => 'Bid Added Successfully',
            'bid' => $bid->bid,
        ]);
    }
}
