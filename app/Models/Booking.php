<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'user_id',
        'apartment_id',
        'check_in_date',
        'check_out_date',
        'booking_status',
        'rating',
    ];
}
