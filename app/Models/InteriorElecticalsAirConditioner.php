<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InteriorElecticalsAirConditioner extends Model
{
    use HasFactory;

    protected $fillable = [
        'data',
    ];

    //cast json columns to array
    protected $casts = [
        'data' => 'array',
    ];

    public function cars()
    {
        return $this->hasMany(Car::class);
    }

    public function getDataAttribute($value)
    {
        return json_decode($value , true);
    }

    //find parameter car_id withoutglobal scope and return true if it exists
    // public function carExists($car_id)
    // {
    //     return Car::withoutGlobalScope('car_id')->find($car_id);
    // }

}
