<?php

namespace Database\Seeders;

use App\Models\Enums\GroupType;
use App\Models\Hill;
use App\Models\Group;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use League\Csv\Reader;

abstract class HillsFromCSVSeeder extends Seeder
{
    /**
     * Run the import munros from csv seed.
     * Over-engineered to explore laravel collections.
     *
     */
    public function runImport(string $type): void
    {
        //load the CSV document from a file path
        $path = Storage::path("data/hill_log_{$type}.csv");

        $csv = Reader::createFromPath($path, 'r');
        $csv->setHeaderOffset(0);

        $records = $csv->getRecords();

        collect($records)
            ->each(
                function (array $hillData) {
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
            );
    }
}
