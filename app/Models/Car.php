<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'summary',
        'dna',
        'exterior',
        'tires_brakes',
        'electronics',
        'road_test',
        'images',
    ];

    //cast json columns to array
    protected $casts = [
        'summary' => 'array',
        'dna' => 'array',
        'exterior' => 'array',
        'tires_brakes' => 'array',
        'electronics' => 'array',
        'road_test' => 'array',
        'images' => 'array',
    ];

    //add accessor to get summary data
    public function getSummaryAttribute($value)
    {
        return json_decode($value);
    }

    //add accessor to get car DNA
    public function getDnaAttribute($value)
    {
        return json_decode($value);
    }
}
