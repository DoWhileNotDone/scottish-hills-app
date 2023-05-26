<?php

namespace Database\Seeders\Import;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use League\Csv\Reader;

abstract class ImportFromCSVSeeder extends Seeder
{
    public function run(): void
    {
        //load the CSV document from a file path
        $files = Storage::files($this->path);

        foreach ($files as $file) {
            if (Storage::mimeType($file) !== 'text/csv') {
                continue;
            }

            $csv = Reader::createFromPath(Storage::path($file), 'r');
            $csv->setHeaderOffset(0);

            $records = $csv->getRecords();
            collect($records)->each(
                [$this, 'importRow']
            );
        }
    }
}
