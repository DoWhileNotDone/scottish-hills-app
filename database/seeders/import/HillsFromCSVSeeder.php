<?php

namespace Database\Seeders\Import;

use App\Models\Enums\GroupType;
use App\Models\Hill;
use App\Models\Group;
use Illuminate\Support\Str;

class HillsFromCSVSeeder extends ImportFromCSVSeeder
{
    protected string $path = "data/import/hills/";

    /**
     * Run the import munros from csv seed.
     * Over-engineered to explore laravel collections.
     *
     */
    public function importRow(array $hillData): void
    {
        $hillData = collect($hillData)->map(function (string $value) {
            return Str::squish($value);
        });

        $group = Group::firstOrCreate(
            [
                'name' => $hillData->get('hill_group'),
                'type' => GroupType::AREA->value
            ]
        );

        $hill = Hill::firstOrCreate(
            [
                ...$hillData
                ->only(
                    ['type', 'name', 'grid_ref', 'height']
                )->toArray(),
            ]
        );

        $hill->groups()->attach($group);
    }
}
