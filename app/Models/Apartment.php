<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    protected $fillable = [
        'user_id',
        'city_id',
        'description',
        'address',
        'num_of_rooms',
        'price',
        'apartment_images',
        'apartment_status',
    ];
}
