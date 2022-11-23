<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wheel extends Model
{
    use HasFactory;

    protected $fillable = [
        'data',
    ];
    //cast json columns to array
    protected $casts = [
        'data' => 'array',
    ];

    public function car()
    {
        return $this->hasOne(Car::class);
    }

    public function getDataAttribute($value)
    {
        return json_decode($value , true) ?? [];
    }
}
