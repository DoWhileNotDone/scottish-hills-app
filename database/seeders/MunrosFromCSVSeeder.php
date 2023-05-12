<?php

namespace Database\Seeders;

class MunrosFromCSVSeeder extends HillsFromCSVSeeder
{
    public function run(): void
    {
        $this->runImport('munros');
    }
}
