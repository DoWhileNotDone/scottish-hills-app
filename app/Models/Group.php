<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Group extends Model
{
    public $timestamps = false;

    protected $fillable = ['name', 'area'];

    /**
     * Get the hills for the group.
     */
    public function hills(): BelongsToMany
    {
        return $this->belongsToMany(Hill::class);
    }
}
