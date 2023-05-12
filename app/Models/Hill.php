<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Hill extends Model
{
    public $timestamps = false;

    protected $fillable = ['type', 'name', 'grid_ref', 'height'];

    /**
     * Get the groups that this hill is in.
     */
    public function groups(): BelongsToMany
    {
        return $this->belongsToMany(Group::class);
    }
}
