<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TripHill extends Pivot
{
    use HasFactory;

    protected $table = 'trip_hills';

    public $timestamps = false;

    public function hill(): BelongsTo
    {
        return $this->belongsTo(Hill::class);
    }

    public function trip(): BelongsTo
    {
        return $this->belongsTo(Trip::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
