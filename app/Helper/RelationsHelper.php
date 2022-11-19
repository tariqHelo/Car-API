<?php

namespace App\Helper;


use App\Models\{
    Car,
    Wheel,
    CarSpace,
    EngineTransmission,
    InteriorElecticalsAirConditioner,
    SteeringSuspensionBrakes,
};


class RelationsHelper
{
    public static function getRelations($car)
    {
        $relations = [];
        $relations['car_space'] = $car->carSpace;

        $relations['engine_transmission'] = $car->engineTransmission;

        $relations['interior_electicals_air_conditioner'] = $car->interiorElecticalsAirConditioner;

        $relations['steering_suspension_brake'] = $car->steeringSuspensionBrake;

        $relations['wheel'] = $car->wheel;

        return $relations;

    }


    //save relations and return the id of the saved relation

    public static function saveRelations($request)
    {
        $relations = [];

        $relations['car_space'] = CarSpace::create($request->car_space)->id;

        $relations['engine_transmission'] = EngineTransmission::create($request->engine_transmission)->id;

        $relations['interior_electicals_air_conditioner'] = InteriorElecticalsAirConditioner::create($request->interior_electicals_air_conditioner)->id;

        $relations['steering_suspension_brake'] = SteeringSuspensionBrakes::create($request->steering_suspension_brake)->id;

        $relations['wheel'] = Wheel::create($request->wheel)->id;

        return $relations;
    }
  }