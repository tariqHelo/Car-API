<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'engine_transmission_id',
        'interior_electicals_air_conditioner_id',
        'steering_suspension_brake_id',
        'car_space_id',
        'wheel_id',
    ];

    public function getDataAttribute($value)
    {
        return json_decode($value , true);
    }

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

    //convert json data to array and return it
    public function getCarDataAttribute()
    {
        return [
            'engineTransmission' => $this->engineTransmission->getDataAttribute($this->engineTransmission->data),
            'interiorElecticalsAirConditioner' => $this->interiorElecticalsAirConditioner->getDataAttribute($this->interiorElecticalsAirConditioner->data),
            'steeringSuspensionBrake' => $this->steeringSuspensionBrake->getDataAttribute($this->steeringSuspensionBrake->data),
            'carSpace' => $this->carSpace->getDataAttribute($this->carSpace->data),
            'wheel' => $this->wheel->getDataAttribute($this->wheel->data),
        ];
    }

    public function carImages()
    {
        return $this->hasMany(CarImage::class);
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
            $car->user_id = auth()->user()->id;
        });

        // static::addGlobalScope('user_id', function ($query) {
        //     $query->where('user_id', auth()->user()->id);
        // });
    }



}


