<?php

namespace Database\Seeders\Import;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UsersFromCSVSeeder extends ImportFromCSVSeeder
{
    protected string $path = "data/import/users/";

    public function importRow(array $userData): void
    {
        $userData = collect($userData)->map(function (string $value) {
            return Str::squish($value);
        });

        User::firstOrCreate(
            [
                'email' => $userData->get('email'),
            ],
            [
                ...$userData->only(['name'])->toArray(),
                'password' => Str::password(10),
            ],
        );
    }
}
