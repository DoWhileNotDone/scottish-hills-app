<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class TripHill extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function hill(): HasOne
    {
        return $this->hasOne(Hill::class);
    }

    public function trip(): HasOne
    {
        return $this->hasOne(UserTrip::class);
    }
}
