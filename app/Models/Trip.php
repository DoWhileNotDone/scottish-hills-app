<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Trip extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the hills that this trip contains.
     */
    public function hills(): BelongsToMany
    {
        return $this->belongsToMany(Hill::class, 'trip_hills');
    }

    /**
     * Get the tripshills that this trip has.
     */
    public function tripHills(): HasMany
    {
        return $this->hasMany(TripHill::class);
    }
}
