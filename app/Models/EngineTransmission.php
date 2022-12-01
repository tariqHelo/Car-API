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

    //convert json data to array and return it
    public function getDataAttribute($value)
    {
      return json_decode($value, true);
    } 
    //check if data is have image in json data add full url to it
    public function getFullUrlAttribute()
    {
        $data = $this->getDataAttribute($this->data);
        if (isset($data['image'])) {
            $data['image'] = url($data['image']);
        }
        return $data;
    }
}
