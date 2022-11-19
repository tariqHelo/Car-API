<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EngineTransmission extends Model
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
}
