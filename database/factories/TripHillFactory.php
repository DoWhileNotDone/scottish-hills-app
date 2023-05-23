<?php

namespace Database\Factories;

use App\Models\Hill;
use App\Models\User;
use App\Models\Trip;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TripHill>
 */
class TripHillFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::factory();

        return [
            'user_id'      => $user,
            'trip_id' => Trip::factory([
                'user_id'  => $user,
            ]),
            'hill_id'      => Hill::factory(),
        ];
    }
}
