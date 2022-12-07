<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'engine_transmission_id',
        'interior_electicals_air_conditioner_id',
        'steering_suspension_brake_id',
        'car_space_id',
        'wheel_id',
        'general_info',
    ];

    protected $casts = [
        'general_info' => 'array',
    ];

    //decode general_info json data from car table
    // public function getGeneralInfoAttribute($value)
    // {
    //     return json_decode($value , true);
    // }

    public function engineTransmission()
    {
        return $this->belongsTo(EngineTransmission::class);
    }

    public function interiorElecticalsAirConditioner()
    {
        return $this->belongsTo(InteriorElecticalsAirConditioner::class);
    }

    public function steeringSuspensionBrake()
    {
        return $this->belongsTo(SteeringSuspensionBrakes::class);
    }

    public function carSpace()
    {
        return $this->belongsTo(CarSpace::class);
    }

    public function wheel()
    {
        return $this->belongsTo(Wheel::class);
    }

    //add relation bid in Model Car
    public function bids()
    {
        return $this->hasMany(Bid::class);
    }

    //engineTransmission multiple data
    // public function getEngineTransmissionAttribute()
    // {
    //     return $this->engineTransmission->getDataAttribute($this->engineTransmission);
    // }

    public function getCarDataAttribute()
    {
        return [
            
            'engine_transmission' => $this->engineTransmission ? $this->engineTransmission->getDataAttribute($this->engineTransmission->data): null,
            'interior_electicals_air_conditioner' => $this->interiorElecticalsAirConditioner ? $this->interiorElecticalsAirConditioner->getDataAttribute($this->interiorElecticalsAirConditioner->data) : null,
            'steering_suspension_brake' => $this->steeringSuspensionBrake ? $this->steeringSuspensionBrake->getDataAttribute($this->steeringSuspensionBrake->data) : null,
            'car_space' => $this->carSpace ? $this->carSpace->getDataAttribute($this->carSpace->data) : null,
            'wheel' => $this->wheel ? $this->wheel->getDataAttribute($this->wheel->data) : null,
        ];
    }
     
     //object_to_array function
     public function object_to_array($data)
     {
         if (is_array($data) || is_object($data)) {
             $result = array();
             foreach ($data as $key => $value) {
                 $result[$key] = $this->object_to_array($value);
             }
             return $result;
         }
         return $data;
     }

    // //Convert getEngineTransmissionAttribute from object to array and return it
    // public function getCarDataArrayAttribute()
    // {
    //     return (array) $this->getCarDataAttribute();
    // }

    public function carImages()
    {
        return $this->hasMany(CarImage::class)->select('image');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    //add global scope to get user_id from auth user
    protected static function booted()
    {  
        //auto store user_id when create new car
        static::creating(function ($car) {
            //add random number user_id
            $car->user_id = random_int(1, 10);
        });

        // static::addGlobalScope('user_id', function ($query) {
        //     //add defualt user_id to get all cars
        //     $query->where('user_id', auth()->user()->id);
        // });
    }
}


