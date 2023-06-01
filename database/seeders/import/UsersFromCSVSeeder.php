<?php

namespace Database\Seeders\Import;

use App\Events\UserImported;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersFromCSVSeeder extends ImportFromCSVSeeder
{
    protected string $path = "data/import/users/";

    public function importRow(array $userData): void
    {
        $userData = collect($userData)->map(function (string $value) {
            return Str::squish($value);
        });

        User::where('email', $userData->get('email'))->firstOr(function () use ($userData) {
            //Only trigger registration event to new users
            $user = User::create([
                ...$userData->only(['name', 'email'])->toArray(),
                'password' => Hash::make(Str::password(10)),
            ]);

            event(new UserImported($user));
        });
    }
}
