<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class City extends Model
{
    protected $fillable = [
        'gov_id',
        'name',
    ];

    // علاقة مع المحافظة
    public function governorate(): BelongsTo
    {
        return $this->belongsTo(Gov::class, 'gov_id');
    }

    // علاقة مع الشقق
    public function apartments(): HasMany
    {
        return $this->hasMany(Apartment::class);
    }
}
