<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CSVSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            MunrosFromCSVSeeder::class,
        ]);
    }
}
