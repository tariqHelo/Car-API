<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_id',
        'image',
    ];

    //hidden image column
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    //get the car that owns the image
    public function car()
    {
        return $this->belongsTo(Car::class);
    }

 //check if the carImage have linke http or not
    public function getImageAttribute($value)
    {
        if (strpos($value, 'http') !== false) {
            return $value;
        }
        return asset('uploads/' . $value);
    }

    //get all car images
    public function getCarImagesAttribute()
    {
        return $this->car->carImages;
    }

}
