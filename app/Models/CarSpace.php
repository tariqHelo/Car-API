<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarSpace extends Model
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

    //decode json data to array
    public function getDataAttribute($value)
    {
        return json_decode($value , true) ?? [];
    }
}
