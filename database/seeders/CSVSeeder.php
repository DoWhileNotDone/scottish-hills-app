<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\Import\HillsFromCSVSeeder;
use Database\Seeders\Import\TripsFromCSVSeeder;
use Database\Seeders\Import\UsersFromCSVSeeder;

class CSVSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UsersFromCSVSeeder::class,
            HillsFromCSVSeeder::class,
            TripsFromCSVSeeder::class,
        ]);
    }
}
